<?php 
    include '../admin/header.php';
    include "../dao/product_dao.php";
    include "../dao/category_dao.php";
    include "../dao/acount_dao.php";
    include "../dao/giamgia.php";
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act){
            //controller danh mục
            case 'add_dm':
                // Kiểm tra người dùng có nhấn add không
                 if (isset($_POST['themmoi'])&&($_POST['themmoi'])) {      
                     $ten_loai=$_POST['ten_loai'];     
                     insert_danhmuc($ten_loai);
                    $thongbao="Thêm thành công";
                 }
                 
                 include "danhmuc/add.php";
                 break;
         
             case 'list_dm':
                 $listdanhmuc=loadall_danhmuc();
                 include "danhmuc/list.php";
                 break;
         
             case 'xoadm':
                 if (isset($_GET['id'])&&($_GET['id']>0)) {
                     delete_danhmuc($_GET['id']);
                 }
                 $listdanhmuc=loadall_danhmuc();
         
                 include "danhmuc/list.php";
                 break;   
         
                 case 'suadm':
                    if (isset($_GET['id'])&&($_GET['id']>0)) {
                     $dm = loadone_danhmuc($_GET['id']);
                 }
                     include "danhmuc/update.php";
                     break;
         
                 case 'updatedm':
                 
                     if (isset($_POST['capnhat'])&&($_POST['capnhat'])) {                
                      $id=$_POST['id'];   
                      $ten_loai=$_POST['ten_loai'];   
                      update_danhmuc($id,$ten_loai) ;      
                      $thongbao="Cập nhật thành công";
                     }
         
                      $sql= "select * from loai order by id desc";
                      $listdanhmuc=db_query($sql);
                      include "danhmuc/list.php";
                      break;
                     

            //controller sanpham
            case 'addsp':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $ten_hh = $_POST['tensp'];
                    $gia = $_POST['giasp'];
                    $giamgia = $_POST['giamgia'];
                    $filename = $_FILES['hinh']['name'];
                    $upload_dir = "../upload/";
                    $uploadfile = $upload_dir.$filename;
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'], $uploadfile)){
                        //echo "Thành công";
                    }
                    $loai = $_POST['loaisp'];
                    $mota = $_POST['mota'];
                    $soluong = $_POST['soluong'];
                    insert_product($ten_hh,$loai,$gia,$giamgia,$filename,$soluong,$mota);
                    $thongbao = "Thêm thành công";
                }
                $list_danhmuc = show_category();
                $list_giamgia = show_giamgia();
                include "sanpham/add.php";
                break;
            case 'listsp':
                if(isset($_POST['OK'])&&($_POST['OK'])){
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                }else{
                    $kyw = "";
                    $iddm = "";
                }
                if(isset($_POST['capnhat'])){
                    $id = $_POST['id'];
                    $loai = $_POST['id_loai'];
                    $ten_hh = $_POST['ten_hh'];
                    $gia = $_POST['gia'];
                    $id_giamgia = $_POST['id_giamgia'];
                    $soluong = $_POST['so_luong'];
                    $mota = $_POST['mota'];
                    if($_FILES['hinh']['name'] != "" ){
                        $filename = $_FILES['hinh']['name'];
                    $upload_dir = "../upload/";
                    $uploadfile = $upload_dir.$filename;
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'], $uploadfile)){
                        //echo "Thành công";
                    }
                    }else {
                        $filename = $_POST['img'];
                    }
                    update_sanpham($id,$ten_hh,$gia,$mota,$filename,$loai,$id_giamgia,$soluong);
                }
                $list_danhmuc = loadall_danhmuc();
                $list_sanpham = show_all_sp($kyw, $iddm);
                include "sanpham/list.php";
                break;
            case 'xoasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $id = $_GET["id"];
                    xoasp($id);
                }
                $list_danhmuc = loadall_danhmuc();
                $list_sanpham = show_all_sp("", 0);
                include "sanpham/list.php";
                break;
            case 'suasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $id = $_GET['id'];
                    $sanpham = loadmotsp($id);
                }
                $list_danhmuc = loadall_danhmuc();
                include "sanpham/update.php";
                break;
            case 'updatesp':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $id = $_POST['id'];
                    $ten_hh = $_POST['ten_hh'];
                    $gia = $_POST['gia'];
                    $id_giamgia = $_POST['id_giamgia'];
                    $filename = $_FILES['image']['name'];
                    $upload_dir = "../upload/";
                    $uploadfile = $upload_dir.$filename;
                    if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)){
                        //echo "Thành công";
                    }
                    $so_luong= $_POST['so_luong'];
                    $id_loai = $_POST['id_loai'];
                    $mota = $_POST['mota'];
                    update_sanpham($id,$ten_hh,$gia,$mota,$image,$id_loai,$id_giamgia,$so_luong);
                    $thongbao = "Thêm thành công";
                }
                $list_danhmuc = loadall_danhmuc();
                $list_sanpham = show_all_sp("", 0);
                include 'sanpham/list.php';
                break;
            
            // Controller tai khoan
            case 'dskh':
                $listtaikhoan=loadall_taikhoan();
                include "taikhoan/list.php";
                break;  
        
                case 'xoatk':
                    if (isset($_GET['id'])&&($_GET['id']>0)) {
                        delete_taikhoan($_GET['id']);
                    }
                    $listtaikhoan=loadall_taikhoan();
            
                    include "taikhoan/list.php";
                    break;   
            
                case 'suatk':
                    if (isset($_GET['id'])&&($_GET['id']>0)) {
                    $tk = loadone_taikhoan($_GET['id']);
                }
                    include "taikhoan/update.php";
                    break;
        
                case 'updatetk':
                
                    if (isset($_POST['capnhat'])&&($_POST['capnhat'])) {               
                        $username=$_POST['username'];   
                        $password=$_POST['password'];   
                        $email=$_POST['email'];   
                        $address=$_POST['address'];   
                        $fullname=$_POST['fullname'];    
                        $phone=$_POST['phone'];    
                        $permission=$_POST['permission'];     
                      
                        $id=$_POST['id'];  
                        update_taikhoan($id,$username,$password,$email,$address,$phone,$fullname,$permission);
                        $thongbao="Cập nhật thành công";
                    }
                    $sql= "select * from user order by id desc";
                    $listtaikhoan=pdo_query($sql);
                        include "taikhoan/list.php";
                        break;
            // Controller binh luan
            case 'listbl':
                $list_bl = load_binhluan("0");
                include 'binhluan/list.php';
                break;
            case 'xoabl':
                $ma_bl = $_GET["ma_bl"];
                delete_binhluan($ma_bl);
                $list_bl = load_binhluan("0");
                include 'binhluan/list.php';
                break;
            default:
                // include "home.php";
                break;
        }
    }else{
        // include "home.php";
    }

?>