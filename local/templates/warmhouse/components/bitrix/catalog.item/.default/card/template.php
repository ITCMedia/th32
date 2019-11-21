<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
?>
	<?if ($arResult['ITEM']['PROPERTIES']['DISCOUNT']['VALUE']) {?>
		<div class="catalog-item__sale"><?=$arResult['ITEM']['PROPERTIES']['DISCOUNT']['VALUE']?></div>
	<?}?>

	<a class="catalog-item__img" href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$imgTitle?>"
		data-entity="image-wrapper">
		<img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="">

		<span style="display: none;">
			<span class="product-item-image-slider-slide-container slide" id="<?=$itemIds['PICT_SLIDER']?>"
				<?=($showSlider ? '' : 'style="display: none;"')?>
				data-slider-interval="<?=$arParams['SLIDER_INTERVAL']?>" data-slider-wrap="true">
				<?
				if ($showSlider)
				{
					foreach ($morePhoto as $key => $photo)
					{
						?>
						<span class="product-item-image-slide item <?=($key == 0 ? 'active' : '')?>"
							style="background-image: url('<?=$photo['SRC']?>');">
						</span>
						<?
					}
				}
				?>
			</span>
			
			<?
			if ($item['SECOND_PICT'])
			{
				$bgImage = !empty($item['PREVIEW_PICTURE_SECOND']) ? $item['PREVIEW_PICTURE_SECOND']['SRC'] : $item['PREVIEW_PICTURE']['SRC'];
				?>
				<span class="product-item-image-alternative" id="<?=$itemIds['SECOND_PICT']?>"
					style="background-image: url('<?=$bgImage?>'); <?=($showSlider ? 'display: none;' : '')?>">
				</span>
				<?
			}
			?>
		</span>
	</a>

	<a href="<?=$item['DETAIL_PAGE_URL']?>" class="catalog-item__link"><?=$productTitle?><div class="artikul">артикул: <span style="font-weight: bold"><?=$arResult['ITEM']['PROPERTIES']['CML2_ARTICLE']['VALUE']?></span></div></a>

	<?/*if ($actualItem['CAN_BUY'])
	{?>
		<div class="availability">
			<span class="availability__ic">
				<i class="icon icon-tick"></i>
			</span>
			<span class="availability__txt">в наличии</span>
		</div>
	<?}
	else
	{?>
		<div class="availability availability--no">
			<span class="availability__ic availability__ic--no">
				<i class="icon icon-cross"></i>
			</span>
			<span class="availability__txt"><?=$arParams['MESS_NOT_AVAILABLE']?></span>
		</div>
	<?}*/?>

	<div class="catalog-item__price" data-entity="price-block">
		<div class="price">
			<?if ($arResult['ITEM']['PROPERTIES']['OLD_PRICE']['VALUE']) {?>
				<div class="old-price"><?=$arResult['ITEM']['PROPERTIES']['OLD_PRICE']['VALUE']?></div>
			<?}?>
			<?//debug($arResult['ITEM']['PRICES']);?>
			<div class="new-price" id="<?=$itemIds['PRICE']?>">
				<?=$arResult['ITEM']['PRICES']['Цена РРЦ']['PRINT_DISCOUNT_VALUE'];?>
			</div>
		</div>

		<?/*if (!$haveOffers)
		{
			if ($actualItem['CAN_BUY'] && $arParams['USE_PRODUCT_QUANTITY'])
			{?>
				<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
					<div class="product-item-amount">
						<div class="product-item-amount-field-container">
							<span class="product-item-amount-field-btn-minus no-select" id="<?=$itemIds['QUANTITY_DOWN']?>"></span>
							<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY']?>" type="number"
								name="<?=$arParams['PRODUCT_QUANTITY_VARIABLE']?>"
								value="<?=$measureRatio?>">
							<span class="product-item-amount-field-btn-plus no-select" id="<?=$itemIds['QUANTITY_UP']?>"></span>
							<span class="product-item-amount-description-container" style="display: none;">
								<span id="<?=$itemIds['QUANTITY_MEASURE']?>">
									<?=$actualItem['ITEM_MEASURE']['TITLE']?>
								</span>
								<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
							</span>
						</div>
					</div>
				</div>
			<?}
		}
		elseif ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
		{
			if ($arParams['USE_PRODUCT_QUANTITY'])
			{
			?>
				<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
					<div class="product-item-amount">
						<div class="product-item-amount-field-container">
							<span class="product-item-amount-field-btn-minus no-select" id="<?=$itemIds['QUANTITY_DOWN']?>"></span>
							<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY']?>" type="number"
								name="<?=$arParams['PRODUCT_QUANTITY_VARIABLE']?>"
								value="<?=$measureRatio?>">
							<span class="product-item-amount-field-btn-plus no-select" id="<?=$itemIds['QUANTITY_UP']?>"></span>
							<span class="product-item-amount-description-container" style="display: none;">
								<span id="<?=$itemIds['QUANTITY_MEASURE']?>"><?=$actualItem['ITEM_MEASURE']['TITLE']?></span>
								<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
							</span>
						</div>
					</div>
				</div>
				<?
			}
		}*/?>

		<?/*if ($actualItem['CAN_BUY'])
		{
			*/?>
			<span id="<?//=$itemIds['BASKET_ACTIONS']?>">
				<a class="btn" id="<?=$arResult['ITEM']['ID']//$itemIds['BUY_LINK']?>" href="javascript:void(0)" rel="nofollow">
					<i class="icon icon-basket"></i>
				</a>
			</span>
		<?/*
		}*/?>
	</div>

<div id="ajax-add-answer-<?=$arResult['ITEM']['ID']?>" class="col-md-12 catalog-popup-item" style="display:none;">
	<br/><br/>
	<a href="#" class="catalog-item__link"><?=$productTitle?></a><br/>
	<div class="catalog-item__img">
		<img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="">
	</div>
	<?
	if (!empty($arParams['PRODUCT_BLOCKS_ORDER']))
	{
		foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName)
		{
			switch ($blockName)
			{
				case 'price': ?>
					<div class="product-item-info-container product-item-price-container" data-entity="price-block">
						<?
						if ($arParams['SHOW_OLD_PRICE'] === 'Y')
						{
							?>
							<span class="product-item-price-old" id="<?=$itemIds['PRICE_OLD']?>"
								<?=($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '')?>>
								<?=$price['PRINT_RATIO_BASE_PRICE']?>
							</span>&nbsp;
							<?
						}
						?>
						<span class="product-item-price-current" id="<?=$itemIds['PRICE']?>">
							<?
							if (!empty($price))
							{
								if ($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers)
								{
									echo Loc::getMessage(
										'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
										array(
											'#PRICE#' => $price['PRINT_RATIO_PRICE'],
											'#VALUE#' => $measureRatio,
											'#UNIT#' => $minOffer['ITEM_MEASURE']['TITLE']
										)
									);
								}
								else
								{
									echo $price['PRINT_RATIO_PRICE'];
								}
							}
							?>
						</span>
					</div>
					<?
					break;

				

				case 'quantity':
					if (!$haveOffers)
					{
						if ($actualItem['CAN_BUY'] && $arParams['USE_PRODUCT_QUANTITY'])
						{
							?>
							<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
								<div class="product-item-amount">
									<div class="product-item-amount-field-container">
										<span class="product-item-amount-field-btn-minus no-select" id="<?=$itemIds['QUANTITY_DOWN']?>"></span>
										<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY']?>" type="number"
											name="<?=$arParams['PRODUCT_QUANTITY_VARIABLE']?>"
											value="<?=$measureRatio?>">
										<span class="product-item-amount-field-btn-plus no-select" id="<?=$itemIds['QUANTITY_UP']?>"></span>
										<span class="product-item-amount-description-container">
											<span id="<?=$itemIds['QUANTITY_MEASURE']?>">
												<?=$actualItem['ITEM_MEASURE']['TITLE']?>
											</span>
											<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
										</span>
									</div>
								</div>
							</div>
							<?
						}
					}
					elseif ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
					{
						if ($arParams['USE_PRODUCT_QUANTITY'])
						{
							?>
							<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
								<div class="product-item-amount">
									<div class="product-item-amount-field-container">
										<span class="product-item-amount-field-btn-minus no-select" id="<?=$itemIds['QUANTITY_DOWN']?>"></span>
										<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY']?>" type="number"
											name="<?=$arParams['PRODUCT_QUANTITY_VARIABLE']?>"
											value="<?=$measureRatio?>">
										<span class="product-item-amount-field-btn-plus no-select" id="<?=$itemIds['QUANTITY_UP']?>"></span>
										<span class="product-item-amount-description-container">
											<span id="<?=$itemIds['QUANTITY_MEASURE']?>"><?=$actualItem['ITEM_MEASURE']['TITLE']?></span>
											<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
										</span>
									</div>
								</div>
							</div>
							<?
						}
					}

					break;

				case 'buttons':
					?>
					<div class="product-item-info-container product-item-hidden" data-entity="buttons-block">
						<?
						if (!$haveOffers)
						{
							if ($actualItem['CAN_BUY'])
							{
								?>
								<div class="product-item-button-container" id="<?=$itemIds['BASKET_ACTIONS']?>">
									<a class="btn btn-default <?=$buttonSizeClass?>" id="<?=$itemIds['BUY_LINK']?>"
										href="javascript:void(0)" rel="nofollow">
										<?=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])?>
									</a>
								</div>
								<?
							}
							else
							{
								?>
								<div class="product-item-button-container">
									<?
									if ($showSubscribe)
									{
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.product.subscribe',
											'',
											array(
												'PRODUCT_ID' => $actualItem['ID'],
												'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
												'BUTTON_CLASS' => 'btn btn-default '.$buttonSizeClass,
												'DEFAULT_DISPLAY' => true,
												'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
									}
									?>
									<a class="btn btn-link <?=$buttonSizeClass?>"
										id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" href="javascript:void(0)" rel="nofollow">
										<?=$arParams['MESS_NOT_AVAILABLE']?>
									</a>
								</div>
								<?
							}
						}
						else
						{
							if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
							{
								?>
								<div class="product-item-button-container">
									<?
									if ($showSubscribe)
									{
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.product.subscribe',
											'',
											array(
												'PRODUCT_ID' => $item['ID'],
												'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
												'BUTTON_CLASS' => 'btn btn-default '.$buttonSizeClass,
												'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
												'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
									}
									?>
									<a class="btn btn-link <?=$buttonSizeClass?>"
										id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" href="javascript:void(0)" rel="nofollow"
										<?=($actualItem['CAN_BUY'] ? 'style="display: none;"' : '')?>>
										<?=$arParams['MESS_NOT_AVAILABLE']?>
									</a>
									<div id="<?=$itemIds['BASKET_ACTIONS']?>" <?=($actualItem['CAN_BUY'] ? '' : 'style="display: none;"')?>>
										<a class="btn btn-default <?=$buttonSizeClass?>" id="<?=$itemIds['BUY_LINK']?>"
											href="javascript:void(0)" rel="nofollow">
											<?=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])?>
										</a>
									</div>
								</div>
								<?
							}
							else
							{
								?>
								<div class="product-item-button-container">
									<a class="btn btn-default <?=$buttonSizeClass?>" href="<?=$item['DETAIL_PAGE_URL']?>">
										<?=$arParams['MESS_BTN_DETAIL']?>
									</a>
								</div>
								<?
							}
						}
						?>
					</div>
					<?
					break;

				
				case 'sku':
					if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $haveOffers && !empty($item['OFFERS_PROP']))
					{
						?>
						<div id="<?=$itemIds['PROP_DIV']?>">
							<?
							foreach ($arParams['SKU_PROPS'] as $skuProperty)
							{
								$propertyId = $skuProperty['ID'];
								$skuProperty['NAME'] = htmlspecialcharsbx($skuProperty['NAME']);
								if (!isset($item['SKU_TREE_VALUES'][$propertyId]))
									continue;
								?>
								<div class="product-item-info-container product-item-hidden" data-entity="sku-block">
									<div class="product-item-scu-container" data-entity="sku-line-block">
										<?=$skuProperty['NAME']?>
										<div class="product-item-scu-block">
											<div class="product-item-scu-list">
												<ul class="product-item-scu-item-list">
													<?
													foreach ($skuProperty['VALUES'] as $value)
													{
														if (!isset($item['SKU_TREE_VALUES'][$propertyId][$value['ID']]))
															continue;

														$value['NAME'] = htmlspecialcharsbx($value['NAME']);

														if ($skuProperty['SHOW_MODE'] === 'PICT')
														{
															?>
															<li class="product-item-scu-item-color-container" title="<?=$value['NAME']?>"
																data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
																<div class="product-item-scu-item-color-block">
																	<div class="product-item-scu-item-color" title="<?=$value['NAME']?>"
																		style="background-image: url('<?=$value['PICT']['SRC']?>');">
																	</div>
																</div>
															</li>
															<?
														}
														else
														{
															?>
															<li class="product-item-scu-item-text-container" title="<?=$value['NAME']?>"
																data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
																<div class="product-item-scu-item-text-block">
																	<div class="product-item-scu-item-text"><?=$value['NAME']?></div>
																</div>
															</li>
															<?
														}
													}
													?>
												</ul>
												<div style="clear: both;"></div>
											</div>
										</div>
									</div>
								</div>
								<?
							}
							?>
						</div>
						<?
						foreach ($arParams['SKU_PROPS'] as $skuProperty)
						{
							if (!isset($item['OFFERS_PROP'][$skuProperty['CODE']]))
								continue;

							$skuProps[] = array(
								'ID' => $skuProperty['ID'],
								'SHOW_MODE' => $skuProperty['SHOW_MODE'],
								'VALUES' => $skuProperty['VALUES'],
								'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
							);
						}

						unset($skuProperty, $value);

						if ($item['OFFERS_PROPS_DISPLAY'])
						{
							foreach ($item['JS_OFFERS'] as $keyOffer => $jsOffer)
							{
								$strProps = '';

								if (!empty($jsOffer['DISPLAY_PROPERTIES']))
								{
									foreach ($jsOffer['DISPLAY_PROPERTIES'] as $displayProperty)
									{
										$strProps .= '<dt>'.$displayProperty['NAME'].'</dt><dd>'
											.(is_array($displayProperty['VALUE'])
												? implode(' / ', $displayProperty['VALUE'])
												: $displayProperty['VALUE'])
											.'</dd>';
									}
								}

								$item['JS_OFFERS'][$keyOffer]['DISPLAY_PROPERTIES'] = $strProps;
							}
							unset($jsOffer, $strProps);
						}
					}

					break;
			}
		}
	}

	
	?>
</div>


<script type="text/javascript">
BX.ready(function(){
   
   var addAnswer = new BX.PopupWindow("my_answer-<?=$arResult['ITEM']['ID']?>", null, {
      content: BX("ajax-add-answer-<?=$arResult['ITEM']['ID']?>"),
	  closeIcon: {right: "0px", top: "0px"},
	   /*titleBar: {content: BX.create("DIV", {html: '<b></b>', 'props': {'className': 'access-title-bar'}})},*/
      zIndex: 0,
	  overlay: {
                // объект со стилями фона
                backgroundColor: 'black',
                opacity: 500
      }, 
      offsetLeft: 0,
      offsetTop: 0,
	  closeByEsc: true, // закрытие окна по esc
      darkMode: false, // окно будет светлым или темным
      autoHide: true, // закрытие при клике вне окна
	  lightShadow: true,
      draggable: {restrict: false},
   }); 
   $("#<?=$arResult['ITEM']['ID']?>").click(function(){
      addAnswer.show(); // появление окна
   });
});
</script>