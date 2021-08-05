<?php

function isVegetablesChecked($value){
    if(isset($_REQUEST['vegetables']) && is_array($_REQUEST['vegetables']) && in_array($value,$_REQUEST['vegetables'])){
        echo "checked";
    }
}


function displayFruits($options,$selectedValue){
    foreach ($options as $option){
        $selected = '';
        if(in_array($option,$selectedValue)){
            $selected = 'selected';
        }
        printf("<option value='%s' %s>%s</option>", strtolower($option), $selected, ucwords($option));

    }
}