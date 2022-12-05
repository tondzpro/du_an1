
  <article>
        <h3>Đã thanh toán</h3>
        <div class="danggiao">
            <div class="row">
                <?php foreach($arr_hoadon as $arr){ 
                    foreach($arr as $hoadon){
                    ?>
                <div class="col-lg-9">
                    <img src="./upload/<?php echo $hoadon['image']; ?>" alt="" width="140px"
                        style="overflow: hidden; float: left; margin-right: 20px;">
                    <p class="big"><?php echo $hoadon['ten_hh'];  ?></p>
                    <p class="small">số lượng : <?php echo $hoadon['soluong'];  ?></p>
                </div>
                <div class="col-lg-3">
                    <p class="right">giá : $<?php echo $hoadon['gia'];  ?></p>
                </div>
                    <?php  }  }?> 
            </div>

        </div>
        <div class="tongket">
            <div class="row">
                <div class="col-lg-12">
                    <button style="float:right; border-radius: 5px;">Liên hệ với người bán</button>
                </div>
            </div>
        </div>
    </article>