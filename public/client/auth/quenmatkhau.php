<?php require_once('../../../server/config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quên mật khẩu | <?= $knsite['Title'] ?></title>
    <link href="<?= $base_url ?>/lib/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= $base_url ?>/lib/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/54b11bb8ef.js" crossorigin="anonymous"></script>

</head>

<body class="bg-main-kncms-controller" style="background: url('<?= $base_url ?>/lib/img/bg.png') no-repeat !important;">

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
                                        <h1 class="h4 text-gray-900 mb-4">Quên mật khẩu</h1>
                                    </div>
                                    <?php if (isset($_POST['SendForgot'])) {
                                        if(empty($_POST['name'])) $KNCMS->msg_error("Tên không được để trống", "", 1000);
                                        $ic = $_POST['name'];
                                        if(check_rows($ic,'accounts', 'Username'))
                                        {
                                            $user_forgot = $KNCMS->query("SELECT * FROM `accounts` WHERE `Username` = '$ic'")->fetch_array();
                                            $code = md5($user_forgot['id'].$ic.'kncms');
                                            $url = hUrl('Auth/ConfirmPassword/'.$code);
                                            $update = $KNCMS->query("UPDATE `accounts` SET
                                            `reset_code` = '$code',
                                            `reset_status` = '1' WHERE `Username` = '$ic'");
                                            $sendcms = sendCSM($user_forgot['Email'], $user_forgot['Username'],"Khôi phục mật khẩu", 
                                            "
                                            Xin chào<b>$ic</b> , bạn đã gửi 1 yêu cầu lấy lại mật khẩu 
                                            <br>
                                            Đây là link <b>khôi phục của bạn</b><a href='$url'>$url</a>
                                            ");
                                            if($sendcms) $KNCMS->msg_success("Đã gửi yêu cầu khôi phục mật khẩu <br>Vui lòng kiểm tra hộp thư của bạn", "", 10000);
                                        }
                                        else $KNCMS->msg_warning("Player này không tồn tại", "", 1000);
                                    }
                                    ?>
                                    <form method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="name" placeholder="Nhập tên ingame của bạn (VD: abc_abc)">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" name="SendForgot">
                                            Khôi Phục
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= hUrl('Auth/Login') ?>">Đăng nhập</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= hUrl('Auth/Register') ?>">Đăng ký</a>
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