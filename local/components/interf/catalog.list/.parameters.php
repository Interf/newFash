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

$arTypeList = CIBlockParameters::GetIBlockTypes(["-" => "Выберите тип инфоблока"]);

$arIbList = ["-" => "Выберите инфоблок"];
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
	"GROUPS" => array(
		"BASKET_GROUP" => array(
			"NAME" => "Параметры корзины"
		)
	),
	"PARAMETERS" => array(
		"IBLOCK_TYPE" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" =>  "Тип инфоблока",
			"TYPE" => "LIST",
			"VALUES" => $arTypeList,
			"DEFAULT" => "-",
			"REFRESH" => "Y",
			"MULTIPLE" => "N",
			"SORT" => 100,
		),
		"IBLOCK_ID" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" =>  "Инфоблок",
			"TYPE" => "LIST",
			"VALUES" => $arIbList,
			"DEFAULT" => "-",
			"REFRESH" => "Y",
			"MULTIPLE" => "N",
			"SORT" => 200,
		),
		"PRICE_TYPE" => array(
			"PARENT" => "BASKET_GROUP",
			"NAME" =>  "Тип цены",
			"TYPE" => "LIST",
			"VALUES" => $arPriceList,
			"MULTIPLE" => "N"
		),
		"COUNT_ON_PAGE" => array(
			"PARENT" => "BASE",
			"NAME" =>  "Количество элементов на странице",
			"TYPE" => "STRING",
			"DEFAULT" => ""
		),
		"CACHE_TIME" => array(
			"DEFAULT" => "7200"
		),
	)
);
