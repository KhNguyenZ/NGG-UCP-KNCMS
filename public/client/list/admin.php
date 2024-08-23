
<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php'); ?>
<title>Danh Sách Admin | <?= $knsite['Title'] ?></title>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Admin</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="AdminTable" class="display table table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Level</th>
                            <th>Admin Level</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($KNCMS->get_list("SELECT * FROM `accounts` WHERE `AdminLevel` > 0 ORDER BY AdminLevel desc") as $row) {
                        ?>
                            <tr>
                                <td>
                                    <span class="badge badge-pill badge-primary"><?= $row['id'] ?></span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-info"><?= $row['Username'] ?></span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-info"><?= $row['Level'] ?></span>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-info"><?= $row['AdminLevel'] ?></span>
                                </td>
                                <td>
                                    <?php if ($row['Online'] == 1) { ?>
                                        <span class="badge badge-pill badge-success">Online</span>
                                    <?php } else { ?>
                                        <span class="badge badge-pill badge-danger">Offline</span>
                                    <?php } ?>
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