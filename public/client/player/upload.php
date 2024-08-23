<?php require_once('../../../server/config.php');
require_once('../../../private/head.php');
require_once('../../../private/nav.php');
?>
<?php
if (isset($_POST['submit_upload'])) {
    $file_name = $_FILES['mp3']['name'];
    $file_size = $_FILES['mp3']['size'];
    $file_tmp = $_FILES['mp3']['tmp_name'];
    $file_type = $_FILES['mp3']['type'];
    $file_parts = explode('.', $_FILES['mp3']['name']);
    $file_ext = strtolower(end($file_parts));
    $expensions = array("mp3");
    $url = "$base_url" . "private_upload/$file_name";
    $mp3 = $_FILES['mp3']['name'];
    $target = "../../../private_upload/" . basename($mp3);
    if (move_uploaded_file($file_tmp, $target)) {
        if ($KNCMS->query("SELECT * FROM `kncms_mp3` WHERE `name` = '$file_name'")->num_rows == 0) {
            $insert = $KNCMS->query("INSERT INTO `kncms_mp3` SET
            `uid` = '$uid',
            `name` = '$file_name',
            `link` = '$url' ");
            if ($insert) $KNCMS->msg_success("Da upload thanh cong", "", 1000);
            else $KNCMS->msg_error("Upload that bai !", "", 1000);
        } else $KNCMS->msg_warning("Tập MP3 này đã tồn tại trên máy chủ !", "", 1000);
    }
}
if(isset($_GET['action']))
{
    if($_GET['action'] == 'del' && !empty($_GET['name']))
    {
        $mp3_name = $_GET['name'];
        if($KNCMS->query("SELECT * FROM `kncms_mp3` WHERE `name` = '$mp3_name'")->num_rows > 0)
        {
            if($KNCMS->query("DELETE FROM `kncms_mp3` WHERE `name` = '$mp3_name'")) $KNCMS->msg_success("Xóa thành công", "$base_url/UploadMP3", 1000);
            else $KNCMS->msg_warning("Xóa không thành công", "$base_url/UploadMP3", 1000);
        }
        else $KNCMS->msg_warning("Tệp không tồn tại", "$base_url/UploadMP3", 1000);
    }
}
if (isLogin()) { 
    $uid = $user_ss['uid'];
    ?>

    <title>SERVER MP3 | <?= $knsite['Title'] ?></title>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Upload Nhac</h4>
                    </div>
                    <div class="card-body">
                        <form class="KNCMSController" action="" method="POST" enctype="multipart/form-data">
                            <input class="form-control" type="file" name="mp3" accept=".mp3">
                            <div class="form-group row" style="float: right;">
                                <button class="btn btn-success" name="submit_upload">UPLOAD</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh sách mp3</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>LINK</th>
                                    <th>Thao tác</th>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                    foreach($KNCMS->get_list("SELECT * FROM `kncms_mp3` WHERE `uid` = '$uid'") as $data)
                                    {?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$data['name']?></td>
                                        <td><?=$data['link']?></td>
                                        <td><a href="<?=$base_url?>UploadMP3?action=del&name=<?=$data['name']?>" name = "control_delete" class="btn btn-danger" style="color: white;">Xóa</a></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else $KNCMS->msg_warning("Chưa đăng nhập kìa !!!!", "$base_url", 1000);
require_once('../../../private/nav.php'); ?>