<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");
?>
<div class="container">
Страница не найдена. Вернитесь на <a href="<?=SITE_DIR?>"><b>главную</b></a>
</div>
<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
