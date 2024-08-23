
<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php');
if (isset($_GET['code'])) {
    $code = $_GET['code'];
}
$query = $KNCMS->query("SELECT * FROM `accounts` WHERE `reset_code` = '$code' AND `reset_status` = '1'");
if(isLogin()) $KNCMS->msg_warning("Bạn đang đăng nhập không thể thực hiện chức năng này", hUrl('Auth/Logout'), 1000);

?>
<title>Khôi phục mật khẩu | <?= $knsite['Title'] ?></title>
<?php if ($query->num_rows) {
    $query = $query->fetch_array();
    $mail = $query['Email'];
    $name = $query['Username'];
?>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Khôi phục mật khẩu</h6>
            </div>
            <form method="POST">
                <div class="card-body">
                    <center>
                        <?php 
                        if(isset($_POST['btnForgot']))
                        {
                            if($_POST['password'] != $_POST['repassword']) $KNCMS->msg_error("Xác nhận mật khẩu mới không khớp", "", 1000);
                            $id = $query['id'];
                            $password = strtoupper(hash('whirlpool', $_POST['password']));
                            if($KNCMS->query("UPDATE `accounts` SET `Key` = '$password' WHERE `id` = '$id'")) $KNCMS->msg_success("Khôi phục mật khẩu thành công", hUrl('Auth/Login'), 1000);
                            else $KNCMS->msg_error("Có vấn đề , lien he admin", 1000);
                        }
                        ?>
                        <form method="POST">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Mật khẩu mới</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="password" name="password" placeholder="Mật khẩu mới" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Xác nhận mật khẩu mới</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="repassword" placeholder="Xác nhận mật khẩu mới" />
                                </div>
                            </div>
                            <div class="form-group row" style="float: right;">
                                <button class="btn btn-success" name="btnForgot">Khôi phục</button>
                            </div>
                        </form>
                    </center>
                </div>
            </form>
        </div>
    <?php } else {
    $KNCMS->msg_error("Không có mã Khôi phục mật khẩu này", $base_url, 2000);
} ?>
    <?php require_once('../../../private/foot.php'); ?>