
<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php'); ?>
<?php
if (isLogin()) {
    if ($user_ss['AdminLevel'] < 6) $KNCMS->msg_error("Bug cmm cut", hUrl('Home'), 10000);
} else $KNCMS->msg_error("Bug cmm cut 1", hUrl('Auth/Login'), 1000);
if (isset($_GET['active'])) {
    $name = $KNCMS->anti_text($_GET['active']);
    if (check_rows($name, 'accounts', 'Username')) {
        $act = $KNCMS->query("SELECT * FROM `accounts` WHERE `Username` = '$name'")->fetch_array();
        AdminLog("Tài khoản $name đã được xác nhận bởi ".$user_ss['Username'],$user_ss['Username'],1);
        $update = $KNCMS->query("UPDATE `accounts` SET
        `active_account` = '1' WHERE `Username` = '$name'");
        if ($update) $KNCMS->msg_success("Xác nhận thành công | IC:$name", hUrl('VerifyAccount'), 1000);
    }
}
if (isset($_GET['tuchoi'])) {
    $name = $KNCMS->anti_text($_GET['tuchoi']);
    if (check_rows($name, 'accounts', 'Username')) {
        $act = $KNCMS->query("SELECT * FROM `accounts` WHERE `Username` = '$name'")->fetch_array();
        AdminLog("Tài khoản $name đã bị từ chối bởi ".$user_ss['Username'],$user_ss['Username'], 0);
        $update = $KNCMS->query("UPDATE `accounts` SET
        `active_account` = '-1' WHERE `Username` = '$name'");
        if ($update) $KNCMS->msg_warning("Từ chối | IC:$name", hUrl('VerifyAccount'), 1000);
    }
}
?>
<title>Danh Sách Account Chưa Xác Thực | <?= $knsite['Title'] ?></title>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Account Chưa Xác Thực</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="AdminTable" class="display table table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($KNCMS->get_list("SELECT * FROM `accounts` WHERE `active_account` = 0 ORDER BY id desc LIMIT 10") as $row) { ?>
                            <tr>
                                <td>
                                    <span class="badge badge-pill badge-primary"><?= $row['id'] ?></span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-info"><?= $row['Username'] ?></span>
                                </td>
                                <td>
                                    <a href="?active=<?= $row['Username'] ?>" class="btn btn-success">Xác thực</a>
                                    <a href="?tuchoi=<?= $row['Username'] ?>" class="btn btn-danger">Từ chối</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require_once('../../../private/foot.php'); ?>
    <script>
        $(document).ready(function() {
            $('#AdminTable').DataTable();
        });
    </script>