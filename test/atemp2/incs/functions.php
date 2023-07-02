<?php

function debug($data){
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function load($data){
    foreach ($_POST as $k => $v){
        if(array_key_exists($k, $data)){
            $data[$k]['value'] = trim($v);
        }
    }
    return $data;
}

function validate($data){
    $errors = '';
    foreach ($data as $k => $v){
        if($data[$k]['requiered'] && empty($data[$k]['value'])){
            $errors .= "<li>Pole {$data[$k]['field_name']} je prazdné!</li>";
        }
    }
    return $errors;
}
?>