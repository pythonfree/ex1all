<?php

function getFieldsAndProps($arParams, $arItem)
{
    $arrDisplayActiveFrom = [];
    if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]){
        $arrDisplayActiveFrom[] = $arItem["DISPLAY_ACTIVE_FROM"] . ' г.';
    }
    
    $arrPropertyDisplayValues = [];
    foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty){
        if ($pid === 'DOCUMENTS') {
            continue;
        }
        if(is_array($arProperty["DISPLAY_VALUE"])){
            $arrPropertyDisplayValues[] = implode(', ', $arProperty["DISPLAY_VALUE"]);
        }
        else{
            $arrPropertyDisplayValues[] = $arProperty["DISPLAY_VALUE"];
        }
    }
    
    $strFirstProp = trim($arrPropertyDisplayValues[0]);
    
    $encode = mb_detect_encoding($strFirstProp);
    $strFirstLetter = ToUpper(mb_substr($strFirstProp, 0, 1, $encode));
    
    $intStrLen = mb_strlen($strFirstProp, $encode);
    $arrPropertyDisplayValues[0] = $strFirstLetter . mb_substr($strFirstProp, 1, $intStrLen-1, $encode);
    
    
    return implode(', ', array_merge($arrDisplayActiveFrom, $arrPropertyDisplayValues));
}