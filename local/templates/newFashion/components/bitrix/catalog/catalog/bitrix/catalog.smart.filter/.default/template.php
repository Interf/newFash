<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->addExternalCss(SITE_TEMPLATE_PATH . "/css/form.css");
$this->addExternalJs(SITE_TEMPLATE_PATH . "/js/jquery.easydropdown.js");

if (empty($arResult["COMBO"])) {
	return;
}
?>

<div class="rsidebar span_1_of_left">
	<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
		<?php foreach($arResult["ITEMS"] as $arItem) : ?>
			<section  class="sky-form">
				<h4><?=$arItem["NAME"];?></h4>
				<div class="row1 scroll-pane">
					<div class="col col-4">
						<?php if ($arItem["PRICE"]) : ?>
							
							<input 
							type="text"
							name="<?=$arItem['VALUES']['MIN']['CONTROL_NAME']?>"
							id="<?=$arItem['VALUES']['MIN']['CONTROL_ID']?>"
							placeholder="От <?=$arItem['VALUES']['MIN']['VALUE']?>"
							value="<?=$arItem['VALUES']['MIN']['HTML_VALUE']?>"
							>

							<input
							type="text"
							name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
							id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
							placeholder="До <?echo $arItem["VALUES"]["MAX"]["VALUE"]?>"
							value="<?=$arItem['VALUES']['MAX']['HTML_VALUE']?>"
							>
						<?php else : ?>

						<?php foreach($arItem["VALUES"] as $name => $value) : ?>
							<label class="checkbox">
								<input 
								type="checkbox" 
								name="<?=$value['CONTROL_NAME']?>"
								value="<?=$value['HTML_VALUE']?>"
								id="<?=$value['CONTROL_ID']?>"
								<?=($value["CHECKED"]) ? 'checked="checked"': '';?>
								\>
								<i></i><?=$name?></label>
							<?php endforeach; ?>

						<?php endif; ?>

						</div>
					</div>
				</section>
			<?php endforeach; ?>

		<div class="buttons">
			<input
			class="btn btn-themes"
			type="submit"
			id="set_filter"
			name="set_filter"
			value="Фильтровать"
			/>
			<input
			class="btn btn-link"
			type="submit"
			id="del_filter"
			name="del_filter"
			value="Сбросить"
			/>
		</div>



	</form>		 
	<div class="clearfix"></div>

</div>
