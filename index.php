<?php
ob_start();
session_start();
include "dao/pdo.php";
include "dao/giamgia.php";
include "dao/product_dao.php";
include "dao/donhang.php";
include "dao/hoadon.php";
include "dao/acount_dao.php";
include "dao/category_dao.php";
include "dao/size_pdo.php";
include "dao/color_pdo.php";
 $category = show_category();
 $dsdm = loadall_danhmuc();
include "site/header.php";

 if(!isset($_SESSION['cart'])) 
 $_SESSION['cart'] = [];
if (isset($_GET['act'])&&($_GET['act']!="")) {
    $act = $_GET['act'];
        switch ($act) {
                case 'sanpham':
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $sanpham = show_sp_category($id);
                        include "site/product.php";
                    }
                    
                    break;

                   
            
                case 'ctsanpham':
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];          
                        $sp = show_sp_id($id);
                        $size = show_all_size();
                        $color = show_all_color();
                        include "site/product_detail.php";
                    }
                    
                     break;

                case 'dangky':
                        if (isset($_POST['submit'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $email = $_POST['email'];
               
                            $address = $_POST['address'];
                            $phone = $_POST['phone'];
                            $fullname = $_POST['fullname'];
                            $image = $_FILES['image']['name'];
                              $upload_dir = "./upload/";
                               $uploadfile = $upload_dir.$image;
                               if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)){
                              }
                            $permission = 1;
                            insert_acount($username,$password,$email,$address,$phone,$fullname,$image,$permission);
                        }
                        include "site/taikhoan/register.php";
                        break;
                
                case 'login':
                    if(isset($_POST['submit'])){
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $login = login_acount($username,$password);
                        if(is_array($login)){
                            $_SESSION['user'] = $login;
                            header('Location: index.php');
                        } else {
                            header("Location: index.php?act=login");
                        }
                    } else {
                    include "site/taikhoan/login.php";
                    }
                    break;
                case 'dangxuat':
                    unset($_SESSION['user']);
                    header('Location: index.php');
                    break;
                        
                case 'cart':
                    if(isset($_POST['submit'])){
                        $name_sp = $_POST['ten_sp'];
                        $gia = $_POST['gia_sp'];
                        $hinh = $_POST['hinh'];
                        if(isset($_POST['size_sp'])){
                        $size = $_POST['size_sp'];
                        $gia_size = show_price_size($size);
                        foreach($gia_size as $gia_size){
                            $gia_size_sp = $gia_size['gia'];
                        }
                        } else {
                            $size = "s";
                            $gia_size_sp = 10000;
                        }
                        if(isset($_POST['color_sp'])){
                        $color = $_POST['color_sp'];
                        $gia_color = show_price_size($color);
                        foreach($gia_color as $gia_color){
                            $gia_color_sp = $gia_color['gia'];
                        }
                        } else {
                            $color = "black";
                            $gia_color_sp = 10000;
                        }
                    
                        $soluong = $_POST['soluong'];
                        $tongtien =(int)$soluong * ((int)$gia + (int)$gia_size_sp + (int)$gia_color_sp);
                        $array_cart = [$name_sp,$gia,$hinh,$soluong,$tongtien,$size,$color];
                        array_push($_SESSION['cart'],$array_cart);
                    include "site/cart.php";
                    }else {
                    include "site/cart.php";
                    }
                    break;

                case 'delete_cart':
                    if(isset($_GET['id'])){
                        array_splice($_SESSION['cart'],$_GET['id'],1);
                        header('Location: index.php?act=cart');
                    }
                    break;
                case 'quanlidonhang':
                    if(isset($_GET['vnp_OrderInfo'])){
                     $tongtien = ((int)$_GET['vnp_Amount'])/100;
                     $user = $_SESSION['user'];
                     foreach($user as $user){
                        $id_user = $user['id'];
                     }
                     $mathanhtoan =  $_GET['vnp_TxnRef'];
                     insert_hoadon($id_user,$tongtien,$mathanhtoan);
                     $hoadon = get_id_hoadon($mathanhtoan);
                     foreach($hoadon as $hoadon){
                        $id_hoadon = $hoadon['id'];
                     }
                     if($_GET['vnp_OrderInfo'] == "all"){
                        
                     $cart = $_SESSION['cart'];
                     foreach($cart as $cart){
                        $soluong = $cart[3];
                        $ten_hh = $cart[0];
                        $color = $cart[6];
                        $size = $cart[5];
                        $image = $cart[2];
                        $gia = $cart[4];
                        insert_donhang($soluong,$ten_hh,$color,$size,$gia,$id_hoadon,$image);
                        $_SESSION['cart'] = [];
                     }
                     } else {
                        $madon = $_GET['vnp_OrderInfo'];
                        $soluong = $_SESSION['cart'][$madon][3];
                        $ten_hh = $_SESSION['cart'][$madon][0];
                        $color = $_SESSION['cart'][$madon][6];
                        $size = $_SESSION['cart'][$madon][5];
                        $image = $_SESSION['cart'][$madon][2];
                        $gia = $_SESSION['cart'][$madon][4];
                        insert_donhang($soluong,$ten_hh,$color,$size,$gia,$id_hoadon,$image);
                        array_splice($_SESSION['cart'],$madon, 1);
                     }
                    } 
                    $user_id = $_SESSION['user'];
                     foreach($user_id as $user_id){
                        $id = $user['id'];
                     }
                    $arr_hoadon = [];
                    $ma_hoadon = get_hoadon($id);
                    foreach($ma_hoadon as $ma_hoadon){
                        $hoadon_id = $ma_hoadon['id'];
                       $donhang =   show_donhang_idhd($hoadon_id);
                       array_push($arr_hoadon,$donhang);
                    }

                    include "site/quanlidonhang.php";
                    break;
            
            default:
            $sanpham = show_all_sp();
            $giamgia = show_sp_giamgia();
            include "site/home.php";
            break;
                break;
        }
    }else {
        $sanpham = show_all_sp();
        $giamgia = show_sp_giamgia();
        include "site/home.php";
    }

    include "Layout/footer.php";
?>