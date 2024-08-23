<?php require_once('../../../server/config.php'); ?>
<?php
require_once('../../../private/head.php');
require_once('../../../private/nav.php');
?>
<?php if (isLogin()) { ?>
    <title>Nạp tiền | <?= $knsite['Title'] ?></title>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Nạp thẻ</h6>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab-nobd" data-toggle="pill" href="#napthecao" role="tab" aria-controls="napthecao" aria-selected="true">Nạp thẻ cào</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" href="#pills-profile-nobd" role="tab" aria-controls="pills-profile-nobd" aria-selected="false">Nạp MOMO</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link active" href="https://gsamp.vn/ucp/bank" ">Nạp Ngân Hàng</a
                    </li>
                </ul>
                <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                    <div class="tab-pane fade show active" id="napthecao" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                        <?php
                        function curl_get($url)
                        {
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $data = curl_exec($ch);
                            curl_close($ch);
                            return $data;
                        }
                        if (isset($_POST['KNCMSSendCard'])) 
                        {
                            $telco = $_POST['telco'];
                            $amount = $_POST['amount'];
                            $serial = $_POST['serial'];
                            $code = $_POST['code'];

                            if (!$telco) $KNCMS->msg_error("Bạn chưa chọn loại thẻ", hUrl('NapTien'), 1000);
                            if (!$amount) $KNCMS->msg_error("Bạn chưa chọn mệnh giá thẻ", hUrl('NapTien'), 1000);
                            if (!$serial) $KNCMS->msg_error("Bạn chưa nhập seri thẻ", hUrl('NapTien'), 1000);
                            if (!$code) $KNCMS->msg_error("Bạn chưa nhập mã thẻ", hUrl('NapTien'), 1000);
                            $ranid  = rand(1111111111, 9999999999);
                            $partner_id = $knsite['APIID'];
                            $partner_key = $knsite['APIKey'];
                            $url = 'https://www.doithe1s.vn/chargingws/v2?sign=' . md5($partner_key . $code . $serial) . '&telco=' . $telco . '&code=' . $code . '&serial=' . $serial . '&amount=' . $amount . '&request_id=' . $ranid . '&partner_id=' . $partner_id . '&command=charging';
                            $data = curl_get($url);
                            $json = json_decode($data, true);
                            $servercard = GetServerCard($knsite['ServerAPI']);
                            $status = $json['status'];
                            $uid = $user_ss['id'];
                            $napthe = $KNCMS->query("INSERT INTO `kncms_napthe` SET
                                    `type` = '$telco',
                                    `amount` = '$amount',
                                    `serial` = '$serial',
                                    `code` = '$code',
                                    `status` = '$status',
                                    `uid` = $uid,
                                    `server_api` = '$servercard',
                                    `mgd` = '$ranid' ");
                            if (!$napthe) $KNCMS->msg_error("Nap the khong thanh cong , vui long inbox Khôi Nguyên", hUrl('NapTien'), 1000);
                            if ($json['status'] == 100) {
                                $res['error'] = $json['message'];// lỗi kèm thông báo về
                                $KNCMS->msg_error($res['error'], hUrl('NapTien'), 1000);
                                die(json_encode($res));
                            }
                            if ($json['status'] == 1) {
                            $res['success'] = "Nạp thẻ thành công";// thẻ đúng 
                            $KNCMS->msg_success($res['error'], hUrl('NapTien'), 1000);
                            die(json_encode($res));
                            }
                            if ($json['status'] == 2) {
                            $res['error'] = "Sai mệnh giá thẻ";// sai mệnh giá
                            $KNCMS->msg_error($res['error'], hUrl('NapTien'), 1000);
                            die(json_encode($res));
                            }
                            if ($json['status'] == 3) {
                            $res['error'] = "Vui lòng kiểm tra lại thẻ";// thẻ lỗi
                            $KNCMS->msg_error($res['error'], hUrl('NapTien'), 1000);
                            die(json_encode($res));
                            }
                            if ($json['status'] == 4) {
                            $res['error'] = "Server API bảo trì"; // bảo trì
                            $KNCMS->msg_error($res['error'], hUrl('NapTien'), 1000);
                            die(json_encode($res));
                            }
                            if ($json['status'] == 99) {
                            $res['success'] = "Gửi thẻ thành công";// đang duyệt
                            $KNCMS->msg_success($res['error'], hUrl('NapTien'), 1000);
                            die(json_encode($res));
                            }
                            else {
                            $res['error'] = $json['message'];// lỗi không xác định , kèm thông báo
                            $KNCMS->msg_success($res['error'], hUrl('NapTien'), 1000);
                            die(json_encode($res));
                            }
                        }
                    ?>
                        <form method="POST">
                            <h3>Nạp thẻ cào tự động:</h3>
                            <b style="color: red;">
                                <li>Chiết khấu nạp: 0%</li>
                            </b>
                            <b style="color: cyan;">
                                <li>Thực nhận: 10.000 VNĐ = 100 <?= $knsite['PriceOOC'] ?></li>
                            </b>
                            <b style="color: orange;">
                                <li>Vui lòng nhập chính xác mệnh giá thẻ cào, nếu bạn nhập sai mệnh giá, chúng tôi hoàn toàn không chịu trách nhiệm</li>
                            </b>
                            <b style="color: green;">
                                <li>Thời gian xử lý thẻ nhanh nhất là 5 giây và chậm nhất là 2 phút. Vui lòng chờ đợi</li>
                            </b>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Loại thẻ</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="telco">
                                                <option value="">-- Chọn loại thẻ --</option>
                                                <option value="VNMOBI" style="color: green;">VIETNAMOBILE</option>
                                                <option value="VINAPHONE" style="color: green;">VINA</option>
                                                <option value="MOBIFONE" style="color: red;">MOBIFONE (xử lý chậm)</option>
                                                <option value="VIETTEL" style="color: green;">VIETTEL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Mệnh giá</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="amount">
                                                <option value="">-- Chọn mệnh giá --</option>
                                                <option value="10000">10.000 vnđ</option>
                                                <option value="20000">20.000 vnđ</option>
                                                <option value="30000">30.000 vnđ</option>
                                                <option value="50000">50.000 vnđ</option>
                                                <option value="100000">100.000 vnđ</option>
                                                <option value="200000">200.000 vnđ</option>
                                                <option value="300000">300.000 vnđ</option>
                                                <option value="500000">500.000 vnđ</option>
                                                <option value="1000000">1.000.000 vnđ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-3 col-form-label">Số sê-ri</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="serial" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-3 col-form-label">Mã thẻ</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="code" />
                                        </div>
                                    </div>
                                    <div class="form-group row" style="float: right;">
                                        <button class="btn btn-success" name="KNCMSSendCard">Gửi thẻ</button>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Loại</th>
                                            <th>Mệnh giá</th>
                                            <th>Mã thẻ</th>
                                            <th>Seri</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($KNCMS->get_list("SELECT * FROM `kncms_napthe` WHERE `uid` = '$uid' ORDER BY id desc LIMIT 5") as $row) { ?>
                                            <tr>
                                                <td>
                                                    <?= $row['id'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['type'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['amount'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['code'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['serial'] ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $statust = GetCardStatus($row['status']);
                                                    echo $statust; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile-nobd" role="tabpanel" aria-labelledby="pills-profile-tab-nobd">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png?20201011055544" />
                            </div>
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Số tài khoản <b>MOMO :</span>
                                    </div>
                                    <div>
                                        <b style="color: red;"><?= $knsite['SDTMOMO'] ?></b>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Chủ tài khoản <b>MOMO :</span>
                                    </div>
                                    <div>
                                        <b style="color: red;"><?= $knsite['OwnerMOMO'] ?></b>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Nội dung <b>chuyển khoản :</span>
                                    </div>
                                    <div>
                                        <b style="color: red;"><?= $user_ss['Username'] ?></b>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span style="color: red;">**Lưu ý:</span>
                                    </div>
                                    <div>
                                        <li style="color: orange;">Vui lòng chuyển đúng STK bên trên</li>
                                        <li style="color: orange;">Vui lòng chuyển đúng nội dung bên trên</li>
                                        <li style="color: orange;">Khi sai <b>nội dung</b> vui lòng liên hệ Admin để được hỗ trợ gấp</li>
                                        <li style="color: orange;">Sẽ không hỗ trợ cho các trường hợp nhầm STK</li>
                                    </div>
                                </div>
                                <h3>
                                    <li style="color: orange;">Khi tiến hành nạp không được truy cập vào SERVER</li>
                                </h3>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nhân vật</th>
                                        <th>SDT</th>
                                        <th>Số tiền</th>
                                        <th>Nội dung</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($KNCMS->get_list("SELECT * FROM `kncms_momo` WHERE `uid` = '$uid' LIMIT 5") as $row) { ?>
                                        <tr>
                                            <td>
                                                <?= $row['id'] ?>
                                            </td>
                                            <td>
                                                <?= $row['user'] ?>
                                            </td>
                                            <td>
                                                <?='0'.$row['sdt'] ?>
                                            </td>
                                            <td>
                                                <?= $KNCMS->format_cash($row['sotien'])?>đ
                                            </td>
                                            <td>
                                                <?= $row['noidung'] ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-success">Thành công</span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once('../../../private/foot.php'); ?>
    <?php } else {
    $KNCMS->msg_error("Bạn chưa đăng nhập kìa", "$base_url/Auth/Login", 1000);
} ?>