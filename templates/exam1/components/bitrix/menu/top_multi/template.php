<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<div class="menu-block popup-wrap">
	<a href="" class="btn-menu btn-toggle"></a>
	<div class="menu popup-block">
	<?if (!empty($arResult)):?>
	<ul>
	
	<?
	$previousLevel = 0;
	foreach($arResult as $arItem):?>
	
		<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
			<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
		<?endif?>
	
		<?if ($arItem["IS_PARENT"]):?>
	
			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?if(isset($arItem['PARAMS']['class'])){echo $arItem['PARAMS']['class'];}?>">
				<a href="<?=$arItem["LINK"]?>">
					<?=$arItem["TEXT"]?>
						<?if(isset($arItem['PARAMS']['description'])){$mainDescr=$arItem['PARAMS']['description'] . '<br>&quot;' . $arItem["TEXT"] . '&quot;';}?>

				</a>
					<ul>
			<?else:?>
				<li>			
					<a href="<?=$arItem["LINK"]?>">
					<i><?if($mainDescr){echo $mainDescr; $mainDescr='';}?></i><br>
						<?=$arItem["TEXT"]?>
						<br>
						<i>
						<?if(isset($arItem['PARAMS']['description'])){echo $arItem['PARAMS']['description'];}?>
						<br>
						&quot;<?=$arItem["TEXT"]?>&quot;
						</i>
					</a>
					<ul>
			<?endif?>
	
		<?else:?>
	
			<?if ($arItem["PERMISSION"] > "D"):?>
	
				<?if ($arItem["DEPTH_LEVEL"] == 1):?>
					<li class="<?if(isset($arItem['PARAMS']['class'])){echo $arItem['PARAMS']['class'];}?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<?else:?>
					<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<?endif?>
	
			<?endif?>
	
		<?endif?>
	
		<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
	
	<?endforeach?>
	
	<?if ($previousLevel > 1)://close last item tags?>
		<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
	<?endif?>
	
	</ul>
	<?endif?>
			<a href="" class="btn-close"></a>
		</div>
	<div class="menu-overlay"></div>
</div>