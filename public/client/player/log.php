<!-- 
KNCMS - MazTech Develop Team 2023
Project OpenMP VN Roleplay
Copyright 
          Website - Khôi Nguyên (https://facebook.com/KhNguyenDev.MazTech)
          Gamemode - MazTech x Khôi Nguyên (https://facebook.com/maztech.dev) 
-->
<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php');
if (isLogin()) {
?>
    <title>Lịch sử tài khoản | <?= $knsite['Title'] ?></title>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lịch sử thao tác của <?= $user_ss['Username'] ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="LogPlayerTable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Log</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $uid = $user_ss['id'];
                            foreach ($KNCMS->get_list("SELECT * FROM `kncms_log` WHERE `uid` = '$uid' ORDER BY id desc LIMIT 20") as $row) { ?>
                                <tr>
                                    <td>
                                        <?= $row['id'] ?>
                                    </td>
                                    <td>
                                        <?= $row['log'] ?>
                                    </td>
                                    <td>
                                        <?= $row['time'] ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php } else {
    $KNCMS->msg_error("Ban chua dang nhap", "$base_urlAuth/Login", 1000);
} ?>
<!-- 
KNCMS - MazTech Develop Team 2023
Project OpenMP VN Roleplay
Copyright 
          Website - Khôi Nguyên (https://facebook.com/KhNguyenDev.MazTech)
          Gamemode - MazTech x Khôi Nguyên (https://facebook.com/maztech.dev) 
-->
<?php require_once('../../../private/foot.php'); ?>
