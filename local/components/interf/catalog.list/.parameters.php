<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;

if (
	! Loader::includeModule("iblock") ||
	! Loader::includeModule("catalog")
) {
	return false;
}

$arTypeList = CIBlockParameters::GetIBlockTypes(["-" => Loc::getMessage("IBLOCK_TYPE_CHOOSE")]);

$arIbList = ["-" => Loc::getMessage("CHOOSE_IB")];
if ($arCurrentValues["IBLOCK_TYPE"] != "-") {

	$arIb = CIBlock::GetList(
		array(),
		array("TYPE" => $arCurrentValues["IBLOCK_TYPE"])
	);

	while ($ib = $arIb->fetch()) {
		$arIbList[$ib["ID"]] = "[" . $ib["ID"] . "]" . $ib["NAME"];
	}
}

$arPriceList = [];
$dbPriceType = CCatalogGroup::GetList();
while ($arPriceType = $dbPriceType->Fetch())
{
	$arPriceList[$arPriceType["ID"]] = "[" . $arPriceType["ID"] . "] " . $arPriceType["NAME"];
}

$arComponentParameters = array(
	"PARAMETERS" => array(
		"IBLOCK_TYPE" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" =>  Loc::getMessage("IBLOCK_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arTypeList,
			"DEFAULT" => "-",
			"REFRESH" => "Y",
			"MULTIPLE" => "N",
			"SORT" => 100,
		),
		"IBLOCK_ID" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" =>  Loc::getMessage("IBLOCK_ID"),
			"TYPE" => "LIST",
			"VALUES" => $arIbList,
			"DEFAULT" => "-",
			"REFRESH" => "Y",
			"MULTIPLE" => "N",
			"SORT" => 200,
		),
		"PRICE_TYPE" => array(
			"PARENT" => "DATA_BASE",
			"NAME" =>  Loc::getMessage("PRICE_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arPriceList,
			"MULTIPLE" => "N"
		),
		"COUNT_ON_PAGE" => array(
			"PARENT" => "BASE",
			"NAME" =>  Loc::getMessage("COUNT_ON_PAGE"),
			"TYPE" => "STRING",
			"DEFAULT" => "1"
		),
		"CACHE_TIME" => array(
			"DEFAULT" => "7200"
		),
		"USE_PAGINATOR" => array(
			"PARENT" => "BASE",
			"NAME" => Loc::getMessage("USE_PAGINATOR"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N"
		)
	)
);
