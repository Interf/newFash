<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc;
?>

<div class="about">
	<?php foreach($arResult["ITEMS"] as $arItem) : ?>
		<div class="about-sec">
			<div class="about-pic"><img src="<?=$arItem["PREVIEW_PICTURE"];?>" class="img-responsive" alt="<?=$arItem["NAME"]?>"/></div>
			<div class="about-info">
				<p><?=$arItem["PREVIEW_TEXT"];?></p>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Read More..</a>
			</div>
			<div class="clearfix"></div>
		</div>
	<?php endforeach; ?>
</div>
