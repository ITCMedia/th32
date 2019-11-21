<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="chats">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="faq" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <div class="question">
                <?= $arItem["PREVIEW_TEXT"]; ?>
            </div>
            <? //debug($arItem);?>
            <? if (!empty($arItem["PROPERTIES"]["ANSWER"]["VALUE"]["TEXT"])): ?>
                <div class="answer">
                    <?= htmlspecialcharsBack($arItem["PROPERTIES"]["ANSWER"]["VALUE"]["TEXT"]); ?>
                </div>
            <? endif; ?>
        </div>
    <? endforeach; ?>
    <div id="forms">
        <form action="" method="post" id="faq">
            <p><textarea id="" cols="30" name="question" rows="10"></textarea></p>
            <input type="submit" class="btn btn--min-width" value="Задать вопрос">
        </form>
    </div>
</div>
