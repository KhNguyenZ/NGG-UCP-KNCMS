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
require_once('../../../private/nav.php'); ?>
<title>Danh Sách Thành Viên | <?= $knsite['Title'] ?></title>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Xếp hạng Pot</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Người Chơi</th>
                            <th>Tổng súng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($KNCMS->get_list("SELECT * FROM `accounts` WHERE `ConnectedTime` > 0 ORDER BY ConnectedTime DESC") as $row) {
                            $count = 0;
                            for ($i = 0; $i < 12; $i++) {
                                if ($row['Gun' . $i] != 0) $count++;
                            }
                            if ($count > 0) {
                        ?>
                                <tr>
                                    <td>
                                        <?= $row['id'] ?>
                                    </td>
                                    <td>
                                        <a href="<?= $base_url ?>Player/<?= $row['Username'] ?>"><?= $row['Username'] ?>
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-info"><?= $count ?></span>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- 
KNCMS - MazTech Develop Team 2023
Project OpenMP VN Roleplay
Copyright 
          Website - Khôi Nguyên (https://facebook.com/KhNguyenDev.MazTech)
          Gamemode - MazTech x Khôi Nguyên (https://facebook.com/maztech.dev) 
-->
    <?php require_once('../../../private/foot.php'); ?>