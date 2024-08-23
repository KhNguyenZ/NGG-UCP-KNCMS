
<?php require_once('../../../server/config.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Đăng ký | <?=$knsite['Title']?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= $base_url ?>assets/img/icon.ico" type="image/x-icon" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Fonts and icons -->
    <script src="<?= $base_url ?>assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['<?= $base_url ?>assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= $base_url ?>assets/auth.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/auth1.css">
</head>

<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center">Đăng Nhập Tài Khoản</h3>
            <div class="login-form">
                <?php if (isset($_POST['submit'])) {
                    if (!isLogin()) {
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $recent_pw = $_POST['password'];
                        $password = hash("whirlpool", $_POST['password']);
                        $ip = getIp();
                        $code = md5($username . $password . $email);
                        $url = '' . $base_url . '/Auth/Active/' . $code . '';
                        if (!empty($username) || !empty($password) || !empty($email)) {
                            if (preg_match("/^[a-zA-Z_]*$/", $username) && preg_match("/^[a-zA-Z_0-9]*$/", $username)) {
                                if (strpos($username, "_") != 0) {
                                    $check_username = $KNCMS->query("SELECT * FROM `users` WHERE `username` = '$username' ");
                                    $check_email = $KNCMS->query("SELECT * FROM `users` WHERE `email` = '$email' ");
                                    if ($check_email->num_rows == 0) {
                                        if ($check_username->num_rows == 0) {
                                            $kncms_register = $KNCMS->query("INSERT INTO `users` SET 
                                                        `username` = '$username', 
                                                        `password` = '$password',
                                                        `email` = '$email',
                                                        `regdate` = '$time', 
                                                        `ip` = '$ip',
                                                        `active_code` = '$code',
                                                        `active_status` = 1 ,
                                                        `recent_password` = '$recent_pw' ");
                                            $_SESSION['username'] = $username;
                                            $sendd = sendCSM($email, $username, "Xác Thực Tài Khoản", "<div class='container-fluid py-4'>
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
                                            if ($sendd) {
                                                echo 'Send Mail Success - Developed By Khoi Nguyen';
                                                $KNCMS_logz = $KNCMS->query("SELECT * FROM `users` WHERE `username` = '$username' ")->fetch_array();
                                                $uid = $KNCMS_logz['uid'];
                                                KNCMS_Log("Bạn đã đăng ký tài khoản thành công", $uid);
                                            }
                                            if ($kncms_register) {
                                                $KNCMS->msg_success("Đăng ký thành công", "$base_url", 2000);
                                            } else {
                                                $KNCMS->msg_error("Đăng ký đang bị khóa hoặc lỗi , hãy lh admin", "$base_url/Auth/Register", 2000);
                                            }
                                        } else {
                                            $KNCMS->msg_error("Tài khoản đã tồn tại", "$base_url/Auth/Register", 2000);
                                        }
                                    } else {
                                        $KNCMS->msg_error("Email đã tồn tại", "$base_url/Auth/Register", 2000);
                                    }
                                } else {
                                    $KNCMS->msg_error("Tài khoản phải chứa ký tự _ (VD: Khoi_Nguyen)", "$base_url/Auth/Register", 2000);
                                }
                            } else {
                                $KNCMS->msg_error("Tài khoản hoặc mật khẩu không được chứa kí tự đặc biệt", "$base_url/Auth/Register", 2000);
                            }
                        } else {
                            $KNCMS->msg_error("Vui lòng nhập đầy đủ thông tin", "$base_url/Auth/Register", 2000);
                        }
                    } else {
                        $KNCMS->msg_error("Bạn đã đăng nhập", "$base_url", 2000);
                    }
                }
                ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="username" class="placeholder"><b>Tên đăng nhập</b></label>
                        <input id="username" name="username" type="text" class="form-control" placeholder="IC Game VD:(Khoi_Nguyen)" required>
                    </div>
                    <div class="form-group">
                        <label for="username" class="placeholder"><b>Email</b></label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="Email VD: (maztechwork@gmail.com)" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="placeholder"><b>Password</b></label>
                        <div class="position-relative">
                            <input id="password" name="password" type="password" class="form-control" placeholder="Mật Khẩu" required>
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-action-d-flex mb-3">
                        <button id="submit" name="submit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="<?= $base_url ?>assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?= $base_url ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?= $base_url ?>assets/js/core/popper.min.js"></script>
    <script src="<?= $base_url ?>assets/js/core/bootstrap.min.js"></script>
    <script src="<?= $base_url ?>assets/js/atlantis.min.js"></script>
</body>

</html>