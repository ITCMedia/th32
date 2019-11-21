<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main,
	Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/script.js");
Asset::getInstance()->addCss("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/style.css");
$this->addExternalCss("/bitrix/css/main/bootstrap.css");
CJSCore::Init(array('clipboard', 'fx'));

Loc::loadMessages(__FILE__);?>

<?if (!empty($arResult['ERRORS']['FATAL']))
{
	foreach($arResult['ERRORS']['FATAL'] as $error)
	{
		ShowError($error);
	}
	$component = $this->__component;
	if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED]))
	{
		$APPLICATION->AuthForm('', false, false, 'N', false);
	}

}else{
	if (!empty($arResult['ERRORS']['NONFATAL'])){
		foreach($arResult['ERRORS']['NONFATAL'] as $error){
			ShowError($error);
		}
	}
	if (!count($arResult['ORDERS'])){
		if ($_REQUEST["filter_history"] == 'Y')
		{
			if ($_REQUEST["show_canceled"] == 'Y')
			{
				?>
				<h3><?= Loc::getMessage('SPOL_TPL_EMPTY_CANCELED_ORDER')?></h3>
				<?
			}
			else
			{
				?>
				<h3><?= Loc::getMessage('SPOL_TPL_EMPTY_HISTORY_ORDER_LIST')?></h3>
				<?
			}
		}
		else
		{
			?>
			<h3><?= Loc::getMessage('SPOL_TPL_EMPTY_ORDER_LIST')?></h3>
			<?
		}
	}?>
	<div class="cabinet">
  	<div class="title-site--h1">Личный кабинет</div>
		<div class="cabinet-item">
  		<div class="title-site--h2">Мои заказы</div>
			<div class="order-table">
	      <div class="order-table__head">
	        <div class="order-table-td order-table-td--1"><?=Loc::getMessage('SPOL_TPL_ORDER')?></div>
	        <div class="order-table-td order-table-td--2"><?=Loc::getMessage('SPOL_TPL_STATUS')?></div>
	        <div class="order-table-td order-table-td--3"><?=Loc::getMessage('SPOL_TPL_COMMENT')?></div>
	        <div class="order-table-td order-table-td--4"><?=Loc::getMessage('SPOL_TPL_ADDRESS')?></div>
	        <div class="order-table-td order-table-td--5 order-table-td--right"><?=Loc::getMessage('SPOL_TPL_SUM_FULL')?></div>
	        <div class="order-table-td order-table-td--6 order-table-td--right"><?=Loc::getMessage('SPOL_TPL_SUM_TO_PAID')?></div>
	      </div>

		
	<?if ($_REQUEST["filter_history"] !== 'Y'){
		$paymentChangeData = array();
		$orderHeaderStatus = null;
        $rsUser = CUser::GetByID($USER->GetID());
        $arUser = $rsUser->Fetch();
//        echo "<pre>"; print_r($arUser['PERSONAL_CITY']); echo "</pre>";
		foreach ($arResult['ORDERS'] as $key => $order){
		    
		    ?>
			<div class="order-table__body">
        <div class="order-table-td order-table-td--1">
          <span class="order-table-td__tt"><?=Loc::getMessage('SPOL_TPL_ORDER')?></span>
          <span><?=Loc::getMessage('SPOL_TPL_ORDER_ID', array("#ORDER_NUMBER#" => $order['ORDER']['ACCOUNT_NUMBER']))?></span>
        </div>
        <div class="order-table-td order-table-td--2">
          <span class="order-table-td__tt"><?=Loc::getMessage('SPOL_TPL_STATUS')?></span>
          <div class="availability">
            <span class="availability__ic">
              <i class="icon icon-tick"></i>
            </span>
            <span class="availability__txt"><?=$arResult['INFO']['STATUS'][$order['ORDER']['STATUS_ID']]['NAME']?></span>
          </div>
        </div>
        <div class="order-table-td order-table-td--3">
          <span class="order-table-td__tt"><?=Loc::getMessage('SPOL_TPL_COMMENT')?></span>
          <span><?=$order['ORDER']['USER_DESCRIPTION']?></span>
        </div>
        <div class="order-table-td order-table-td--4">
          <span class="order-table-td__tt"><?=Loc::getMessage('SPOL_TPL_ADDRESS')?></span>
          <span>
          	<?/*if(!empty($order['PROPERTIES']['ADDRESS']['VALUE'])){
	          	echo $order['PROPERTIES']['ADDRESS']['VALUE'];
	          }else{
	          	echo Loc::getMessage('SPOL_TPL_ADDRESS_EMPTY');
	          }*/
            echo $arUser['PERSONAL_CITY'];
            ?>
          </span>
        </div>
        <div class="order-table-td order-table-td--right order-table-td--5">
          <span class="order-table-td__tt"><?=Loc::getMessage('SPOL_TPL_SUM_FULL')?></span>
          <span class="new-price"><?=number_format($order['ORDER']['PRICE'], 0, ',', ' ');?><span class="rubl">₽</span></span>
        </div>
        <div class="order-table-td order-table-td--right order-table-td--6">
          <span class="order-table-td__tt"><?=Loc::getMessage('SPOL_TPL_SUM_TO_PAID')?></span>
          <span class="new-price"><?=number_format($order['ORDER']['SUM_PAID'], 0, ',', ' ');?><span class="rubl">₽</span></span>
        </div>
        <div class="order-table-td-line hidden-devices"></div>
        <div class="order-table-td--full">
        	<?if($order["ORDER"]['PAY_SYSTEM_ID'] == 3){ // если оплата по счету, то выводим иконку печати счета?>
				<a href="/cart/order/?ORDER_ID=<?=$order["ORDER"]["ACCOUNT_NUMBER"]?>&view=Y" class="btn btn--border btn--second-st" target="_blank">
		            <i class="icon icon-print"></i>
		      	</a>
    		<?}?>
          
          <a href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"])?>" class="btn btn--border btn--min-width btn--second-st"><?=Loc::getMessage('SPOL_TPL_REPEAT_ORDER')?></a>
        </div>
      </div>
			
			<?
		}
	}
	else
	{
		$orderHeaderStatus = null;

		if ($_REQUEST["show_canceled"] === 'Y' && count($arResult['ORDERS']))
		{
			?>
			<h1 class="sale-order-title">
				<?= Loc::getMessage('SPOL_TPL_ORDERS_CANCELED_HEADER') ?>
			</h1>
			<?
		}

		foreach ($arResult['ORDERS'] as $key => $order)
		{
			?>
			<div class="order-table__body">
        <div class="order-table-td order-table-td--1">
          <span class="order-table-td__tt"><?=Loc::getMessage('SPOL_TPL_ORDER')?></span>
          <span><?=Loc::getMessage('SPOL_TPL_ORDER_ID', array("#ORDER_NUMBER#" => $order['ORDER']['ACCOUNT_NUMBER']))?></span>
        </div>
        <div class="order-table-td order-table-td--2">
          <span class="order-table-td__tt"><?=Loc::getMessage('SPOL_TPL_STATUS')?></span>
          <div class="availability">
            <span class="availability__ic">
              <i class="icon icon-tick"></i>
            </span>
            <span class="availability__txt"><?=$arResult['INFO']['STATUS'][$order['ORDER']['STATUS_ID']]['NAME']?></span>
          </div>
        </div>
        <div class="order-table-td order-table-td--3">
          <span class="order-table-td__tt"><?=Loc::getMessage('SPOL_TPL_COMMENT')?></span>
          <span><?=$order['ORDER']['USER_DESCRIPTION']?></span>
        </div>
        <div class="order-table-td order-table-td--4">
          <span class="order-table-td__tt"><?=Loc::getMessage('SPOL_TPL_ADDRESS')?></span>
          <span>
          	<?if(!empty($order['PROPERTIES']['ADDRESS']['VALUE'])){
	          	echo $order['PROPERTIES']['ADDRESS']['VALUE'];
	          }else{
	          	echo Loc::getMessage('SPOL_TPL_ADDRESS_EMPTY');
	          }?>
          </span>
        </div>
        <div class="order-table-td order-table-td--right order-table-td--5">
          <span class="order-table-td__tt"><?=Loc::getMessage('SPOL_TPL_SUM_FULL')?></span>
          <span class="new-price"><?=number_format($order['ORDER']['PRICE'], 0, ',', ' ');?><span class="rubl">₽</span></span>
        </div>
        <div class="order-table-td order-table-td--right order-table-td--6">
          <span class="order-table-td__tt"><?=Loc::getMessage('SPOL_TPL_SUM_TO_PAID')?></span>
          <span class="new-price"><?=number_format($order['ORDER']['SUM_PAID'], 0, ',', ' ');?><span class="rubl">₽</span></span>
        </div>
        <div class="order-table-td-line hidden-devices"></div>
        <div class="order-table-td--full">
          <a href="#" class="btn btn--border btn--second-st">
            <i class="icon icon-print"></i>
          </a>
          <a href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"])?>" class="btn btn--border btn--min-width btn--second-st"><?=Loc::getMessage('SPOL_TPL_REPEAT_ORDER')?></a>
        </div>
      </div>
			<?
		}
	}
	?>
	<div class="clearfix"></div>
	<?
	echo $arResult["NAV_STRING"];

	if ($_REQUEST["filter_history"] !== 'Y')
	{
		$javascriptParams = array(
			"url" => CUtil::JSEscape($this->__component->GetPath().'/ajax.php'),
			"templateFolder" => CUtil::JSEscape($templateFolder),
			"templateName" => $this->__component->GetTemplateName(),
			"paymentList" => $paymentChangeData
		);
		$javascriptParams = CUtil::PhpToJSObject($javascriptParams);
		?>
		<script>
			BX.Sale.PersonalOrderComponent.PersonalOrderList.init(<?=$javascriptParams?>);
		</script>
		<?
	}
}
?>
		</div>
	</div>
</div>