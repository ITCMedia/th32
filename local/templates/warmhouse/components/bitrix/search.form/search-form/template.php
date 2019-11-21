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
$this->setFrameMode(true);?>

<div class="search">
	<form action="<?=$arResult["FORM_ACTION"]?>" class="search-form">
		<input type="text" name="q" placeholder="<?=GetMessage("BSF_T_SEARCH_BUTTON");?>">

		

		<input name="s" type="submit" value="" class="btn-search"/>
	</form>
</div>