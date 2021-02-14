<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Sale;

$basket = Sale\Basket::loaditemsForFUser(Sale\Fuser::getId(), \Bitrix\Main\Context::getCurrent()->getSite());

$arResult["TOTAL_COUNT_PRODUCTS"] = array_sum($basket->getQuantityList());
