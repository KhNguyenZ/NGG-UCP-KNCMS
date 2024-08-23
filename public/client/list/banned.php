
<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php'); ?>
<title>Danh Sách vi phạm | <?= $knsite['Title'] ?></title>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh Sách vi phạm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="AdminTable" class="display table table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Level</th>
                            <th>Lý do</th>
                            <th>Ngày band</th>
                            <th>Ngày unband</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($KNCMS->get_list("SELECT * FROM `bans` ORDER BY id desc") as $row) {
                            $idband = $row['user_id'];
                            $userban = $KNCMS->query("SELECT * FROM `accounts` WHERE `id` = '$idband'")->fetch_array();
                        ?>
                            <tr>
                                <td>
                                    <span class="badge  badge-primary"><?= $row['id'] ?></span>
                                </td>
                                <td>
                                    <span class="badge  badge-info"><?=$userban['Username']?></span>
                                </td>
                                <td>
                                    <span class="badge  badge-info"><?= $userban['Level'] ?></span>
                                </td>
                                <td>
                                    <?= $row['reason'] ?></span>
                                </td>
                                <td>
                                    <?= $row['date_added'] ?></span>
                                </td>
                                <td>
                                    <?= $row['date_unban'] ?></span>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <?php require_once('../../../private/foot.php'); ?>
        <script>
            $(document).ready(function() {
                $('#AdminTable').DataTable();
            });
        </script>