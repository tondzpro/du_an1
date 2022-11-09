<?php 
require_once '../global.php';
require_once '../dao/pdo.php';

if(isset($_GET['san-pham'])){
    $VIEW_NAME = 'sanpham.php';
} else if(isset($_GET['tai-khoan'])){
    $VIEW_NAME = 'taikhoan.php';
}else if(isset($_GET['binh-luan'])){
    $VIEW_NAME = 'binhluan.php';
} else if(isset($_GET['thong-ke'])){
    $VIEW_NAME = 'thongke.php';
} else{
    $VIEW_NAME = 'trangchu.php';
}

include_once './layout.php';

?>