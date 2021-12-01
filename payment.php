<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="text" content="">
	<meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
	<title>SAYo - Fashion & E-Commerce </title>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.html">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.html">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.html">
	<link rel="stylesheet" href="css/uikit.min.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/responsive.css">
</head>
<?php
	session_start();
	include('koneksi.php');
	if(empty($_SESSION['username'])){
		header('location: login.php');
	}
	$id_user = $_SESSION['id_user'];

	$user = mysqli_query($conn, "select * from user where id_user='$id_user'");
	$ru = mysqli_fetch_array($user);
?>
	<body>
		<a href="javascript:" id="return-to-top"><span data-uk-icon="icon: arrow-up; ratio: 1" class="text-gray-extra-dark"></span></a>
		
		<?php include('layouts/header.php'); ?>

		<div class="padding-top-30px padding-bottom-50px">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-col text-left margin-auto margin-bottom-30px">
						<div class="container contact-wrapper">
							<h5 class="text-black text-weight-600 sm-text-center">Pembayaran</h5>
							<div class="separator width-10 bottom-border border-1px border-color-gray-light margin-top-10px sm-margin-left-right-auto"></div>
							<div class="row margin-top-30px text-center">
								<h6><b>SEGERA LAKUKAN PEMBAYARAN DALAM WAKTU</b></h6>
								<h6>23 Jam : 59 Menit: 21 Detik</h6>
							</div>
							<div class="row margin-top-10px" style="font-size: 14pt;">
								<p>
									<b>Kode Pembayaran:</b>
									<br>
									<b class="text-red">SAYO200106111</b>
								</p>
							</div>
							<div class="row margin-top-10px" style="font-size: 14pt;">
								<p>
									<b>Lakukan Pembayaran Senilai:</b>
									<br>
									<b class="text-red">Rp. 330,000</b>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php include('layouts/footer.php'); ?>
		
	</body>
<script src="js/jquery.min.js"></script>
<script src="js/uikit.min.js"></script>
<script src="js/uikit-icons.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/font-awesome.min.js"></script>
<script src="js/contact.html"></script>
<script src="js/retina.min.js"></script>
<script src="js/custom.js"></script>
</html>