<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty("keywords", "магазин, интернет-магазин, купить одежду");
$APPLICATION->SetPageProperty("description", "Описание");
$APPLICATION->SetTitle("Главная страница сайта newFash");
?> 



<div class="categoires">
	<div class="container">
		<a href="#"><div class="col-md-4 sections fashion-grid-a">
			<h4>Fashion</h4>
			<p>dignissim</p>			 					
		</div></a>
		<a href="#"><div class="col-md-4 sections fashion-grid-b">
			<h4>Beauty</h4>
			<p>fermentum</p>			 					
		</div></a>
		<a href="#"><div class="col-md-4 sections fashion-grid-c">
			<h4>Creativity</h4>
			<p>vulputate</p>				
		</div></a>
	</div>
</div>
<!---->
<div class="features" id="features">
	<div class="container">

		<?$APPLICATION->IncludeComponent(
	"interf:catalog.list", 
	"home_list", 
	array(
		"COUNT_ON_PAGE" => "3",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "catalog",
		"PRICE_TYPE" => "1",
		"COMPONENT_TEMPLATE" => "home_list",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "7200"
	),
	false
);?>
	
	</div>
</div>
<!--fotter-->
<div class="fotter">
	<div class="container">
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.feedback",
			"feedback_home",
			Array(
				"COMPONENT_TEMPLATE" => "feedback_home",
				"EMAIL_TO" => "int@int.int",
				"EVENT_MESSAGE_ID" => array(0=>"7",),
				"OK_TEXT" => "Спасибо, ваше сообщение принято.",
				"REQUIRED_FIELDS" => array(0=>"NAME",1=>"EMAIL",2=>"MESSAGE",),
				"USE_CAPTCHA" => "N"
			)
			);?>
			<div class="col-md-6 ftr-left">
				<?$APPLICATION->IncludeComponent(
					"bitrix:menu",
					"bottom_menu",
					Array(
						"ALLOW_MULTI_SELECT" => "N",
						"CHILD_MENU_TYPE" => "left",
						"DELAY" => "N",
						"MAX_LEVEL" => "1",
						"MENU_CACHE_GET_VARS" => array(0=>"",),
						"MENU_CACHE_TIME" => "7200",
						"MENU_CACHE_TYPE" => "A",
						"MENU_CACHE_USE_GROUPS" => "Y",
						"ROOT_MENU_TYPE" => "bottom_menu",
						"USE_EXT" => "N"
					)
					);?>
					<div class="clearfix"></div>
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "page",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => ""
						)
						);?>
					</div>	 
					<div class="clearfix"></div>
				</div>
			</div>






			<?
			require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
			?>