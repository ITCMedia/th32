<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Application;
use Bitrix\Main\Web\Uri;

$request = Application::getInstance()->getContext()->getRequest();
$uriString = $request->getRequestUri();
$arResultTmp = $arResult;
$arResult = array();
$arResult['MENU'] = $arResultTmp;
$arResult['CURRENT_URI'] = $uriString;
?>