<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Shop Online");
?><?$APPLICATION->IncludeComponent(
	"interf:catalog.list", 
	"home_list", 
	array(
		"CACHE_TIME" => "7200",
		"CACHE_TYPE" => "A",
		"COUNT_ON_PAGE" => "3",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "catalog",
		"PRICE_TYPE" => "1",
		"USE_PAGINATOR" => "Y",
		"COMPONENT_TEMPLATE" => "home_list"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>