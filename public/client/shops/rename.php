<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php');
if(isLogin())
{
    if(CheckOnline()) $KNCMS->msg_error("Bạn vui lòng thoát game để thực hiện thao tác", hUrl('Home'), 1000);
    if(VaildEmail()) $KNCMS->msg_error("Bạn vui lòng xác thực email  để thực hiện thao tác", hUrl('Home'), 1000);
    if (VaildAccount()) $KNCMS->msg_error("Bạn vui lòng Khởi tạo account để thực hiện thao tác", hUrl('Home'), 1000);
}
?>

<?php if (isLogin()) { ?>
    <title>Đổi tên | <?= $knsite['Title'] ?></title>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Đổi tên</h6>
            </div>
            <div class="card-body">
                <label>Yêu cầu:</label>
                <ul style="color: red;">
                    <li>Tên vui lòng có dấu "_" trong IC</li>
                    <li>Thoát game trước khi đổi tên</li>
                    <li>Giá đổi tên: <?= $knsite['PriceRename'] ?> <?= $knsite['PriceOOC'] ?></li>
                </ul>
                <?php if (isset($_POST['RenameBtn'])) {
                    if (!empty($_POST['name']) || $KNCMS->anti_text($_POST['name']) == $user_ss['Username']) {
                        $user = $user_ss['Username'];
                        if (strpos($_POST['name'], "_")) {
                            $name = $KNCMS->anti_text($_POST['name']);
                            if ($user_ss['Credits'] >= $knsite['PriceRename']) {
                                $cur = $user_ss['Credits'];
                                $curname = $user_ss['Username'];
                                $coin = $user_ss['Credits'] - $knsite['PriceRename'];
                                if ($KNCMS->query("UPDATE `accounts` SET `Credits` = '$coin' WHERE `id` = '$uid'")) {
                                    if ($KNCMS->query("UPDATE `accounts` SET `Username` = '$name' WHERE `id` = '$uid'")) {
                                        $_SESSION['username'] = $name;
                                        $newname = $name;
                                        KNCMS_Log("Bạn đã đổi tên thành công", $uid);
                                        if(RenameLog("$user đã đổi tên thành công","rename", $cur, $coin, $user, $curname, $newname)){
                                            $KNCMS->msg_success("Đổi tên thành công", hUrl('Rename'), 1000);
                                        }
                                    }
                                } else $KNCMS->msg_warning("Lỗi thanh toán Coins", "", 1000);
                            } else $KNCMS->msg_warning("Bạn không đủ Coins để thanh toán", "", 1000);
                        } else $KNCMS->msg_warning("IC thiếu dấu " . "'_'", "", 1000);
                    } else $KNCMS->msg_warning("Tên không hợp lệ hoặc trùng với IC hiện tại", "", 1000);
                }
                ?>
                <form method="POST">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Đổi tên</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="name" placeholder="Tên cần đổi (VD: Big_Abc)" />
                        </div>
                    </div>
                    <div class="form-group row" style="float: right;">
                        <button class="btn btn-success" name="RenameBtn">Đổi</button>
                    </div>
                </form>
            </div>
        </div>
        <?php require_once('../../../private/foot.php'); ?>
    <?php } else {
    $KNCMS->msg_error("Bạn chưa đăng nhập", "$base_url", 1000);
} ?>