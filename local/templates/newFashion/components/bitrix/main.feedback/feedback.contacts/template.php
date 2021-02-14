<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc;
?>

<p><?=Loc::getMessage("CONTACTS_TITLE_TEXT");?></p>

<div class="result_form">
	<?php if (! empty($arResult["ERROR_MESSAGE"])) : ?>
		<?php foreach($arResult["ERROR_MESSAGE"] as $error) : ?>
			<?php ShowError($error); ?>
		<?php endforeach; ?>
	<?php endif; ?>

	<?php if ($arResult["OK_MESSAGE"] != "") : ?>
		<?=$arResult["OK_MESSAGE"];?>
	<?php endif; ?>
</div>
<form action="<?=POST_FORM_ACTION_URI?>" method="POST">
	<div class="form_details">
		<input type="text" class="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" placeholder="<?=Loc::getMessage("FORM_PLACEHOLDER_NAME");?>">
		<input type="text" class="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" placeholder="<?=Loc::getMessage("FORM_PLACEHOLDER_EMAIL");?>">
		<textarea value="Message" name="MESSAGE" placeholder="<?=Loc::getMessage("FORM_PLACEHOLDER_MESS");?>"><?=$arResult["MESSAGE"]?></textarea>
		<div class="clearfix"> </div>	
		<?=bitrix_sessid_post()?>
		<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
		<input type="submit" name="submit" value="<?=Loc::getMessage("MFT_SUBMIT");?>">
	</div>					 
</form>
