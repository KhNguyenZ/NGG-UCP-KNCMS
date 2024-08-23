
<?php require_once('../../../server/config.php') ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php');
if(isLogin())
{
    if(CheckOnline()) $KNCMS->msg_error("Bạn vui lòng thoát game để thực hiện thao tác", hUrl('Home'), 1000);
    if(VaildEmail()) $KNCMS->msg_error("Bạn vui lòng xác thực email  để thực hiện thao tác", hUrl('Home'), 1000);
    if (VaildAccount()) $KNCMS->msg_error("Bạn vui lòng Khởi tạo account để thực hiện thao tác", hUrl('Home'), 1000);
}
?>
<title>Cửa Hàng Vật Phẩm | <?= $knsite['Title'] ?></title>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cửa hàng vật phẩm</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <?php
                foreach ($KNCMS->get_list("SELECT * FROM `kncms_item` WHERE `amount` > 0") as $data) { ?>
                    <div class="col-md-4">
                        <center>
                            <img class="card-img-top img-fluid" src="<?=$data['img']?>" style="border-radius: 10px;" width="100%">
                            <span class="badge badge-info"><b>Tên: <?= $data['name'] ?></b></span>
                            <br>
                            <span class="badge badge-success"><b>Số lượng:<?= $data['amount'] ?></b></span>
                            <span class="badge badge-primary"><b>Giá: <?=$data['price']?></b></span>
                            <br>
                            <br>
                            <a href="<?= $base_url ?>Shop/ItemDetail/<?= $data['detail'] ?>" class="btn btn-primary ">Chi tiết</a>
                        </center>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php require_once('../../../private/foot.php'); ?>