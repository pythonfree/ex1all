<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="review-block">
	<div class="review-text">
		<div class="review-text-cont">
			<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
				<?echo $arResult["DETAIL_TEXT"];?>
			<?else:?>
				<?echo $arResult["PREVIEW_TEXT"];?>
			<?endif?>
		</div>
		<div class="review-autor">
			<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
				<?=$arResult["NAME"]?>
			<?endif;?>
			,
			<?=getFieldsAndProps($arParams, $arResult);?>.
		</div>
	</div>
	<div style="clear: both;" class="review-img-wrap">
		<?if(is_array($arResult["DETAIL_PICTURE"])):?>
			<img
				src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				>
		<?else:?>
			<img src="<?=SITE_TEMPLATE_PATH;?>/img/rew/no_photo.jpg" alt="<?=$arResult["NAME"];?>">			
		<?endif?>		
	</div>
</div>

<?if(is_array($arResult["DISPLAY_PROPERTIES"]['DOCUMENTS'])):?>
	<?$arrDocuments = $arResult["DISPLAY_PROPERTIES"]['DOCUMENTS'];?>
	<div class="exam-review-doc">
		<p><?=$arrDocuments['NAME']?>:</p>
		<?//echo '<pre>';var_dump($arrDocuments);echo '</pre>'?>
		<?if(is_array($arrDocuments['FILE_VALUE'])): //есть хотя бы один документ?>
			<?if (!isset($arrDocuments['FILE_VALUE']['ID'])): //если ключ ID не существует, то это список?>
				<?foreach($arrDocuments['FILE_VALUE'] as $key => $value):?>
					<div  class="exam-review-item-doc">
						<img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH;?>/img/icons/pdf_ico_40.png">
							<a href="<?=$value['SRC'];?>"><?=$value['ORIGINAL_NAME'];?></a>
					</div>
				<?endforeach;?>
			<?elseif (isset($arrDocuments['FILE_VALUE']['ID'])): //если ключ ID доступен сразу, то это один элемент?>
					<div  class="exam-review-item-doc">
						<img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH;?>/img/icons/pdf_ico_40.png">
							<a href="<?=$arrDocuments['FILE_VALUE']['SRC'];?>"><?=$arrDocuments['FILE_VALUE']['ORIGINAL_NAME'];?></a>
					</div>
			<?endif;?>
		<?endif;?>
	</div>
<?endif;?>

<hr>
