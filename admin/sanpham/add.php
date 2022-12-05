<div class="noidung">
    <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
        <h3>Thêm sản phẩm</h3>
        <label for="">Tên sản phẩm</label>
        <input type="text" name="tensp">
        <label for="">Giá sản phẩm</label>
        <input type="text" name="giasp">
        <label for="">Giảm giá</label>
        <select name="giamgia" id="">
            <?php foreach($list_giamgia as $giamgia){
            ?>
            <option value="<?php echo $giamgia['id']?>"><?php echo $giamgia['giam_gia']?></option>
            <?php }?>
        </select>
        <label for="">Hình sản phẩm</label>
        <input type="file" name="hinh">
        <label for="">số lượng</label>
        <input type="number" name="soluong">
        <label for="">Đặc biệt</label>
        <input type="text" name="dacbiet">
        <label for="">Loại sản phẩm</label>
        <select name="loaisp" id="">
            <?php foreach($list_danhmuc as $danhmuc){
            ?>
            <option value="<?php echo $danhmuc['id']?>"><?php echo $danhmuc['ten_loai']?></option>
            <?php }?>
        </select>
        <label for="">Mô tả</label>
        <textarea name="mota" cols="30" rows="10"></textarea>
        <div class="luachon">
            <input type="submit" name="themmoi" value="Thêm mới" class="button">
            <input type="reset" value="Nhập lại" class="button">
            <a href="index.php?act=listsp"><input type="button" value="Danh sách" class="button"></a>
        </div>
        <p class="thanhcong">
        <?php 
            if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
            }
        ?>
        </p>
    </form>
</div>