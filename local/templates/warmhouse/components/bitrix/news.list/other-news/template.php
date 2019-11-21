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

<?
$curElement = $arParams['CURRENT_ELEM'];
$numShowElement = 1;
?>


<?if (count($arResult['ITEMS']) > 0) {?>
	<div class="other-news-wrap">
		<div class="title-site--h2"><?=$arParams['OTHER_HEADER'];?></div>

		<div class="other-news">

			<?foreach($arResult["ITEMS"] as $key => $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<?
				// debug($key);
				// debug($numShowElement);
				?>


				<?if (($key == 3) && ($numShowElement > 3)) {
					break;
				}?>

				

				<?if ($arItem['CODE'] != $curElement) {?>
					<div class="other-news__item">
					<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="title-site--h4"><?echo $arItem["NAME"]?></a>
					<?endif;?>

					<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
						<p><?echo $arItem["PREVIEW_TEXT"];?></p>
					<?endif;?>
					
					<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
						<div class="date-bl"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
					<?endif?>
				</div>
				<?$numShowElement++;?>
				<?}?>

			<?endforeach;?>
		</div>
	</div>
<?}?>