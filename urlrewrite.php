<?php
$arUrlRewrite = array(
    15 =>
        array(
            'CONDITION' => '#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
            'RULE' => 'alias=$1',
            'ID' => NULL,
            'PATH' => '/desktop_app/router.php',
            'SORT' => 100,
        ),
    11 =>
        array(
            'CONDITION' => '#^/poleznaya-informatsiya/sertifikaty/#',
            'RULE' => '',
            'ID' => 'bitrix:catalog',
            'PATH' => '/poleznaya-informatsiya/sertifikaty/index.php',
            'SORT' => 100,
        ),
    5 =>
        array(
            'CONDITION' => '#^/poleznaya-informatsiya/seminary/#',
            'RULE' => '',
            'ID' => 'bitrix:news',
            'PATH' => '/poleznaya-informatsiya/seminary/index.php',
            'SORT' => 100,
        ),
    4 =>
        array(
            'CONDITION' => '#^/poleznaya-informatsiya/stati/#',
            'RULE' => '',
            'ID' => 'bitrix:news',
            'PATH' => '/poleznaya-informatsiya/stati/index.php',
            'SORT' => 100,
        ),
    1 =>
        array(
            'CONDITION' => '#^/bitrix/services/ymarket/#',
            'RULE' => '',
            'ID' => '',
            'PATH' => '/bitrix/services/ymarket/index.php',
            'SORT' => 100,
        ),
    2 =>
        array(
            'CONDITION' => '#^/cpetsialnye-usloviya/#',
            'RULE' => '',
            'ID' => 'bitrix:news',
            'PATH' => '/cpetsialnye-usloviya/index.php',
            'SORT' => 100,
        ),
    16 =>
        array(
            'CONDITION' => '#^/online/(/?)([^/]*)#',
            'RULE' => '',
            'ID' => NULL,
            'PATH' => '/desktop_app/router.php',
            'SORT' => 100,
        ),
    14 =>
        array(
            'CONDITION' => '#^/stssync/calendar/#',
            'RULE' => '',
            'ID' => 'bitrix:stssync.server',
            'PATH' => '/bitrix/services/stssync/calendar/index.php',
            'SORT' => 100,
        ),
    22 =>
        array(
            'CONDITION' => '#^/catalog_test/#',
            'RULE' => '',
            'ID' => 'bitrix:catalog',
            'PATH' => '/catalog_test/index.php',
            'SORT' => 100,
        ),
    12 =>
        array(
            'CONDITION' => '#^/novosti/#',
            'RULE' => '',
            'ID' => 'bitrix:news',
            'PATH' => '/novosti/index.php',
            'SORT' => 100,
        ),
    23 =>
        array(
            'CONDITION' => '#^/catalog/#',
            'RULE' => '',
            'ID' => 'bitrix:catalog',
            'PATH' => '/catalog/index.php',
            'SORT' => 100,
        ),
    0 =>
        array(
            'CONDITION' => '#^/rest/#',
            'RULE' => '',
            'ID' => NULL,
            'PATH' => '/bitrix/services/rest/index.php',
            'SORT' => 100,
        ),
    24 =>
        array(
            'CONDITION' => '#^/proizvoditeli/(/?)([^/]*)#',
            'RULE' => '',
            'ID' => 'bitrix:catalog.section',
            'PATH' => '/proizvoditeli/index.php',
            'SORT' => 100,
        ),
);
