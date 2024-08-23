<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php');
?>
<?php if (isLogin()) { ?>
    <title>Giftcode | <?= $knsite['Title'] ?></title>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Giftcode</h6>
            </div>
            <div class="card-body">
                <?php if (isset($_POST['KNCMSSendGift'])) {
                    $gift = $KNCMS->anti_text($_POST['giftcode']);

                    $query = $KNCMS->query("SELECT * FROM `kncms_giftcode` WHERE `giftcode` = '$gift'");
                    if ($query->num_rows > 0) {
                        $query = $query->fetch_array();
                        if ($query['limit'] > 0) {
                            $uid = $user_ss['id'];
                            $giftid = $query['id'];
                            $gift_field = $query['field'];
                            $gift_amount = $user_ss[$gift_field] + $query['amount'];
                            $amount = $query['amount'];
                            $giftname = $query['giftname'];
                            $query_gift = $KNCMS->query("SELECT * FROM `kncms_log_gift` WHERE `uid` = '$uid' AND `gift_id` = '$giftid' ");
                            if ($query_gift->num_rows == 0) {
                                $UPDATE = $KNCMS->query("UPDATE `accounts` SET
                                    `$gift_field` = '$gift_amount' WHERE `id` = '$uid'");
                                if ($UPDATE) {
                                    $UPDATE_PLAYER = $KNCMS->query("INSERT INTO `kncms_log_gift` SET
                                            `gift_id` = $giftid,
                                            `uid` = $uid ");
                                    $limit = $query['limit'] - 1;
                                    $UPDATE_LIMIT = $KNCMS->query("UPDATE `kncms_giftcode` SET 
                                            `limit` = '$limit' WHERE `giftcode` = '$gift'");
                                    KNCMS_Log("Bạn đã nhập code $gift thành công", $uid);
                                    if (ceil($limit) == 0) {
                                        $UPDATE_LIMIT = $KNCMS->query("DELETE `kncms_giftcode` WHERE `giftcode` = '$gift'");
                                    }
                                    $KNCMS->msg_success("Bạn đã nhập giftcode thành công và nhận đc $amount - $giftname", "$base_url", 2000);
                                }
                            } else $KNCMS->msg_warning("Bạn đã nhập code này rồi !", "", 1000);
                        } else $KNCMS->msg_warning("Giftcode đã hết hạn", "", 1000);
                    } else $KNCMS->msg_warning("Giftcode này không tồn tại !", "", 1000);
                }
                ?>
                <form method="POST">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Giftcode</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="giftcode" placeholder="Nhập giftcode" />
                        </div>
                    </div>
                    <div class="form-group row" style="float: right;">
                        <button class="btn btn-success" name="KNCMSSendGift">Nhận</button>
                    </div>
                </form>
            </div>
        </div>
        <?php require_once('../../../private/foot.php'); ?>
    <?php } else {
    $KNCMS->msg_error("Bạn chưa đăng nhập", "$base_url", 1000);
} ?>