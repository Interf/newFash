<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc;

$APPLICATION->AddChainItem("Регистрация");

if (isset($_SESSION["REG_INFO"])) {
	$arResult = $_SESSION["REG_INFO"]["AR_RESULT"];
	$arParams = $_SESSION["REG_INFO"]["AR_PARAMS"];
	unset($_SESSION["REG_INFO"]);
}

if (isset($_POST['Register'])) {
	session_start();
	$_SESSION["REG_INFO"]["AR_RESULT"] = $arResult;
	$_SESSION["REG_INFO"]["AR_PARAMS"] = $arParams;
	header("Location: /auth/?register=yes");
}
?>

<?php if(! empty($arParams["~AUTH_RESULT"])) : ?>
	<?php 
	$text = str_replace(array("<br>", "<br />"), "\n", $arParams["~AUTH_RESULT"]["MESSAGE"]);
	?>
	<div class="alert <?=($arParams["~AUTH_RESULT"]["TYPE"] == "OK"? "alert-success":"alert-danger")?>">
		<?=nl2br(htmlspecialcharsbx($text))?>
	</div>
<?php endif?>

<div class="col-md-6 reg-form">
	<div class="reg">
		<p>
			<?=Loc::getMessage("WELCOME_MESS");?> 
			<a href="<?=$arResult["AUTH_AUTH_URL"]?>"><?=Loc::getMessage("LINK_AUTH");?></a>
		</p>
		<form method="post" action="<?=$arResult["AUTH_URL"]?>" enctype="multipart/form-data">
			<input type="hidden" name="AUTH_FORM" value="Y" />
			<input type="hidden" name="TYPE" value="REGISTRATION" />
			<ul>
				<li class="text-info"><?=Loc::getMessage("FIELD_NAME");?></li>
				<li><input type="text" value="<?=$arResult["USER_NAME"]?>" name="USER_NAME"></li>
			</ul>
			<ul>
				<li class="text-info"><?=Loc::getMessage("FIELD_LAST_NAME");?></li>
				<li><input type="text" value="<?=$arResult["USER_LAST_NAME"]?>" name="USER_LAST_NAME"></li>
			</ul>				 
			<ul>
				<li class="text-info"><?=Loc::getMessage("FIELD_EMAIL");?></li>
				<li><input type="text" name="USER_EMAIL" value="<?=$arResult["USER_EMAIL"]?>"></li>
			</ul>
			<ul>
				<li class="text-info"><?=Loc::getMessage("FIELD_LOGIN");?></li>
				<li><input type="text" name="USER_LOGIN" value="<?=$arResult["USER_LOGIN"]?>"></li>
			</ul>
			<ul>
				<li class="text-info"><?=Loc::getMessage("FIELD_PASS");?></li>
				<li><input type="password" name="USER_PASSWORD" value="<?=$arResult["USER_PASSWORD"]?>"></li>
			</ul>
			<ul>
				<li class="text-info"><?=Loc::getMessage("FIELD_PASS_2");?></li>
				<li><input type="password" name="USER_CONFIRM_PASSWORD" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>"></li>
			</ul>
							
			<input type="submit" value="<?=Loc::getMessage("SUBMIT_REG");?>" name="Register">

			<div class="bx-authform-input-container">
				<?php $APPLICATION->IncludeComponent("bitrix:main.userconsent.request", "",
					array(
						"ID" => COption::getOptionString("main", "new_user_agreement", ""),
						"IS_CHECKED" => "Y",
						"AUTO_SAVE" => "N",
						"IS_LOADED" => "Y",
						"ORIGINATOR_ID" => $arResult["AGREEMENT_ORIGINATOR_ID"],
						"ORIGIN_ID" => $arResult["AGREEMENT_ORIGIN_ID"],
						"INPUT_NAME" => $arResult["AGREEMENT_INPUT_NAME"],
						"REPLACE" => array(
							"button_caption" => GetMessage("AUTH_REGISTER"),
							"fields" => array(
								rtrim(GetMessage("AUTH_NAME"), ":"),
								rtrim(GetMessage("AUTH_LAST_NAME"), ":"),
								rtrim(GetMessage("AUTH_LOGIN_MIN"), ":"),
								rtrim(GetMessage("AUTH_PASSWORD_REQ"), ":"),
								rtrim(GetMessage("AUTH_EMAIL"), ":"),
							)
						),
					)
					);?>
				</div>


		</form>
	</div>
</div>
<div class="col-md-6 reg-right">
	<h3><?=Loc::getMessage("SIDE_INFO_TITLE");?></h3>
	<p><?=Loc::getMessage("SIDE_INFO_TEXT");?></p>
</div>
<div class="clearfix"></div>		 
