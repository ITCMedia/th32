<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<? if ($fullWidth != 'Y') { ?>
    </div>
    </div>
<? } ?>
</div>
</section>
<? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_RECURSIVE" => "Y",
        "AREA_FILE_SHOW" => "sect",
        "AREA_FILE_SUFFIX" => "feedback",
        "EDIT_TEMPLATE" => ""
    )
); ?>

<? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_RECURSIVE" => "Y",
        "AREA_FILE_SHOW" => "sect",
        "AREA_FILE_SUFFIX" => "bottom-block",
        "EDIT_TEMPLATE" => ""
    )
); ?>
</div><!-- #middle-->
<!-- footer -->
<footer id="footer" class="footer">
    <div class="container-site">
        <div class="footer-contact-wrap">
            <div class="footer-contact-wrap__item footer-contact-wrap__item--flex">
                <div class="footer-logo-wrap">
                    <? if ($page != '/') { ?>
                    <a href="/">
                        <? }else{ ?>
                        <span class="footer-logo">
					<? } ?>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/include/footer-logo.php"
                        )
                    ); ?>
                    <? if ($page != '/') { ?>
                    </a>
                <? } else { ?>
                    </span>
                <? } ?>
                    <div class="copy">Все права защищены © <?=date("Y");?></div>
                </div>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/include/footer-contact.php"
                    )
                ); ?>
            </div>
            <div class="footer-contact-wrap__item">
                <div class="footer-contact">
                    <div class="footer-contact-item">
                        <div class="footer-contact-item__tt">Контактный телефон</div>
                        <div class="col-wt">
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
                    </div>
                    <div class="footer-contact-item">
                        <div class="footer-contact-item__tt">Контактный E-mail</div>
                        <div class="col-wt">
                            <a href="mailto:teplohouse32@mail.ru" class="phone-link">teplohouse32@mail.ru</a>
                        </div>
                    </div>
                    
                    <div class="footer-contact-item">
                        <div class="footer-contact-item__tt">Время работы</div>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/working-time.php"
                            )
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-nav-wrap hidden-devices">
            <? $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "footer-menu",
                Array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "footer",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_GET_VARS" => array(""),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "footer",
                    "USE_EXT" => "N"
                )
            ); ?>
            <div class="footer-nav-wrap__links">
                <a <? if ($USER->IsAuthorized()){ ?>href="/user/profile.php" <? }else{ ?>href="#modal-entrance"
                   data-fancybox<? } ?> class="link-header link-footer">
					<span class="link-header__icon">
						<i class="icon icon-person2"></i>
					</span>
                    <span class="link-header__txt">Личный кабинет</span>
                </a>
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
                    "COMPONENT_TEMPLATE" => ".default",
                    "BASKET_FOOTER" => "Y",
                ),
                    false
                ); ?>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
</div><!-- #wrapper -->
<div id="showcart" style="display: none;" class="st-modal popup-form">
    <div class="modal-cont">
    </div>
</div>
<!-- Begin Verbox {literal} -->
<script type='text/javascript'>
    (function(d, w, m) {
        window.supportAPIMethod = m;
        var s = d.createElement('script');
        s.type ='text/javascript'; s.id = 'supportScript'; s.charset = 'utf-8';
        s.async = true;
        var id = 'ccba87aa0ce5a8045fa6b3018029248c';
        s.src = '//admin.verbox.ru/support/support.js?h='+id;
        var sc = d.getElementsByTagName('script')[0];
        w[m] = w[m] || function() { (w[m].q = w[m].q || []).push(arguments); };
        if (sc) sc.parentNode.insertBefore(s, sc);
        else d.documentElement.firstChild.appendChild(s);
    })(document, window, 'Verbox');
</script>
<!-- {/literal} End Verbox -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(53777113, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/53777113" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script type="text/javascript">
    $(document).ready(function() {      
        $().UItoTop({ easingType: 'easeOutQuart' }); 
    });
</script>
<a href="#" id="toTop"><span id="toTopHover"></span>To Top</a>
</body>
</html>