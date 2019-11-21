<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 */
?>
<script id="basket-total-template" type="text/html">
	<div data-entity="basket-checkout-aligner">
		
		<div class="cart-table-footer">
            <div class="cart-table-footer__item-1">
			<a href="/catalog/" class="btn btn--border btn--second-st otstup"><?=Loc::getMessage('SBB_CONTINUE_SHOPPING')?></a>
            <div class="ots"><p>Описание товара, включая изображение не является публичной офертой, носит информационный характер и может отличаться от описания,
                представленного в технической документации производителя. Производитель оставляет за собой право изменять характеристики товара, его внешний вид и комплектность без предварительного уведомления продавца</p>
            </div></div>
			<div class="cart-table-footer__item">

				<div class="table-total"><?=Loc::getMessage('SBB_TOTAL')?>: <span class="new-price" data-entity="basket-total-price">{{{PRICE_FORMATED}}}</span></div>
				<p>После оформления заказа вам позвонит менеджер для обсуждения деталей сделки</p>
				<p><a href="/o-kompanii/#delivery" class="link-content">Ознакомьтесь с уловиями доставки и оплаты</a></p>
				<button class="btn btn--min-width{{#DISABLE_CHECKOUT}} disabled{{/DISABLE_CHECKOUT}}"
					data-entity="basket-checkout-button">
					<?=Loc::getMessage('SBB_ORDER')?>
				</button>
			</div>

		</div>

	</div>
</script>