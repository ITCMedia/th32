<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="footer-nav">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	
	<?if($arItem["LINK"] == '/catalog/'):?>
		<li class="footer-nav-line">&nbsp;</li>
	<?endif?>

	<li <?if($arItem["SELECTED"]){?>class="current"<?}?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	
<?endforeach?>

</ul>
<?endif?>