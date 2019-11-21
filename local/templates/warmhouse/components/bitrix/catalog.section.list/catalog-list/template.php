<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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


$emptyImg = $this->GetFolder().'/images/tile-empty.png';

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>

<? /** 14.08.2019 навигация = #nav */
/*$rs = new CDBResult;
$rs->InitFromArray($arResult['SECTIONS']);
$rs->NavStart(9);*/
/* end #nav */
?>
<?

// debug($arResult);


if (0 < $arResult["SECTIONS_COUNT"])/** #nav add: $rs->IsNavPrint()*/
{
?>
	<div class="content-catalog">
	<?
		$bigBlock = true;
		$countBlock = 0;
		//if (!$rs->IsNavPrint()) {
			foreach ($arResult['SECTIONS'] as $key => &$arSection) /*#nav*/
			{
				if (($arParams['SHOW_MAIN_PAGE'] == 'Y') && ($key == 9)){
					break;
				}
	
				$db_list = CIBlockSection::GetList(Array($by=>$order),
				$arFilter = Array("IBLOCK_ID"=>$arSection["IBLOCK_ID"], "ID"=>$arSection["ID"]), true, $arSelect=Array("UF_STRANA"));
				while($ar_result = $db_list->GetNext()){
					$sectCountry = $ar_result['UF_STRANA'];
				}
	
				$countBlock++;
	
				if (($bigBlock == true) && ($countBlock == 4)) {
					$bigBlock = false;
					$countBlock = 1;
				}elseif(($bigBlock == false) && ($countBlock == 7)){
					$bigBlock = true;
					$countBlock = 1;
				}
	
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
	
				if ($arSection['PICTURE']['SRC'] == '')
					
					$arSection['PICTURE'] = array(
						'SRC' => $emptyImg,
						'ALT' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							: $arSection["NAME"]
						),
						'TITLE' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							: $arSection["NAME"]
						)
					);
				?>
	
	
	
				<a href="<? echo $arSection['SECTION_PAGE_URL']; ?>" class="content-catalog-item<?if($bigBlock == true){?> content-catalog-item--lg<?}?>">
					<span class="content-catalog-item__img"><img src="<? echo $arSection['PICTURE']['SRC']; ?>" alt=""></span>
					<span class="content-catalog-item__tt"><? echo $arSection['NAME']; ?></span>
				</a>
	
			<?
			} 
		/*} else {
			while ($arSection = $rs->Fetch()) /** #nav add * /
			{
				if (($arParams['SHOW_MAIN_PAGE'] == 'Y') && ($key == 9)){
					break;
				}
	
				$db_list = CIBlockSection::GetList(Array($by=>$order),
				$arFilter = Array("IBLOCK_ID"=>$arSection["IBLOCK_ID"], "ID"=>$arSection["ID"]), true, $arSelect=Array("UF_STRANA"));
				while($ar_result = $db_list->GetNext()){
					$sectCountry = $ar_result['UF_STRANA'];
				}
	
				$countBlock++;
	
				if (($bigBlock == true) && ($countBlock == 4)) {
					$bigBlock = false;
					$countBlock = 1;
				}elseif(($bigBlock == false) && ($countBlock == 7)){
					$bigBlock = true;
					$countBlock = 1;
				}
	
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
	
				if ($arSection['PICTURE']['SRC'] == '')
					
					$arSection['PICTURE'] = array(
						'SRC' => $emptyImg,
						'ALT' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							: $arSection["NAME"]
						),
						'TITLE' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							: $arSection["NAME"]
						)
					);
				?>
	
	
	
				<a href="<? echo $arSection['SECTION_PAGE_URL']; ?>" class="content-catalog-item<?if($bigBlock == true){?> content-catalog-item--lg<?}?>">
					<span class="content-catalog-item__img"><img src="<? echo $arSection['PICTURE']['SRC']; ?>" alt=""></span>
					<span class="content-catalog-item__tt"><? echo $arSection['NAME']; ?></span>
				</a>
	
			<?
			}
		}

		if (($arParams['SHOW_MAIN_PAGE'] == 'Y') && ($arResult['SECTIONS_COUNT']>9)){?>
			<a href="/catalog/" class="btn btn--min-width content-catalog-more">Весь каталог</a>
		<?}
*/
	?>
</div>

<? /** #nav add*/
	//$rs->NavPrint("Разделы", false, "", "/th32.ru/local/templates/warmhouse/components/bitrix/system.pagenavigation/squre/template.php");
	//if ($rs->IsNavPrint()) $rs->NavPrint("Разделы", false, "", "/th32.ru/bitrix/components/bitrix/system.pagenavigation/templates/arrows/template.php");
/** #nav end*/?>
<?
}
?>