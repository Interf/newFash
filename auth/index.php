<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

use \Bitrix\Main\Localization\Loc;

if ($_REQUEST["TYPE"] == "REGISTRATION") {
	$_SESSION["SUCCESS_REG"] = true;
	header("Location: /auth/");
	exit();
}

if (
	isset($_REQUEST["backurl"]) && 
	strlen($_REQUEST["backurl"]) > 0 &&
	$_REQUEST["TYPE"] != "REGISTRATION"
) {
	LocalRedirect($backurl);
}
?>
<?php if (isset($_SESSION["SUCCESS_REG"])) : ?>
	<?=Loc::getMessage("SUCCES_REG");?>
	<?php unset($_SESSION["SUCCESS_REG"]); ?>
	<?php
	$APPLICATION->SetTitle("Успешная регистрация");
	$APPLICATION->AddChainItem("Успешная регистрация");
	?>

<?php else : ?>

	<?php
	$APPLICATION->SetTitle("Авторизация");
	$APPLICATION->AddChainItem("Авторизация");
	?>
	<?=Loc::getMessage("AUTH_STANDART_MESS");?>

	<p><a href="<?=SITE_DIR?>">Вернуться на главную страницу</a></p>

<?php endif; ?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>