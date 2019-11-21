<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

/**
 * @global CMain $APPLICATION
 * @var CBitrixComponent $component
 * @var array $arParams
 * @var array $arResult
 * @var array $arCurSection
 */

if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] == 'Y')
{
	$basketAction = isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '';
}
else
{
	$basketAction = isset($arParams['SECTION_ADD_TO_BASKET_ACTION']) ? $arParams['SECTION_ADD_TO_BASKET_ACTION'] : '';
}?>

<div class="content-wrap group">
	<? if ($isFilter): ?>
		<div class="aside">
			<?
			$APPLICATION->IncludeComponent(
				"bitrix:catalog.smart.filter",
				"visual_vertical",
				array(
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"SECTION_ID" => $arCurSection['ID'],
					"FILTER_NAME" => $arParams["FILTER_NAME"],
					"PRICE_CODE" => $arParams["~PRICE_CODE"],
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"SAVE_IN_SESSION" => "N",
					"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
					"XML_EXPORT" => "N",
					"SECTION_TITLE" => "NAME",
					"SECTION_DESCRIPTION" => "DESCRIPTION",
					'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
					"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
					'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
					'CURRENCY_ID' => $arParams['CURRENCY_ID'],
					"SEF_MODE" => "Y",
					"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
					"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
					"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
					"INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
					"SCROLL_PROPERTY" => $arParams["SCROLL_PROPERTY"]
				),
				$component,
				array('HIDE_ICONS' => 'N')
			);
			?>
		</div>
	<? endif ?>

	<div class="content">
		<?
		$APPLICATION->IncludeComponent(
			"bitrix:breadcrumb",
			"bredcrumb",
			Array(
				"PATH" => "",
				"SITE_ID" => "s1",
				"START_FROM" => "0"
			)
		);
		?>

		<?
		$APPLICATION->IncludeComponent(
			"bitrix:catalog.section.list",
			"catalog-list",
			array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
				"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
				"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
				"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
				"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
				"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
			),
			$component,
			array("HIDE_ICONS" => "Y")
		);?>

		<h1><?$APPLICATION->ShowTitle(false);?></h1>

		<div class="content-panel">
			<div class="content-panel-item" <?$APPLICATION->ShowViewContent('sort_view');?>>
				<div class="content-panel-item__tt">Показать сначала:</div>
				<div class="content-panel-item__select">
					<select class="select-param js-select-param js-select-sort">
						<option data-sort="sort=price&by=desc" <?if (($_GET["sort"] == "price") && ($_GET["by"] == "desc")) {?>selected="selected"<?}?>>дорогие</option>
						<option data-sort="sort=price&by=asc" <?if (($_GET["sort"] == "price") && ($_GET["by"] == "asc")) {?>selected="selected"<?}?>>дешевые</option>
						<option data-sort="sort=popular&by=desc" <?if (($arParams['ELEMENT_SORT_FIELD'] == 'SHOWS') && ($arParams['ELEMENT_SORT_ORDER'] == 'desc')) {?>selected="selected"<?}?>>популярные</option>
						<option data-sort="sort=popular&by=asc" <?if (($arParams['ELEMENT_SORT_FIELD'] == 'SHOWS') && ($arParams['ELEMENT_SORT_ORDER'] == 'asc')) {?>selected="selected"<?}?>>непопулярные</option>
					</select>
				</div>
			</div>

			<div class="content-panel-item" <?$APPLICATION->ShowViewContent('sort_view');?>>
				<div class="content-panel-item__tt">Выводить по:</div>
				<div class="content-panel-item__select">
					<select class="select-param js-select-param js-select-page">
						<option data-number="per_page=16" <?if($_SESSION['CATALOG_PER_PAGE'] == 16){?>selected="selected"<?}?>>16</option>
						<option data-number="per_page=24" <?if($_SESSION['CATALOG_PER_PAGE'] == 24){?>selected="selected"<?}?>>24</option>
						<option data-number="per_page=48" <?if($_SESSION['CATALOG_PER_PAGE'] == 48){?>selected="selected"<?}?>>48</option>
						<option data-number="per_page=all" <?if($_SESSION['CATALOG_PER_PAGE'] == all){?>selected="selected"<?}?>>Все</option>
					</select>
				</div>
			</div>
            <div class="content-panel-item type-view">
                <div class="content-panel-item__tt">Отображать:</div>
                <div class="content-panel-item__select">
                    <select class="select-param js-select-param js-select-type">
                        <option data-type="catalog_type=tile" <?if($_SESSION['CATALOG_TYPE_VIEW'] == 'TILE'){?>selected="selected"<?}?>>Плитка</option>
                        <option data-type="catalog_type=list" <?if($_SESSION['CATALOG_TYPE_VIEW'] == 'LIST'){?>selected="selected"<?}?>>Список</option>
                    </select>
                </div>
            </div>
		</div>
        <?
        function remove_key() {
            parse_str($_SERVER['QUERY_STRING'], $vars);
            $url = strtok($_SERVER['QUERY_STRING'], '?') . http_build_query(array_diff_key($vars,array('sort'=>"",'by'=>"",'per_page'=>"",'catalog_type'=>"")));
            return $url;
        }
        $newurl = remove_key();
        //echo $newurl;
        ?>
		<script type="text/javascript">
			$(document).ready(function () {
                var getUrlParameter = function getUrlParameter(sParam) {
                    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                        sURLVariables = sPageURL.split('&'),
                        sParameterName,
                        i;
                    for (i = 0; i < sURLVariables.length; i++) {
                        sParameterName = sURLVariables[i].split('=');
                        if (sParameterName[0] === sParam) {
                            return sParameterName[1] === undefined ? true : sParameterName[1];
                        }
                    }
                };
               
				$('.js-select-param').on('change', function(){
					dataParamSort = $('.js-select-sort :selected').attr("data-sort");
					dataParamPage = $('.js-select-page :selected').attr("data-number");
					dataParamType = $('.js-select-type :selected').attr("data-type");
					<?
                    if (isset($_GET["set_filter"])){?>dataParamSelect = '?<?=$newurl;?>&'+dataParamSort+'&'+dataParamPage+'&'+dataParamType;<?}else{
                        ?>
                    dataParamSelect = '?'+dataParamSort+'&'+dataParamPage+'&'+dataParamType;
                    <?
                }
                    ?>
					//dataParamSelect = '&'+dataParamSort+'&'+dataParamPage+'&'+dataParamType;
                    $(location).attr('href',dataParamSelect);
				});
			});
		</script>
        <?
        
        //debug($_SERVER["QUERY_STRING"]);
    
        if ($_GET["sort"] == "price") { $arParams["ELEMENT_SORT_FIELD"] = "catalog_PRICE_2"; }
        if ($_GET["by"] == "asc") { $arParams["ELEMENT_SORT_ORDER"]= "asc"; }
        if ($_GET["by"] == "desc") { $arParams["ELEMENT_SORT_ORDER"]= "desc"; }
        ?>


		<div id="catalog-wrap">
			<?if(isset($_REQUEST['use_ajax'])) $APPLICATION->RestartBuffer();?>
			<?$intSectionID = $APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"",
				array(
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
					"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
					"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
					"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
					"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
					"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
					"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
					"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
					"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
					"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
					"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
					"BASKET_URL" => $arParams["BASKET_URL"],
					"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
					"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
					"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
					"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
					"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
					"FILTER_NAME" => $arParams["FILTER_NAME"],
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_FILTER" => $arParams["CACHE_FILTER"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"SET_TITLE" => $arParams["SET_TITLE"],
					"MESSAGE_404" => $arParams["~MESSAGE_404"],
					"SET_STATUS_404" => $arParams["SET_STATUS_404"],
					"SHOW_404" => $arParams["SHOW_404"],
					"FILE_404" => $arParams["FILE_404"],
					"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
					"PAGE_ELEMENT_COUNT" => $_SESSION['CATALOG_PER_PAGE'] == 'all' ? 1000 : $_SESSION['CATALOG_PER_PAGE'],
					"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
					"PRICE_CODE" => $arParams["~PRICE_CODE"],
					"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
					"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

					"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
					"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
					"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
					"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
					"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

					"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
					"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
					"PAGER_TITLE" => $arParams["PAGER_TITLE"],
					"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
					"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
					"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
					"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
					"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
					"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
					"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
					"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
					"LAZY_LOAD" => $arParams["LAZY_LOAD"],
					"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
					"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

					"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
					"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
					"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
					"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
					"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
					"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
					"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
					"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

					"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
					"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
					"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
					"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
					"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
					'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
					'CURRENCY_ID' => $arParams['CURRENCY_ID'],
					'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
					'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

					'LABEL_PROP' => $arParams['LABEL_PROP'],
					'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
					'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
					'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
					'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
					'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
					'PRODUCT_ROW_VARIANTS' => $arParams['LIST_PRODUCT_ROW_VARIANTS'],
					'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
					'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
					'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
					'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
					'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

					'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
					'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
					'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
					'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
					'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
					'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
					'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
					'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
					'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
					'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
					'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
					'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
					'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
					'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
					'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
					'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
					'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

					'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
					'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
					'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

					'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
					"ADD_SECTIONS_CHAIN" => "N",
					'ADD_TO_BASKET_ACTION' => $basketAction,
					'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
					'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
					'COMPARE_NAME' => $arParams['COMPARE_NAME'],
					'USE_COMPARE_LIST' => 'Y',
					'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
					'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
					'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
				),
				$component
			);
			?>
			<?if(isset($_REQUEST['use_ajax'])) die();?>
		</div>

		<?/* 20.08.2019 - по согласованию с заказчиком - перенос ниже
		<div class="content-block">
			<div class="content-feedback">
				<div class="content-feedback-item">
					<div class="content-feedback-item__img content-feedback-item__img--1"><img src="<?=SITE_TEMPLATE_PATH?>/img/content-feedback1.png" alt=""></div>
					<div class="content-feedback-item__txt">
						<div class="title-site--h2">Связаться</div>
						<p>Для связи с нами оставьте свои контактные данные. Наш менеджер перезвонит вам и проконсультирует по любому интересующему вас вопросу.</p>
					</div>
					<div class="content-feedback-item__txt"><a href="#feedback" data-fancybox class="btn btn--min-width">Обратный звонок</a></div>
				</div>
				<div class="content-feedback-item content-feedback-item--2">
					<div class="content-feedback-item__img content-feedback-item__img--2"><img src="<?=SITE_TEMPLATE_PATH?>/img/content-feedback2.png" alt=""></div>
					<div class="content-feedback-item__txt">
						<div class="title-site--h2">Подписаться на рассылку</div>
						<p>В нашей рассылке новости о новых товарах, скидках, акциях, а также, интересные гайды, лекции и семинары от компании.</p>
					</div>
					<div class="content-feedback-item__txt"><a href="#subscription" data-fancybox class="btn btn--min-width">Подписаться</a></div>
				</div>
			</div>
		</div>
*/?>
	</div>
</div>
<div class="content-block">
			<div class="content-feedback">
				<div class="content-feedback-item">
					<div class="content-feedback-item__img content-feedback-item__img--1"><img src="<?=SITE_TEMPLATE_PATH?>/img/content-feedback1.png" alt=""></div>
					<div class="content-feedback-item__txt">
						<div class="title-site--h2">Связаться</div>
						<p>Для связи с нами оставьте свои контактные данные. Наш менеджер перезвонит вам и проконсультирует по любому интересующему вас вопросу.</p>
					</div>
					<div class="content-feedback-item__txt"><a href="#feedback" data-fancybox class="btn btn--min-width">Обратный звонок</a></div>
				</div>
				<div class="content-feedback-item content-feedback-item--2">
					<div class="content-feedback-item__img content-feedback-item__img--2"><img src="<?=SITE_TEMPLATE_PATH?>/img/content-feedback2.png" alt=""></div>
					<div class="content-feedback-item__txt">
						<div class="title-site--h2">Подписаться на рассылку</div>
						<p>В нашей рассылке новости о новых товарах, скидках, акциях, а также, интересные гайды, лекции и семинары от компании.</p>
					</div>
					<div class="content-feedback-item__txt"><a href="#subscription" data-fancybox class="btn btn--min-width">Подписаться</a></div>
				</div>
			</div>
		</div>