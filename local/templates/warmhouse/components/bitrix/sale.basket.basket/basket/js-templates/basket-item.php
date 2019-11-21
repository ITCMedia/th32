<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $mobileColumns
 * @var array $arParams
 * @var string $templateFolder
 */

$usePriceInAdditionalColumn = in_array('PRICE', $arParams['COLUMNS_LIST']) && $arParams['PRICE_DISPLAY_MODE'] === 'Y';
$useSumColumn = in_array('SUM', $arParams['COLUMNS_LIST']);
$useActionColumn = in_array('DELETE', $arParams['COLUMNS_LIST']);

$restoreColSpan = 2 + $usePriceInAdditionalColumn + $useSumColumn + $useActionColumn;

$positionClassMap = array(
	'left' => 'basket-item-label-left',
	'center' => 'basket-item-label-center',
	'right' => 'basket-item-label-right',
	'bottom' => 'basket-item-label-bottom',
	'middle' => 'basket-item-label-middle',
	'top' => 'basket-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}
?>

<script id="basket-item-template" type="text/html">
	<div class="cart-table-row" id="basket-item-{{ID}}" data-entity="basket-item" data-id="{{ID}}">
		{{^SHOW_RESTORE}}
			<div class="cart-table-td cart-table-td--1" id="basket-item-height-aligner-{{ID}}">
				
					<?
					if (in_array('PREVIEW_PICTURE', $arParams['COLUMNS_LIST']))
					{
						?>
						<div class="cart-table-img">
							{{#DETAIL_PAGE_URL}}
								<a href="{{DETAIL_PAGE_URL}}">
							{{/DETAIL_PAGE_URL}}

							<img class="basket-item-image" alt="{{NAME}}"
								src="{{{IMAGE_URL}}}{{^IMAGE_URL}}<?=$templateFolder?>/images/no_photo.png{{/IMAGE_URL}}">

							{{#DETAIL_PAGE_URL}}
								</a>
							{{/DETAIL_PAGE_URL}}
						</div>
						<?
					}
					?>
					<div class="cart-table-info">
						
							{{#DETAIL_PAGE_URL}}
								<a href="{{DETAIL_PAGE_URL}}">
							{{/DETAIL_PAGE_URL}}
	
								{{NAME}}

							{{#DETAIL_PAGE_URL}}
								</a>
							{{/DETAIL_PAGE_URL}}

							<?
							if (!empty($arParams['PRODUCT_BLOCKS_ORDER']))
							{
								foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName)
								{
									switch (trim((string)$blockName))
									{
										
										
										case 'columns':
										    //debug($arResult['GRID']['ROWS'][]);
											?>
											
											{{#COLUMN_LIST}}
												
												{{#IS_TEXT}}
													<div class="vendor-code" data-entity="basket-item-property">{{NAME}}: {{VALUE}}</div>
												{{/IS_TEXT}}

											{{/COLUMN_LIST}}
											<?
											break;
									}
								}
							}
							?>
						
					</div>
			</div>

			<?
			if ($usePriceInAdditionalColumn)
			{
				?>
				<div class="cart-table-td cart-table-td--2">
					<div class="price-wrap">
						{{#SHOW_DISCOUNT_PRICE}}
							<div class="old-price">{{{FULL_PRICE_FORMATED}}}</div>
						{{/SHOW_DISCOUNT_PRICE}}

						<div class="new-price" id="basket-item-price-{{ID}}">{{{PRICE_FORMATED}}}</div>
					</div>
				</div>
				<?
			}
			?>


			<div class="cart-table-td cart-table-td--3 hidden-mobile">
				<span>{{MEASURE_TEXT}}</span>
			</div>

		

			<div class="cart-table-td cart-table-td--4">
				<div class="col-panel-tc{{#NOT_AVAILABLE}} disabled{{/NOT_AVAILABLE}}"
					data-entity="basket-item-quantity-block">
					<span class="minus-input" data-entity="basket-item-quantity-minus">-</span>
					<div class="basket-item-amount-filed-block">
						<input type="text" class="basket-item-amount-filed" value="{{QUANTITY}}"
							{{#NOT_AVAILABLE}} disabled="disabled"{{/NOT_AVAILABLE}}
							data-value="{{QUANTITY}}" data-entity="basket-item-quantity-field"
							id="basket-item-quantity-{{ID}}">
					</div>
					<span class="plus-input" data-entity="basket-item-quantity-plus">+</span>
					
				</div>
			</div>


			<?
			if ($useSumColumn)
			{
				?>
				<div class="cart-table-td cart-table-td--5">
					<div class="price-wrap">
						{{#SHOW_DISCOUNT_PRICE}}
							<div class="old-price" id="basket-item-sum-price-old-{{ID}}">{{{SUM_FULL_PRICE_FORMATED}}}</div>
						{{/SHOW_DISCOUNT_PRICE}}

						<div class="new-price" id="basket-item-sum-price-{{ID}}">{{{SUM_PRICE_FORMATED}}}</div>
					</div>
				</div>
				
				<?
			}

			if ($useActionColumn)
			{
				?>
					<div class="cart-table-td cart-table-td--6">
						<span class="link-close" data-entity="basket-item-delete"><i class="icon icon-close"></i></span>
						<a href="#feedback-cart" data-fancybox class="link-dotted found-a-cheaper" data-product='{{NAME}}'>Нашел дешевле</a>
					</div>
				
				<?
			}
			?>
		{{/SHOW_RESTORE}}
	</div>
</script>