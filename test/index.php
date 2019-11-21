<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>
<?
$res = CIBlockElement::GetByID(36214);
if($ar_res = $res->GetNextElement())
    $arFields = $ar_res->GetFields(); // поля элемента
debug($arFields["NAME"]);
$arProps = $ar_res->GetProperties(); // свойства элемента
debug($arProps["CML2_ARTICLE"]["VALUE"]);
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>