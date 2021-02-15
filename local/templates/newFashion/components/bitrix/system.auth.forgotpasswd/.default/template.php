<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc;

$APPLICATION->addChainItem(Loc::getMessage("TITLE_CHAIN"));
?>

<div class="col-md-6 log">
	<form  name="bform" method="post" action="<?=$arResult["AUTH_URL"]?>">
		<?php if($arResult["BACKURL"] != '') : ?>
			<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?php endif?>
		<input type="hidden" name="AUTH_FORM" value="Y">
		<input type="hidden" name="TYPE" value="SEND_PWD">

		<h5><?=Loc::getMessage("AUTH_LOGIN_EMAIL");?></h5>	
		<input type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["USER_LOGIN"]?>" />
		<input type="hidden" name="USER_EMAIL" />
		<div class="bx-authform-note-container"><?echo GetMessage("forgot_pass_email_note")?></div>

		<input type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
		
		<a href="<?=$arResult["AUTH_AUTH_URL"]?>"><b><?=GetMessage("AUTH_AUTH")?></b></a>

	</form>				 
</div>
<div class="clearfix"></div>		 

<script type="text/javascript">
	document.bform.onsubmit = function(){document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;};
	document.bform.USER_LOGIN.focus();
</script>
