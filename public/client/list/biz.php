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
<title>Danh Sách Cửa Hàng | <?= $knsite['Title'] ?></title>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Tổ Chức</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="BizTable" class="display table table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Cửa Hàng</th>
                            <th>Owner</th>
                            <th>Giá Bán</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($KNCMS->get_list("SELECT * FROM `businesses` WHERE `name` != '' AND `name` != 'noname' ORDER BY id desc") as $row) {
                        ?>
                            <tr>
                                <td>
                                    <span class="badge badge-pill badge-primary"><?= $row['Id'] ?></span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-info"><?= $row['Name'] ?></span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-info"><?= $row['OwnerName'] ?></span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-warning"><?= $KNCMS->format_cash($row['Value']) ?> SAD</span>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
        <script>
            $(document).ready(function() {
                $('#BizTable').DataTable();
            });
        </script>