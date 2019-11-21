<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['ITEMS'] as $keyItem => $arItem) {
	if(!empty($arItem['PROPERTIES']['DOCS'])){
		$arResult['ITEMS'][$keyItem]['PROPERTIES']['DOCS']['FILE'] = array();
		
		$arResult['ITEMS'][$keyItem]['PROPERTIES']['DOCS']['FILE'] = CFile::GetFileArray($arItem['PROPERTIES']['DOCS']['VALUE']);

	}
}


