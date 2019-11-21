<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

ShowMessage($arParams["~AUTH_RESULT"]);

?>
<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" >
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	<p>
	<?=GetMessage("AUTH_FORGOT_PASSWORD_1")?>
	</p>


	<p><b><?=GetMessage("AUTH_GET_CHECK_STRING")?></b></p>

	<div style="max-width: 290px;">
		<div class="form-group">
			<label class="form-group__label"><?=GetMessage("AUTH_LOGIN")?></label>
			<input type="text" class="form-group__field" name="USER_LOGIN" value="<?=$arResult["LAST_LOGIN"]?>" >
		</div>

		<p><?=GetMessage("AUTH_OR")?></p>

		<div class="form-group">
			<label class="form-group__label"><?=GetMessage("AUTH_EMAIL")?></label>
			<input type="text" name="USER_EMAIL" class="form-group__field" />
		</div>

		<input type="submit" name="send_account_info" class="btn btn--max" value="<?=GetMessage('AUTH_SEND')?>" />
	</div>

</form>
<style>
    .header-nav .menu li:first-child ul {
        display: none;
    }
    .header-nav .menu li:first-child:hover ul {
        display: block;
    }
</style>
<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>
