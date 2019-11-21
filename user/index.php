<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if (isset($_REQUEST["backurl"]) && strlen($_REQUEST["backurl"])>0)
	LocalRedirect($backurl);
$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();
$APPLICATION->SetTitle("Личный кабинет");
?>
<h1>Личный кабинет&ensp;<a class="exit" href="?logout=yes">Выход</a></h1>
<p>Здравствуйте, <strong><?=$arUser['LOGIN']?></strong>, добро пожаловать в Ваш личный кабинет</p>
<div class="personal_accaunt">
    <?
    //echo "<pre>"; print_r($arUser["EMAIL"]); echo "</pre>";
    ?>
    <?
    $id_user = $USER->GetID(); // ID пользователя
    $arFilter = Array("USER_ID" => $id_user);
    $arFilter2 = Array("USER_ID" => $id_user,"STATUS_ID"=>"N");
    $sql = CSaleOrder::GetList(array("DATE_INSERT" => "ASC"), $arFilter);
    $sql2 = CSaleOrder::GetList(array("DATE_INSERT" => "ASC"), $arFilter2);
    $i=0;
    $i2=0;
    while ($result = $sql->Fetch())
    {
        $i++;
    }
    while ($result2 = $sql2->Fetch())
    {
        $i2++;
    }
    $count = $i;
    $count2 = $i2;
    ?>
    <div class="col-md3"><div class="row1 personal-info"><span><?=substr($arUser["NAME"],0,1);?></span>Личные данные</div><div class="row2"><p><?=$arUser["NAME"];?></p><p><?=$arUser["EMAIL"];?></p><p>Тел.: <?=$arUser["PERSONAL_PHONE"];?></p><p>
        </div><div class="row3"><a href="/user/profile.php">Изменить</a></p></div></div>
    <div class="col-md3"><div class="row1"><span><img src="<?=SITE_TEMPLATE_PATH;?>/img/cart.png" alt="История заказов" title="История заказов"></span>История заказов</div><div class="row2"><p>Всего заказов: <?=$count;?></p><p>Активных заказов: <?=$count2;?></p><p>
        </div><div class="row3"><a href="/user/order.php">Смотреть все</a></p></div></div>
    <div class="col-md3"><div class="row1"><span><img src="<?=SITE_TEMPLATE_PATH;?>/img/percent.png" alt="Мои скидки" title="Мои скидки"></span>Мои скидки</div><div class="row2"><p>У вас пока нет скидок</p><p>Актуально на <?=date("d M Y H:II")?></p></div></div>
    <div class="col-md3 chats"><div class="row1">Чат с менеджером</div><div class="row2"><p>Если у Вас есть вопросы, наши специалисты
                на них ответят в режиме онлайн</p>
            <p><a href="/user/faq.php">Начать чат</a></p>
		</div></div>
</div>
    <style>
        .header-nav .menu li:first-child ul {
            display: none;
        }
        .header-nav .menu li:first-child:hover ul {
            display: block;
        }
    </style>
    <script>
       $('body').click(function () {
           $('.header-nav .menu .menu-item--drop').first().find('.menu-dd').hide();
       });
    </script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>