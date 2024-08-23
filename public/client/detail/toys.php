
<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php');
if (isLogin()) {
    if (isset($_GET['name'])) {
        $name = $KNCMS->anti_text($_GET['name']);
    }
    $detail = $KNCMS->query("SELECT * FROM `kncms_toys` WHERE `name` = '$name'");
    if ($detail->num_rows > 0) {
        $detail = $detail->fetch_array();
?>
        <title>Thông tin xe - <?= $detail['name'] ?></title>
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="card-img-top img-fluid" src="https://files.prineside.com/gtasa_samp_model_id/white/<?= $detail['modelid'] ?>_w.jpg" style="border-radius: 10px;" width="100%">
                                </div>
                                <?php
                                if (isset($_POST['ooc_buy'])) {
                                    $ooc = $knsite['PriceOOC'];
                                    if ($user_ss['Credits'] >= $detail['ooc_price']) {
                                        if ($detail['amount'] < 0) $KNCMS->msg_error("Vật phẩm đã hết lượt bán rồi ! ", hUrl('Shop/Toys'), 1000);
                                        $uid = $user_ss['id'];
                                        $toyname = $detail['name'];
                                        $name = $user_ss['Username'];
                                        $modelid = $detail['modelid'];
                                        $user = $user_ss['Username'];
                                        $insert_veh = $KNCMS->query("INSERT INTO `toys` SET
                                        `player` = '$uid', 
                                        `bone` = 2, 
                                        `modelid` = '$modelid'");
                                        $cur = $user_ss['Credits'];
                                        $cash = $user_ss['Credits'] - $detail['ooc_price'];
                                        ShopLog("$user đã mua một toys", "toys", $cur, $cash, $user_ss['Username'], $modelid);
                                        UTF8Encodez("$user đã mua một toys");
                                        $trutien = $KNCMS->query("UPDATE `accounts` SET
                                            `Credits` = '$cash' WHERE `username` = '$name'");
                                        $amount_detail = $detail['amount'] - 1;
                                        $detailid = $detail['id'];
                                        $updateamount = $KNCMS->query("UPDATE `kncms_toys` SET
                                        `amount` = '$amount_detail' WHERE `id` = '$detailid'");

                                        if ($trutien == 1) {
                                            if ($insert_veh == 1) {
                                                $KNCMS->msg_success("Bạn đã mua chiếc $toyname thành công với $ooc", hUrl('Shop/Toys'), 2000);
                                                $uid = $user_ss['id'];
                                                KNCMS_Log("Bạn đã mua chiếc $toyname thành công với $ooc", $uid);
                                            } else {
                                                $KNCMS->msg_error("Mua khong thanh cong", "", 1000);
                                            }
                                        } else {
                                            $KNCMS->msg_error("Ahihi Mua khong thanh cong", "", 1000);
                                        }
                                    } else {
                                        $KNCMS->msg_error("Ban khong du tien", hUrl('Shop/Toys'), 1000);
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
                                                <span>Giá <?= $knsite['PriceOOC'] ?>:</span>
                                            </div>
                                            <div class="col-md-8">
                                                <b><?= $detail['ooc_price'] ?></b>
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
        $KNCMS->msg_error("Khong tim thay du lieu nay", hUrl('Shop/Toys'), 1000);
    }
} else {
    $KNCMS->msg_error("Ban chua dang nhap", hUrl('Auth/Login'), 1000);
} ?>
    <?php require_once('../../../private/foot.php'); ?>