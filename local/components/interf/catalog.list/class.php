<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;

class CatalogList extends CBitrixComponent
{
	protected $errorCollection = [];
	private $sort = "";

	public function onPrepareComponentParams($param)
	{
		$param["IBLOCK_TYPE"] = mb_strlen($param["IBLOCK_TYPE"]) > 0 ? htmlspecialchars($param["IBLOCK_TYPE"]) : false;
		$param["IBLOCK_ID"] = intval($param["IBLOCK_ID"]);
		$param["PRICE_TYPE"] = intval($param["PRICE_TYPE"]);
		$param["COUNT_ON_PAGE"] = intval($param["COUNT_ON_PAGE"]);
		$param["CACHE_TIME"] = intval($param["CACHE_TIME"]);
		$param["CACHE_TYPE"] = htmlspecialchars($param["CACHE_TYPE"]);

		return $param;
	}

	protected function handlerError($param)
	{
		if(! Loader::includeModule("iblock")) {
			$this->errorCollection[] = Loc::GetMessage("ERROR_IBLOCK");
		}

		if (! Loader::includeModule("catalog")) {
			$this->errorCollection[] = Loc::GetMessage("ERROR_CATALOG");
		}

		if (! $param["IBLOCK_TYPE"]) {
			$this->errorCollection[] = Loc::GetMessage("ERROR_IBLOCK_TYPE");
		}

		if (! $param["IBLOCK_ID"]) {
			$this->errorCollection[] = Loc::GetMessage("ERROR_IBLOCK_ID");
		}

		if (! $param["PRICE_TYPE"]) {
			$this->errorCollection[] = Loc::GetMessage("ERROR_PRICE_TYPE");
		}

		if (! $this->arParams["CACHE_TIME"]) {
			$this->errorCollection[] = Loc::GetMessage("ERROR_CACHE_TIME"); 
		}

		switch ($param["CACHE_TYPE"]) {
			case 'A':
			case 'Y':
			case 'N':
			break;
			
			default:
			$this->errorCollection[] = Loc::GetMessage("ERROR_CACHE_TYPE");
			break;
		}

		if (! empty($this->errorCollection)) {
			foreach($this->errorCollection as $error) {
				ShowError($error);
			}

			return false;
		}

		return true;
	}

	private function handlerQuery()
	{
		switch ($_GET["sort"]) {
			case 'price_asc':
			$this->sort = ["PRICE_" . $this->arParams["PRICE_TYPE"] => "ASC"];
			break;
			case 'price_desc':
			$this->sort = ["PRICE_" . $this->arParams["PRICE_TYPE"] => "DESC"];
			break;
			
			default:
			$this->sort = "Y";
			break;
		}
	}

	public function executeComponent()
	{
		if (! $this->handlerError($this->arParams)) {
			return false;
		}

		$this->handlerQuery();

		$arSort = [];
		if (is_array($this->sort)) {
			$arSort = $this->sort;
		}

		$arFilter = [
			"ACTIVE" => "Y", 
			"IBLOCK_TYPE" => $this->arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
		];

		if ($this->sort == "Y") {
			$arFilter["PROPERTY_NEW_VALUE"] = $this->sort;
		}

		$arSelect = [
			"ID",
			"IBLOCK_ID",
			"NAME",
			"DETAIL_PAGE_URL",
			"PREVIEW_PICTURE",
			"PROPERTY_NEW",
			"QUANTITY",
		];

		if ($this->arParams["PRICE_TYPE"]) {
			$arSelect[] = "PRICE_" . $this->arParams["PRICE_TYPE"];
			$arSelect[] = "CURRENCY_" . $this->arParams["PRICE_TYPE"];
		}

		$arNavParams = array("nTopCount" => $this->arParams["COUNT_ON_PAGE"]);

		if ($this->startResultCache(false, [$arSort, $arFilter, $arNavParams, $arSelect])) {

			$rsItems = CIBlockElement::getList(
				$arSort,
				$arFilter,
				false,
				$arNavParams,
				$arSelect
			);

			$imgIdList = [];
			while ($item = $rsItems->GetNext()) {

				if ($item["PREVIEW_PICTURE"]) {
					$imgIdList[$item["ID"]] = $item["PREVIEW_PICTURE"];
				}

				$item["PRICES"]["PRICE"] = \Bitrix\Catalog\Product\Price::roundPrice(
					$this->arParams["PRICE_TYPE"],
					$item["PRICE_" . $this->arParams["PRICE_TYPE"]],
					$item["CURRENCY_" . $this->arParams["PRICE_TYPE"]]
				);

				$item["PRICES"]["PRICE_FORMATED"] = CCurrencyLang::CurrencyFormat(
					$item["PRICES"]["PRICE"],
					$item["CURRENCY_" . $this->arParams["PRICE_TYPE"]]
				);

				$arDiscount = CCatalogDiscount::GetDiscount(
					$item["ID"],
					$this->arParams["IBLOCK_ID"],
					array($this->arParams["PRICE_TYPE"]),
					array(),
					"N",
					SITE_ID
				);

				if (! empty($arDiscount)) {
					$discount = end($arDiscount);

					switch ($discount["VALUE_TYPE"]) {
						case 'F':
						$discountPrice = $item["PRICE_" . $this->arParams["PRICE_TYPE"]] - $discount["VALUE"];
						$item["PRICES"]["DISCOUNT_MONEY"] = "-{$discount['VALUE']}"; 
						break;
						case 'P':
						$discountPrice = $item["PRICE_" . $this->arParams["PRICE_TYPE"]];
						$discountPrice -= ($item["PRICE_" . $this->arParams["PRICE_TYPE"]] * ($discount["VALUE"] / 100));
						$item["PRICES"]["DISCOUNT_PERCENT"] = "-{$discount['VALUE']}%"; 
						break;
					}

					$item["PRICES"]["DISCOUNT_PRICE"] = $discountPrice;
					$item["PRICES"]["DISCOUNT_PRICE_FORMATED"] = CCurrencyLang::CurrencyFormat(
						$discountPrice,
						$item["CURRENCY_" . $this->arParams["PRICE_TYPE"]]
					);
				}

				$this->arResult["ITEMS"][$item["ID"]] = $item;

				$arButtons = CIBlock::GetPanelButtons(
					$item["IBLOCK_ID"],
					$item["ID"],
					0,
					array("SECTION_BUTTONS" => false, "SESSID" => false)
				);

				$this->arResult["ITEMS"][$item["ID"]]["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
				$this->arResult["ITEMS"][$item["ID"]]["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];
			}

			$arImg = CFile::GetList(array(), array("@ID" => $imgIdList));
			while ($img = $arImg->fetch()) {
				$index = array_search($img["ID"], $imgIdList);

				$this->arResult["ITEMS"][$index]["PREVIEW_PICTURE"] = "/upload/" . $img["SUBDIR"] . "/" . $img["FILE_NAME"];

			}

			$this->setResultCacheKeys([]);

			$this->includeComponentTemplate();
		}

		if (CMain::GetShowIncludeAreas()) {

			$arButtons = CIBlock::GetPanelButtons(
				$this->arParams["IBLOCK_ID"],
				0,
				0,
				array("SECTION_BUTTONS" => false, "SESSID" => false)
			);

			global $APPLICATION;

			$this->addIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $arButtons));

			
		}
	}
}