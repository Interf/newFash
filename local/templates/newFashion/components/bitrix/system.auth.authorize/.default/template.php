<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc;

$APPLICATION->AddChainItem("Авторизация");

if ($_POST["Login"]) {
	session_start();
	$_SESSION["AUTH_INFO"]["AR_RESULT"] = $arResult;
	$_SESSION["AUTH_INFO"]["AR_PARAMS"] = $arParams;
	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

if (isset($_SESSION["AUTH_INFO"])) {
	$arResult = $_SESSION["AUTH_INFO"]["AR_RESULT"];
	$arParams = $_SESSION["AUTH_INFO"]["AR_PARAMS"];
	unset($_SESSION["AUTH_INFO"]);
}
?>

<?php if(!empty($arParams["~AUTH_RESULT"])) : ?>
	<?php 
	$text = str_replace(array("<br>", "<br />"), "\n", $arParams["~AUTH_RESULT"]["MESSAGE"]);
	?>
	<div class="alert alert-danger"><?=nl2br(htmlspecialcharsbx($text))?></div>
<?php endif?>

<?php if($arResult['ERROR_MESSAGE'] != '') : ?>
	<?php
	$text = str_replace(array("<br>", "<br />"), "\n", $arResult['ERROR_MESSAGE']);
	?>
	<div class="alert alert-danger"><?=nl2br(htmlspecialcharsbx($text))?></div>
<?php endif?>

<div class="col-md-6 log">
	<form method="post" action="<?=$arResult["AUTH_URL"]?>">
		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="AUTH" />
		<?php if ($arResult["BACKURL"] <> ''):?>
			<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?php endif; ?>
		<?php foreach ($arResult["POST"] as $key => $value):?>
			<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
		<?php endforeach; ?>

		<h5><?=Loc::getMessage("AUTH_LOGIN");?></h5>	
		<input type="text" name="USER_LOGIN" value="<?=$arResult["LAST_LOGIN"]?>">
		<h5><?=Loc::getMessage("AUTH_PASSWORD");?></h5>
		<input type="password" name="USER_PASSWORD">

		<?php if ($arResult["STORE_PASSWORD"] == "Y"):?>
			<div class="checkbox">
				<label class="bx-filter-param-label">
					<input type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y" />
					<span class="bx-filter-param-text"><?=GetMessage("AUTH_REMEMBER_ME")?></span>
				</label>
			</div>
		<?php endif?>

		<input type="submit" name="Login" value="<?=GetMessage("AUTH_AUTHORIZE")?>" />

		<noindex>
			<a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a>
		</noindex>

	</form>				 
</div>
<div class="col-md-6 login-right">

	<noindex>
		<h3 style="text-transform: uppercase;"><?=Loc::getMessage("SIDEBAR_TITLE");?></h3>
		<?=GetMessage("AUTH_FIRST_ONE")?><br />
		<a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow" class="acount-btn"><?=GetMessage("AUTH_REGISTER")?></a>
	</noindex>

</div>
<div class="clearfix"></div>		 



