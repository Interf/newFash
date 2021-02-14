<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc;

$arTemplateParameters = array(
	"PATH_TO_CATALOG" => array(
		"NAME" => Loc::getMessage("CONTINUE_TO_BASKET"),
		"PARENT" => "BASE",
		"TYPE" => "STRING",
		"DEFAULT" => "/catalog/"
	)
);
