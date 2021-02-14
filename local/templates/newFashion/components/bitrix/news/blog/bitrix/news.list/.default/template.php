<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc;
?>

<div class="col-md-9 fashion-blogs">
	
	<?php foreach ($arResult["ITEMS"] as $arItem) : ?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>	
		<div class="blog_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<h3> <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"];?></a></h3>
			<p class="author">
				Posted By 
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arResult["AUTHOR_INFO_BY_ID"][$arItem["CREATED_BY"]]?></a>
				<span><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
			</p>
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
				<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="img-responsive" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
			</a>
			<p class="blog-info"><?=$arItem["PREVIEW_TEXT"];?></p>
			<a class="read" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=Loc::getMessage("READ_MORE");?></a>
		</div>
	<?php endforeach; ?>

	<?php if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
		<div class="paginator">
			<?=$arResult["NAV_STRING"]?>
		</div>
	<?php endif;?>

</div>
