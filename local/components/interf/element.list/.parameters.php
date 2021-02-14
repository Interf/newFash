<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;

if (! Loader::includeModule("iblock")) {
	return false;
}

$arTypeList = CIBlockParameters::GetIBlockTypes(["-" => Loc::getMessage("CHOOSE_IBLOCK_TYPE")]);

$arIbList = ["-" => Loc::getMessage("CHOOSE_IBLOCK")];
if ($arCurrentValues["IBLOCK_TYPE"] != "-") {
	$rsIb = CIBlock::GetList(
		array("sort" => "asc"), 
		array("TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE" => "Y")
	);

	while ($ib = $rsIb->Fetch()) {
		$arIbList[$ib["ID"]] = "[" . $ib["ID"] . "]" . $ib["NAME"];
	}
}

$arSortList = [
	"ID" => Loc::getMessage("CHOOSE_SORT_ID"),
	"NAME" => Loc::getMessage("CHOOSE_SORT_NAME")
];

$arSortOrder = [
	"ASC" => Loc::getMessage("CHOOSE_SORT_ORDER_ASC"),
	"DESC" => Loc::getMessage("CHOOSE_SORT_ORDER_DESC")
];

$arComponentParameters = array(
	"PARAMETERS" => array(
		"IBLOCK_TYPE" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" => Loc::getMessage("IBLOCK_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arTypeList,
			"DEFAULT" => "-",
			"REFRESH" => "Y",
			"MULTIPLE" => "N",
		),
		"IBLOCK_ID" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" => Loc::getMessage("IBLOCK_ID"),
			"TYPE" => "LIST",
			"VALUES" => $arIbList,
			"DEFAULT" => "-",
			"REFRESH" => "Y",
			"MULTIPLE" => "N"
		),
		"COUNT_ON_PAGE" => array(
			"PARENT" => "BASE",
			"NAME" => Loc::getMessage("COUNT_ON_PAGE"),
			"TYPE" => "STRING",
			"DEFAULT" => "1"
		),
		"SORT_FIELD" => array(
			"PARENT" => "BASE",
			"NAME" => Loc::getMessage("SORT_FIELD"),
			"TYPE" => "LIST",
			"VALUES" => $arSortList,
			"DEFAULT" => "ID",
			"MULTIPLE" => "N"
		),
		"SORT_ORDER" => array(
			"PARENT" => "BASE",
			"NAME" => Loc::getMessage("SORT_ORDER"),
			"TYPE" => "LIST",
			"VALUES" => $arSortOrder,
			"DEFAULT" => "ASC",
			"MULTIPLE" => "N"
		),
		"CACHE_TIME" => array(
			"DEFAULT" => 7200
		)
	)
);
