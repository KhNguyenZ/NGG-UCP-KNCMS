
<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php');
if (isset($_GET['name'])) {
  $name = $KNCMS->anti_text($_GET['name']);
}
$query = $KNCMS->query("SELECT * FROM `accounts` WHERE `Username` = '$name'");
if ($query->num_rows) {
  $query = $query->fetch_array();
?>
  <title>Profile - <?= $query['Username'] ?></title>
  <style>
    .progress {
      border-radius: 100px;
      height: 20px;
    }
  </style>
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thông tin người chơi</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <center>
              <p></p>
              <span class='badge badge-info'><?php echo (capbac($query['AdminLevel'])) ?></span>
              <p></p>
              <p><img src="<?= $base_url ?>/<?= getUserModel($query['Username']) ?>.png" width="100px" /></p>
              <br>
              <div class="progress mb-4" bis_skin_checked="1">
                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $query['pHealth'] ?>%" aria-valuenow="<?= $query['pHealth'] ?>" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"><?= $query['pHealth'] ?>%</div>
              </div>
              <div class="progress mb-4" bis_skin_checked="1">
                <div class="progress-bar bg-info" role="progressbar" style="width: <?= $query['pArmor'] ?>%" aria-valuenow="<?= $query['pArmor'] ?>" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"><?= $query['pArmor'] ?>%</div>
              </div>
            </center>

          </div>
          <div class="col-md-8">
            <div class="form-group row">
              <div class="col-md-4">
                <span>Tên đăng nhập:</span>
              </div>
              <div class="col-md-8">
                <b><?= $query['Username'] ?></b>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4">
                <span>Cấp độ:</span>
              </div>
              <div class="col-md-8">
                <b style="color: red;"><?= $query['Level'] ?></b>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4">
                <span>Cấp Độ Vip:</span>
              </div>
              <div class="col-md-8">
                <?php echo (GetVip($query['DonateRank'])) ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4">
                <span>Ngày sinh:</span>
              </div>
              <div class="col-md-8">
                <?= $query['BirthDate'] ?></div>
            </div>
            <div class="form-group row">
              <div class="col-md-4">
                <span>Thời gian đăng ký:</span>
              </div>
              <div class="col-md-8"><?= $query['RegiDate'] ?></div>
            </div>
            <div class="form-group row">
              <div class="col-md-4">
                <span>Lần cuối đăng nhập:</span>
              </div>
              <div class="col-md-8">
                <?= $query['LastLogin'] ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4">
                <span>Giới tính:</span>
              </div>
              <div class="col-md-8">
                <?php echo (GetGender($query['Sex'])) ?></div>
            </div>
            <div class="form-group row">
              <div class="col-md-4">
                <span>Mail:</span>
              </div>
              <?php if ($query['active_status'] == 2) { ?>
                <div class="col-md-8">
                  <div class="badge badge-success">Đã Xác Minh GMAIL</div>
                </div>
              <?php } else { ?>
                <div class="col-md-8">
                  <div class="badge badge-danger">Chưa Xác Minh GMAIL</div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if($query['ProfileToys'] == 1) { ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Toy người chơi</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <?php
          $uid = $query['id'];
          foreach ($KNCMS->get_list("SELECT * FROM `toys` WHERE `player` = '$uid' ORDER BY id desc") as $row) { ?>
            <div class="col-md-4">
              <center>
                <img src="https://files.prineside.com/gtasa_samp_model_id/white/<?= $row['modelid'] ?>_w.jpg" style="border-radius: 10px;" width="100px" height="100px">
                <hr>
                <h5 class="text-center">
                  <div class="badge badge-warning"><?= $row['modelid'] ?></div>
                </h5>
                <hr>
              </center>
            </div>
            <br></br>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php } if($query['ProfileVeh'] == 1) { ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Xe người chơi</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <?php
          $uid = $query['id'];
          foreach ($KNCMS->get_list("SELECT * FROM `vehicles` WHERE `sqlID` = '$uid' ORDER BY id desc") as $row) { ?>
            <div class="col-md-4">
              <img src="<?= $base_url ?>/lib/model/vehicles/Vehicle_<?= $row['pvModelId'] ?>.jpg" style="border-radius: 10px;" width="100%">
              <h5 class="text-center">
                <div class="badge badge-primary"><?= getVehiclesName($row['pvModelId']) ?></div>
              </h5>
              <div class="progress mb-4" bis_skin_checked="1">
                <div class="progress-bar bg-info" role="progressbar" style="width: <?= $row['pvFuel'] ?>%" aria-valuenow="<?= $row['pvFuel'] ?>" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"><?= $row['pvFuel'] ?>%</div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php require_once('../../../private/foot.php'); ?>
  <?php } else {
  $KNCMS->msg_error("Khong tim thay trang ca nhan nay", "<?=$base_url?>", 2000);
} ?>