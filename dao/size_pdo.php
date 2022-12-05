<?php 

include "pdo.php";

function show_all_size() {
   $sql = "SELECT * FROM `size`";
   return db_query($sql);
}

function show_price_size($size) {
   $sql  = "SELECT `gia` FROM `size` WHERE `size`.`id` = {$size}";
   return db_query($sql);
}

?>