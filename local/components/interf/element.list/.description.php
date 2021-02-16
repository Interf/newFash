<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc;

$arComponentDescription = array(
	"NAME" => Loc::getMessage("NAME_ELEM"),
	"DESCRIPTION" => Loc::getMessage("DESCRIPTION"),
	"PATH" => array(
		"ID" => Loc::getMessage("PATH_ID")
	)
);
