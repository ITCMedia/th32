<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (isset($arParams["TEMPLATE_THEME"]) && !empty($arParams["TEMPLATE_THEME"]))
{
	$arAvailableThemes = array();
	$dir = trim(preg_replace("'[\\\\/]+'", "/", dirname(__FILE__)."/themes/"));
	if (is_dir($dir) && $directory = opendir($dir))
	{
		while (($file = readdir($directory)) !== false)
		{
			if ($file != "." && $file != ".." && is_dir($dir.$file))
				$arAvailableThemes[] = $file;
		}
		closedir($directory);
	}

	if ($arParams["TEMPLATE_THEME"] == "site")
	{
		$solution = COption::GetOptionString("main", "wizard_solution", "", SITE_ID);
		if ($solution == "eshop")
		{
			$templateId = COption::GetOptionString("main", "wizard_template_id", "eshop_bootstrap", SITE_ID);
			$templateId = (preg_match("/^eshop_adapt/", $templateId)) ? "eshop_adapt" : $templateId;
			$theme = COption::GetOptionString("main", "wizard_".$templateId."_theme_id", "blue", SITE_ID);
			$arParams["TEMPLATE_THEME"] = (in_array($theme, $arAvailableThemes)) ? $theme : "blue";
		}
	}
	else
	{
		$arParams["TEMPLATE_THEME"] = (in_array($arParams["TEMPLATE_THEME"], $arAvailableThemes)) ? $arParams["TEMPLATE_THEME"] : "blue";
	}
}
else
{
	$arParams["TEMPLATE_THEME"] = "blue";
}
/*
if (!empty($arParams["SCROLL_PROPERTY"])) {
	foreach ($arResult["ITEMS"] as $key=>$arItem) {
		if (in_array($arItem["CODE"], $arParams["SCROLL_PROPERTY"]) && !empty($arItem["VALUES"]))
		{
			foreach($arItem["VALUES"] as $keyXML=>$value) {
				$data_value[$keyXML] = (double)str_replace(",", ".",$value["VALUE"]);
			}

			array_multisort($data_value, SORT_ASC, SORT_REGULAR);

			$data_tmp = array();
			foreach($data_value as $keyXML=>$value) {
				$data_tmp[$keyXML] = $arResult["ITEMS"][$key]["VALUES"][$keyXML];
			}

			$min = reset($data_tmp);
			$max = end($data_tmp);

			if (((double)str_replace(",", ".", $max["VALUE"]) - (double)str_replace(",", ".",$min["VALUE"])) > 0 ) {
				$arResult["ITEMS"][$key]["VALUES"] = $data_tmp;
	
				$arResult["ITEMS"][$key]["VALUES"]["MIN"] = $min;
				$arResult["ITEMS"][$key]["VALUES"]["MAX"] = $max;

				foreach($arResult["ITEMS"][$key]["VALUES"] as $keyXML=>$value){
					$arResult["ITEMS"][$key]["VALUES"][$keyXML]["HTML_VALUE"] = $value["VALUE"];
					$arResult["ITEMS"][$key]["VALUES"][$keyXML]["VALUE"] = (double)str_replace(",", ".",$value["VALUE"]);
				}
			}

			unset($data_tmp);
			unset($data_value);

		}
	}
}
*/
$arParams["FILTER_VIEW_MODE"] = (isset($arParams["FILTER_VIEW_MODE"]) && toUpper($arParams["FILTER_VIEW_MODE"]) == "HORIZONTAL") ? "HORIZONTAL" : "VERTICAL";
$arParams["POPUP_POSITION"] = (isset($arParams["POPUP_POSITION"]) && in_array($arParams["POPUP_POSITION"], array("left", "right"))) ? $arParams["POPUP_POSITION"] : "left";
