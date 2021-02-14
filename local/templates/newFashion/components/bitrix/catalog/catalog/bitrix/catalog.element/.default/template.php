<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

$this->addExternalCss(SITE_TEMPLATE_PATH . "/css/etalage.css");
$this->addExternalJs(SITE_TEMPLATE_PATH . "/js/jquery.etalage.min.js");
?>

<div class="ctnt-bar cntnt">
	<div class="content-bar">
		<div class="single-page">					 
			<!--Include the Etalage files-->
			<!-- Include the Etalage files -->
			<script>
				jQuery(document).ready(function($){

					$('#etalage').etalage({
						thumb_image_width: 300,
						thumb_image_height: 400,
						source_image_width: 700,
						source_image_height: 800,
						show_hint: true,
						click_callback: function(image_anchor, instance_id){
							alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
						}
					});
						// This is for the dropdown list example:
						$('.dropdownlist').change(function(){
							etalage_show( $(this).find('option:selected').attr('class') );
						});

					});
				</script>
				<!--//details-product-slider-->
				<div class="details-left-slider">
					<ul id="etalage">
						<?php foreach($arResult["PROPERTIES"]["SLIDER"]["SRC"] as $src) : ?>
							<li>
								<img class="etalage_thumb_image" src="<?=$src?>" />
								<img class="etalage_source_image" src="<?=$src?>"/>
							</li>
						<?php endforeach; ?>

						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="details-left-info item_info_section">
					<h3><?=$arResult["NAME"];?></h3>						
					<p>
						<span 
						<?=$arResult["PRICES"]["BASE"]["DISCOUNT_DIFF"] > 0 ? "style='text-decoration:line-through'" : "";?>
						/>
						<?=$arResult["PRICES"]["BASE"]["PRINT_VALUE"]?>
					</span>
					<?php if ($arResult["PRICES"]["BASE"]["DISCOUNT_DIFF"] > 0) : ?>
						<span><?=$arResult["PRICES"]["BASE"]["PRINT_DISCOUNT_VALUE"];?></span>
					<?php endif; ?>
					<p class="qty">Qty ::</p><input min="1" type="number" id="quantity" name="quantity" value="1" class="form-control input-small quantity-item">
					<div class="btn_form">
						<a href="#" class="addToCart" item-id="<?=$arResult["ID"];?>">Add to cart</a>
					</div>
					<div class="flower-type">
						<p><?=Loc::getMessage("PROPERTY_MODEL");?><a href="#"><?=$arResult["PROPERTIES"]["MODEL"]["VALUE"];?></a></p>
						<p><?=Loc::getMessage("PROPERTY_BRAND");?><a href="#"><?=$arResult["PROPERTIES"]["BRAND"]["VALUE"];?></a></p>
					</div>
					<h5>Description  ::</h5>
					<p class="desc"><?=$arResult["DETAIL_TEXT"]?></p>
				</div>
				<div class="clearfix"></div>				 	
			</div>
		</div>
	</div>		 
	<div class="clearfix"></div>
