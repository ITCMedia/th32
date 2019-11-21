<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
	<? if (!empty($arResult['MENU'])): ?>
		<ul class="menu <?=$arResult['CURRENT_URI'] == '/' ? "visible_at" : ""?>">
		<?
		$previousLevel = 0;
		$elemTopLevel = 0;
		foreach ($arResult['MENU'] as $key => $arItem): ?>
			
			<? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
				<?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
			<? endif ?>
			
			<? if ($arItem["IS_PARENT"]): ?>
			
				<? if ($arItem["DEPTH_LEVEL"] == 1): ?>
				<? $elemTopLevel++; ?>
				<li class="menu-item menu-item--drop">
				<a href="<?= $arItem["LINK"] ?>" class="menu-item__link<? if ($elemTopLevel == 1) {
					?> menu-item__link--dd-open<? } ?><? if ($elemTopLevel == 2) {
					?> menu-item__link--dd-open menu-item__link--dd-open2<? } ?><? if ($arItem["SELECTED"]):?> current<? endif ?>"><?= $arItem["TEXT"] ?></a>
				<ul class="menu-dd">
				
				<? else: ?>
				<li class="menu-dd-item">
				<a href="<?= $arItem["LINK"] ?>"
					class="menu-dd-item__link <? if ($arItem["SELECTED"]):?>current<? endif ?> <?=($arItem["DEPTH_LEVEL"]>1 ? "arrow" : "")?>"><?= $arItem["TEXT"] ?></a>
					<ul class="menu-dd <?=($arItem["DEPTH_LEVEL"]>1 ? "menu-dd-child" : "")?>">
				<? endif ?>

			<? else:?>
				<? if ($arItem["DEPTH_LEVEL"] == 1):?>
					<li class="menu-item">
						<a href="<?= $arItem["LINK"] ?>"
						   class="menu-item__link <? if ($arItem["SELECTED"]):?>current<? endif ?>"><?= $arItem["TEXT"] ?></a>
					</li>
				<? else:?>
					<li class="menu-dd-item">
						<a href="<?= $arItem["LINK"] ?>"
						   class="menu-dd-item__link <? if ($arItem["SELECTED"]):?>current<? endif ?>"><?= $arItem["TEXT"] ?></a>
					</li>
				<? endif ?>
			<? endif ?>
			
			<? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>
		
		<? endforeach ?>
		<? if ($previousLevel > 1)://close last item tags?>
			<?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
		<? endif ?>
	
		</ul>
<? endif ?>