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
<?
if (!empty($arResult['ITEMS'])) {
    $templateLibrary = array('popup');
    $currencyList = '';
    if (!empty($arResult['CURRENCIES'])) {
        $templateLibrary[] = 'currency';
        $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
    }
    $templateData = array(
        'TEMPLATE_THEME' => $this->GetFolder() . '/themes/' . $arParams['TEMPLATE_THEME'] . '/style.css',
        'TEMPLATE_CLASS' => 'bx_' . $arParams['TEMPLATE_THEME'],
        'TEMPLATE_LIBRARY' => $templateLibrary,
        'CURRENCIES' => $currencyList
    );
    unset($currencyList, $templateLibrary);
    
    $arSkuTemplate = array();
    if (!empty($arResult['SKU_PROPS'])) {
        foreach ($arResult['SKU_PROPS'] as &$arProp) {
            $templateRow = '';
            if ('TEXT' == $arProp['SHOW_MODE']) {
                if (5 < $arProp['VALUES_COUNT']) {
                    $strClass = 'bx_item_detail_size full';
                    $strWidth = ($arProp['VALUES_COUNT'] * 20) . '%';
                    $strOneWidth = (100 / $arProp['VALUES_COUNT']) . '%';
                    $strSlideStyle = '';
                } else {
                    $strClass = 'bx_item_detail_size';
                    $strWidth = '100%';
                    $strOneWidth = '20%';
                    $strSlideStyle = 'display: none;';
                }
                $templateRow .= '<div class="' . $strClass . '" id="#ITEM#_prop_' . $arProp['ID'] . '_cont">' .
                    '<span class="bx_item_section_name_gray">' . htmlspecialcharsex($arProp['NAME']) . '</span>' .
                    '<div class="bx_size_scroller_container"><div class="bx_size"><ul id="#ITEM#_prop_' . $arProp['ID'] . '_list" style="width: ' . $strWidth . ';">';
                foreach ($arProp['VALUES'] as $arOneValue) {
                    $arOneValue['NAME'] = htmlspecialcharsbx($arOneValue['NAME']);
                    $templateRow .= '<li data-treevalue="' . $arProp['ID'] . '_' . $arOneValue['ID'] . '" data-onevalue="' . $arOneValue['ID'] . '" style="width: ' . $strOneWidth . ';" title="' . $arOneValue['NAME'] . '"><i></i><span class="cnt">' . $arOneValue['NAME'] . '</span></li>';
                }
                $templateRow .= '</ul></div>' .
                    '<div class="bx_slide_left" id="#ITEM#_prop_' . $arProp['ID'] . '_left" data-treevalue="' . $arProp['ID'] . '" style="' . $strSlideStyle . '"></div>' .
                    '<div class="bx_slide_right" id="#ITEM#_prop_' . $arProp['ID'] . '_right" data-treevalue="' . $arProp['ID'] . '" style="' . $strSlideStyle . '"></div>' .
                    '</div></div>';
            } elseif ('PICT' == $arProp['SHOW_MODE']) {
                if (5 < $arProp['VALUES_COUNT']) {
                    $strClass = 'bx_item_detail_scu full';
                    $strWidth = ($arProp['VALUES_COUNT'] * 20) . '%';
                    $strOneWidth = (100 / $arProp['VALUES_COUNT']) . '%';
                    $strSlideStyle = '';
                } else {
                    $strClass = 'bx_item_detail_scu';
                    $strWidth = '100%';
                    $strOneWidth = '20%';
                    $strSlideStyle = 'display: none;';
                }
                $templateRow .= '<div class="' . $strClass . '" id="#ITEM#_prop_' . $arProp['ID'] . '_cont">' .
                    '<span class="bx_item_section_name_gray">' . htmlspecialcharsex($arProp['NAME']) . '</span>' .
                    '<div class="bx_scu_scroller_container"><div class="bx_scu"><ul id="#ITEM#_prop_' . $arProp['ID'] . '_list" style="width: ' . $strWidth . ';">';
                foreach ($arProp['VALUES'] as $arOneValue) {
                    $arOneValue['NAME'] = htmlspecialcharsbx($arOneValue['NAME']);
                    $templateRow .= '<li data-treevalue="' . $arProp['ID'] . '_' . $arOneValue['ID'] . '" data-onevalue="' . $arOneValue['ID'] . '" style="width: ' . $strOneWidth . '; padding-top: ' . $strOneWidth . ';"><i title="' . $arOneValue['NAME'] . '"></i>' .
                        '<span class="cnt"><span class="cnt_item" style="background-image:url(\'' . $arOneValue['PICT']['SRC'] . '\');" title="' . $arOneValue['NAME'] . '"></span></span></li>';
                }
                $templateRow .= '</ul></div>' .
                    '<div class="bx_slide_left" id="#ITEM#_prop_' . $arProp['ID'] . '_left" data-treevalue="' . $arProp['ID'] . '" style="' . $strSlideStyle . '"></div>' .
                    '<div class="bx_slide_right" id="#ITEM#_prop_' . $arProp['ID'] . '_right" data-treevalue="' . $arProp['ID'] . '" style="' . $strSlideStyle . '"></div>' .
                    '</div></div>';
            }
            $arSkuTemplate[$arProp['CODE']] = $templateRow;
        }
        unset($templateRow, $arProp);
    }
    
    if ($arParams["DISPLAY_TOP_PAGER"]) {
        ?><? echo $arResult["NAV_STRING"]; ?><?
    }
    
    $strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
    $strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
    $arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));
    ?>
    <div class="sertificates__wrapper">
<!--        <div class="bx-section-desc">-->
<!--            <p class="bx-section-desc-post">--><?//= $arResult["DESCRIPTION"] ?><!--</p>-->
<!--        </div>-->
        <?
        foreach ($arResult['ITEMS'] as $key => $arItem) {
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
            $strMainID = $this->GetEditAreaId($arItem['ID']);
            
            $arItemIDs = array(
                'ID' => $strMainID,
                'PICT' => $strMainID . '_pict',
                'SECOND_PICT' => $strMainID . '_secondpict',
                'STICKER_ID' => $strMainID . '_sticker',
                'SECOND_STICKER_ID' => $strMainID . '_secondsticker',
                'QUANTITY' => $strMainID . '_quantity',
                'QUANTITY_DOWN' => $strMainID . '_quant_down',
                'QUANTITY_UP' => $strMainID . '_quant_up',
                'QUANTITY_MEASURE' => $strMainID . '_quant_measure',
                'BUY_LINK' => $strMainID . '_buy_link',
                'BASKET_ACTIONS' => $strMainID . '_basket_actions',
                'NOT_AVAILABLE_MESS' => $strMainID . '_not_avail',
                'SUBSCRIBE_LINK' => $strMainID . '_subscribe',
                'COMPARE_LINK' => $strMainID . '_compare_link',
                
                'PRICE' => $strMainID . '_price',
                'DSC_PERC' => $strMainID . '_dsc_perc',
                'SECOND_DSC_PERC' => $strMainID . '_second_dsc_perc',
                'PROP_DIV' => $strMainID . '_sku_tree',
                'PROP' => $strMainID . '_prop_',
                'DISPLAY_PROP_DIV' => $strMainID . '_sku_prop',
                'BASKET_PROP_DIV' => $strMainID . '_basket_prop',
            );
            
            $strObName = 'ob' . preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
            
            $productTitle = (
            isset($arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']) && $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] != ''
                ? $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
                : $arItem['NAME']
            );
            $imgTitle = (
            isset($arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']) && $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE'] != ''
                ? $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']
                : $arItem['NAME']
            );
            
            $minPrice = false;
            if (isset($arItem['MIN_PRICE']) || isset($arItem['RATIO_PRICE']))
                $minPrice = (isset($arItem['RATIO_PRICE']) ? $arItem['RATIO_PRICE'] : $arItem['MIN_PRICE']);
            //echo '<pre>';print_r($arItem);echo '</pre>';
    
    
            $file = CFile::GetFileArray($arItem["PROPERTIES"]["FILE"]["VALUE"]);
    
            $file_name = $file['ORIGINAL_NAME'];
            //$file_name = $arItem['NAME'];
    
            $file_name = strip_tags($file_name);
            /*$file_name = substr($file_name, 0, 22);
            $file_name = rtrim($file_name, "!,.-");
            $file_name = substr($file_name, 0, strrpos($file_name, ' '))  . " ...";*/
    
            $info = new SplFileInfo($file['SRC']);
            $file_extantion = $info->getExtension();
            $file_size = round(($file['FILE_SIZE']/1024), 0) . "kB";
            ?>
            <div class='sertificates__item'>
            <a target="_blank" href="<?= $file['SRC']; ?>" class='sertificates__link doc-<?= $file_extantion ?>'
               title='<?= $file['ORIGINAL_NAME'] ?>'>
                <? if ($file_extantion == 'pdf') { ?>
                    <div class="sertificates__icon"></div>
                    <div class="sertificates__description">
                        <div class="sertificates__head"><?= $arItem['NAME'] ?></div>
                        <!-- <span class="sertificates__ext">.<?= $file_extantion ?></span> -->
                        <div class="sertificates__size"><?= $file_size ?></div>
                    </div>
                <? } else { ?>
                    <div class="sertificates__icon sertificates__icon_other"><?= $icon ?></div>
                    <div class="sertificates__description">
                        <div class="sertificates__head"><? echo $productTitle; ?></div>
                        <!-- <div class="sertificates__ext">.<?= $file_extantion ?></div> -->
                        <div class="sertificates__size"><?= $file_size ?></div>
                    </div>
                <?
                } ?>
            </a>
            </div><?
            
        }
        ?>
    </div>
    
    <?
    if ($arParams["DISPLAY_BOTTOM_PAGER"]) {
        ?><? echo $arResult["NAV_STRING"]; ?><?
    }
}