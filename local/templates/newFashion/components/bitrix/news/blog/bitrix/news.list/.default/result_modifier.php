<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$authorIdList = [];
foreach ($arResult["ITEMS"] as $arItem) {
	$authorIdList[] = $arItem["CREATED_BY"];
}

$arUserList = [];
$rsUser = Bitrix\Main\UserTable::getList(Array(
	"select" => Array("ID","NAME", "LAST_NAME"),
	"filter" => array("ID" => $authorIdList),
));
while ($user = $rsUser->fetch()) {
	$arUserList[$user["ID"]] = $user["NAME"] . " " . $user["LAST_NAME"];
}

$authorList = [];
foreach ($authorIdList as $author) {
	$authorList[$author] = $arUserList[$author];
}

$arResult["AUTHOR_INFO_BY_ID"] = $authorList;
