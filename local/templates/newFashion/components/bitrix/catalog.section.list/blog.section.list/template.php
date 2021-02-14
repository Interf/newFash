<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc;
?>

<div class="col-md-3 sidebar">
	<h3><?=Loc::getMessage("TITLE_SECTIONS_LIST");?></h3>
	<ul>
		<?php foreach($arResult["SECTIONS"] as $arItem) : ?>
			<?php
			$this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT"));
			$this->AddDeleteAction(
				$arItem["ID"], 
				$arItem["DELETE_LINK"], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE"), 
				array("CONFIRM" => GetMessage("CT_BCSL_ELEMENT_DELETE_CONFIRM"))
			);
			?>
			<li id="<?=$this->GetEditAreaId($arItem["ID"]);?>">
				<a href="<?=$arItem["SECTION_PAGE_URL"];?>" data-url="<?=$arItem["SECTION_PAGE_URL"];?>">
					<?=$arItem["NAME"];?>
				</a>
			</li>
		<?php endforeach; ?>

	</ul>
</div>

<div class="clearfix"></div>
