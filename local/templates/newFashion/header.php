<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Page\Asset;

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
	Asset::getInstance()->AddJs(SITE_TEMPLATE_PATH . "/js/simpleCart.min.js");

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
	<div class="header">
		<div class="container">
			<div class="main-header">
				<div class="carting">
					<ul><li><a href="/"> LOGIN</a></li></ul>
				</div>
				<div class="logo">
					<h3><a href="/">NEW FASHIONS</a></h3>
				</div>			  
				<div class="box_1">				 
					<a href="cart.html"><h3>Cart: <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)<img src="images/cart.png" alt=""/></h3></a>
					<p><a href="javascript:;" class="simpleCart_empty">empty cart</a></p>

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
	<div class="caption">
		<h1>FASHION AND CREATIVITY</h1>	 
		<p>Sed dapibus est a lorem dictum, id dignissim lacus fermentum. Nulla ut nibh in libero maximus pretium
		Nunc vulputate vel tellus ac elementum. Duis nec tincidunt dolor, ac dictum eros.</p>
	</div>
</div>

