<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("order");
?>
<?
global $USER;
$id_user = $USER->GetID(); // ID пользователя
$rsUsers = CUser::GetByID($id_user);
$arUser = $rsUsers->Fetch();
?>
<?
if (CModule::IncludeModule('sale')) {
    $countOrder = 0;
    $arFilter = Array("USER_ID" => $id_user);
    $sql = CSaleOrder::GetList(array("DATE_INSERT" => "ASC"), $arFilter);
    while ($result = $sql->Fetch()) {
        $countOrder++;
    }
}
?>
    <div class="content-wrap group">
        <div class="aside">
            <div class="cabinet-aside">
                <div class="cabinet-aside-img">
                    <? $photoUser = CFile::GetPath($arUser['PERSONAL_PHOTO']); ?>
                    <? if ($photoUser != '') { ?>
                        <div class="cabinet-aside-img__item" style="background-image: url(<?= $photoUser ?>);">
                        </div>
                    <? } else { ?>
                        <div class="cabinet-aside-img__item">
                            <i class="icon icon-avatar2"></i>
                        </div>
                    <? } ?>
                    <div class="cabinet-aside-img__btn">
                        <div class="btn btn--max" onclick="FindFile();">Загрузить фото</div>
                        <form target="rFrame" action="/user/profile.php" method="post" enctype="multipart/form-data">
                            <div style="display: none;">
                                <input id="my_hidden_file" type="file" name="filename" onchange="LoadFile();"><br>
                                <input id="my_hidden_load" type="submit" value="Загрузить фото">
                            </div>
                            <iframe id="rFrame" name="rFrame" style="display: none"></iframe>
                        </form>
                        <script type="text/javascript">
                            function FindFile() {
                                document.getElementById('my_hidden_file').click();
                            }

                            function LoadFile() {
                                document.getElementById('my_hidden_load').click();
                            }
                        </script>
                        <?
                        //Обработчик добавления фото пользователя
                        if ($_FILES["filename"]["size"] > 1024 * 3 * 1024) {
                            echo("Размер файла превышает три мегабайта");
                            exit;
                        }
                        
                        // Проверяем загружен ли файл
                        if (is_uploaded_file($_FILES["filename"]["tmp_name"])) {
                            
                            
                            // Если файл загружен успешно, перемещаем его
                            // из временной директории в конечную
                            move_uploaded_file($_FILES["filename"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . "/upload/tmp/" . $_FILES["filename"]["name"]);
                            $arFile = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . "/upload/tmp/" . $_FILES["filename"]["name"]);
                            $arFile["MODULE_ID"] = "main";
                            $fid = CFile::SaveFile($arFile, "main");
                            
                            if (intval($fid) > 0) {
                                $arPhoto = CFile::MakeFileArray($fid);
                                $user = new CUser;
                                $fields = Array(
                                    "PERSONAL_PHOTO" => $arPhoto,
                                );
                                $user->Update($USER->GetID(), $fields);
                                CFile::Delete($fid);
                                unlink($_SERVER["DOCUMENT_ROOT"] . "/upload/tmp/" . $_FILES["filename"]["name"]);
                            }
                        } else {
                        }
                        
                        ?>
                    </div>
                </div>
                <div class="cabinet-aside-content">
                    <div class="cabinet-aside-content__info">
                        <div class="title-site--h2"><?= $arUser["NAME"] ?></div>
                        <div class="cabinet-aside-info">
                            <div class="cabinet-aside-info__item">
                                <span>Дата регистрации:</span>
                                <span><?= $arUser["DATE_REGISTER"] ?></span>
                            </div>
                            <div class="cabinet-aside-info__item">
                                <span>Всего заказов:</span>
                                <span><?= $countOrder ?></span>
                            </div>
                        </div>
                        <div class="cabinet-aside-nav">
                            <a href="/user/order.php" class="cabinet-aside-nav__link">Мои заказы</a>
                            <a href="/user/sale.php" class="cabinet-aside-nav__link">Мои скидки</a>
                        </div>
                        <div class="cabinet-aside-nav">
                            <a href="/user/faq.php" class="cabinet-aside-nav__link">Чат с менеджером</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <? $APPLICATION->IncludeComponent(
	"bitrix:sale.personal.order", 
	"current_orders", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CUSTOM_SELECT_PROPS" => array(
		),
		"DETAIL_HIDE_USER_INFO" => array(
			0 => "0",
		),
		"HISTORIC_STATUSES" => array(
		),
		"NAV_TEMPLATE" => "",
		"ORDERS_PER_PAGE" => "20",
		"ORDER_DEFAULT_SORT" => "DATE_INSERT",
		"PATH_TO_BASKET" => "/cart/",
		"PATH_TO_CATALOG" => "/catalog/",
		"PATH_TO_PAYMENT" => "/personal/order/payment/",
		"REFRESH_PRICES" => "N",
		"RESTRICT_CHANGE_PAYSYSTEM" => array(
			0 => "N",
			1 => "F",
			2 => "C",
			3 => "OO",
			4 => "OT",
			5 => "TO",
		),
		"SAVE_IN_SESSION" => "Y",
		"SEF_MODE" => "N",
		"SET_TITLE" => "Y",
		"STATUS_COLOR_F" => "gray",
		"STATUS_COLOR_N" => "green",
		"STATUS_COLOR_PSEUDO_CANCELLED" => "red",
		"COMPONENT_TEMPLATE" => "current_orders",
		"STATUS_COLOR_C" => "gray",
		"PROP_1" => array(
		),
		"DISALLOW_CANCEL" => "N",
		"ALLOW_INNER" => "N",
		"ONLY_INNER_FULL" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"STATUS_COLOR_OO" => "gray",
		"STATUS_COLOR_OT" => "gray",
		"STATUS_COLOR_TO" => "gray",
		"PROP_2" => array(
		)
	),
	false
); ?>
        </div>
    </div>
    <style>
        .header-nav .menu li:first-child ul {
            display: none;
        }

        .header-nav .menu li:first-child:hover ul {
            display: block;
        }
    </style>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>