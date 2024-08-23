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
            <h6 class="m-0 font-weight-bold text-primary">Xếp hạng money (SAD)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatabless" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Người Chơi</th>
                            <th>Cash</th>
                            <th>Cấp Bậc</th>
                            <th>Online</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($KNCMS->get_list("SELECT * FROM `accounts` WHERE `Money` > 1000 ORDER BY Money DESC LIMIT 100") as $row) { ?>
                            <tr>
                                <td>
                                    <?= $row['id'] ?>
                                </td>
                                <td>
                                    <a href="<?= $base_url ?>Player/<?= $row['Username'] ?>"><?= $row['Username'] ?>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-warning"><?= $KNCMS->format_cash($row['Money']) ?> SAD</span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-info"><?= capbac($row['AdminLevel']) ?></span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-success"><?= $row['ConnectedTime'] ?></span>
                                </td>
                            </tr>
                        <?php } ?>
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
