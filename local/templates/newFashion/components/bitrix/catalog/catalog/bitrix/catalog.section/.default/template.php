<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;
?>

<div class="col-md-9 product-model-sec">
	<?php foreach($arResult["ITEMS"] as $arItem) : ?>
		<?php
		$this->AddEditAction($arItem["ID"], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT'));
		$this->AddDeleteAction($arItem["ID"], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM')));
		?>
		<a href="<?=$arItem["DETAIL_PAGE_URL"];?>"></a><div class="product-grid love-grid" id="<?=$this->GetEditAreaId($arItem['ID'])?>"><a href="<?=$arItem["DETAIL_PAGE_URL"];?>">
			<div class="more-product"><span> </span></div>						
			<div class="product-img b-link-stripe b-animate-go  thickbox">
				<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" class="img-responsive" alt="">
				<div class="b-wrapper">
					<h4 class="b-animate b-from-left  b-delay03">							
						<button class="btns"><?=Loc::getMessage("ORDER_NOW");?></button>
					</h4>
				</div>
			</div></a>						
			<div class="product-info simpleCart_shelfItem">
				<div class="product-info-cust item_info_section">
					<h4><?=$arItem["NAME"]?></h4>
					<span 
						class="item_price"
						<?=($arItem["PRICES"]["BASE"]["DISCOUNT_DIFF"] > 0) ? "style='text-decoration: line-through'" : "";?>
					>
						<?=$arItem["PRICES"]["BASE"]["PRINT_VALUE"]?>
					</span>
					<?php if ($arItem["PRICES"]["BASE"]["DISCOUNT_DIFF"] > 0) : ?>
						<br>
						<span class="item_price"><?=$arItem["PRICES"]["BASE"]["PRINT_DISCOUNT_VALUE"]?></span>
					<?php endif; ?>
					<input type="text" class="item_quantity quantity-item" value="1">
					<?php if ($arItem["PRODUCT"]["QUANTITY"] <= 0) : ?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=Loc::getMessage("CAN_NOT_BUY");?></a>
					<?php else : ?>
						<input type="button" class="item_add items addToCart" value="ADD" item-id="<?=$arItem["ID"];?>">
					<?php endif; ?>
					
				</div>											
				<div class="clearfix"> </div>
			</div>
		</div>	
	<?php endforeach; ?>

	<div class="clearfix"></div>

	<?php if ($arParams['DISPLAY_BOTTOM_PAGER'] == "Y") : ?>
		<div>
			<?=$arResult['NAV_STRING']?>
		</div>
	<?php endif; ?>
</div>
