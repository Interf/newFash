<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc;
?>

<div class="col-md-6 contact" id="form_home">
	<div class="errors">
		<?php if (! empty($arResult["ERROR_MESSAGE"])) : ?>
			<?php foreach($arResult["ERROR_MESSAGE"] as $error) : ?>
				<?php ShowError($error); ?>
			<?php endforeach; ?>
		<?php endif; ?>

		<?php if ($arResult["OK_MESSAGE"] != "") : ?>
			<div style="color: green;"><?=$arResult["OK_MESSAGE"]?></div>
		<?php endif; ?>
	</div>
	<form action="<?=POST_FORM_ACTION_URI?>#form_home" method="POST">
		<input 
		type="text" 
		class="text" 
		value="<?=$arResult["AUTHOR_NAME"]?>"
		name="user_name"
		placeholder="<?=Loc::getMessage("PLACEHOLDER_NAME");?>"
		>
		<input 
		type="text" 
		class="text" 
		value="<?=$arResult["AUTHOR_EMAIL"]?>" 
		name="user_email"
		placeholder="<?=Loc::getMessage("PLACEHOLDER_EMAIL");?>"
		>
		<textarea  name="MESSAGE" placeholder="<?=Loc::getMessage("PLACEHOLDER_MESS");?>"><?=$arResult["MESSAGE"]?></textarea>	
		<div class="clearfix"></div>
		
		<?=bitrix_sessid_post()?>
		<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
		<input type="submit" name="submit" value="<?=Loc::getMessage("SUBMIT_VALUE");?>">
	</form>
</div>
