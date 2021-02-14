<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;

class ElementList extends CBitrixComponent
{
	protected $errorCollection = [];

	public function onPrepareComponentParams($param)
	{
		$param["IBLOCK_TYPE"] = htmlspecialchars($param["IBLOCK_TYPE"]);
		$param["IBLOCK_ID"] = intval($param["IBLOCK_ID"]);
		$param["COUNT_ON_PAGE"] = intval($param["COUNT_ON_PAGE"]);
		$param["SORT_FIELD"] = htmlspecialchars($param["SORT_FIELD"]);
		$param["SORT_ORDER"] = htmlspecialchars($param["SORT_ORDER"]);
		$param["CACHE_TIME"] = intval($param["CACHE_TIME"]);
		$param["CACHE_TYPE"] = htmlspecialchars($param["CACHE_TYPE"]);

		return $param;
	}

	protected function handlerError()
	{
		if (! Loader::includeModule("iblock")) {
			$this->errorCollection[] = Loc::getMessage("ERROR_IBLOCK_MODULE");
		}

		if ($this->arParams["IBLOCK_TYPE"] == "-") {
			$this->errorCollection[] = Loc::getMessage("ERROR_IBLOCK_TYPE");
		}

		if (! $this->arParams["IBLOCK_ID"]) {
			$this->errorCollection[] = Loc::getMessage("ERROR_IBLOCK_ID");
		}

		if (! $this->arParams["COUNT_ON_PAGE"]) {
			$this->errorCollection[] = Loc::getMessage("ERROR_COUNT_ON_PAGE");
		}

		if ($this->arParams["SORT_FIELD"] == "") {
			$this->errorCollection[] = Loc::getMessage("ERROR_SORT_FIELD");
		}

		if ($this->arParams["SORT_ORDER"] != "ASC" && $this->arParams["SORT_ORDER"] != "DESC") {
			$this->errorCollection[] = Loc::getMessage("ERROR_SORT_ORDER");
		}

		if (! $this->arParams["CACHE_TIME"]) {
			$this->errorCollection[] = Loc::getMessage("ERROR_CACHE_TIME");
		}

		switch ($this->arParams["CACHE_TYPE"]) {
			case "A":
			case "Y":
			case "N":
			break;
			
			default:
			$this->errorCollection[] = Loc::getMessage("ERROR_CACHE_TYPE");
			break;
		}

		if (! empty($this->errorCollection)) {
			foreach ($this->errorCollection as $error) {
				ShowError($error);
			}

			return false;
		}

		return true;
	}

	public function executeComponent()
	{
		if (! $this->handlerError()) {
			return false;
		}

		if ($this->startResultCache()) {

			$rsIb = \Bitrix\Iblock\ElementTable::GetList(array(
				"filter" => [
					"ACTIVE" => "Y",
					"IBLOCK_ID" => $this->arParams["IBLOCK_ID"]
				],
				"select"  => ["ID", "NAME", "CODE", "PREVIEW_PICTURE", "IBLOCK_ID", "IBLOCK_SECTION_ID", "DETAIL_PAGE_URL" => "IBLOCK.DETAIL_PAGE_URL"],
				"order" => [$this->arParams["SORT_FIELD"] => $this->arParams["SORT_ORDER"]],
				"limit" => $this->arParams["COUNT_ON_PAGE"]
			));

			$arIbSection = [];
			while ($item = $rsIb->fetch()) {
				$item["DETAIL_PAGE_URL"] = CIBlock::ReplaceDetailUrl($item["DETAIL_PAGE_URL"], $item, false, 'E');

				if ($item["IBLOCK_SECTION_ID"]) {
					$arIbSection[$item["ID"]] = $item["IBLOCK_SECTION_ID"];
				}

				$this->arResult["ITEMS"][$item["ID"]] = $item;

				if ($item["PREVIEW_PICTURE"]) {
					$this->arResult["ITEMS"][$item["ID"]]["PREVIEW_PICTURE"] = CFile::ResizeImageGet(
						$item["PREVIEW_PICTURE"], 
						Array("width" => 400, "height" => 220), 
						BX_RESIZE_IMAGE_EXACT, 
						false
					);
				}
			}

			$rsSection = \Bitrix\Iblock\SectionTable::GetList([
				"filter" => array("ACTIVE" => "Y", "IBLOCK_ID" => $this->arParams["IBLOCK_ID"], "@ID" => $arIbSection),
				"select" => array("ID", "NAME")
			]);

			$arSectionList = [];
			while ($section = $rsSection->fetch()) {
				$arSectionList[$section["ID"]] = $section["NAME"];  
			}

			foreach ($arIbSection as $itemId => $sectionId) {
				$this->arResult["ITEMS"][$itemId]["SECTION_NAME"] = $arSectionList[$sectionId];
			}

			$this->setResultCacheKeys([]);

			$this->includeComponentTemplate();
		}
	}
}