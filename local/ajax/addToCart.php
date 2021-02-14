<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Loader;

if (isset($_POST["AJAX_ADD_TO_CART"])) {

	$itemId = intval($_POST["itemId"]);
	$quantity = intval($_POST["quantity"]);
	$errors = [];
	$success = false;

	if ($itemId <= 0) {
		$errors[] = "Некорректный id товара";
	}

	if ($quantity <= 0) {
		$errors[] = "Некорректное количество товара";
	}

	if(! Loader::includeModule("catalog")) {
		$errors[] = "Ошибка подключения модуля Catalog";
	}

	if (empty($errors)) {
		$res = Bitrix\Catalog\Product\Basket::addProduct(["PRODUCT_ID" => $itemId, "QUANTITY" => $quantity]);

		if (! $res->isSuccess()) {
			$errors[] = $res->GetErrorMessages();
		} else {
			$success = true;
		}
	}

	echo json_encode(($success) ? $success : $errors);

} else {
	LocalRedirect("/404.php", false, "404 not found");
}
