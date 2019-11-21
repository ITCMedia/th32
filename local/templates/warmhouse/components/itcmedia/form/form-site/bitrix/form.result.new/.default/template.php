<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
?>

<?
if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y")
{
?>
<?
/***********************************************************************************
					form header
***********************************************************************************/
	if ($arResult["isFormTitle"])
	{
	?>
		<div class="title-site--h2 text--center"><?=$arResult["FORM_TITLE"]?></div>
	<?
	} //endif 

} // endif
	?>
<?=$arResult["FORM_HEADER"]?>

<?
/***********************************************************************************
						form questions
***********************************************************************************/
?>

	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
	?>
		<div class="form-group">
			<label for="inp-modal2" class="form-group__label">
				<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
			</label>

			<?=$arQuestion["HTML_CODE"]?>
			
			<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
			<div class="error-label"><?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?></div>
			<?endif;?>
			
		</div>
		
	<?
	} //endwhile
	?>
    
    <?if ($arParams['USER_CONSENT'] == 'Y'):?>
    <?$APPLICATION->
    IncludeComponent("bitrix:main.userconsent.request","sogl",array("ID" => $arParams["USER_CONSENT_ID"],"IS_CHECKED" => $arParams["USER_CONSENT_IS_CHECKED"],"AUTO_SAVE" => "Y","IS_LOADED" => $arParams["USER_CONSENT_IS_LOADED"],"REPLACE" => array('button_caption' => 'Отправить','fields' => array('Email', 'Телефон', 'Имя')),));?>
<?endif;?>
	<div class="modal-cont-btn">
		<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" class="btn btn--max"/>
	</div>

<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>