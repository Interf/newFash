<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Page\Asset;

$isHome = ($APPLICATION->GetCurDir() == "/");
?>

<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
	<?php $APPLICATION->ShowHead(); ?>
	<title><?php $APPLICATION->ShowTitle(); ?></title>
	<?php
	Asset::getInstance()->AddCss(SITE_TEMPLATE_PATH . "/css/bootstrap.css");
	Asset::getInstance()->AddCss(SITE_TEMPLATE_PATH . "/css/style.css");

	Asset::getInstance()->addString("<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,600,800,700,500,300,100,900' rel='stylesheet' type='text/css'>");
	Asset::getInstance()->addString("<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,700italic' rel='stylesheet' type='text/css'>");

	Asset::getInstance()->AddCss(SITE_TEMPLATE_PATH . "/css/component.css");

	Asset::getInstance()->AddJs(SITE_TEMPLATE_PATH . "/js/jquery.min.js");
	
	Asset::getInstance()->AddJs(SITE_TEMPLATE_PATH . "/js/handlerClickToBtn.js");

// start menu
	Asset::getInstance()->AddCss(SITE_TEMPLATE_PATH . "/css/megamenu.css");
	Asset::getInstance()->AddJs(SITE_TEMPLATE_PATH . "/js/megamenu.js");
	?>
	<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
	<!-- start menu -->
</head>
<body>
	<div id="panel"><?php $APPLICATION->ShowPanel(); ?></div>
	<!--header-->
	<div class="<?=($isHome) ? 'header' : 'header2 text-center'?>">
		<div class="container">
			<div class="main-header">
				<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "auth.form.header", Array(
					"FORGOT_PASSWORD_URL" => "",	// Страница забытого пароля
						"PROFILE_URL" => "/personal/profile/",	// Страница профиля
						"REGISTER_URL" => "/auth/",	// Страница регистрации
						"SHOW_ERRORS" => "N",	// Показывать ошибки
					),
				false
				);?>
				<div class="logo">
					<h3><a href="/">NEW FASHIONS</a></h3>
				</div>
				<?php if ($_POST["AJAX_BASKET_LINE"] == "Y")  {
					$APPLICATION->RestartBuffer();
				}?>
				<div class="basket_line_container">  
					<?$APPLICATION->IncludeComponent(
						"bitrix:sale.basket.basket.line",
						"basket.line.header",
						Array(
							"COMPONENT_TEMPLATE" => "basket.line.header",
							"HIDE_ON_BASKET_PAGES" => "N",
							"PATH_TO_AUTHORIZE" => "",
							"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
							"PATH_TO_ORDER" => SITE_DIR."personal/order/",
							"PATH_TO_PERSONAL" => SITE_DIR."personal/",
							"PATH_TO_PROFILE" => SITE_DIR."personal/",
							"PATH_TO_REGISTER" => SITE_DIR."login/",
							"POSITION_FIXED" => "N",
							"SHOW_AUTHOR" => "N",
							"SHOW_DELAY" => "N",
							"SHOW_EMPTY_VALUES" => "N",
							"SHOW_IMAGE" => "N",
							"SHOW_NOTAVAIL" => "N",
							"SHOW_NUM_PRODUCTS" => "N",
							"SHOW_PERSONAL_LINK" => "N",
							"SHOW_PRICE" => "Y",
							"SHOW_PRODUCTS" => "N",
							"SHOW_REGISTRATION" => "N",
							"SHOW_SUMMARY" => "Y",
							"SHOW_TOTAL_PRICE" => "Y"
						)
						);?>
					<?php if ($_POST["AJAX_BASKET_LINE"] == "Y")  {
						exit();
					}?>
				</div>
				<div class="clearfix"></div>
			</div>

			<!-- start header menu -->
			<?$APPLICATION->IncludeComponent(
				"bitrix:menu", "top_menu", Array(
				"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
				"CHILD_MENU_TYPE" => "top_menu",	// Тип меню для остальных уровней
				"DELAY" => "N",	// Откладывать выполнение шаблона меню
				"MAX_LEVEL" => "1",	// Уровень вложенности меню
				"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
				0 => "",
				),
				"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
				"MENU_CACHE_TYPE" => "A",	// Тип кеширования
				"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
				"ROOT_MENU_TYPE" => "top_menu",	// Тип меню для первого уровня
				"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
				),
				false
			);?>		 
		<div class="clearfix"></div>			   	
	</div>

	<?php if ($isHome) : ?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "page",
				"AREA_FILE_SUFFIX" => "header_inc",
				"EDIT_TEMPLATE" => ""
			)
			);?>
		
	<?php endif; ?>

</div>

<?php if (! $isHome) : ?>
<div class="product-main">
	<div class="container">
		<?$APPLICATION->IncludeComponent(
			"bitrix:breadcrumb",
			"breadCrumb",
			Array(
				"PATH" => "",
				"SITE_ID" => "s1",
				"START_FROM" => "0"
			)
			);?>
			<?php if ($APPLICATION->GetDirProperty("not_show_title") != "Y") : ?>
				<h2 style="text-transform: uppercase;"><?php $APPLICATION->ShowTitle(false); ?></h2>
			<?php endif; ?>
<?php endif; ?>
