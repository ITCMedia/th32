<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Профиль");
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

                            function reloadFunction() {
                                $(".cabinet-aside-img").load(location.href + " .cabinet-aside-img");
                            }

                            function LoadFile() {
                                document.getElementById('my_hidden_load').click();
                                setInterval('reloadFunction()', 1000);
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
            <? $APPLICATION->IncludeComponent("bitrix:main.profile", "profile", Array(
                "CHECK_RIGHTS" => "N",    // Проверять права доступа
                "SEND_INFO" => "N",    // Генерировать почтовое событие
                "SET_TITLE" => "Y",    // Устанавливать заголовок страницы
                "USER_PROPERTY" => "",    // Показывать доп. свойства
                "USER_PROPERTY_NAME" => "",    // Название закладки с доп. свойствами
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