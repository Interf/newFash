<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>

<div class="box_1">				 
	<a href="<?=$arParams["PATH_TO_BASKET"]?>"><h3>Cart: <span class="simpleCart_total"><?=$arResult["TOTAL_PRICE"];?></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"><?=$arResult["TOTAL_COUNT_PRODUCTS"];?></span> items)<img src="<?=SITE_TEMPLATE_PATH?>/images/cart.png" alt=""/></h3></a>
</div>
