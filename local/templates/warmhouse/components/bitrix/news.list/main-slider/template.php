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

<div class="owl-carousel main-slider">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>

		<div class="main-slider-item">
			<?if($arItem["PREVIEW_PICTURE"]["SRC"]):?>
				<div class="main-slider-item-img">
					<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
				</div>
				<div class="main-slider-item-ic main-slider-item-ic--1"><img src="<?=SITE_TEMPLATE_PATH?>/img/main-screen-ic1.png" alt=""></div>
				<div class="main-slider-item-ic main-slider-item-ic--2"><img src="<?=SITE_TEMPLATE_PATH?>/img/main-screen-ic2.png" alt=""></div>
			<?endif;?>

			<div class="main-slider-item-cont">
				<?if($arItem["PROPERTIES"]["SALE"]["VALUE"]):?>
					<div class="main-slider-item-cont__badge"><?=$arItem["PROPERTIES"]["SALE"]["VALUE"]?></div>
				<?endif;?>

				<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
					<div class="main-slider-item-cont__tt"><?echo $arItem["NAME"]?></div>
				<?endif;?>

				<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
					<p><?echo $arItem["PREVIEW_TEXT"];?></p>
				<?endif;?>

				<?if($arItem["PROPERTIES"]["LINK"]["VALUE"]):?>
					<a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>" class="btn btn--min-width"><?if($arItem["PROPERTIES"]["LINK"]["VALUE"] == '/catalog/'){?><?=GetMessage('CT_LINK_CATALOG')?><?}else{?><?=GetMessage('CT_LINK_MORE')?><?}?></a>
				<?endif;?>
			</div>
		</div>
	<?endforeach;?>
</div>
