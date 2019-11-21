<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>
<? CModule::IncludeModule("sale");
CModule::IncludeModule("iblock");
if ($_POST['action'] == 'delete'){
    CSaleBasket::Delete(IntVal($_POST['id']));
}
?>
<div id="card" class="st-modal">
    <div class="modal-cont">
        <div class="title-site--h2">Ваша корзина</div>
        <div class="card-list-wrap" data-simplebar data-simplebar-auto-hide="false">
            <div class="card-list">
                <? if (CModule::IncludeModule("sale")) {
                    $arBasketItems = array();
                    $dbBasketItems = CSaleBasket::GetList(array("NAME" => "ASC", "ID" => "ASC"), array("FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"), false, false, array("ID", "MODULE", "PRODUCT_ID", "QUANTITY", "CAN_BUY", "PRICE"));
                    while ($arItems = $dbBasketItems->Fetch()) {
                        $arItems = CSaleBasket::GetByID($arItems["ID"]);
                        $arBasketItems[] = $arItems;
                        //debug($arItems);
                        $name = $arItems["NAME"];
                        $quantity = $arItems['QUANTITY'];
                        $price = $arItems['PRICE'];
                        $PRODUCT_ID = $arItems['PRODUCT_ID'];
                        $cart_num += $arItems['QUANTITY'];
                        $cart_sum += $arItems['PRICE'] * $arItems['QUANTITY'];
                        $arFilter = Array("IBLOCK_ID" => 2, "ID" => $PRODUCT_ID);
                        $res = CIBlockElement::GetList(Array(), $arFilter);
                        if ($ob = $res->GetNextElement()) {
                            $arFields = $ob->GetFields(); // поля элемента
                            //print_r($arFields);
                            $arProps = $ob->GetProperties(); // свойства элемента
                            $img = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array('width' => 60, 'height' => 100), BX_RESIZE_IMAGE_EXACT, true);
                            if (empty($img)) {
                                $img = SITE_TEMPLATE_PATH . '/img/nophoto.png';
                            } else {
                                $img = $img["src"];
                            }
                        }
                        ?>
                        <div class="card-item">
                            <div class="card-item__img"><img src="<?= $img; ?>" alt="">
                            </div>
                            <div class="card-item__txt">
                                <div class="card-item-tt"><?= $name; ?> <?= number_format($quantity, 0, ".", " "); ?> шт.</div>
                                <div class="card-item-price"><?= number_format($quantity*$price, 0, ".", " "); ?> ₽
                                </div>
                            </div>
                            <a href="javascript:void(0);" onclick="deleteid(<?=$arItems["ID"];?>)" class="del"><i class="icon icon-close"></i></a>
                        </div>
                        <?
                    }
                    ?>
                <? } ?>
                <? if (empty($cart_num)){ ?>
                    <p><b>Корзина пуста</b></p>
                <? } ?>
            </div>
        </div>
        
        <? if (!empty($cart_num)){ ?>
            <div class="popup_cart">
            <p><b><?= $cart_num ?></b> товаров на сумму <b><?= $cart_sum ?> ₽</b></p>
            <a href="/cart/" class="btn btn--max col-wt">Перейти в корзину</a>
            </div>
        <? } ?>
    </div>
</div>