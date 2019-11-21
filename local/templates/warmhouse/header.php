<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>-<?= strtoupper(LANGUAGE_ID); ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <title><? $APPLICATION->ShowTitle() ?></title>
    <!-- Place favicon.ico in the root directory -->
    <?
    
    use Bitrix\Main\Page\Asset;
    
    $asset = Asset::getInstance();
    
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/libsmin/owl.carousel.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/libsmin/jcf.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/libsmin/jquery.fancybox.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/libsmin/jquery.ui.totop.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/libsmin/nouislider.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/libsmin/jquery.easing.1.3.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/sweetalert.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery.inputmask.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/main.js');
    $asset->addCss(SITE_TEMPLATE_PATH . '/css/sweetalert.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/css/ui.totop.css');
    ?>
    
    <? $APPLICATION->ShowHead(); ?>
</head>
<body>
<? $APPLICATION->ShowPanel(); ?>

<?
$page = $APPLICATION->GetCurPage();
$fullWidth = $APPLICATION->GetProperty("full-width");
$showBredcumbs = $APPLICATION->GetProperty("show-bredcumbs");
$arrPageItems = explode("/", $page);
if($arrPageItems[1] == "user" && !CUser::IsAuthorized()){
    LocalRedirect("/");
}
?>
<div class="overlay"></div>
<div id="wrapper">
    <div id="modal-entrance" style="display: none;" class="st-modal popup-form">
        <div class="modal-cont">
            <div class="title-site--h2 text--center">Авторизация</div>
            <?
            /*$APPLICATION->IncludeComponent(
                "bitrix:system.auth.form",
                "ajax",
                array(
                    "FORGOT_PASSWORD_URL" => "/user/",
                    "PROFILE_URL" => "/user/profile.php",
                    "REGISTER_URL" => "",
                    "SHOW_ERRORS" => "Y",
                    "COMPONENT_TEMPLATE" => ".default"
                ),
                false
            );*/
            ?>
            <?$APPLICATION->IncludeComponent(
                "api:auth",
                "",
                Array(
                    "MESS_AUTHORIZED" => "Добро пожаловать на сайт",
                    "SET_TITLE" => "N"
                )
            );?>
        </div>
    </div>
    <div id="modal-restore" style="display: none;" class="st-modal popup-form">
        <div class="modal-cont">
            <div class="title-site--h2 text--center">Восстановление пароля</div>
            <?$APPLICATION->IncludeComponent(
                "api:auth.restore",
                "",
                Array(
                    "MESS_AUTHORIZED" => "Добро пожаловать на сайт",
                    "SET_TITLE" => "N"
                )
            );?>
        </div>
    </div>
    <div id="modal-reg" style="display: none;" class="st-modal popup-form">
        <div class="modal-cont">
            <div class="title-site--h2 text--center">Регистрация</div>
            <?/*
            unset($_POST["UF_POLICY"]);
            $APPLICATION->IncludeComponent(
                "bitrix:main.register",
                ".default",
                array(
                    "AUTH" => "Y",
                    "COMPONENT_TEMPLATE" => ".default",
                    "REQUIRED_FIELDS" => array(
                        0 => "EMAIL",
                        1 => "NAME",
                        2 => "PERSONAL_PHONE",
                    ),
                    "SET_TITLE" => "N",
                    "SHOW_FIELDS" => array(
                        0 => "EMAIL",
                        1 => "NAME",
                        2 => "PERSONAL_PHONE",
                    ),
                    "SUCCESS_PAGE" => "",
                    "USER_PROPERTY" => array(
                        0 => "UF_POLICY",
                    ),
                    "USER_PROPERTY_NAME" => "",
                    "USE_BACKURL" => "Y"
                ),
                false
            ); */?>
            <?$APPLICATION->IncludeComponent(
                "api:auth.register",
                ".default",
                array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "AUTH" => "N",
                    "USE_BACKURL" => "N",
                    "SUCCESS_PAGE" => "",
                    "SET_TITLE" => "N",
                    "USER_PROPERTY_NAME" => "",
                ),
                false
            );?>
        </div>
    </div>
    <div id="feedback" style="display: none;" class="st-modal popup-form">
        <div class="modal-cont">
            <? $APPLICATION->IncludeComponent(
                "itcmedia:form",
                "form-site",
                array(
                    "AJAX_MODE" => "Y",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "CACHE_TIME" => "3600",
                    "CACHE_TYPE" => "A",
                    "CHAIN_ITEM_LINK" => "",
                    "CHAIN_ITEM_TEXT" => "",
                    "EDIT_ADDITIONAL" => "N",
                    "EDIT_STATUS" => "Y",
                    "IGNORE_CUSTOM_TEMPLATE" => "Y",
                    "NOT_SHOW_FILTER" => array(
                        0 => "",
                        1 => "",
                    ),
                    "NOT_SHOW_TABLE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "RESULT_ID" => $_REQUEST[RESULT_ID],
                    "SEF_MODE" => "N",
                    "SHOW_ADDITIONAL" => "N",
                    "SHOW_ANSWER_VALUE" => "N",
                    "SHOW_EDIT_PAGE" => "N",
                    "SHOW_LIST_PAGE" => "N",
                    "SHOW_STATUS" => "Y",
                    "SHOW_VIEW_PAGE" => "N",
                    "START_PAGE" => "new",
                    "SUCCESS_URL" => "",
                    "USE_EXTENDED_ERRORS" => "N",
                    "WEB_FORM_ID" => "1",
                    "COMPONENT_TEMPLATE" => "form-site",
                    "USER_CONSENT" => "Y",
                    "USER_CONSENT_ID" => "1",
                    "USER_CONSENT_IS_CHECKED" => "Y",
                    "USER_CONSENT_IS_LOADED" => "N"
                ),
                false
            ); ?>
        </div>
    </div>
    <div id="feedback-cart" style="display: none;" class="st-modal popup-form">
        <div class="modal-cont">
            <? $APPLICATION->IncludeComponent(
                "itcmedia:form",
                "form-site",
                array(
                    "AJAX_MODE" => "Y",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "CACHE_TIME" => "3600",
                    "CACHE_TYPE" => "A",
                    "CHAIN_ITEM_LINK" => "",
                    "CHAIN_ITEM_TEXT" => "",
                    "EDIT_ADDITIONAL" => "N",
                    "EDIT_STATUS" => "Y",
                    "IGNORE_CUSTOM_TEMPLATE" => "Y",
                    "NOT_SHOW_FILTER" => array(
                        0 => "",
                        1 => "",
                    ),
                    "NOT_SHOW_TABLE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "RESULT_ID" => $_REQUEST[RESULT_ID],
                    "SEF_MODE" => "N",
                    "SHOW_ADDITIONAL" => "N",
                    "SHOW_ANSWER_VALUE" => "N",
                    "SHOW_EDIT_PAGE" => "N",
                    "SHOW_LIST_PAGE" => "N",
                    "SHOW_STATUS" => "Y",
                    "SHOW_VIEW_PAGE" => "N",
                    "START_PAGE" => "new",
                    "SUCCESS_URL" => "",
                    "USE_EXTENDED_ERRORS" => "N",
                    "WEB_FORM_ID" => "3",
                    "COMPONENT_TEMPLATE" => "form-site",
                    "USER_CONSENT" => "Y",
                    "USER_CONSENT_ID" => "1",
                    "USER_CONSENT_IS_CHECKED" => "Y",
                    "USER_CONSENT_IS_LOADED" => "N"
                ),
                false
            ); ?>
        </div>
    </div>
    <div id="subscription" style="display: none;" class="st-modal popup-form">
        <div class="modal-cont">
            <? $APPLICATION->IncludeComponent(
                "bitrix:subscribe.form",
                "",
                Array(
                    "CACHE_TIME" => "3600",
                    "CACHE_TYPE" => "A",
                    "PAGE" => "#SITE_DIR#user/subscr_edit.php",
                    "SHOW_HIDDEN" => "Y",
                    "USE_PERSONALIZATION" => "Y",
                    "USER_CONSENT" => array()
                )
            ); ?>
        </div>
    </div>
    <!-- header -->
    <header id="header" class="header">
        <div class="container-site">
            <div class="header-cont">
                <div class="logo">
                    <? if ($page != '/') { ?>
                    <a href="/">
                        <? } ?>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/header-logo.php"
                            )
                        ); ?>
                        <? if ($page != '/') { ?>
                    </a>
                <? } ?>
                </div>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:search.form",
                    "search-form",
                    Array(
                        "PAGE" => "#SITE_DIR#search/index.php",
                        "USE_SUGGEST" => "N"
                    )
                ); ?>
                <div class="phone-bl hidden-devices">
                    <span class="phone-bl__tt">Телефон</span>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/include/phone.php"
                        )
                    ); ?>
                </div>
                <div class="phone-bl hidden-devices">
                    <span class="phone-bl__tt">E-mail</span>
                    <a href="mailto:teplohouse32@mail.ru" class="phone-link">teplohouse32@mail.ru</a>
                </div>
                <div class="header-contact">
                    <a href="tel:84832312331" class="phone-mob">
                        <i class="icon icon-phone"></i>
                    </a>
                    <span class="link-header link-header--modal" data-login-position>
								<? if ($USER->IsAuthorized()){ ?><a href="/user/"><? } ?>
                            <span class="link-header__icon">
									<i class="icon icon-person"></i>
								</span>
									<span class="link-header__txt" data-login-name="true"><?= ($USER->IsAuthorized() ? explode(' ', trim($USER->GetLogin()))[0] : "Личный кабинет") ?></span>
                            <? if ($USER->IsAuthorized()){ ?></a><? } ?>
                        <div class="link-header__content">
									<a href="#modal-entrance" data-fancybox class="btn">Вход</a>
									<a href="#modal-reg" data-fancybox class="btn btn--second-st btn--border">Регистрация</a>
								</div>
							</span>
                    <? $APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "mini-cart", Array(
                        "HIDE_ON_BASKET_PAGES" => "Y",    // Не показывать на страницах корзины и оформления заказа
                        "PATH_TO_AUTHORIZE" => "",    // Страница авторизации
                        "PATH_TO_BASKET" => SITE_DIR . "cart/",    // Страница корзины
                        "PATH_TO_ORDER" => SITE_DIR . "personal/order/make/",    // Страница оформления заказа
                        "PATH_TO_PERSONAL" => SITE_DIR . "personal/",    // Страница персонального раздела
                        "PATH_TO_PROFILE" => SITE_DIR . "personal/",    // Страница профиля
                        "PATH_TO_REGISTER" => SITE_DIR . "login/",    // Страница регистрации
                        "POSITION_FIXED" => "N",    // Отображать корзину поверх шаблона
                        "SHOW_AUTHOR" => "N",    // Добавить возможность авторизации
                        "SHOW_EMPTY_VALUES" => "Y",    // Выводить нулевые значения в пустой корзине
                        "SHOW_NUM_PRODUCTS" => "Y",    // Показывать количество товаров
                        "SHOW_PERSONAL_LINK" => "N",    // Отображать персональный раздел
                        "SHOW_PRODUCTS" => "N",    // Показывать список товаров
                        "SHOW_REGISTRATION" => "N",    // Добавить возможность регистрации
                        "SHOW_TOTAL_PRICE" => "N",    // Показывать общую сумму по товарам
                        "COMPONENT_TEMPLATE" => ".default"
                    ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
        <div class="head-menu">
            <div class="burger-menu">
                <div class="burger-menu-box">
                    <div class="burger-menu-inner"></div>
                </div>
            </div>
            <div class="menu-wrapper-fixed">
                <div class="menu-open-wrapper">
                    <nav class="header-nav">
                        <div class="header-nav-mob">
                            <div class="search">
                                <form action="#" class="search-form">
                                    <input type="text" placeholder="Поиск по артикулу или названию">
                                    <button class="btn-search">
                                        <svg class="icon icon-search">
                                            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/icon/sprite.svg#icon-search"></use>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "top-menu",
                            array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "left",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "3",
                                "MENU_CACHE_GET_VARS" => array(),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "A",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "top",
                                "USE_EXT" => "N",
                                "COMPONENT_TEMPLATE" => "top-menu"
                            ),
                            false
                        ); ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
    <div id="middle">
        <? $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_RECURSIVE" => "Y",
                "AREA_FILE_SHOW" => "sect",
                "AREA_FILE_SUFFIX" => "main-screen",
                "EDIT_TEMPLATE" => ""
            )
        ); ?>
        <section class="section-st<? if ($page != '/') { ?> main-screen--inner<? } ?>">
            <div class="container-site">
                <? if ($fullWidth != 'Y' && strpos($_SERVER["REQUEST_URI"], "catalog") === false) { ?>
                <div class="content-wrap group">
                    <div class="content">
                        <? } ?>
                        <? if ($showBredcumbs == 'Y') { ?>
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:breadcrumb",
                                "bredcrumb",
                                Array(
                                    "PATH" => "",
                                    "SITE_ID" => "s1",
                                    "START_FROM" => "0"
                                )
                            ); ?>
                        <? } ?>
