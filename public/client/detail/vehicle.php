
<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php');
if (isLogin()) {
    if (isset($_GET['name'])) {
        $vehname = $_GET['name'];
    }
    $detail = $KNCMS->query("SELECT * FROM `kncms_vehs` WHERE `name` = '$vehname'");
    if ($detail->num_rows > 0) {
        $detail = $detail->fetch_array();
?>
        <title>Thông tin xe - <?= $detail['name'] ?></title>
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Mua xe - <?= $detail['name'] ?></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= $base_url ?>/lib/model/vehicles/Vehicle_<?= $detail['model'] ?>.jpg" style="border-radius: 10px;width: 300px; height: 200px">
                        </div>
                        <!-- if (isset($_POST['buy'])) {
                            if ($user_ss['Money'] >= $detail['price']) {
                                $uid = $user_ss['id'];
                                $vehname = $detail['name'];
                                $name = $user_ss['Username'];
                                $modelid = $detail['model'];
                                $pos_x = $user_ss['SPos_x'];
                                $pos_y = $user_ss['SPos_y'];
                                $pos_z = $user_ss['SPos_z'];
                                $pos_a = $user_ss['SPos_r'];

                                $insert_veh = $KNCMS->query("INSERT INTO `vehicles` SET
                                        `sqlID` = '$uid', 
                                        `pvModelId` = '$modelid',
                                        `pvPosX` = '$pos_x',
                                        `pvPosY` = '$pos_y',
                                        `pvPosZ` = '$pos_z',
                                        `pvPosAngle` = '$pos_a',
                                        `pvFuel` = 100");
                                $amount = $detail['amount'] - 1;
                                $update_limit = $KNCMS->query("UPDATE `kncms_vehs` SET `amount` = '$amount' WHERE `name` = '$vehname'");
                                $cash = $user_ss['Money'] - $detail['price'];
                                $trutien = $KNCMS->query("UPDATE `accounts` SET
                                            `Money` = '$cash' WHERE `Username` = '$name'");
                                if ($trutien == 1) {
                                    if ($insert_veh == 1) {
                                        $uid = $user_ss['id'];
                                        KNCMS_Log("Bạn đã mua chiếc $vehname thành công", $uid);
                                        $KNCMS->msg_success("Bạn đã mua chiếc $vehname thành công | Xe của bạn sẽ ở vị trị bạn đang đứng", hUrl('Shop/VehicleDetail/' . $vehname), 2000);
                                    } else {
                                        $KNCMS->msg_error("Mua khong thanh cong", "", 1000);
                                    }
                                } else {
                                    $KNCMS->msg_error("Mua khong thanh cong", "", 1000);
                                }
                            } else {
                                $KNCMS->msg_error("Ban khong du tien", hUrl('Shop/VehicleDetail/' . $vehname), 1000);
                            }
                        } -->
                        <?php
                        if (isset($_POST['ooc_buy'])) {
                            $ooc = $knsite['PriceOOC'];
                            if ($user_ss['Credits'] >= $detail['ooc_price']) {
                                if($detail['amount'] < 0 ) $KNCMS->msg_error("Vật phẩm đã hết lượt bán rồi ! ", hUrl('Shop/Oto'), 1000);
                                $uid = $user_ss['id'];
                                $usn = $user_ss['Username'];
                                $vehname = $detail['name'];
                                $name = $user_ss['Username'];
                                $modelid = $detail['model'];
                                $pos_x = $user_ss['SPos_x'];
                                $pos_y = $user_ss['SPos_y'];
                                $pos_z = $user_ss['SPos_z'];
                                $pos_a = $user_ss['SPos_r'];
                                $type = $detail['type'];
                                $insert_veh = $KNCMS->query("INSERT INTO `vehicles` SET
                                        `sqlID` = '$uid', 
                                        `pvModelId` = '$modelid',
                                        `pvPosX` = '$pos_x',
                                        `pvPosY` = '$pos_y',
                                        `pvPosZ` = '$pos_z',
                                        `pvPosAngle` = '$pos_a',
                                        `pvFuel` = 100");
                                $cur = $user_ss['Credits'];
                                $cash = $user_ss['Credits'] - $detail['ooc_price'];
                                $amount = $detail['amount'] - 1;
                                ShopLog("$usn đã mua một chiếc $vehname",$type, $cur, $cash, $usn, $modelid);
                                UTF8Encodez("$usn đã mua một chiếc $vehname");
                                $update_limit = $KNCMS->query("UPDATE `kncms_vehs` SET `amount` = '$amount' WHERE `name` = '$vehname'");
                                $trutien = $KNCMS->query("UPDATE `accounts` SET
                                            `Credits` = '$cash' WHERE `Username` = '$name'");
                                if ($trutien == 1) {
                                    if ($insert_veh == 1) {
                                        $KNCMS->msg_success("Bạn đã mua chiếc $vehname thành công với $ooc",  hUrl('Shop/VehicleDetail/' . $vehname), 1000);
                                        $uid = $user_ss['id'];
                                        KNCMS_Log("Bạn đã mua chiếc $vehname thành công với $ooc", $uid);
                                    } else {
                                        $KNCMS->msg_error("Mua khong thanh cong", "", 1000);
                                    }
                                } else {
                                    $KNCMS->msg_error("Mua khong thanh cong", "", 1000);
                                }
                            } else {
                                $KNCMS->msg_error("Ban khong du tien",  hUrl('Shop/VehicleDetail/' . $vehname), 1000);
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
    <?php } else {
        $KNCMS->msg_error("Khong tim thay du lieu nay",  hUrl('Shop/VehicleDetail/' . $vehname), 1000);
    }
} else {
    $KNCMS->msg_error("Ban chua dang nhap", "$base_url/Auth/Login", 1000);
} ?>
    <?php require_once('../../../private/foot.php'); ?>