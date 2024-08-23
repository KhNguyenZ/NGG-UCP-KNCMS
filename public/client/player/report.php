<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php');
?>
<?php if (isLogin()) { ?>
    <title>Báo lỗi | <?= $knsite['Title'] ?></title>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Báo lỗi</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group row">
                                <div class="col-md">
                                    <input class="form-control" type="text" name="report_text" placeholder="Nhập lỗi" />
                                </div>
                            </div>
                            <div class="form-group row" style="float: right;">
                                <button class="btn btn-success" name="KNCMSSendGift">Nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once('../../../private/foot.php'); ?>
    <?php } else {
    $KNCMS->msg_error("Bạn chưa đăng nhập", "$base_url", 1000);
} ?>