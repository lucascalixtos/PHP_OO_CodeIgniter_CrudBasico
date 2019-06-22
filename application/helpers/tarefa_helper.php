<?php 


function br_to_us_date($date){
    $v = explode('/', $date);
    $u = array_reverse($v);
    return implode('-', $u);
}

function us_to_br_date($date){
    $v = explode('-', $date);
    $u = array_reverse($v);
    return implode('/', $u);
}
