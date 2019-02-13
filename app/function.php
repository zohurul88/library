<?php 

 
function insert($table, $field, $values){
    $field_string = implode("`,`",$field);
    $values_string = implode("','",$values);
    $sql = "INSERT INTO `{$table}` (`".$field_string."`) VALUES ('".$values_string."')";
    return $sql;
}

function insert_author($table_name, $table_filds, $from_name){
    $fild = implode("`,`", $table_filds);
    $fn = implode("`,`", $from_name);
    $query = "INSERT INTO `{$table_name}` (`".$fild."`) VALUES ('".$fn."')";
    return $query;
}

function insert_user($table, $data){
    $keys = array_keys($data);
    $values = array_values($data);
    $keysi   = implode("`,`", $keys);
    $valuesi = implode("','", $values);
    $sql = "INSERT INTO `{$table}` (`".$keysi."`) VALUES ('".$valuesi."')";
    return $sql;
}
 



function insert2($table_name, $data){

    $field = array_keys($data);
    $values = array_values($data);
    $field_string = implode("`,`",$field);
    $values_string = implode("','",$values);

    $sql = "INSERT INTO `{$table_name}` (`".$field_string."`) VALUES ('".$values_string."')";
    return $sql;
}


// book insert method
function insertBook($table_name, $data){

   $field_key = array_keys($data);
   $field_values = array_values($data);
   $field_stn = implode("`,`", $field_key);
   $values_srn = implode("','", $field_values);

   $sql = "INSERT INTO `{$table_name}` (`".$field_stn."`) VALUES ('".$values_srn."')";
   return $sql;

}



 