<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if (!empty($arResult)): ?>
    <ul class="menu">
    <?
	$menu_lenght = 8;
	$count_level = 0;
    $previousLevel = 0;
    $elemTopLevel = 0;
foreach ($arResult as $key => $arItem): ?>
    
    <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?if ($count_level >= $menu_lenght && $arItem["DEPTH_LEVEL"] == 1) {?>
			</div>
			<li class="menu-dd-item show_hide_all"><a href="#" style="coursor:pointer;"> Показать все</a></li>
		<?}?>
        <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
		<?$count_level = 0;?>
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
       class="menu-dd-item__link <? if ($arItem["SELECTED"]):?>current<? endif ?>"><?= $arItem["TEXT"] ?></a>
    <ul class="menu-dd">
    <? endif ?>
    
    <? else:?>
        <? if ($arItem["DEPTH_LEVEL"] == 1):?>
            <li class="menu-item">
                <a href="<?= $arItem["LINK"] ?>"
                   class="menu-item__link <? if ($arItem["SELECTED"]):?>current<? endif ?>"><?= $arItem["TEXT"] ?></a>
            </li>
        <? else:?>
			<?if ($count_level == $menu_lenght) {?>
				<div id="hide_menu_top" style="display:none">
			<?}?>
            <li class="menu-dd-item">
                <a href="<?= $arItem["LINK"] ?>"
                   class="menu-dd-item__link <? if ($arItem["SELECTED"]):?>current<? endif ?>"><?= $arItem["TEXT"] ?>
				</a>
            </li>
			<?$count_level++;?>
        <? endif ?>
    <? endif ?>
    
    <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

<? endforeach ?>
    <? if ($previousLevel > 1)://close last item tags?>
        <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
    <? endif ?>

    </ul>
<? endif ?>