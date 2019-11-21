<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
?>

<?
if (CModule::IncludeModule("sale")) {
    $arFilter = array(
        "ACCOUNT_NUMBER" => trim($_POST["id"]),
    );
    $arSelectFields = array();
    $rsSales = CSaleOrder::GetList(array("ID" => "ASC"), $arFilter, false, Array("nPageSize" => ($_REQUEST["nPageSize"]) ? $_REQUEST["nPageSize"] : 50), $arSelectFields);
    ?>
    <?
    if (empty($rsSales->arResult)) {
        echo 'Заказ не найден';
        die();
    } ?>
    <div class="status-order">
        <div class="h1 center">Информация по заказу <span class="number-order">№<?= trim($_POST["id"]); ?></span></div>
        <div class="my-table-wrap">
            <table>
                <thead>
                <tr>
                    <th>№ заказа</th>
                    <th>Покупатель</th>
                    <th>Email</th>
                    <th>Сумма</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <? while ($arSales = $rsSales->Fetch()) { ?>
                    <tr>
                        <?
                        $arSalesPROP_VALUE = array();
                        $arFilterPROP = array("ORDER_ID" => $arSales["ID"], "CODE" => array("POVOD", "PHONE"));
                        $rsSalesPROP = CSaleOrderPropsValue::GetList(array('ID' => 'DESC'), $arFilterPROP, $arSelectFieldsPROP);
                        while ($arSalesPROP = $rsSalesPROP->Fetch()) {
                            $arSalesPROP_VALUE[$arSalesPROP["CODE"]] = $arSalesPROP["VALUE"];
                        }
                        
                        
                        $rsUser = CUser::GetByID($arSales["USER_ID"]);
                        $arUser = $rsUser->Fetch();
                        $USER_INFO = $arUser['NAME'];
                        switch ($arSales["STATUS_ID"]) {
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
                        <td data-label="№ заказа"><a
                                    href="/bitrix/admin/sale_order_detail.php?ID=<?= $arSales["ID"] ?>&filter=Y&set_filter=Y&lang=ru"><?= $arSales["ACCOUNT_NUMBER"] ?></a>
                        </td>
                        <td data-label="Покупатель"><?= $USER_INFO ?></td>
                        <td data-label="Email"><?= $arSales["USER_EMAIL"] ?></td>
                        <td data-label="Сумма"><?= $arSales["PRICE"] ?> ₽</td>
                        <td data-label="Статус"><?= $status ?></td>
                    </tr>
                <? } ?>
            </table>
        </div>
    </div>
<? } ?>

