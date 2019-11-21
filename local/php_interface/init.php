<?
$GLOBALS['NEW_PASS_LENGHT'] = 8;
function debug($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
    
}
AddEventHandler("sale", "OnOrderStatusSendEmail", Array("SaleHandler", "OnOrderStatusSendEmailHandler"));

class SaleHandler
{
    // создаем обработчик события "OnOrderStatusSendEmailHandler"
    function OnOrderStatusSendEmailHandler($ID, &$eventName, &$arFields, $numberStatus)
    {
      $order = CSaleOrder::GetByID($ID);
      $arFields['ORDER_ID'] = $order["ACCOUNT_NUMBER"];
   }
}
// AddEventHandler("sale", "OnOrderListFilter", "OnOrderListFilterHandler");
// function OnOrderListFilterHandler($arFilterTmp){
//    if(isset($arFilterTmp['%NAME_SEARCH']) && intval($arFilterTmp['%NAME_SEARCH'])>0){
//       $arFilterTmp['USER_ID'] = intval($arFilterTmp['%NAME_SEARCH']);
//       unset($arFilterTmp['%NAME_SEARCH']);
//    }
//    if(isset($arFilterTmp['ACCOUNT_NUMBER'])){
//       $arFilterTmp['%ACCOUNT_NUMBER'] = $arFilterTmp['ACCOUNT_NUMBER'];
//       unset($arFilterTmp['ACCOUNT_NUMBER']);
//    }
//    return $arFilterTmp;
// }
AddEventHandler("main", "OnAfterUserAdd", "OnAfterUserRegisterHandler");
AddEventHandler("main", "OnAfterUserRegister", "OnAfterUserRegisterHandler");
function OnAfterUserRegisterHandler(&$arFields)
{
    if (intval($arFields["ID"])>0)
    {
        $toSend = Array();
        $toSend["PASSWORD"] = $arFields["CONFIRM_PASSWORD"];
        $toSend["EMAIL"] = $arFields["EMAIL"];
        $toSend["USER_ID"] = $arFields["ID"];
        $toSend["USER_IP"] = $arFields["USER_IP"];
        $toSend["USER_HOST"] = $arFields["USER_HOST"];
        $toSend["LOGIN"] = $arFields["LOGIN"];
        $toSend["NAME"] = (trim ($arFields["NAME"]) == "")? $toSend["NAME"] = htmlspecialchars('<Не указано>'): $arFields["NAME"];
        $toSend["LAST_NAME"] = (trim ($arFields["LAST_NAME"]) == "")? $toSend["LAST_NAME"] = htmlspecialchars('<Не указано>'): $arFields["LAST_NAME"];
        CEvent::SendImmediate ("MY_NEW_USER", SITE_ID, $toSend);
    }
    return $arFields;
}

function generatePasswd($number){
    $arr = array('a','b','c','d','e','f',
                 'g','h','i','j','k','l',
                 'm','n','o','p','r','s',
                 't','u','v','x','y','z',
                 'A','B','C','D','E','F',
                 'G','H','I','J','K','L',
                 'M','N','O','P','R','S',
                 'T','U','V','X','Y','Z',
                 '1','2','3','4','5','6',
                 '7','8','9','0');
    $pass = "";
    for($i = 0; $i < $number; $i++)
    {
        $index = rand(0, count($arr) - 1);
        $pass .= $arr[$index];
    }
    return $pass;
}
function encodeString($string){
    $em = explode("@",$string);
    $name = $em[0];
    $len = strlen($name);
    $showLen = floor($len/2);
    $str_arr = str_split($name);
    for($ii=$showLen;$ii<$len;$ii++){
        $str_arr[$ii] = '*';
    }
    $em[0] = implode('',$str_arr); 
    $new_name = implode('@',$em);
    return $new_name;
}



// регистрируем обработчик
AddEventHandler("search", "BeforeIndex", "BeforeIndexHandler");
// создаем обработчик события"BeforeIndex"
function BeforeIndexHandler($arFields)
{
    if(!CModule::IncludeModule("iblock"))
// подключаем модуль return
        $arFields; if($arFields["MODULE_ID"] == "iblock") {
    $db_props = CIBlockElement::GetProperty(
    // Запросим свойства индексируемого элемента
        $arFields["PARAM2"],
// BLOCK_ID индексируемого свойства
        $arFields["ITEM_ID"],
// ID индексируемого свойства
        array("sort" => "asc"),
// Сортировка (можно упустить)
        Array("CODE"=>"CML2_ARTICLE")); // CML2_ARTICLE - КОД ВАШЕГО СВОЙСТВА
// CODE свойства (в данном случае артикул)
    if($ar_props = $db_props->Fetch()) $arFields["TITLE"] .= " ".$ar_props["VALUE"];
// Добавим свойство в конец заголовка индексируемого элемента
} return $arFields;
// вернём изменения
}
AddEventHandler('sale', 'OnOrderNewSendEmail', array('CSendOrderTable', 'OnOrderNewSendEmailHandler'));
class CSendOrderTable {
    public static function OnOrderNewSendEmailHandler($ID, &$eventName, &$arFields) {
        if ($ID>0 && CModule::IncludeModule('iblock')) {
            $arFields['ORDER_LIST'] = '<table cellpadding="5" cellspacing="5">';
            $rsBasket = CSaleBasket::GetList(array(), array('ORDER_ID' => $ID));
            while ($arBasket = $rsBasket->GetNext()) {
                $arPicture = false;
                //мы берем картинку только если это товар из инфоблока
                if ($arBasket['MODULE'] == 'catalog') {
                    $res = CIBlockElement::GetByID($arBasket['PRODUCT_ID']);
                    if($ar_res = $res->GetNextElement())
                        $arProduct = $ar_res->GetFields(); // поля элемента
                    //debug($arFields["NAME"]);
                    $arProps = $ar_res->GetProperties(); // свойства элемента
                    //debug($arProps["CML2_ARTICLE"]["VALUE"]);
                    if ($arProduct['PREVIEW_PICTURE'] > 0) {
                        $fileID = $arProduct['PREVIEW_PICTURE'];
                    } elseif ($arProduct['DETAIL_PICTURE'] > 0) {
                        $fileID = $arProduct['DETAIL_PICTURE'];
                    } else {
                        $fileID = 0;
                    }
                    $arPicture = CFile::ResizeImageGet($fileID, array('width' => 90, 'height' => 110));
                    $arPicture['SIZE'] = getimagesize($_SERVER['DOCUMENT_ROOT'].$arPicture['src']);
                }
                $arFields['ORDER_LIST'] .= '<tr valign="top">'
                    . '<td>'.($arPicture ? '<img src="http://'.$GLOBALS['SERVER_NAME'].(str_replace(array('+', ' '), '%20', $arPicture['src'])).'" width="'.$arPicture['SIZE'][0].'" height="'.$arPicture['SIZE'][1].'" alt="">' : '').'</td>'
                    . '<td>'.$arBasket['NAME'].' артикул: <b>'.$arProps["CML2_ARTICLE"]["VALUE"].'</b></td>'
                    . '<td style="white-space: nowrap">'.(int)$arBasket['QUANTITY'].' шт.</td>'
                    . '<td style="white-space: nowrap">'.SaleFormatCurrency($arBasket['PRICE'], $arBasket['CURRENCY']).'</td>'
                    . '</tr>';
            }
            $arFields['ORDER_LIST'] .= '</table>';
        }
    }
}
?>