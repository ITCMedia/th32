<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(CModule::IncludeModule("sale"))
{
$arFilter=array(
        array(
            "LOGIC" => "OR",
            "=ORDER_ID" => $_POST["id"],
            "=ACCOUNT_NUMBER" => $_POST["id"]
        )
    );
$arSelectFields = array();
$rsSales = CSaleOrder::GetList(array("ID" => "ASC"), $arFilter, false, Array ("nPageSize" => ($_REQUEST["nPageSize"])?$_REQUEST["nPageSize"]:50), $arSelectFields);
if(empty($rsSales->arResult)){echo 'Заказ не найден';die();}?>

<table border="1">
    <tr>
        <th>Номер заказа</th>
        <th>ФИО</th>
        <th>Email</th>
        <th>Цена</th>
        <th>Статус</th>
    </tr>
        <?while ($arSales = $rsSales->Fetch()) { ?>
        <tr>
           <?
                $arSalesPROP_VALUE = array();
                $arFilterPROP = array("ORDER_ID" => $arSales["ID"], "CODE" => array("POVOD", "PHONE"));

                // $obProps = Bitrix\Sale\Internals\OrderPropsValueTable::getList(array('filter' => $arFilterPROP));
                // while($prop = $obProps->Fetch()){
                //    echo $prop['NAME'].': '.$prop['VALUE'];
                // }
                $rsSalesPROP = CSaleOrderPropsValue::GetList(array('ID' => 'DESC'), $arFilterPROP,     $arSelectFieldsPROP);
                while ($arSalesPROP = $rsSalesPROP->Fetch())
                {
                    $arSalesPROP_VALUE[$arSalesPROP["CODE"]] = $arSalesPROP["VALUE"];                 }
                
           
                $rsUser = CUser::GetByID($arSales["USER_ID"]);
                $arUser = $rsUser->Fetch();
                $USER_INFO=$arUser['NAME'];
                switch ($arSales["STATUS_ID"]){
                    case 'N':
                        $status = 'Принят';
                        break;
                        case 'F':
                        $status = 'Выполнен';
                        break;
                        case 'DN':
                        $status = 'Ожидает обработки';
                        break;
                        case 'DF':
                        $status = 'Отгружен';
                        break;
                        case 'C':
                        $status = 'Отменен';
                        break;
                }
              ?>

             <td align="center"><a href="/bitrix/admin/sale_order_detail.php?ID=<?=$arSales["ID"]?>&filter=Y&set_filter=Y&lang=ru"><?=$arSales["ACCOUNT_NUMBER"]?></a></td>
             <td><?=$USER_INFO?></td>
             <td><?=$arSales["USER_EMAIL"]?></td>
             <td><?=$arSales["PRICE"]?> Руб.</td>
             <td><?=$status?></td>
        </tr>
           <? } ?>
</table>
<? } ?>