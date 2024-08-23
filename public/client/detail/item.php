
<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php');
if (isLogin()) {
    if (isset($_GET['name'])) {
        $name = $KNCMS->anti_text($_GET['name']);
    }
    $detail = $KNCMS->query("SELECT * FROM `kncms_item` WHERE `detail` = '$name'");
    if ($detail->num_rows > 0) {
        $detail = $detail->fetch_array();
?>
        <title>Thông tin vật phẩm - <?= $detail['name'] ?></title>
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="card-img-top img-fluid" src="<?=$detail['img']?>" style="border-radius: 10px;" width="100%">
                                </div>
                                <?php
                                if (isset($_POST['ooc_buy'])) {
                                    $ooc = $knsite['PriceOOC'];
                                    if ($user_ss['Credits'] >= $detail['price']) {
                                        if($detail['amount'] < 0 ) $KNCMS->msg_error("Vật phẩm đã hết lượt bán rồi ! ", hUrl('Shop/VatPham'), 1000);
                                        $uid = $user_ss['id'];
                                        $field = $detail['field'];
                                        $vpname = $detail['name'];
                                        $user = $user_ss['Username'];
                                        $vp = $user_ss[$field] +1;
                                        $insert_veh = $KNCMS->query("UPDATE `accounts` SET
                                        `$field` = '$vp' WHERE `id` = '$uid'");
                                        $cur = $user_ss['Credits'];
                                        $cash = $user_ss['Credits'] - $detail['price'];
                                        ShopLog("$user đã mua một $vpname", "item", $cur, $cash, $user_ss['Username'], '');
                                        UTF8Encodez("$user đã mua một $vpname");

                                        $trutien = $KNCMS->query("UPDATE `accounts` SET
                                            `Credits` = '$cash' WHERE `id` = '$uid'");
                                        $amount_detail = $detail['amount'] - 1;
                                        $detailid = $detail['id'];
                                        $updateamount = $KNCMS->query("UPDATE `kncms_item` SET
                                        `amount` = '$amount_detail' WHERE `id` = '$detailid'");

                                        if ($trutien == 1) {
                                            if ($insert_veh == 1) {
                                                $KNCMS->msg_success("Bạn đã mua chiếc $vpname thành công với $ooc", hUrl('Shop/VatPham'), 2000);
                                                $uid = $user_ss['id'];
                                                KNCMS_Log("Bạn đã mua chiếc $vpname thành công với $ooc", $uid);
                                            } else {
                                                $KNCMS->msg_error("Mua khong thanh cong", "", 1000);
                                            }
                                        } else {
                                            $KNCMS->msg_error("Ahihi Mua khong thanh cong", "", 1000);
                                        }
                                    } else {
                                        $KNCMS->msg_error("Ban khong du tien", hUrl('Shop/VatPham'), 1000);
                                    }
                                }
                                ?>
                                <div class="col-md-8">
                                    <form method="POST">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>Tên:</span>
                                            </div>
                                            <div class="col-md-8">
                                                <b><?= $detail['name'] ?></b>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>Số lượng:</span>
                                            </div>
                                            <div class="col-md-8">
                                                <b><?= $detail['amount'] ?></b>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>Giá <?= $knsite['PriceOOC'] ?>:</span>
                                            </div>
                                            <div class="col-md-8">
                                                <b><?= $detail['price'] ?></b>
                                            </div>
                                        </div>
                                        <button id="ooc_buy" name="ooc_buy" class="btn btn-success">Mua bằng <?= $knsite['PriceOOC'] ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php } else {
        $KNCMS->msg_error("Khong tim thay du lieu nay", hUrl('Shop/VatPham'), 1000);
    }
} else {
    $KNCMS->msg_error("Ban chua dang nhap", hUrl('Auth/Login'), 1000);
} ?>
    <?php require_once('../../../private/foot.php'); ?>