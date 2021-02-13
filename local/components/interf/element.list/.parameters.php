<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;

if (! Loader::includeModule("iblock")) {
	return false;
}

$arTypeList = CIBlockParameters::GetIBlockTypes(["-" => "Выберите тип инфоблока"]);

$arIbList = ["-" => "Выберите инфоблок"];
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
	"ID" => "ID",
	"NAME" => "Название"
];

$arSortOrder = [
	"ASC" => "По возврастанию",
	"DESC" => "По убыванию"
];

$arComponentParameters = array(
	"PARAMETERS" => array(
		"IBLOCK_TYPE" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" => "Тип инфоблока",
			"TYPE" => "LIST",
			"VALUES" => $arTypeList,
			"DEFAULT" => "-",
			"REFRESH" => "Y",
			"MULTIPLE" => "N",
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
			"PARENT" => "BASE",
			"NAME" => "Количество элементов на странице",
			"TYPE" => "STRING",
			"DEFAULT" => "1"
		),
		"SORT_FIELD" => array(
			"PARENT" => "BASE",
			"NAME" => "По какому полю сортировать",
			"TYPE" => "LIST",
			"VALUES" => $arSortList,
			"DEFAULT" => "ID",
			"MULTIPLE" => "N"
		),
		"SORT_ORDER" => array(
			"PARENT" => "BASE",
			"NAME" => "Направление сортировки",
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
