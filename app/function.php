<?php 

 
function insert($table, $field, $values){
    $field_string = implode("`,`",$field);
    $values_string = implode("','",$values);
    $sql = "INSERT INTO `{$table}` (`".$field_string."`) VALUES ('".$values_string."')";
    return $sql;
}

 
function insert2($table, $data){

    $field = array_keys($data);
    $values = array_values($data);
    $field_string = implode("`,`",$field);
    $values_string = implode("','",$values);

    $sql = "INSERT INTO `{$table}` (`".$field_string."`) VALUES ('".$values_string."')";
    return $sql;
}

 