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

 <div class="sertificates__wrapper">
<?foreach($arResult["ITEMS"] as $arItem){

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
	<a target="_blank" href="<?=$file['SRC'];?>" class='sertificates__link doc-<?=$file_extantion?>' title='<?=$file['ORIGINAL_NAME']?>'>

		<? if($file_extantion == 'pdf'){ ?>

			<div class="sertificates__icon"></div>
			<div class="sertificates__description">
				<div class="sertificates__head"><?=$arItem['NAME']?></div>
				<!-- <span class="sertificates__ext">.<?=$file_extantion?></span> -->
				<div class="sertificates__size"><?=$file_size?></div>
			</div>

		<?} else {?>

			<div class="sertificates__icon sertificates__icon_other"><?=$icon?></div>
			<div class="sertificates__description">
				<div class="sertificates__head"><?=$arItem['NAME']?></div>
				<!-- <div class="sertificates__ext">.<?=$file_extantion?></div> -->
				<div class="sertificates__size"><?=$file_size?></div>
			</div>

		<?}?>

	</a>
</div>

<?}?>
 </div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>	