<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;

class CatalogList extends CBitrixComponent
{
	protected $errorCollection = [];

	public function onPrepareComponentParams($param)
	{
		$param["IBLOCK_TYPE"] = htmlspecialchars($param["IBLOCK_TYPE"]);
		$param["IBLOCK_ID"] = intval($param["IBLOCK_ID"]);
		$param["COUNT_ON_PAGE"] = intval($param["COUNT_ON_PAGE"]);
		$param["CACHE_TIME"] = intval($param["CACHE_TIME"]);
		$param["CACHE_TYPE"] = htmlspecialchars($param["CACHE_TYPE"]);

		return $param;
	}

	protected function handlerError()
	{
		if (! Loader::includeModule("iblock")) {
			$this->errorCollection[] = Loc::getMessage("LOAD_MODULE_IBLOCK");
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

		if (! $this->arParams["CACHE_TIME"]) {
			$this->errorCollection[] = Loc::getMessage("ERROR_CACHE_TIME");
		}

		switch ($this->arParams["CACHE_TYPE"]) {
			case 'A':
			case 'Y':
			case 'N':
				break;
			
			default:
				$this->errorCollection[] = Loc::getMessage("ERROR_CACHE_TYPE");
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

	public function executeComponent()
	{
		if (! $this->handlerError()) {
			return false;
		}

		if ($this->startResultCache()) {

			$rsIb = CIBlockElement::GetList(
				array("RAND" => "ASC"),
				array(
					"ACTIVE" => "Y", 
					"IBLOCK_TYPE" => $this->arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $this->arParams["IBLOCK_ID"]
				),
				false,
				array("nTopCount" => $this->arParams["COUNT_ON_PAGE"]),
				array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_TEXT", "PREVIEW_PICTURE")
			);

			$imgIdList = [];
			while ($item = $rsIb->GetNext()) {
				if ($item["PREVIEW_PICTURE"]) {
					$imgIdList[$item["ID"]] = $item["PREVIEW_PICTURE"];
				}

				$this->arResult["ITEMS"][$item["ID"]] = $item;
			}

			$rsImg = CFile::GetList(array(), array("@ID" => $imgIdList));
			while ($img = $rsImg->fetch()) {
				$index = array_search($img["ID"], $imgIdList);

				$this->arResult["ITEMS"][$index]["PREVIEW_PICTURE"] = "/upload/" . $img["SUBDIR"] . "/" . $img["FILE_NAME"]; 
			}

			$this->setResultCacheKeys([]);

			$this->includeComponentTemplate();
		}
	}
}