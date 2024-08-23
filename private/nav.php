<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- <title>Home | <?= $knsite['Title'] ?></title> -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $base_url ?>">
    <div class="sidebar-brand-icon">
      <img src="<?= $knsite['Logo'] ?>" style="width: 150px; height: 75px" />
    </div>
    <!-- <div class="sidebar-brand-text mx-3"><?= $knsite['Title'] ?></div> -->
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?= $base_url ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Tài khoản
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Cá nhân</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Quản lí tài khoản:</h6>
        <?php if (!isLogin()) { ?>
          <a class="collapse-item" href="<?= hUrl('Auth/Login') ?>">Đăng nhập</a>
          <a class="collapse-item" href="<?= hUrl('Auth/Register') ?>">Đăng ký</a>
        <?php } else { ?>
          <a class="collapse-item" href="<?= hUrl('Player/' . $user_ss['Username']) ?>">Trang cá nhân</a>
          <a class="collapse-item" href="<?= hUrl('NapTien') ?>">Nạp thẻ</a>
          <a class="collapse-item" href="<?= hUrl('Giftcode') ?>">Giftcode</a>
          <a class="collapse-item" href="<?= hUrl('PlayerLog') ?>">Lịch sử tài khoản</a>
        <?php } ?>
      </div>
    </div>
  </li>
  <div class="sidebar-heading">
    Thống kê
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Listdata" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fa-solid fa-list"></i>
      <span>Danh sách</span>
    </a>
    <div id="Listdata" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Danh sách:</h6>
        <a class="collapse-item" href="<?= hUrl('List/Faction') ?>">Danh sách tổ chức</a>
        <a class="collapse-item" href="<?= hUrl('List/Biz') ?>">Danh sách cửa hàng</a>
        <a class="collapse-item" href="<?= hUrl('List/Admin') ?>">Danh sách Admin</a>
        <a class="collapse-item" href="<?= hUrl('List/Banned') ?>">Danh sách vi phạm</a>
      </div>
    </div>
  </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#TopData" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa-solid fa-list"></i>
        <span>Xếp hạng</span>
      </a>
      <div id="TopData" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Danh sách:</h6>
          <a class="collapse-item" href="<?= hUrl('Top/PriceOOC') ?>">Top <?= $knsite['PriceOOC'] ?></a>
          <a class="collapse-item" href="<?= hUrl('Top/Money') ?>">Top SAD</a>
          <a class="collapse-item" href="<?= hUrl('Top/Online') ?>">Top Online</a>
          <a class="collapse-item" href="<?= hUrl('Top/Level') ?>">Top Level</a>
          <?php if(isLogin() && $user_ss['AdminLevel'] == 7) { ?>
              <a class="collapse-item" href="<?= hUrl('Top/Pot') ?>">Top Pot</a>
              <a class="collapse-item" href="<?= hUrl('Top/Crack') ?>">Top Crack</a>
              <a class="collapse-item" href="<?= hUrl('Top/Materials') ?>">Top Materials</a>
              <a class="collapse-item" href="<?= hUrl('Top/VIP') ?>">Top VIP</a>
              <a class="collapse-item" href="<?= hUrl('Top/Gun') ?>">Top Gun</a>
              <a class="collapse-item" href="<?= hUrl('Top/Rimkit') ?>">Top Rim kit</a>
              <a class="collapse-item" href="<?= hUrl('Top/CarVoucher') ?>">Top Car Voucher</a>
              <a class="collapse-item" href="<?= hUrl('Top/VehicleVoucher') ?>">Top Vehicle Voucher</a>
              <a class="collapse-item" href="<?= hUrl('Top/Svipvoucher') ?>">Top Svipvoucher</a>
              <a class="collapse-item" href="<?= hUrl('Top/Gvipvoucher') ?>">Top Gvipvoucher</a>
              <a class="collapse-item" href="<?= hUrl('Top/Vehicles') ?>">Top Vehicles</a>
          <?php } ?>
        </div>
      </div>
    </li>
  <div class="sidebar-heading">
    Shop
  </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ShopData" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fa-sharp fa-solid fa-cart-shopping"></i>
      <span>Cửa hàng</span>
    </a>
    <div id="ShopData" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Danh sách:</h6>
        <a class="collapse-item" href="<?= hUrl('Shop/Oto') ?>">Shop xe Oto</a>
        <a class="collapse-item" href="<?= hUrl('Shop/Moto') ?>">Shop xe Moto</a>
        <a class="collapse-item" href="<?= hUrl('Shop/TauThuyen') ?>">Shop tàu thuyền</a>
        <a class="collapse-item" href="<?= hUrl('Shop/MayBay') ?>">Shop máy bay</a>
        <a class="collapse-item" href="<?= hUrl('Shop/Toys') ?>">Shop đồi chơi</a>
        <a class="collapse-item" href="<?= hUrl('Rename') ?>">Đổi tên</a>
        <a class="collapse-item" href="<?= hUrl('Shop/VatPham') ?>">Shop Vật Phẩm</a>
      </div>
    </div>
  </li>
  <div class="sidebar-heading">
    Danh mục chung
  </div>
  <li class="nav-item">
    <a class="nav-link" href="<?= hUrl('Chat') ?>">
      <i class="fa-brands fa-rocketchat"></i>
      <span>Box chat tổng</span></a>
  </li>
  <?php
  foreach ($KNCMS->get_list("SELECT * FROM `kncms_danhmuc` ORDER BY id") as $danhmuc) {
    $danhmuc_id = $danhmuc['id'];
  ?>
    <div class="sidebar-heading">
      <?= $danhmuc['name'] ?>
    </div>
    <?php foreach ($KNCMS->get_list("SELECT * FROM `kncms_pages` WHERE `iddanhmuc` = '$danhmuc_id'") as $page) { ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= hUrl($page['href']) ?>">
          <?= $page['icon'] ?>
          <span><?= $page['page'] ?></span></a>
      </li>
  <?php }
  }
  ?>
  <?php if (isLogin()) {
    if ($user_ss['AdminLevel'] > 6) { ?>
      <div class="sidebar-heading">
        Admin
      </div>
      <li class="nav-item">
        <a class="nav-link" href="<?= hUrl('AdminPages') ?>">
          <i class="fa-solid fa-gear"></i>
          <span>Quan ly website</span></a>
      </li>
  <?php }
  } ?>
  <?php if (isLogin()) { ?>
    <div class="sidebar-card d-none d-lg-flex bg-dark">
      <img class="sidebar-card-illustration mb-2 img-profile rounded-circle" src="https://baoit.s3.jp-tok.cloud-object-storage.appdomain.cloud/game/model/<?= $user_ss['Model'] ?>.png" alt="<?= $user_ss['Username'] ?>">
      <p class="text-center mb-2"><strong><?= $user_ss['Username'] ?></strong></p>
      <span class="badge badge-info"><?= capbac($user_ss['AdminLevel']) ?></span>
      <!-- <p class="text-center"><strong>Cấp bậc:</strong><span class="badge badge-info"><?= capbac($user_ss['AdminLevel']) ?></span></p> -->
      <!-- <p class="text-center mb-2"><strong>Tham gia: <?= $user_ss['RegiDate'] ?></strong></p>
      <p class="text-center mb-2"><strong>Đăng nhập máy chủ lần cuối: <?= $user_ss['LastLogin'] ?></strong></p>
      <p class="text-center mb-2"><strong>Đăng nhập UCP lần cuối: <?= $user_ss['LastUCP_Login'] ?></strong></p> -->
      <p class="text-center mb-2"><strong><?= $knsite['PriceOOC'] ?>: <?= $KNCMS->format_cash($user_ss['Credits']) ?></strong></p>
      <p class="text-center mb-2"><strong>Cash: <?= $KNCMS->format_cash($user_ss['Money']) ?></strong></p>
      <p class="text-center mb-2"><strong>Bank: <?= $KNCMS->format_cash($user_ss['Bank']) ?></strong></p>
      <p class="text-center mb-2"><strong><a href="<?= hUrl('Player/' . $user_ss['Username']) ?>">Xem thêm</a></strong></p>
      <a class="btn btn-success btn-sm" href="<?= hUrl('Auth/Logout') ?>">Đăng Xuất!</a>
    </div>
  <?php } else { ?>
    <div class="sidebar-card d-none d-lg-flex">
      <img class="sidebar-card-illustration mb-2" src="https://baoit.s3.jp-tok.cloud-object-storage.appdomain.cloud/game/model/299.png" alt="...">
      <p class="text-center mb-2"><strong>Khách Truy Cập</strong>
      </p>
      <a class="btn btn-info btn-sm" href="<?= hUrl('Auth/Login') ?>">Đăng nhập</a>
    </div>
  <?php } ?>
</ul>
<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
      <?php
          if (isset($_POST['btnFindz'])) {
            if (check_rows($_POST['userfind'], 'accounts', 'Username')) {
              $users = $_POST['userfind'];
              $userfind = $KNCMS->query("SELECT * FROM `accounts` WHERE `Username` = '$users'")->fetch_array();
              if (isLogin()) {
                if ($userfind['AdminLevel'] > $user_ss['AdminLevel']) $KNCMS->msg_warning("Cấp bậc của bạn không có quyền xem người dùng này", hUrl('Home'), 1000);
              } else if ($userfind['AdminLevel'] > 0) $KNCMS->msg_warning("Cấp bậc của bạn không có quyền xem người dùng này", hUrl('Home'), 1000);
              $KNCMS->msg_success("Đã tìm thấy người chơi $users", hUrl('Player/' . $users), 1000);
            } else $KNCMS->msg_error("Không tìm thấy người chơi này", hUrl('Home'), 1000);
          }
          ?>
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="POST">
        <div class="input-group">
          <input name="userfind" type="text" class="form-control bg-light border-0 small" placeholder="Tìm kiếm nhân vật" aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button name="btnFindz" class="btn btn-primary">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search" method="POST">
              <div class="input-group">
                <input name="userfind" type="text" class="form-control bg-light border-0 small" placeholder="Tìm kiếm nhân vật" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button name="btnFind" class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <?php if (!isLogin()) { ?>
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">Khách Truy Cập</span>
              <img class="img-profile rounded-circle" src="https://baoit.s3.jp-tok.cloud-object-storage.appdomain.cloud/game/model/299.png">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="<?= hUrl('Auth/Login') ?>">
                <i class="fa-solid fa-right-to-bracket text-gray-400"></i>
                Đăng Nhập
              </a>
              <a class="dropdown-item" href="<?= hUrl('Auth/Register') ?>">
                <i class="fa-solid fa-user-plus text-gray-400"></i>
                Đăng Ký
              </a>
            </div>
          </li>
        <?php } else { ?>
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user_ss['Username'] ?></span>
              <img class="img-profile rounded-circle" src="https://baoit.s3.jp-tok.cloud-object-storage.appdomain.cloud/game/model/<?= $user_ss['Model'] ?>.png">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="<?= hUrl('Player/' . $user_ss['Username']) ?>">
                <i class="fa-solid fa-right-to-bracket text-gray-400"></i>
                Thông tin nhân vật
              </a>
              <a class="dropdown-item" href="<?= hUrl('NapTien') ?>">
                <i class="fa-solid fa-user-plus text-gray-400"></i>
                Nạp thẻ (<?= $user_ss['Credits'] ?> <?= $knsite['PriceOOC'] ?>)
              </a>
              <a class="dropdown-item" href="<?= hUrl('AccountSetting') ?>">
                <i class="fa-solid fa-gear text-gray-400"></i>
                Setting Account
              </a>
            </div>
          </li>
        <?php } ?>
      </ul>

    </nav>