<?php require_once('../../../server/config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login | <?= $knsite['Title'] ?></title>
    <link href="<?= $base_url ?>/lib/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= $base_url ?>/lib/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/54b11bb8ef.js" crossorigin="anonymous"></script>

</head>
<style>
    .fullscreen {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  overflow: auto;
  background: lime; /* Just to visualize the extent */
  
}
</style>
<body class="bg-main-kncms-controller fullscreen" 
style="background: url('<?= $base_url ?>/lib/img/bg.png') ;background-size: cover;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Chào mừng trở lại!</h1>
                                    </div>
                                    <?php if (isset($_POST['SendLogin'])) {
                                        if (isLogin()) {
                                            $KNCMS->msg_error("Bạn đã đăng nhập !", "$base_url", 2000);
                                            echo "Bạn đã đăng nhập !";
                                        } else {
                                            $username = $KNCMS->anti_text($_POST['username']);
                                            $password = $KNCMS->anti_text($_POST['form_password']);
                                            $password1 = hash('whirlpool', $password);
                                            // $pin = $_POST['pin'];

                                            if (!empty($username) || !empty($password)) {
                                                $kncms_query = $KNCMS->query("SELECT * FROM `accounts` WHERE `Username` = '$username' ")->fetch_array();
                                                if ($kncms_query) {
                                                    if (strtoupper($password1) == strtoupper($kncms_query['Key'])) {
                                                        $_SESSION['username'] = $username;
                                                        $recent_pw1 = $password;
                                                        $update_pw = $KNCMS->query("UPDATE `accounts` SET
                                                        `recent_password` = '$recent_pw1' WHERE `Username` = '$username'");
                                                        if ($update_pw) {
                                                            $KNCMS_logz = $KNCMS->query("SELECT * FROM `accounts` WHERE `Username` = '$username' ")->fetch_array();
                                                            $uid = $KNCMS_logz['id'];
                                                            KNCMS_Log("Bạn đã đăng nhập thành công", $uid);
                                                            $KNCMS->msg_success("Đăng Nhập Thành Công!", "$base_url", 2000);
                                                        }
                                                    } else {
                                                        $KNCMS->msg_error("Mật Khẩu Không Chính Xác", "", 1000);
                                                    }
                                                } else {
                                                    $KNCMS->msg_error("Tài Khoản Không Hợp Lệ", "", 1000);
                                                }
                                            } else {
                                                $KNCMS->msg_error("Vui lòng nhập đủ thông tin!", "", 1000);
                                            }
                                        }
                                    } ?>
                                    <form method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Nhập tên ingame của bạn (VD: Big_abc)">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="form_password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" name="SendLogin">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?=hUrl('Auth/ForgotPassword')?>">Quên mật khẩu</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?=hUrl('Auth/Register')?>">Đăng ký</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>