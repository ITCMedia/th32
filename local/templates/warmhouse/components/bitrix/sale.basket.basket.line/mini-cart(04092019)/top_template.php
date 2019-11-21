<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * @global array $arParams
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global string $cartId
 */
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>

	<?if (!$arResult["DISABLE_USE_BASKET"])
	{?>
		<?if ($arParams['BASKET_FOOTER'] == 'Y') {?>
			<a href="javascript:void(0);" class="link-header link-footer">
				<span class="link-header__icon">
					<i class="icon icon-cart-empty2"></i>
				</span>
				<span class="link-header__txt"><?= GetMessage('TSB1_CART') ?> (<?echo $arResult['NUM_PRODUCTS'];?>)</span>
			</a>
		<?} else {?>
			<a href="javascript:void(0);" class="link-header">
				<span class="link-header__icon">
					<i class="icon icon-cart-empty"></i>
				</span>
				<span class="link-header__txt"><?= GetMessage('TSB1_CART') ?> (<?echo $arResult['NUM_PRODUCTS'];?>)</span>
			</a>
		<?}?>
		
			
	<?}?>
		
		
