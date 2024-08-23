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
?>

<title>Danh Sách Faction | <?= $knsite['Title'] ?></title>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Tổ Chức</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="FactionTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Tổ Chức</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($KNCMS->get_list("SELECT * FROM `groups` WHERE `Name` != '' ORDER BY id desc LIMIT 5") as $row) { ?>
                            <tr>
                                <td>


                                    <span class="badge badge-pill badge-primary"><?= $row['id'] ?></span>
                                </td>
                                <td>


                                    <span class="badge badge-pill badge-info"><?= $row['Name'] ?></span>
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
            $('#FactionTable').DataTable();
        });
    </script>