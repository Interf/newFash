<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<div class="tabs-box">
	<ul class="tabs-menu" style="width: 34%;">
		<li data-sort="new"><a href="?sort=#features" >New Arrivals</a></li>
		<li data-sort="price_asc"><a href="?sort=price_asc#features">Price Asc</a></li>
		<li data-sort="price_desc"><a href="?sort=price_desc#features">Price Desc</a></li>
	</ul>
	<div class="clearfix"> </div>
	<div class="tab-grids">

		<div id="tab1" class="tab-grid1">
			<?php foreach($arResult["ITEMS"] as $arItem) : ?>
				<?php
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"></a><div class="product-grid" id="<?=$this->GetEditAreaID($arItem['ID']);?>"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">	
					<?php if ($arItem["PROPERTY_NEW_VALUE"] == "Y") : ?>
						<div class="more-product-info"><span>NEW</span></div>
					<?php endif; ?>
					<div class="product-img b-link-stripe b-animate-go  thickbox" >						   
						<img src="<?=$arItem["PREVIEW_PICTURE"];?>" class="img-responsive" alt="">
						<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-delay03">							
								<button class="btns">ORDER NOW</button>
							</h4>
						</div>
					</div></a>						
					<div class="product-info simpleCart_shelfItem">
						<div class="product-info-cust">
							<h4><?=$arItem["NAME"];?></h4>
							<span class="item_price"><?=$arItem["PRICES"]["PRICE_FORMATED"];?></span>
							<input type="text" class="item_quantity" value="1">
							<?php if ($arItem["QUANTITY"] <= 0) : ?>
								<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Not Available</a>
							<?php else : ?>
								<input type="button" class="item_add" value="ADD">
							<?php endif; ?>
						</div>													
						<div class="clearfix"> </div>
					</div>
				</div>			
			<?php endforeach; ?>
			<div class="clearfix"></div>
		</div>				
	</div>				
</div>