<?php
require_once('../server/config.php');
require_once('../private/head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>404</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?=$base_url?>assets/img/icon.ico" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="<?=$base_url?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?=$base_url?>assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?=$base_url?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=$base_url?>assets/css/atlantis.css">

	<link rel="stylesheet" href="<?= $base_url ?>assets/auth.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/auth1.css">
</head>
<style>
    body {
      background: url(<?= $base_url ?>/assets/bg.png) no-repeat !important;
      background-size: cover !important;
      background-attachment: fixed !important;
      background-repeat: no-repeat !important;
      background-position: center center !important;
      overflow-y: scroll !important;
    }
  </style>
<body class="page-not-found">
	<div class="wrapper not-found">
		<h1 class="animated fadeIn">404</h1>
		<div class="desc animated fadeIn"><span>OOPS!</span><br/>Looks like you get lost</div>
		<a href="<?=$base_url?>Home" class="btn btn-primary btn-back-home mt-4 animated fadeInUp">
			<span class="btn-label mr-2">
				<i class="flaticon-home"></i>
			</span>
			Back To Home
		</a>
	</div>
	<script src="<?=$base_url?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?=$base_url?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?=$base_url?>assets/js/core/popper.min.js"></script>
	<script src="<?=$base_url?>assets/js/core/bootstrap.min.js"></script>
</body>
</html>