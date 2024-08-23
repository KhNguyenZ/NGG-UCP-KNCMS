<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php');
?>
<?php if (isLogin()) { ?>
    <title>Cài đặt tài khoản | <?= $knsite['Title'] ?></title>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cài đặt tài khoản</h6>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab-nobd" data-toggle="pill" href="#caidatchung" role="tab" aria-controls="napthecao" aria-selected="true">Cài đặt chung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" href="#caidatemail" role="tab" aria-controls="pills-profile-nobd" aria-selected="false">Cài đặt email</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" href="#reportcrash" role="tab" aria-controls="pills-profile-nobd" aria-selected="false">Báo cáo crash</a>
                    </li>
                </ul>
                <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                    <div class="tab-pane fade show active" id="caidatchung" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                        <?php if (isset($_POST['btnSave'])) {
                            $profileveh = $_POST['veh'];
                            $profiletoys = $_POST['toys'];
                            $update = $KNCMS->query("UPDATE `accounts` SET `ProfileVeh` = '$profileveh', `ProfileToys` = '$profiletoys' WHERE `id` = '$uid'");
                            if ($update) $KNCMS->msg_success("Lưu thành công", "", 1000);
                        }
                        ?>
                        <form method="POST">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Bật tắt profile xe</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="veh">
                                        <?php if ($user_ss['ProfileVeh'] == 1) { ?>
                                            <option value="1" style="color: green;">Cho phép xem</option>
                                            <option value="2" style="color: red;">Không cho phép</option>
                                        <?php } else { ?>
                                            <option value="2" style="color: red;">Không phép phép</option>
                                            <option value="1" style="color: green;">Cho phép xem</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Bật tắt profile toy</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="toys">
                                        <?php if ($user_ss['ProfileToys'] == 1) { ?>
                                            <option value="1" style="color: green;">Cho phép xem</option>
                                            <option value="2" style="color: red;">Không cho phép</option>
                                        <?php } else { ?>
                                            <option value="2" style="color: red;">Không phép phép</option>
                                            <option value="1" style="color: green;">Cho phép xem</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" style="float: right;">
                                <button name="btnSave" class="btn btn-success">Lưu</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="reportcrash" role="tabpanel" aria-labelledby="pills-profile-tab-nobd">
                        <?php if(isset($_POST['btnFixCrash'])) {
                            if($user_ss['PendingCrash'] == 0)
                            {
                                $usn = $user_ss['Username'];
                                if($KNCMS->query("UPDATE `accounts` SET `PendingCrash` = '1' WHERE `Username` = '$usn'"))
                                {
                                    $KNCMS->msg_success("Đã gửi báo cáo thành công", "", 1000);
                                }
                                else $KNCMS->msg_error("Đã gửi báo cáo không thành công", "", 1000);
                            }
                            else $KNCMS->msg_error("Bạn đã gửi báo cáo trước đó rồi !", "", 1000);
                        }
                        ?>
                        <form method="POST">
                            <div class="form-group row" style="float: center;">
                                <button class="btn btn-danger" name="btnFixCrash">Yêu cầu fix crash</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="caidatemail" role="tabpanel" aria-labelledby="pills-profile-tab-nobd">
                        <?php if (isset($_POST['btnSaveEmail'])) {
                            $oldmail = $_POST['OldEmail'];
                            $newmail = $_POST['NewEmail'];
                            $mkc2 = $_POST['mkc2'];
                            if (empty($oldmail) || empty($newmail) || empty($mkc2)) $KNCMS->msg_error("Không được để trống thông tin", "", 1000);

                            if ($mkc2 == $user_ss['Pin']) {
                                if ($oldmail == $user_ss['Email']) {
                                    $code = 'kncms-' . md5('kncms' . 'maztech' . $newmail . $oldmail . $mkc2);
                                    $url = hUrl('Auth/Active/') . $code;

                                    $update = $KNCMS->query("UPDATE `accounts` SET 
                                    `Email` = '$newmail',
                                    `active_status` = '1',
                                    `active_code` = '$code'
                                    WHERE `id` = '$uid'");
                                    if ($update) {
                                        $sendd = sendCSM($newmail, $username, "Xác Thực Tài Khoản", "
                                        <div class='container-fluid py-4'>
                                        <div class='row'>
                                            <div class='text-center'>
                                                <div class='card'>
                                                    <div class='card-body p-3'>
                                                        <div class='row'>
                                                            <div class='col-lg-6'>
                                                                <div class='d-flex flex-column h-100'>
                                                                    <h5 class='font-weight-bolder'>Bạn vui lòng xác thực tài khoản</h5>
                                                                    <p class='mb-5'>Cảm ơn bạn đã tin tưởng và tham gia cùng <b>".$knsite['Title']."</b>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href='$url' class='btn bg-gradient-dark w-100 my-4 mb-2'>$url</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>");
                                        if ($sendd) $KNCMS->msg_success("Đổi email thành công , vui lòng xác thực email mới", hUrl('Home'), 1000);
                                    }
                                } else $KNCMS->msg_warning("Email cũ không chính xác", "", 1000);
                            } else $KNCMS->msg_warning("Mật khẩu cấp 2 không chính xác", "", 1000);
                        }
                        ?>
                        <form method="POST">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Email cũ</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="email" name="OldEmail" placeholder="Xác nhận email cũ" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Email mới</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="email" name="NewEmail" placeholder="Email mới" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Mật khẩu cấp 2</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="mkc2" placeholder="Mật khẩu cấp 2" />
                                </div>
                            </div>
                            <div class="form-group row" style="float: right;">
                                <button class="btn btn-success" name="btnSaveEmail">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once('../../../private/foot.php'); ?>
    <?php } else {
    $KNCMS->msg_error("Bạn chưa đăng nhập kìa", "$base_url/Auth/Login", 1000);
} ?>