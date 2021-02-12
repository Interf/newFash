<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("About us");
?>

<?$APPLICATION->IncludeComponent(
	"interf:random.elem",
	"about_us",
	Array(
		"CACHE_TIME" => "7200",
		"CACHE_TYPE" => "A",
		"COUNT_ON_PAGE" => "1",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "blog"
	)
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>