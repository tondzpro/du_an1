<?php 
 require_once '../global.php';
 require_once '../dao/pdo.php';

 if(isset($_GET['chi-tiet'])){
    $VIEW_NAME = 'chitiet.php';
}else if(isset($_GET['san-pham'])){
    $VIEW_NAME = 'sanpham.php';
} else if(isset($_GET['dang-ki'])){
    $VIEW_NAME = 'dangki.php';
} else if(isset($_GET['dang-nhap'])){
    $VIEW_NAME = 'dangnhap.php';
}else if(isset($_GET['gio-hang'])){
    $VIEW_NAME = 'giohang.php';
} else if(isset($_GET['thanh-toan'])){
    $VIEW_NAME = 'thanhtoan.php';
} else{
    $VIEW_NAME = 'trangchu.php';
}

include_once './layout.php';
?>