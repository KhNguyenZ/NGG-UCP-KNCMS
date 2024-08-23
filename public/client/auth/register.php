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

<body class="bg-main-kncms-controller" style="background: url('<?= $base_url ?>/lib/img/bg.png'); background-size: cover; ">

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
                                        <h1 class="h4 text-gray-900 mb-4">Đăng ký tài khoản!</h1>
                                    </div>
                                    <?php if (isset($_POST['SendRegister'])) {
                                        if (!isLogin()) {
                                            $username = $_POST['username'];
                                            $email = $_POST['email'];
                                            $recent_pw = $_POST['password'];
                                            $password = strtoupper(hash("whirlpool", $_POST['password']));
                                            $ip = getIp();
                                            $code = md5($username . $password . $email);
                                            $url = hUrl('Auth/Active/').$code;
                                            if (!empty($username) || !empty($password) || !empty($email)) {
                                                if (preg_match("/^[a-zA-Z_]*$/", $username) && preg_match("/^[a-zA-Z_0-9]*$/", $username)) {
                                                    if (strpos($username, "_") != 0) {
                                                        $check_username = $KNCMS->query("SELECT * FROM `accounts` WHERE `Username` = '$username' ");
                                                        $check_email = $KNCMS->query("SELECT * FROM `accounts` WHERE `Email` = '$email' ");
                                                        if ($check_email->num_rows == 0) {
                                                            if ($check_username->num_rows == 0) {
                                                                $sqlquery = "INSERT INTO `accounts` SET 
                                                                    `Username` = '$username', 
                                                                    `Key` = '$password',
                                                                    `Email` = '$email'";
                                                                echo $sqlquery;
                                                                $kncms_register = $KNCMS->query($sqlquery);
                                                                
                                                                if ($kncms_register) {
                                                                        sendCSM($email, $username, "Xác Thực Tài Khoản", "<div class='container-fluid py-4'>;
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
                                                                            $KNCMS_logz = $KNCMS->query("SELECT * FROM `accounts` WHERE `Username` = '$username' ")->fetch_array();
                                                                            $uid = $KNCMS_logz['id'];
                                                                            $_SESSION['username'] = $username;
                                                                    $KNCMS->msg_success("Đăng ký thành công", hUrl(''), 2000);
                                                                } else {
                                                                    $KNCMS->msg_error("Đăng ký đang bị khóa hoặc lỗi , hãy lh admin".$sqlquery,hUrl('/Auth/Register'), 10000);
                                                                }
                                                            } else {
                                                                $KNCMS->msg_error("Tài khoản đã tồn tại", hUrl('/Auth/Register'), 2000);
                                                            }
                                                        } else {
                                                            $KNCMS->msg_error("Email đã tồn tại", hUrl('/Auth/Register'), 2000);
                                                        }
                                                    } else {
                                                        $KNCMS->msg_error("Tài khoản phải chứa ký tự _ (VD: abc_abc)", hUrl('/Auth/Register'), 2000);
                                                    }
                                                } else {
                                                    $KNCMS->msg_error("Tài khoản hoặc mật khẩu không được chứa kí tự đặc biệt", hUrl('/Auth/Register'), 2000);
                                                }
                                            } else {
                                                $KNCMS->msg_error("Vui lòng nhập đầy đủ thông tin", hUrl('/Auth/Register'), 2000);
                                            }
                                        } else {
                                            $KNCMS->msg_error("Bạn đã đăng nhập", "$base_url", 2000);
                                        }
                                    }
                                    ?>
                                    <form class="user" method="POST">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" name="username" placeholder="Nhập tên ingame của bạn (VD: Big_abc)">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control form-control-user" name="email" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" name="SendRegister">
                                            Đăng ký tài khoản
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?=hUrl('Auth/ForgotPassword')?>">Quên Mật Khẩu?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= hUrl('Auth/Login') ?>">Bạn đã có tài khoản ? Đăng nhập</a>
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