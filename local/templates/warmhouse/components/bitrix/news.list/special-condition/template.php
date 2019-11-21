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
?>

 <div class="special-conditions text-bl-grid text-bl-grid--mob">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="text-bl-grid__fourth-col">
		<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="special-conditions-item">
			<span class="special-conditions-item__ic">
				<!-- <i class="icon icon-builders"></i> -->
				<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="" class="special-conditions-item__icon">
				<img src="<?=CFile::GetPath($arItem['PROPERTIES']['ICON_HOVER']['VALUE']);?>" alt="" class="special-conditions-item__icon-hover">
			</span>
			<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
				<span class="special-conditions-item__txt"><?echo $arItem["NAME"]?></span>
			<?endif;?>
		</a>
	</div>
<?endforeach;?>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
