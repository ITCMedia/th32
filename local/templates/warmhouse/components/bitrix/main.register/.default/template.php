<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
?>


<?if($USER->IsAuthorized()):?>

	<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>

<?else:?>
<?
if (count($arResult["ERRORS"]) > 0):
	foreach ($arResult["ERRORS"] as $key => $error) {
		if (intval($key) == 0 && $key !== 0) 
			$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);
	}

	ShowError(implode("<br />", $arResult["ERRORS"]));

elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
?>
<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
<?endif?>


<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data" class="modal-cont__form">
<?
if($arResult["BACKURL"] <> ''):
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
endif;
?>

<?foreach ($arResult["SHOW_FIELDS"] as $FIELD):?>
	<div class="form-group">
	<?if ($FIELD !== "POLICY") {?>
		<label class="form-group__label"><?if ($FIELD == 'NAME') {?><?=GetMessage("REGISTER_FIELD_FIO")?><?}else{?><?=GetMessage("REGISTER_FIELD_".$FIELD)?><?}?><?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><span class="starrequired">*</span><?endif?></label>
	<?}?>


		<?
	switch ($FIELD)
	{
		case "PASSWORD":
			?>
			<input id="formPassword-modal" class="form-group__field bx-auth-input" type="password" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" pattern="{6}" title="Не менее восьми символов, содержащих хотя бы одну цифру и символы из верхнего и нижнего регистра" required=""/>
			<?if($arResult["SECURE_AUTH"]):?>
							<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
								<div class="bx-auth-secure-icon"></div>
							</span>
							<noscript>
							<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
								<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
							</span>
							</noscript>
			<script type="text/javascript">
			document.getElementById('bx_auth_secure').style.display = 'inline-block';
			</script>
			<?endif?>
		<?
			break;
		case "CONFIRM_PASSWORD":
		?><input class="form-group__field" type="password" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" pattern="{6}" title="Не менее восьми символов, содержащих хотя бы одну цифру и символы из верхнего и нижнего регистра" required=""/><?
			break;

		case "PERSONAL_GENDER":
			?><select name="REGISTER[<?=$FIELD?>]">
				<option value=""><?=GetMessage("USER_DONT_KNOW")?></option>
				<option value="M"<?=$arResult["VALUES"][$FIELD] == "M" ? " selected=\"selected\"" : ""?>><?=GetMessage("USER_MALE")?></option>
				<option value="F"<?=$arResult["VALUES"][$FIELD] == "F" ? " selected=\"selected\"" : ""?>><?=GetMessage("USER_FEMALE")?></option>
			</select><?
			break;

		case "PERSONAL_COUNTRY":
		case "WORK_COUNTRY":
			?><select name="REGISTER[<?=$FIELD?>]"><?
			foreach ($arResult["COUNTRIES"]["reference_id"] as $key => $value)
			{
				?><option value="<?=$value?>"<?if ($value == $arResult["VALUES"][$FIELD]):?> selected="selected"<?endif?>><?=$arResult["COUNTRIES"]["reference"][$key]?></option>
			<?
			}
			?></select><?
			break;

		case "PERSONAL_PHOTO":
		case "WORK_LOGO":
			?><input size="30" type="file" name="REGISTER_FILES_<?=$FIELD?>" /><?
			break;

		case "PERSONAL_NOTES":
		case "WORK_NOTES":
			?><textarea cols="30" rows="5" name="REGISTER[<?=$FIELD?>]"><?=$arResult["VALUES"][$FIELD]?></textarea><?
			break;
		default:
			if ($FIELD == "PERSONAL_BIRTHDAY"):?><small><?=$arResult["DATE_FORMAT"]?></small><br /><?endif;
			?>
			<?if ($FIELD == 'PERSONAL_PHONE') {?>
				<input class="form-group__field mask-phone" type="tel" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" placeholder="8 (___)-___-__-__" <?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?>required=""<?endif?>>
			<?} else {?>
				<input class="form-group__field" type="text" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" <?if ($FIELD == 'PERSONAL_PHONE') {?>pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}"<?}?> <?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?>required=""<?endif?> />
			<?}?>
		<?
				if ($FIELD == "PERSONAL_BIRTHDAY")
					$APPLICATION->IncludeComponent(
						'bitrix:main.calendar',
						'',
						array(
							'SHOW_INPUT' => 'N',
							'FORM_NAME' => 'regform',
							'INPUT_NAME' => 'REGISTER[PERSONAL_BIRTHDAY]',
							'SHOW_TIME' => 'N'
						),
						null,
						array("HIDE_ICONS"=>"Y")
					);
		?><?
	}?>
		<div class="error-label">Текст ошибки</div>
	</div>
<?endforeach?>
<?// ********************* User properties ***************************************************?>
<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
	<?/*?><div><?=strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></div><?*/?>
	<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
	<?if ($arUserField["XML_ID"] !== "UF_POLICY") {?>
		<div><?=$arUserField["EDIT_FORM_LABEL"]?>:<?if ($arUserField["MANDATORY"]=="Y"):?><span class="starrequired">*</span><?endif;?></div>
		<?$APPLICATION->IncludeComponent(
			"bitrix:system.field.edit",
			$arUserField["USER_TYPE"]["USER_TYPE_ID"],
			array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "regform"), null, array("HIDE_ICONS"=>"Y"));?>
	<?}?>
	<?if ($arUserField["XML_ID"] == "UF_POLICY") {?>
		<input id="politics" type="checkbox" value="1" name="UF_POLICY" checked="checked">Я согласен с <a href='politika-konfidentsialnosti'>политикой конфиденциальности</a> сайта.</td></tr>
	<?} else {?></td></tr><?}?>
	<?endforeach;?>
<?endif;?>
<?// ******************** /User properties ***************************************************?>
<div class="modal-cont-btn">
	<input type="submit" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER")?>" class="btn btn--max"/>
</div>
<script>
function check() {
var submit = document.getElementsByName('submit')[0];
if (document.getElementById('politics').checked)
submit.disabled = '';
else
submit.disabled = 'disabled';
}
</script>
</form>
<?endif?>
