<?php  
 include "pdo.php";

 function insert_donhang($soluong,$ten_hh,$color,$size,$gia,$id_hoadon,$image){
    $sql = "INSERT INTO `don_hang`(`soluong`, `ten_hh`, `color`, `size`, `gia`, `image`, `id_hoadon`) VALUES ('$soluong','$ten_hh','$color','$size','$gia','$image','$id_hoadon')";
    db_execute($sql);
 }

 function show_donhang_idhd($hoadon_id){
   $sql = "SELECT * FROM `don_hang` WHERE `don_hang`.`id_hoadon` = '$hoadon_id'";
   return db_query($sql);
 }

?>