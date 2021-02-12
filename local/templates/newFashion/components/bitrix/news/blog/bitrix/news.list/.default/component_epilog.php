<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult["SECTION"])) {
	$APPLICATION->SetTitle($arParams["TITLE_MAIN_PAGE"] != "" ? $arParams["TITLE_MAIN_PAGE"] : "Empty Title");
} else {
	$APPLICATION->SetTitle($arResult["SECTION"]["PATH"][0]["NAME"]);
}
