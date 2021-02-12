<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;

if (! Loader::includeModule("iblock")) {
	return false;
}

$arTypeList = CIBlockParameters::GetIBlockTypes(["-" => "Выберите тип инфоблока"]);


$arIbList = ["-" => "Выберите инфоблок"];

if ($arCurrentValues["IBLOCK_TYPE"] !==	 "-") {
	
	$rsIB = CIBlock::GetList(
		array(), 
		array("ACTIVE" => "Y", "TYPE" => $arCurrentValues["IBLOCK_TYPE"]));

	while ($ib = $rsIB->Fetch()) {
		$arIbList[$ib["ID"]] = "[" . $ib["ID"] . "]" . $ib["NAME"];
	}
}

$arComponentParameters = array(
	"PARAMETERS" => array(
		"IBLOCK_TYPE" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" => "тип инфоблока",
			"TYPE" => "LIST",
			"VALUES" => $arTypeList,
			"DEFAULT" => "-",
			"REFRESH" => "Y",
			"MULTIPLE" => "N"
		),
		"IBLOCK_ID" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" => "Инфоблок",
			"TYPE" => "LIST",
			"VALUES" => $arIbList,
			"DEFAULT" => "-",
			"REFRESH" => "Y",
			"MULTIPLE" => "N"
		),
		"COUNT_ON_PAGE" => array(
			"NAME" => "Количество элементов на странице",
			"TYPE" => "STRING",
			"DEFAULT" => "1",
			"PARENT" => "BASE"
		),
		"CACHE_TIME" => array(
			"DEFAULT" => 7200
		)
	)
);
