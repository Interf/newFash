<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arMenu = [];

foreach($arResult as $arItem) {
	$arItem["LINK"] = str_replace("/index.php", "/", $arItem["LINK"]);
	if($arItem["DEPTH_LEVEL"] == 1) {
		$arMenu[] = $arItem;
	} else {
		$arMenu[array_search(end($arMenu), $arMenu)]["submenu"][] = $arItem;
	}
}

$arResult = $arMenu;

$this->__component->setResultCacheKeys([]);
