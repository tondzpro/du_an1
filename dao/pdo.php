<?php 
function pdo_connect() {
  $url = "mysql:host=localhost;dbname=du_an_1;charset=utf8;'root';''";
  $username = 'root';
  $passworld = "";
  $conn = new PDO($url, $username , $passworld);
  $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn;
}
/* ket noi database */


function pdo_execute($sql) {
   $sql_args = array_slice(func_get_args(),1);
   try {
    $conn = pdo_connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
   } catch (PDOException $e){
    throw $e;
   } finally {
    unset($conn);
   }
}
/*cau lenh gui du lieu len database */

function pdo_query($sql){
    $sql_args = array_slice(func_get_args(),1);
    try {
        $conn = pdo_connect();
        $stmt = $conn -> prepare($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
   } finally {
    unset($conn);
   }
}

/*cau lenh lay nhieu du lieu xuong tu database*/

function pdo_query_one($sql) {
    $sql_args = array_slice(func_get_args(),1);
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt ->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    }  finally {
        unset($conn);
    }
}
/*cau lenh lay mot du lieu xuong tu database*/ 
?>