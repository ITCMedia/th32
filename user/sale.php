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
if (CModule::IncludeModule('sale')) {
    $countOrder = 0;
    $arFilter = Array("USER_ID" => $id_user);
    $sql = CSaleOrder::GetList(array("DATE_INSERT" => "ASC"), $arFilter);
    while ($result = $sql->Fetch()) {
        $countOrder++;
    }
}
?>
<?
global $USER;
if ($USER->IsAuthorized()){
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
            <div class="title-site--h1">Ваши скидки</div>
            <?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"sale", 
	array(
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "squre",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/novosti/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "sale",
		"OTHER_HEADER" => "Другие новости",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?>
        </div>
    </div>

    <?
}else{
echo "Доступ запрещен!";
}?>
    <style>
        .header-nav .menu li:first-child ul {
            display: none;
        }

        .header-nav .menu li:first-child:hover ul {
            display: block;
        }
    </style>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>