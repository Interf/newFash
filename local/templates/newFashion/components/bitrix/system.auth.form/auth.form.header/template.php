<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc;
?>

<?php if ($arResult["FORM_TYPE"] == "logout") : ?>
	
	<div class="carting">
		<ul><li style="display: flex;">
			<a href="<?=$arParams["PROFILE_URL"]?>"><?=$arResult["USER_LOGIN"];?></a>
			<a 
			href="<?=$APPLICATION->GetCurPageParam(
				"logout=yes&".bitrix_sessid_get(), 
				array("login", "logout", "register", "forgot_password", "change_password")
				);?>">
				<?=GetMessage("AUTH_LOGOUT_BUTTON")?>
			</a>
		</li></ul>
	</div>

<?php else : ?>

	<div class="carting">
		<ul>
			<li>
				<?php if (isset($_GET["backurl"])) {
					$arResult["BACKURL"] = htmlspecialchars($_GET["backurl"]);
				} ?>
				<a href="<?=$arParams["REGISTER_URL"]?>?backurl=<?=urlencode($arResult["BACKURL"])?>"><?=Loc::getMessage("AUTH_LOGIN_BUTTON");?></a>
			</li>
		</ul>
	</div>

<?php endif; ?>
