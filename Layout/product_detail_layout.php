<?php
    include "header.php";
?>
<div id="content" style="overflow: hidden;">
    <div class="col-lg-9" id="boxleft" style="overflow: hidden; float:left">
        <div class="row">
            <h1 class="detail-title">Chi tiết sản phẩm</h1>
        </div>
        <div class="row">
            <div class="col-lg-6" style="float: left">
                <img src="ao-so-mi-oxford-tay-ngan-asm017-mau-xanh_2_small-15391.png" alt="" width="450px"><br><br>
                <div class="trait" style="margin-left:40px ;">
                <h5 class="detail-title">Đặc điểm nổi bật:</h5>
                <p></p>
            </div>
            </div>
            <div class="col-lg-6" style="float: right;overflow:hidden">
                <h4 class="detail-title">TÊN SP</h4>
                <hr>
                <h2 class="detail-title">Giá sp</h2>
                <div class="box" style="width: 100px; height: 28px; background-color: red; color: white; text-align: center; border-radius: 5px;">
                    Giá giảm
                </div> <br>
                <div class="box1" style="width: 35px; height: 23px; background-color: #1Fb349; color: white; text-align: center; border-radius: 5px; font-size: small;">
                    Mới
                </div>
                <br>
                <button style="width: 100%; border-radius:5px; background-color: #FD4522; border: white; color: white" id="btn-buynow">
                    <span style="font-weight: bold">MUA NGAY</span>
                    <br>Giao hàng tận nơi
                </button>
                <BR></BR>
                <button style="width: 48%;height: 40px; border-radius:5px; background-color: white; border:1px solid #FD4522; color: #FD4522" id="btn-1">
                    <span style="font-weight: bold">THÊM VÀO GIỎ HÀNG</span>
                </button>
                <button style="width: 48%;height: 40px; border-radius:5px; background-color: white; border: 1px solid #FD4522; color: #FD4522; float: right;" id="btn-1">
                    <span style="font-weight: bold">MUA TRẢ GÓP</span>
                </button>
            </div>
        </div>
        <div class="row" style="margin-left:5px ;">
            <h4 class="detail-title">Sản phẩm cùng loại</h4>
            <div class="col-lg-12">
                <br><li><a href=" linksanphamcungloai ">Tên sp cùng loại</a></li>
            </div>
        </div>
        <br>
        <div class="row" id="binhluan" style="margin-left:5px ;">
            <h4 class="detail-title">Bình luận</h4>
        </div>
    </div>


    <div class="row" id="boxright">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                Danh mục
            </div>
            <ul class="list-group list-group-flush">
                <!-- <li class="list-group-item"><a href="#">Điện thoại</a></li>
                        <li class="list-group-item"><a href="#">Điện thoại</a></li>
                        <li class="list-group-item"><a href="#">Điện thoại</a></li> -->
            </ul>
        </div>
        <form class="form-inline my-2 my-lg-0" action="index.php" method="post">
            <input type="text" style="Width:208px">
            <input type="submit" value="Tìm kiếm">
        </form>
    </div>
    <br>
    <div class="row">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                Top 10 yêu thích
            </div>
            <ul class="list-group list-group-flush">
                <!-- <li class="list-group-item"><a href="#">Điện thoại</a></li>
                        <li class="list-group-item"><a href="#">Điện thoại</a></li>
                        <li class="list-group-item"><a href="#">Điện thoại</a></li> -->
            </ul>
        </div>
    </div>
</div>
<hr>
<?php
    include "footer.php";
?>