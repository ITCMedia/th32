<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Скидки");
?>
<?
global $USER;
$id_user = $USER->GetID(); // ID пользователя
$rsUsers = CUser::GetByID($id_user);
$arUser = $rsUsers->Fetch();
?>
<?
?>
<?
if ($USER->IsAuthorized()) {
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
            <div class="title-site--h1">Задать вопрос менеджеру</div>
            <?
            $arFilterQw = array(
                "CREATED_USER_ID" => $id_user, // для свойства типа список
            );
            ?>
            <? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"faq", 
	array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "11",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arFilterQw",
		"FIELD_CODE" => array(
			0 => "ID",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "ANSWER",
			1 => "DESCRIPTION",
			2 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "Y",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Вопросы",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "Y",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_BASE_LINK_ENABLE" => "Y",
		"SET_STATUS_404" => "Y",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"PAGER_BASE_LINK" => "",
		"PAGER_PARAMS_NAME" => "arrPager",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "faq",
		"STRICT_SECTION_CHECK" => "N",
		"FILE_404" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
); ?>
        </div>
    </div>
    <?
} else {
    echo "Доступ запрещен!";
} ?>
    <style>
        .header-nav .menu li:first-child ul {
            display: none;
        }

        .header-nav .menu li:first-child:hover ul {
            display: block;
        }
    </style>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>