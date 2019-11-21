<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
foreach ($arResult['ORDERS'] as $key => $order) {
	if($order['ORDER']['STATUS_ID'] != 'F'){
		//unset($arResult['ORDERS'][$key]);
	}else{
      	$db_vals = CSaleOrderPropsValue::GetList(
            array(),
            array(
                    "ORDER_ID" => $order['ORDER']["ID"],
                    "ORDER_PROPS_ID" => array(4, 5),
                )
        );
        $arResult['ORDERS'][$key]["PROPERTIES"] = array();
      	if ($arVals = $db_vals->Fetch())
        	$arResult['ORDERS'][$key]["PROPERTIES"][$arVals['CODE']] = $arVals;
	}
}
// echo "<pre>";
// print_r($arResult);
// echo "</pre>";
?>