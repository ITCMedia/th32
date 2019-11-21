<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?php
$iblockId = 11;
$app = \Bitrix\Main\Application::getInstance();
$context = $app->getContext();
$request = $context->getRequest();
$server = $context->getServer();
$arMsgData = array();
$arResult = array(
    'hasError' => true,
    'msg' => "Ошибка отправки сообщения",
);
global $USER;
$id_user = $USER->GetID(); // ID пользователя
      $rsUser = CUser::GetByID($id_user);
      $arUser = $rsUser->Fetch();
      $name = $arUser["NAME"]; //выводим имя
// проверим, что пришел POST
if (!$request->isPost()) {
    echo json_encode($arResult);
    die();
}
// подключим модуль инфоблоков
if (!CModule::IncludeModule('iblock')) {
    echo json_encode($arResult);
    die();
}
// проверим наличие данных
$question = htmlspecialcharsEx($request->getPost('question'));
$arMsgData = array(
    'NAME' => $name,
    'QUESTION' => $question,
);
if(!$question) {
    $arResult['msg'] = "Заполните вопрос";
    echo json_encode($arResult);
    die();
}
$el = new CIBlockElement();
$arLoadProductArray = array(
    "IBLOCK_SECTION_ID" => false, // элемент лежит в корне раздела
    "IBLOCK_ID" => $iblockId,
    "NAME" => 'Вопрос от пользователя '.$name,
    "ACTIVE" => "Y", // активен
    "PREVIEW_TEXT" => $question, // активен
);
// создаем элемент
if ($ITEM_ID = $el->Add($arLoadProductArray)) {
    $arResult = array(
        'hasError' => false,
        'msg' => "Сообщение отправлено!\nМенеджер ответит вам в ближайшее время",
    );
    echo json_encode($arResult);
// шлем почту
    CEvent::Send("SEND_QUESTION", "s1", $arMsgData);
} else {
    $arResult['msg'] = "Ошибка отправки сообщения.\nПовторите попытку позже.";
    echo json_encode($arResult);
}
die();
?>