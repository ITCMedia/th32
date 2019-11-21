<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var SaleOrderAjax $component
 */

$component = $this->__component;
$component::scaleImages($arResult['JS_DATA'], $arParams['SERVICES_IMAGES_SCALING']);
use Bitrix\Main,    
    Bitrix\Main\Localization\Loc as Loc,    
    Bitrix\Main\Loader,    
    Bitrix\Main\Config\Option,    
    Bitrix\Sale\Delivery,    
    Bitrix\Sale\PaySystem,    
    Bitrix\Sale,    
    Bitrix\Sale\Order,    
    Bitrix\Sale\DiscountCouponsManager,    
    Bitrix\Main\Context;
    
if (!Loader::IncludeModule('sale'))
    die();
if(!empty($_GET['view'])){
	$order = \Bitrix\Sale\Order::load($arResult['ORDER_ID']);
	$arPaymentsId = $order->getPaymentSystemId();
	$lastPaymentId = intval(end($arPaymentsId));
	if ($arPaySys = CSalePaySystem::GetByID($lastPaymentId, $arResult['PERSON_TYPE_ID'])){
	   	$arResult['PAY_SYSTEM_LIST'][$lastPaymentId] =  $arPaySys;
	   	$orderObj  = Sale\Order::load($arResult['ORDER_ID']);
		 $paymentCollection  =  $orderObj ->getPaymentCollection();
		 $payment  =  $paymentCollection [ 0 ];
	   	$service  = Sale\PaySystem\Manager::getObjectById($lastPaymentId);
	   	$context  = \Bitrix\Main\Application::getInstance()->getContext();
		$initResult = $service->initiatePay($payment, $context->getRequest(), \Bitrix\Sale\PaySystem\BaseServiceHandler::STRING);
		$buffered_output = $initResult->getTemplate();
		foreach ($arResult["PAYMENT"] as $payment){
			$arResult['PAY_SYSTEM_LIST_BY_PAYMENT_ID'][$payment['ID']]["BUFFERED_OUTPUT"] = $buffered_output;
		}
		
	}
	
}