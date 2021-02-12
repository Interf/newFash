<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Contacts");
?>



<div class="col-md-6 contact_left">
	<?$APPLICATION->IncludeComponent("bitrix:main.feedback", "feedback.contacts", Array(
	"EMAIL_TO" => "int@int.int",	// E-mail, на который будет отправлено письмо
		"EVENT_MESSAGE_ID" => array(	// Почтовые шаблоны для отправки письма
			0 => "7",
		),
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",	// Сообщение, выводимое пользователю после отправки
		"REQUIRED_FIELDS" => array(	// Обязательные поля для заполнения
			0 => "NAME",
			1 => "EMAIL",
			2 => "MESSAGE",
		),
		"USE_CAPTCHA" => "N",	// Использовать защиту от автоматических сообщений (CAPTCHA) для неавторизованных пользователей
	),
	false
	);?>
</div>
<div class="col-md-6 company-right">
	<div class="contact-map">
		<?$APPLICATION->IncludeComponent(
			"bitrix:map.yandex.view",
			"",
			Array(
				"API_KEY" => "",
				"CONTROLS" => array("ZOOM","MINIMAP","TYPECONTROL","SCALELINE"),
				"INIT_MAP_TYPE" => "MAP",
				"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.73829999999371;s:10:\"yandex_lon\";d:37.59459999999997;s:12:\"yandex_scale\";i:10;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.696718407650366;s:3:\"LAT\";d:55.781775301445066;s:4:\"TEXT\";s:4:\"Test\";}}}",
				"MAP_HEIGHT" => "500",
				"MAP_ID" => "contact_map",
				"MAP_WIDTH" => "547",
				"MAP_HEIGHT" => "250",
				"OPTIONS" => array("ENABLE_SCROLL_ZOOM","ENABLE_DBLCLICK_ZOOM","ENABLE_DRAGGING")
			)
			);?>
	</div>      
	<div class="company-right">
		<div class="company_ad">
			<h3>Contact Info</h3>
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_RECURSIVE" => "Y",
					"AREA_FILE_SHOW" => "sect",
					"AREA_FILE_SUFFIX" => "inc",
					"EDIT_TEMPLATE" => ""
				)
				);?>
		</div>
	</div>							
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>