<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Проверка заказа");
?>
    <div class="order-status center">
        <div class="order-status__left">Код заказа:</div>
        <div class="order-status__right">
            <div class="order-status__column-left">
            	<input type="text" name="id" id="status-id" placeholder="Введите номер заказа" class="form-control">
            </div>
            <div class="order-status__column-right">
                <button type="button" class="btn btn-primary" onclick="gestatus()">Узнать</button>
            </div>
            <div class="status_info_text">
                <p>Код заказа для отслеживания вы получаете в момент оформления заказа. Он высылается на ваш почтовый
                    электронный ящик или телефон. Так же код заказа вы можете найти в личном кабинете в разделе история
                    заказов. Код заказа состоит из XXXXXX цифр и букв.</p>
                <p>Пример: L1C6F1</p>
            </div>
        </div>
    </div>
    <div id="msg"></div>
    <style>
        .header-nav .menu li:first-child ul {
            display: none;
        }

        .header-nav .menu li:first-child:hover ul {
            display: block;
        }
    </style>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>