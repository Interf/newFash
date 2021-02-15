<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc;

if (isset($_POST["save"])) {
	session_start();
	$_SESSION["PROFILE_CHANGE_INFO"]["AR_RESULT"] = $arResult;
	$_SESSION["PROFILE_CHANGE_INFO"]["AR_PARAMS"] = $arParams;
	header("Refresh: 0");
	exit();
}

if (isset($_SESSION["PROFILE_CHANGE_INFO"])) {
	$arResult = $_SESSION["PROFILE_CHANGE_INFO"]["AR_RESULT"];
	$arParams = $_SESSION["PROFILE_CHANGE_INFO"]["AR_PARAMS"];
	unset($_SESSION["PROFILE_CHANGE_INFO"]);
}

ShowError($arResult["strProfileError"]);

if ($arResult['DATA_SAVED'] == 'Y') {
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
}
?>

<div class="col-md-12 log">			 

	<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data" id="personal_form">

		<?=$arResult["BX_SESSION_CHECK"]?>
		<input type="hidden" name="lang" value="<?=LANG?>" />
		<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

		<?php if ($arResult["ID"] > 0) : ?>
			<?php if ($arResult["arUser"]["TIMESTAMP_X"] != "") : ?>
				<p>
					<?=Loc::getMessage("LAST_UPDATE");?>
					<?=$arResult["arUser"]["TIMESTAMP_X"]?>
				</p>
			<?php endif; ?>

			<?php if ($arResult["arUser"]["LAST_LOGIN"] != "") : ?>
				<p>
					<?=Loc::getMessage("LAST_LOGIN");?>
					<?=$arResult["arUser"]["LAST_LOGIN"]?>
				</p>
			<?php endif; ?>
		<?php endif; ?>


		<h5><?=Loc::getMessage("NAME");?></h5>	
		<input type="text" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>">


		<h5><?=Loc::getMessage("LAST_NAME");?></h5>	
		<input type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>">


		<h5><?=Loc::getMessage("SECOND_NAME");?></h5>	
		<input type="text" name="SECOND_NAME" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>">

	
		<h5><?=Loc::getMessage("LOGIN");?></h5>	
		<input type="text" name="LOGIN" maxlength="50" value="<?=$arResult["arUser"]["LOGIN"]?>">

		<h5><?=Loc::getMessage("EMAIL");?></h5>	
		<input type="text" name="EMAIL" maxlength="50" value="<?=$arResult["arUser"]["EMAIL"]?>">
	
		<?php if($arResult['CAN_EDIT_PASSWORD']):?>
			
			<h5><?=Loc::getMessage("NEW_PASSWORD_REQ");?></h5>	
			<input type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off">

			<h5><?=Loc::getMessage("NEW_PASSWORD_CONFIRM");?></h5>	
			<input type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off">

		<?php endif?>

		<input type="submit" name="save" value="<?=(($arResult["ID"] > 0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">
		<br><br><br>
		<input type="reset" value="<?=GetMessage('MAIN_RESET');?>">
	</form>				 
</div>
<div class="clearfix"></div>		 
