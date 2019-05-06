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



<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>			
	<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="side-block side-opin">
			<div class="inner-block">
				<div class="title">
					<div class="photo-block">
						<?if(is_array($arItem["PREVIEW_PICTURE"])):?>
							<?
							   $renderImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"],
													   Array("width" => 64, "height" => 56),
													   BX_RESIZE_IMAGE_EXACT, false); 
							   echo '<img alt="'.$arItem["NAME"].'" src="'.$renderImage["src"].'">'; 
							?>
						<?else:?>
							<img
								 src="http://localhost/upload/medialibrary/6d4/6d47ad4fa8ca4e0192a40b3a58cc4a1b.jpg"
								  alt="<?=$arItem["NAME"];?>"
							>
						<?endif;?>
					</div>
					
					<div class="name-block">
						<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
							<?echo $arItem["NAME"];?>
						</a>
					</div>
					<div class="pos-block">
						<?=getFieldsAndProps($arParams, $arItem);?>
					</div>
				</div>
				
				<div class="text-block">
					<?echo '"' . TruncateText($arItem["PREVIEW_TEXT"], 150);?>
				</div>
				
			</div>
		</div>
	</div>
<?endforeach;?>

