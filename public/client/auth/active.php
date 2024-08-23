
<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php');
if (isset($_GET['code'])) {
    $code = $KNCMS->anti_text($_GET['code']);
}
$query = $KNCMS->query("SELECT * FROM `accounts` WHERE `active_code` = '$code' AND `active_status` = 1");
?>
<title>Xác Thực | <?= $knsite['Title'] ?></title>
<?php if ($query->num_rows) {
    $query = $query->fetch_array();
    $mail = $query['Email'];
    $name = $query['Username'];
?>
    <?php
    if (isset($_POST['active_btn'])) {
        $kncms_active = $KNCMS->query("UPDATE `accounts` SET
                                    `active_code` = '',
                                    `active_status` = 2
                                    WHERE `active_code` = '$code' ");
        $active_notice = sendCSM($mail, $name, "Xin chào $name", "Cảm ơn <b>$name</b> đã xác thực tài khoản , ngay bây giờ bạn có thể trải nghiệm game");
        if ($active_notice) {
            $KNCMS->msg_success("Bạn đã xác thực thành công", $base_url, 1000);
            KNCMS_Log("Bạn đã xác thực tài khoản thành công", $query['uid']);
        }
    }
    ?>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Xác thực</h6>
            </div>
            <form method="POST">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">Đây là trang xác thực tài khoản</h5>
                        <h4 class="card-title">Xin chào người chơi <b style="color: orange;"><?= $query['Username'] ?></b></h4>
                        <p class="card-title">Cảm ơn bạn đã tin tưởng và tham gia cùng <b style="color: cyan;"><?=$knsite['Title']?></b></p>
                        <button id="active_btn" name="active_btn" class="btn bg-gradient-dark w-100 my-4 mb-2">Xác Thực</button>
                    </center>
                </div>
            </form>
        </div>
    <?php } else {
    $KNCMS->msg_error("Không có mã xác thực này", $base_url, 2000);
} ?>
    <?php require_once('../../../private/foot.php'); ?>