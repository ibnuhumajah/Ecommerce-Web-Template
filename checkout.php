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
					<div class="col-md-6 col-sm-12 col-xs-12 center-col text-left margin-auto margin-bottom-30px">
						<div class="container contact-wrapper">
							<h5 class="text-black text-weight-600 sm-text-center">Informasi Pengiriman</h5>
							<div class="separator width-10 bottom-border border-1px border-color-gray-light margin-top-10px sm-margin-left-right-auto"></div>
							<form class="margin-top-20px contact-form" method="post" action="">
								<div class="messages"></div>
								<div class="controls">
									<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-4">
											<div class="form-group">
												<b>Nama</b>
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<?php echo $ru['fname'].' '.$ru['lname']; ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-4">
											<div class="form-group">
												<b>Email</b>
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<?php echo $ru['email']; ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-4">
											<div class="form-group">
												<b>No. HP</b>
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<input type="text" name="hp" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-4">
											<div class="form-group">
												<b>Alamat Pengiriman</b>
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<textarea class="form-control" rows="3" name="address" required></textarea>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-12 col-xs-12 center-col text-left margin-auto">
						<h5 class="text-black text-weight-600 sm-text-center">Detail Pemesanan</h5>
						<div class="separator width-10 bottom-border border-1px border-color-gray-light margin-top-10px sm-margin-left-right-auto"></div>
						<div class="margin-top-10px position-relative overflow-hidden width-100 page-title-smaller">
							<table class="uk-table uk-table-striped no-margin-bottom">
								<thead>
									<tr>
										<th>Produk</th>
										<th>Jml</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$subtotal = 0;
									$tas = mysqli_query($conn, "select * from tas t, produk p where t.id_user='$id_user' and t.id_produk=p.id_produk");
									while($rt = mysqli_fetch_array($tas)){
										$total = $rt['jml_prod']*$rt['harga'];
										$subtotal+=$total;
								?>
									<tr>
										<td><?php echo $rt['nama_produk']; ?></td>
										<td>x<?php echo $rt['jml_prod']; ?></td>
										<td>Rp. <?php echo number_format($total); ?></td>
									</tr>
								<?php
									}
								?>
									<tr>
										<td class="text-weight-600 text-black">Grand Total</td>
										<td>-</td>
										<td class="text-weight-600 text-black">Rp. <?php echo number_format($subtotal); ?></td>
									</tr>
								</tbody>
							</table>
							<div class="margin-top-25px row">
								<div class="col-md-12">
									<input type="submit" class="btn-send btn btn-small btn-gray-extra-dark md-margin-bottom-15px sm-margin-left-right-auto sm-display-table" value="Bayar Sekarang">
								</div>
							</div>
							</form>
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