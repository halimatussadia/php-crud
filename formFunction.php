<?php

function  vegetableChecked($inputName,$value){
    if(isset($_REQUEST[$inputName]) && is_array($_REQUEST[$inputName]) && in_array($value,$_REQUEST[$inputName])){
        echo "checked";
    }
}

function displayFruits($options,$selectedFruit){
    foreach ($options as $option){
        $selected = '';
        if(in_array($option,$selectedFruit)){
            $selected = 'selected';
        }
        printf("<option value='%s'%s>%s</option>",strtolower($option),$selected,ucwords($option));
    }
}