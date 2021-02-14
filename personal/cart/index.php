<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Cart");
?>
<div class="cart_container">
	<?php if ($_POST["AJAX_REFRESH_CART"] == "Y") {
		$APPLICATION->RestartBuffer();
	} ?>
	<script type="text/javascript">
		var basketJSParams = <?=CUtil::PhpToJSObject($arBasketJSParams);?>
	</script>
	<?$APPLICATION->IncludeComponent(
		"bitrix:sale.basket.basket", 
		"basket", 
		array(
			"ACTION_VARIABLE" => "basketAction",
			"ADDITIONAL_PICT_PROP_1" => "-",
			"AUTO_CALCULATION" => "N",
			"BASKET_IMAGES_SCALING" => "adaptive",
			"COLUMNS_LIST_EXT" => array(
				0 => "PREVIEW_PICTURE",
				1 => "DISCOUNT",
				2 => "DELETE",
				3 => "SUM",
				4 => "PROPERTY_NEW",
			),
			"COLUMNS_LIST_MOBILE" => array(
				0 => "PREVIEW_PICTURE",
				1 => "DISCOUNT",
				2 => "DELETE",
				3 => "DELAY",
				4 => "TYPE",
				5 => "SUM",
			),
			"COMPATIBLE_MODE" => "Y",
			"CORRECT_RATIO" => "N",
			"DEFERRED_REFRESH" => "N",
			"DISCOUNT_PERCENT_POSITION" => "bottom-right",
			"DISPLAY_MODE" => "extended",
			"EMPTY_BASKET_HINT_PATH" => "/catalog/",
			"GIFTS_BLOCK_TITLE" => "Выберите один из подарков",
			"GIFTS_CONVERT_CURRENCY" => "N",
			"GIFTS_HIDE_BLOCK_TITLE" => "N",
			"GIFTS_HIDE_NOT_AVAILABLE" => "N",
			"GIFTS_MESS_BTN_BUY" => "Выбрать",
			"GIFTS_MESS_BTN_DETAIL" => "Подробнее",
			"GIFTS_PAGE_ELEMENT_COUNT" => "4",
			"GIFTS_PLACE" => "BOTTOM",
			"GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",
			"GIFTS_PRODUCT_QUANTITY_VARIABLE" => "quantity",
			"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
			"GIFTS_SHOW_OLD_PRICE" => "N",
			"GIFTS_TEXT_LABEL_GIFT" => "Подарок",
			"HIDE_COUPON" => "N",
			"LABEL_PROP" => array(
				0 => "NEW",
			),
			"LABEL_PROP_MOBILE" => array(
				0 => "NEW",
			),
			"LABEL_PROP_POSITION" => "top-left",
			"PATH_TO_ORDER" => "/personal/order/",
			"PRICE_DISPLAY_MODE" => "Y",
			"PRICE_VAT_SHOW_VALUE" => "N",
			"PRODUCT_BLOCKS_ORDER" => "props,sku,columns",
			"QUANTITY_FLOAT" => "N",
			"SET_TITLE" => "Y",
			"SHOW_DISCOUNT_PERCENT" => "Y",
			"SHOW_FILTER" => "N",
			"SHOW_RESTORE" => "Y",
			"TEMPLATE_THEME" => "blue",
			"TOTAL_BLOCK_DISPLAY" => array(
				0 => "top",
			),
			"USE_DYNAMIC_SCROLL" => "N",
			"USE_ENHANCED_ECOMMERCE" => "N",
			"USE_GIFTS" => "N",
			"USE_PREPAYMENT" => "N",
			"USE_PRICE_ANIMATION" => "Y",
			"COMPONENT_TEMPLATE" => "basket",
			"PATH_TO_CATALOG" => "/catalog/"
		),
		false
		);?>
	<?php if ($_POST["AJAX_REFRESH_CART"] == "Y") {
		exit();
	} ?>
	</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>