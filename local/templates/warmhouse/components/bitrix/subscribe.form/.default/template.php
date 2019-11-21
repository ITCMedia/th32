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
?>

<div class="title-site--h2 text--center"><?=GetMessage("subscr_header")?></div>

<div id="subscribe-form" class="modal-cont__form">
<?
$frame = $this->createFrame("subscribe-form", false)->begin();
?>
	<form action="<?=$arResult["FORM_ACTION"]?>">


			<div class="form-group">
				<label for="formEmail2" class="form-group__label"><?=GetMessage("subscr_fild_label")?></label>
				<!-- <input id="formEmail2" class="form-group__field" type="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" required=""> -->
				<input type="text" name="sf_EMAIL" value="<?=$arResult["EMAIL"]?>" title="<?=GetMessage("subscr_form_email_title")?>" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" class="form-group__field" required=""/>
				<div class="error-label">Текст ошибки</div>
			</div>

			<div class="modal-cont-btn">
				<input type="submit" name="OK" value="<?=GetMessage("subscr_form_button")?>" class="btn btn--max"/>
			</div>
			
	</form>
<?
$frame->beginStub();
?>
	<form action="<?=$arResult["FORM_ACTION"]?>">

			<div class="form-group">
				<label for="formEmail2" class="form-group__label"><?=GetMessage("subscr_fild_label")?></label>
				<input type="text" name="sf_EMAIL" value="" title="<?=GetMessage("subscr_form_email_title")?>" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" class="form-group__field" required=""/>
				<div class="error-label">Текст ошибки</div>
			</div>

			<div class="modal-cont-btn">
				<input type="submit" name="OK" value="<?=GetMessage("subscr_form_button")?>" class="btn btn--max"/>
			</div>
			
	</form>
<?
$frame->end();
?>
</div>
