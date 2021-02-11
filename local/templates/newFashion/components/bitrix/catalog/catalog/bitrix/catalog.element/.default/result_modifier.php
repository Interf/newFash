<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$imgList = [];
$imgIdList = $arResult["PROPERTIES"]["SLIDER"]["VALUE"];

$arImg = CFile::GetList(array(), array("@ID" => $imgIdList));
while ($img = $arImg->fetch()) {
	$imgList[] = "/upload/" . $img["SUBDIR"] . "/" . $img["FILE_NAME"];
}

$arResult["PROPERTIES"]["SLIDER"]["SRC"] = $imgList;
