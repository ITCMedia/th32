<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>

<div class="cabinet">
	<div class="title-site--h1">Личный кабинет</div>

	<?ShowError($arResult["strProfileError"]);?>
	<?
	if ($arResult['DATA_SAVED'] == 'Y')
		ShowNote(GetMessage('PROFILE_DATA_SAVED'));
	?>
	<script type="text/javascript">
	<!--
	var opened_sections = [<?
	$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
	$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
	if (strlen($arResult["opened"]) > 0)
	{
		echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
	}
	else
	{
		$arResult["opened"] = "reg";
		echo "'reg'";
	}
	?>];
	//-->

	var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
	</script>

	<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
		<?=$arResult["BX_SESSION_CHECK"]?>
		<input type="hidden" name="lang" value="<?=LANG?>" />
		<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

		<div class="cabinet-item">
			<div class="title-site--h2">Мои данные</div>
			<div class="ordering-item__form form-group-grid">
				<div class="st-form form-group-grid__half-col">
					
                    <div class="form-group">
                        <label for="login" class="form-group__label"><?=GetMessage('LOGIN')?><span class="starrequired">*</span></label>
                        <input id="login" class="form-group__field" type="text" name="LOGIN" value="<? echo $arResult["arUser"]["LOGIN"]?>"  placeholder="Логин"/>
                    </div>
					

					<?if($arResult["arUser"]["EXTERNAL_AUTH_ID"] == ''):?>
						<div class="form-group">
							<label for="pass" class="form-group__label"><?=GetMessage('NEW_PASSWORD_REQ')?></label>
							<input id="pass" class="form-group__field" type="password" name="NEW_PASSWORD" value="" autocomplete="off" placeholder="<?=GetMessage('NEW_PASSWORD_REQ')?>" />
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
							</div>
					<?endif?>
                    <?if($arResult["arUser"]["EXTERNAL_AUTH_ID"] == ''):?>
                        <div class="form-group">
                            <label for="pass2" class="form-group__label"><?=GetMessage('NEW_PASSWORD_CONFIRM')?></label>
                            <input id="pass2" class="form-group__field" type="password" name="NEW_PASSWORD_CONFIRM" value="" autocomplete="off" placeholder="<?=GetMessage('NEW_PASSWORD_CONFIRM')?>" />
                        </div>
                    <?endif?>
				</div>

				 <div class="st-form form-group-grid__half-col">
                     <div class="form-group">
                         <label for="inp1" class="form-group__label"><?=GetMessage('NAME')?></label>
                         <input id="inp1" type="text" name="NAME" value="<?=$arResult["arUser"]["NAME"]?>" class="form-group__field" placeholder="Иванов Иван Олегович"/>
                     </div>
                     <div class="form-group">
                         <label for="formPhone" class="form-group__label"><?=GetMessage('USER_PHONE')?></label>
                         <input id="formPhone" class="form-group__field mask-phone" type="text" name="PERSONAL_PHONE" value="<?=$arResult["arUser"]["PERSONAL_PHONE"]?>" placeholder="8 (___)-___-__-__" />
                     </div>
					<div class="form-group">
						<label for="formEmail" class="form-group__label"><?=GetMessage('EMAIL')?><?if($arResult["EMAIL_REQUIRED"]):?><span class="starrequired">*</span><?endif?></label>
						<input type="email" id="formEmail" class="form-group__field" name="EMAIL" value="<? echo $arResult["arUser"]["EMAIL"]?>" placeholder="E-mail" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}"/>
					</div>

					

					
					
				</div>

				<div class="st-form form-group-grid__full-col">
					<div class="btn-wrap-form">
						<input type="submit" name="save" class="btn btn--min-width" value="<?=GetMessage("BTN_SAVE")?>">
					</div>
				</div>

			</div>
		</div>
	</form>

	<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
		<?=$arResult["BX_SESSION_CHECK"]?>
		<input type="hidden" name="lang" value="<?=LANG?>" />
		<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

		<div class="cabinet-item">
				<div class="title-site--h2">Мои адреса</div>
					<div class="ordering-item__form form-group-grid">
						<div class="st-form form-group-grid__full-col">
							<div class="form-group">
								<label for="inp2" class="form-group__label"><?=GetMessage('USER_CITY')?></label>
								<input id="inp2" class="form-group__field" type="text" name="PERSONAL_CITY" value="<?=$arResult["arUser"]["PERSONAL_CITY"]?>" placeholder="г. Брянск, ул. Ульянова, д. 54, кв.234" />
							</div>
						</div>

					<div class="st-form form-group-grid__full-col">
						<div class="btn-wrap-form">
							<input type="submit" name="save" class="btn btn--min-width" value="<?=GetMessage("BTN_SAVE")?>">
						</div>
					</div>
				</div>
			</div>
	</form>
<?
if($arResult["SOCSERV_ENABLED"])
{
	$APPLICATION->IncludeComponent("bitrix:socserv.auth.split", ".default", array(
			"SHOW_PROFILES" => "Y",
			"ALLOW_DELETE" => "Y"
		),
		false
	);
}
?>
</div>