<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php');
?>
<?php if (isLogin()) { 
    if($user_ss['Pin'] == '') {
    ?>
    <title>Tạo mã pin | <?= $knsite['Title'] ?></title>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tạo mã pin</h6>
            </div>
            <div class="card-body">
                <?php if (isset($_POST['CreatePinBtn'])) 
                {
                    if ($user_ss['active_status'] == 2) {
                        if(strlen($_POST['pin']) >= 4)
                        {
                            $pin = $_POST['pin'];
                            if($KNCMS->query("UPDATE `accounts` SET `Pin` = '$pin' WHERE `id` = '$uid'"))
                            {
                                $KNCMS->msg_success("Tạo mật khẩu cấp 2 thành công", hUrl('Home'), 1000);
                            }
                        }
                        else $KNCMS->msg_warning("Độ dài mật khẩu phải trên 4 kí tự", "",1000);
                    } else $KNCMS->msg_warning("Vui lòng xác thực Email trước khi tạo mật khẩu cấp 2", hUrl('Home'), 1000);
                }
                ?>
                <form method="POST">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Tạo mã pin</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="pin" placeholder="Nhập mật khẩu cấp 2 ( mã bảo mật )" />
                        </div>
                    </div>
                    <div class="form-group row" style="float: right;">
                        <button class="btn btn-success" name="CreatePinBtn">Tạo</button>
                    </div>
                </form>
            </div>
        </div>
        <?php require_once('../../../private/foot.php'); ?>
    <?php } else $KNCMS->msg_error("Bạn đã tạo mã Pin trước đó", "$base_url", 1000);
    } else $KNCMS->msg_error("Bạn chưa đăng nhập", "$base_url", 1000);
?>