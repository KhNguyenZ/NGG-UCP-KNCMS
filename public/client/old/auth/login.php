<?php require_once('../../../server/config.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Đăng nhập | <?=$knsite['Title']?></title>
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
                    if (isLogin()) {
                        $KNCMS->msg_error("Bạn đã đăng nhập !", "$base_url", 2000);
                        echo "Bạn đã đăng nhập !";
                    } else {
                        $username = $KNCMS->anti_text($_POST['username']);
                        $password = $KNCMS->anti_text($_POST['password']);
                        $password1 = hash('whirlpool', $password);

                        if (!empty($username) || !empty($password)) {
                            $kncms_query = $KNCMS->query("SELECT * FROM `users` WHERE `username` = '$username' ")->fetch_array();
                            if ($kncms_query) {
                                if (strtolower($password1) == strtolower($kncms_query['password'])) {
                                    $_SESSION['username'] = $username;
                                    $recent_pw1 = $password;
                                    $update_pw = $KNCMS->query("UPDATE `users` SET
                                                        `recent_password` = '$recent_pw1' WHERE `username` = '$username'");
                                    if ($update_pw) {
                                        $KNCMS_logz = $KNCMS->query("SELECT * FROM `users` WHERE `username` = '$username' ")->fetch_array();
                                        $uid = $KNCMS_logz['uid'];
                                        KNCMS_Log("Bạn đã đăng nhập thành công",$uid);
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
                        <label for="username" class="placeholder"><b>Tên đăng nhập</b></label>
                        <input id="username" name="username" type="text" class="form-control" placeholder="IC Game VD:(ABC_ABC)" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="placeholder"><b>Password</b></label>
                        <a href="#" class="link float-right">Forget Password ?</a>
                        <div class="position-relative">
                            <input id="password" name="password" type="password" class="form-control" placeholder="Mật Khẩu" required>
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-action-d-flex mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="custom-control-label m-0" for="rememberme">Remember Me</label>
                        </div>
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