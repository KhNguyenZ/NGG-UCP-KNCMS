<?php require_once('../../../server/config.php'); ?>

<?php require_once('../../../private/head.php'); ?>
<link rel="stylesheet" href="<?= $base_url ?>lib/css/KhNguyenDev.css">
<?php require_once('../../../private/nav.php'); ?>
<?php if (isLogin()) {
    $uid = $user_ss['id'] ?>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Box chat tổng</h6>
            </div>
            <div class="card-body">
                <div class="conversations">
                    <div class="conversations-body">
                        <ul>
                            <li style="color: red;">Vui lòng không nói tục chửi thề trên kênh chat tổng !</li>
                            <li style="color: red;">Vi phạm sẽ bị cấm chat</li>
                            <li style="color: green;">Chúc bạn trò chuyện vui vẻ</li>
                        </ul>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col">
                                    <input name="comment" type="text" class="form-control" placeholder="Nhập Tin Nhắn">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" name="guicmt" class="btn btn-primary">Gửi</button>
                                </div>
                            </div>
                        </form>

                        <div class="col">
                        </div>
                        <?php
                        if (isset($_POST['guicmt'])) {
                            $cmt = $_POST['comment'];
                            if (!$username) {
                                $KNCMS->msg_warning("Vui lòng đăng nhập để chat", hUrl('Auth/Login'), 1000);
                            } else if ($cmt == "") { ?>
                                <script>
                                    swal.fire("Thông Báo", "Vui Lòng Nhập Nội Dung", "error");
                                </script>
                            <?php } else {

                                $KNCMS->query("INSERT INTO `kncms_chats` SET 
                                            `name` = '$username',
                                            `text` = '$cmt',
                                            `time` = '$timez' ");
                                $KNCMS->msg_success("Gửi tin nhắn thành công", hUrl('Chat'), 1000);
                            }
                        } ?>
                        <div class="sidebar-wrapper scrollbar scrollbar-inner">
                            <div class="conversations-content bg-dark">
                                <?php
                                foreach ($KNCMS->get_list("SELECT * FROM `kncms_chats` ORDER BY id desc LIMIT 4") as $chat) {
                                    $us = $chat['name'];
                                    if ($KNCMS->query("SELECT * FROM `accounts` WHERE `Username` = '$us'")->num_rows > 0) {
                                        $userchat = $KNCMS->query("SELECT * FROM `accounts` WHERE `Username` = '$us'")->fetch_array();
                                    }
                                ?>
                                    <div class="message-content-wrapper">
                                        <div class="message message-in">
                                            <div class="avatar avatar-sm">
                                                <img src="https://baoit.s3.jp-tok.cloud-object-storage.appdomain.cloud/game/model/<?= $userchat['Model'] ?>.png" class="sidebar-card-illustration mb-2 img-profile rounded-circle" style="width: 50px; height: 50px;">
                                            </div>
                                            <div class="message-body">
                                                <div class="message-content">
                                                    <div class="name"><b><?= $us ?></b></div>
                                                    <div class="content"><?= $chat['text'] ?></div>
                                                </div>
                                                <div class="date"><?= $chat['time'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else $KNCMS->msg_error("Chưa đăng nhập !", "$base_url", 1000); ?>
    <?php require_once('../../../private/foot.php'); ?>