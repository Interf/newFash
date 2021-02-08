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
					<ul><li><a href="login.html"> LOGIN</a></li></ul>
				</div>
				<div class="logo">
					<h3><a href="index.html">NEW FASHIONS</a></h3>
				</div>			  
				<div class="box_1">				 
					<a href="cart.html"><h3>Cart: <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)<img src="images/cart.png" alt=""/></h3></a>
					<p><a href="javascript:;" class="simpleCart_empty">empty cart</a></p>

				</div>

				<div class="clearfix"></div>
			</div>

			<!-- start header menu -->
			<ul class="megamenu skyblue">
				<li class="active grid"><a class="color1" href="index.html">Home</a></li>
				<li class="grid"><a href="#">Women</a>
					<div class="megapanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<h4>shop</h4>
									<ul>
										<li><a href="products.html">new arrivals</a></li>
										<li><a href="products.html">men</a></li>
										<li><a href="products.html">women</a></li>
										<li><a href="products.html">accessories</a></li>
										<li><a href="products.html">kids</a></li>
										<li><a href="products.html">brands</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>help</h4>
									<ul>
										<li><a href="products.html">trends</a></li>
										<li><a href="products.html">sale</a></li>
										<li><a href="products.html">style videos</a></li>
										<li><a href="products.html">accessories</a></li>
										<li><a href="products.html">kids</a></li>
										<li><a href="products.html">style videos</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>Products</h4>
									<ul>
										<li><a href="products.html">trends</a></li>
										<li><a href="products.html">sale</a></li>
										<li><a href="products.html">style videos</a></li>
										<li><a href="products.html">accessories</a></li>
										<li><a href="products.html">kids</a></li>
										<li><a href="products.html">style videos</a></li>
									</ul>	
								</div>												
							</div>						
							<div class="col1">
								<div class="h_nav">
									<h4>my company</h4>
									<ul>
										<li><a href="products.html">tremds</a></li>
										<li><a href="products.html">sale</a></li>
										<li><a href="products.html">style videos</a></li>
										<li><a href="products.html">accessories</a></li>
										<li><a href="products.html">kids</a></li>
										<li><a href="products.html">style videos</a></li>
									</ul>	
								</div>
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>popular</h4>
									<ul>
										<li><a href="products.html">new arrivals</a></li>
										<li><a href="products.html">men</a></li>
										<li><a href="products.html">women</a></li>
										<li><a href="products.html">accessories</a></li>
										<li><a href="products.html">kids</a></li>
										<li><a href="products.html">style videos</a></li>
									</ul>	
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col2"></div>
							<div class="col1"></div>
							<div class="col1"></div>
							<div class="col1"></div>
							<div class="col1"></div>
						</div>
					</div>
				</li>
				<li><a href="#">MEN</a><div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>shop</h4>
								<ul>
									<li><a href="men.html">new arrivals</a></li>
									<li><a href="men.html">men</a></li>
									<li><a href="men.html">women</a></li>
									<li><a href="men.html">accessories</a></li>
									<li><a href="men.html">kids</a></li>
									<li><a href="men.html">brands</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>help</h4>
								<ul>
									<li><a href="men.html">trends</a></li>
									<li><a href="men.html">sale</a></li>
									<li><a href="men.html">style videos</a></li>
									<li><a href="men.html">accessories</a></li>
									<li><a href="men.html">kids</a></li>
									<li><a href="men.html">style videos</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>Products</h4>
								<ul>
									<li><a href="men.html">trends</a></li>
									<li><a href="men.html">sale</a></li>
									<li><a href="men.html">style videos</a></li>
									<li><a href="men.html">accessories</a></li>
									<li><a href="men.html">kids</a></li>
									<li><a href="men.html">style videos</a></li>
								</ul>	
							</div>												
						</div>						
						<div class="col1">
							<div class="h_nav">
								<h4>my company</h4>
								<ul>
									<li><a href="men.html">trends</a></li>
									<li><a href="men.html">sale</a></li>
									<li><a href="men.html">style videos</a></li>
									<li><a href="men.html">accessories</a></li>
									<li><a href="men.html">kids</a></li>
									<li><a href="men.html">style videos</a></li>
								</ul>	
							</div>
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>popular</h4>
								<ul>
									<li><a href="men.html">new arrivals</a></li>
									<li><a href="men.html">men</a></li>
									<li><a href="men.html">women</a></li>
									<li><a href="men.html">accessories</a></li>
									<li><a href="men.html">kids</a></li>
									<li><a href="men.html">style videos</a></li>
								</ul>	
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col2"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
					</div>
				</div>
			</li>
			<li class="grid"><a href="about.html">ABOUT US</a></li>
			<li class="grid"><a href="blog.html">BLOG</a></li>				
			<li><a href="#">SHOP ONLINE</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>shop</h4>
								<ul>
									<li><a href="shop.html">new arrivals</a></li>
									<li><a href="shop.html">men</a></li>
									<li><a href="shop.html">women</a></li>
									<li><a href="shop.html">accessories</a></li>
									<li><a href="shop.html">kids</a></li>
									<li><a href="shop.html">brands</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>help</h4>
								<ul>
									<li><a href="shop.html">trends</a></li>
									<li><a href="shop.html">sale</a></li>
									<li><a href="shop.html">style videos</a></li>
									<li><a href="shop.html">accessories</a></li>
									<li><a href="shop.html">kids</a></li>
									<li><a href="shop.html">style videos</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>Products</h4>
								<ul>
									<li><a href="shop.html">trends</a></li>
									<li><a href="shop.html">sale</a></li>
									<li><a href="shop.html">style videos</a></li>
									<li><a href="shop.html">accessories</a></li>
									<li><a href="shop.html">kids</a></li>
									<li><a href="shop.html">style videos</a></li>
								</ul>	
							</div>												
						</div>						
						<div class="col1">
							<div class="h_nav">
								<h4>my company</h4>
								<ul>
									<li><a href="shop.html">trends</a></li>
									<li><a href="shop.html">sale</a></li>
									<li><a href="shop.html">style videos</a></li>
									<li><a href="shop.html">accessories</a></li>
									<li><a href="shop.html">kids</a></li>
									<li><a href="shop.html">style videos</a></li>
								</ul>	
							</div>
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>popular</h4>
								<ul>
									<li><a href="shop.html">new arrivals</a></li>
									<li><a href="shop.html">men</a></li>
									<li><a href="shop.html">women</a></li>
									<li><a href="shop.html">accessories</a></li>
									<li><a href="shop.html">kids</a></li>
									<li><a href="shop.html">style videos</a></li>
								</ul>	
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col2"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
					</div>
				</div>
			</li>			

		</ul> 			 
		<div class="clearfix"></div>			   	
	</div>
	<div class="caption">
		<h1>FASHION AND CREATIVITY</h1>	 
		<p>Sed dapibus est a lorem dictum, id dignissim lacus fermentum. Nulla ut nibh in libero maximus pretium
		Nunc vulputate vel tellus ac elementum. Duis nec tincidunt dolor, ac dictum eros.</p>
	</div>
</div>

