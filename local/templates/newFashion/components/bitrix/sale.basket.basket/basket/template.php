<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

$quantity = 0;
?>

<div class="col-md-9 cart-items">
		<h2><?=Loc::getMessage("TOTAL_COUNT_ITEMS");?> <?php $APPLICATION->ShowViewContent('basket_quantity');?></h2>
		<?php foreach($arResult["ITEMS"]["AnDelCanBuy"] as $arItem) : ?>
			<?php $quantity += $arItem["QUANTITY"]; ?>
			<div class="cart-header">
				<div class="close1" product-id="<?=$arItem["ID"]?>"> </div>
				<div class="cart-sec">
					<a href="<?=$arItem["DETAIL_PAGE_URL"];?>">
					<div class="cart-item cyc">
						<img src="<?=$arItem["PREVIEW_PICTURE_SRC"]?>"/>
					</div>
					</a>
					<div class="cart-item-info">
						<h3><a href="<?=$arItem["DETAIL_PAGE_URL"];?>"><?=$arItem["NAME"]?></a><span><?=Loc::getMessage("NUMBER_MODEL");?> <?=$arItem["ID"]?></span></h3>
						<h4><?=$arItem["PRICE_FORMATED"];?></h4>
						<p class="qty"><?=Loc::getMessage("PRODUCT_QUANTIRY");?></p>
						<input min="1" type="number" id="quantity" name="quantity" value="<?=$arItem["QUANTITY"]?>" class="form-control input-small basket_quantity" prod-id="<?=$arItem["ID"]?>">
					</div>
					<div class="clearfix"></div>						
				</div>
			</div>
		<?php endforeach; ?>
		
		<?php $this->setViewTarget("basket_quantity"); ?>
			<?=$quantity;?>
		<?php $this->endViewTarget("basket_quantity"); ?>

		<?php if (! empty($arResult["ITEMS"]["nAnCanBuy"])) : ?>
			<h2><?=Loc::getMessage("NOT_AVAILABLE_TO_BUY");?></h2>
			<?php foreach($arResult["ITEMS"]["nAnCanBuy"] as $arItem) : ?>
				<div class="cart-header">
					<div class="close1"> </div>
					<div class="cart-sec">
						<div class="cart-item cyc">
							<img src="<?=$arItem["PREVIEW_PICTURE_SRC"]?>"/>
						</div>
						<div class="cart-item-info">
							<h3><?=$arItem["NAME"]?><span><?=Loc::getMessage("NUMBER_MODEL");?> <?=$arItem["ID"]?></span></h3>
							<h4><?=$arItem["PRICE_FORMATED"];?></h4>
							<p class="qty"><?=Loc::getMessage("PRODUCT_QUANTIRY");?></p>
							<input min="1" type="number" id="quantity" name="quantity" value="<?=$arItem["QUANTITY"]?>" class="form-control input-small basket_quantity">
						</div>
						<div class="clearfix"></div>						
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
		
</div>

<div class="col-md-3 cart-total">
	<a class="continue" href="<?=$arParams["PATH_TO_CATALOG"]?>"><?=Loc::getMessage("CONTINUE_TO_BASKET");?></a>
	<div class="price-details">
		<h3><?=Loc::getMessage("PRICE_INFO");?></h3>
		<span><?=Loc::getMessage("TOTAL_PRICE");?></span>
		<span class="total"><?=$arResult["PRICE_WITHOUT_DISCOUNT"]?></span>
		<span><?=Loc::getMessage("DISCOUNT");?></span>
		<span class="total"><?=$arResult["DISCOUNT_PRICE_ALL_FORMATED"];?></span>
		<div class="clearfix"></div>				 
	</div>	
	<h4 class="last-price"><?=Loc::getMessage("FITAL_PRICE");?></h4>
	<span class="total final"><?=$arResult["allSum_FORMATED"]?></span>
	<div class="clearfix"></div>
	<a class="order" href="<?=$arParams["PATH_TO_ORDER"]?>"><?=Loc::getMessage("PATH_TO_ORDER");?></a>
</div>


