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
            <h6 class="m-0 font-weight-bold text-primary">Xếp hạng Materials</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatabless" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Người Chơi</th>
                            <th>VIP</th>
                            <th>Thời gian hết hạn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($KNCMS->get_list("SELECT * FROM `accounts` WHERE `VIPExpire` > 0 AND `DonateRank` > 0 ORDER BY VIPExpire DESC LIMIT 100") as $row) { ?>
                            <tr>
                                <td>
                                    <?= $row['id'] ?>
                                </td>
                                <td>
                                    <a href="<?= $base_url ?>Player/<?= $row['Username'] ?>"><?= $row['Username'] ?>
                                </td>
                                <td><?= GetVip($row['DonateRank'])?></td>
                                <td>
                                <span class="badge badge-pill badge-info"><?= gmdate("H : i : s", $row['VIPExpire']);?></span>
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
    <script>

    $(document).ready(function() {
    $('#basic-datatabless').DataTable({
        "order": [[ 3, "desc" ]]
    });
});
</script>