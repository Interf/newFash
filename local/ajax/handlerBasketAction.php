<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Loader;
use \Bitrix\Sale;
 
if (isset($_POST["AJAX_DEL_FROM_CART"])) {

	$prodId = intval($_POST["prodId"]);
	$errors = [];
	$success = false;

	if ($prodId <= 0) {
		$errors[] = "Некорретный id товара в корзине";
	}

	if (! Loader::includeModule("sale")) {
		$errors[] = "Ошибка подключения модуля Sale";
	}

	if (! empty($errors)) {
		echo json_encode($errors);
		return false;
	}

	$basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());
	$item = $basket->getItemById($prodId);

	if (empty($item)) {
		$errors = "Нет товара с таким id";
		echo json_encode($errors);
		return false;
	} else {
		$item->delete();
		$basket->save();
	}

	echo json_encode(true);

} elseif (isset($_POST["AJAX_CHANGE_QUANTITY"])) {

	$prodId = intval($_POST["prodId"]);
	$quantity = intval($_POST["quantity"]);
	$errors = [];

	if ($prodId <= 0) {
		$errors[] = "Некорретный id товара";
	}

	if ($quantity <= 0) {
		$errors[] = "Некорректное количество товаров";
	}

	if (! Loader::includeModule("sale")) {
		$errors[] = "Ошибка подключения модуля Sale";
	}

	if (! empty($errors)) {
		echo json_encode($errors);
		return false;
	}

	$basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());
	$item = $basket->getItemById($prodId);

	if (empty($item)) {
		$errors[] = "Нет товара с таким id";
		echo json_encode($errors);
		return false;
	} else {
		$res = $item->setField("QUANTITY", $quantity);

		if (! $res->isSuccess()) {
			$errors[] = $res->getErrorMessages();
			echo json_encode($errors);
			return false;
		}

		$item->save();
	}

	echo json_encode(true);

} else {
	LocalRedirect("/404.php", false, "404 not found");
}
