<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$styleClassList = ["a", "b", "c"];
$i = 0;
?>

<div class="categoires">
	<div class="container">
		<?php foreach($arResult["ITEMS"] as $arItem) : ?>
			
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
				<div 
				class="col-md-4 sections fashion-grid-<?=$styleClassList[$i]?>" 
				style="background: url(<?=$arItem["PREVIEW_PICTURE"]["src"]?>) no-repeat;"
				><h4><?=$arItem["NAME"]?></h4>
				<p><?=$arItem["SECTION_NAME"];?></p>			 					
				</div>
			</a>
			<?php $i++; ?>

		<?php endforeach; ?>
	</div>
</div>
