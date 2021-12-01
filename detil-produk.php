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
	$id = $_GET['id'];
	$slug = $_GET['p'];

	$p = mysqli_query($conn, "select * from produk where id_produk='$id' and slug_produk='$slug'");
	$rp = mysqli_fetch_array($p);
?>
	<body>
		<a href="javascript:" id="return-to-top"><span data-uk-icon="icon: chevron-up; ratio: 1" class="text-gray-extra-dark"></span></a>
		<div id="loader-wrapper">
			<div class="loader-img"><img src="images/logo-dark.png" alt="" /></div>
			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
		</div>
		
		<?php include('layouts/header.php'); ?>

		<section class="padding-top-30px padding-bottom-50px">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 center-col text-left margin-auto">
						<div class="position-relative overflow-hidden width-100 padding-150px-bottom">
							<ul class="uk-child-width-expand tab-spread no-margin-bottom" data-uk-tab="animation: uk-animation-fade">
							<?php
								$ft = mysqli_query($conn, "select * from foto_produk where id_produk='$id'");
								while($rft = mysqli_fetch_array($ft)){
							?>
								<li class=""><a href="#"><img src="<?php echo $rft['loc_pfile'].$rft['file_prod']; ?>" alt="" /></a></li>
							<?php
								}
							?>
							</ul>
							<ul class="uk-switcher no-margin-top">
							<?php
								$ft = mysqli_query($conn, "select * from foto_produk where id_produk='$id'");
								while($rft = mysqli_fetch_array($ft)){
							?>
								<li>
									<div class="row">
										<div  class="col-md-12 col-sm-12 col-xs-12">
											<img src="<?php echo $rft['loc_pfile'].$rft['file_prod']; ?>" alt="" />
										</div>
									</div>
								</li>
							<?php
								}
							?>
							</ul>
						</div>
					</div>
					
					<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 center-col text-left md-margin-top-25px">
						<h4 class="text-weight-600 text-gray-extra-dark margin-bottom-5px"> <?php echo $rp['nama_produk']; ?></h4>
						<a href="#" class="margin-right-5px"><i class="fas fa-star text-gray-light"></i></a> 4.8
						<a href="#" class="margin-left-15px margin-right-5px"><i class="fas fa-comments text-gray-light"></i></a> 33
						<a href="#" class="margin-left-15px margin-right-5px"><i class="fas fa-heart text-gray-light"></i></a>
						<h4 class="text-weight-600 text-black roboto margin-bottom-15px margin-top-20px">Rp. <?php echo number_format($rp['harga']); ?></h4>
						<div class="text-left margin-top-25px">
							<div class="uk-form-label margin-bottom-10px text-underline">DESKRIPSI PRODUK</div>
							<p class="text-large"><?php echo $rp['desc_produk']; ?></p>
							<div class="separator center-col width-100 bottom-border border-1px border-color-gray-extra-light margin-top-bottom-25px"></div>
							<a class="btn btn-medium border-radius-50 btn-black sm-display-table no-margin-bottom" href="page-cart.html">Tambah ke Tas</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="overlay-black-dense padding-top-bottom-50px">
			<div class="container">
				<h4 class="text-weight-600 text-black margin-bottom-10px text-center">Customer Reviews</h4>
				<div class="separator width-50 center-col bottom-border border-1px border-color-gray-extra-dark margin-top-30px margin-bottom-45px"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 center-col text-center margin-auto">
						<div data-uk-slider="finite: true">
							<ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m uk-grid">
								<li>
									<div class="testimonial bg-gray-extra-dark padding-top-bottom-50px all-border border-1px border-color-gray-extra-dark uk-box-shadow-medium border-radius-10">
										<div class="width-100px text-center center-col margin-bottom-40px">
											<img class="border-radius-10" src="images/avatars/02.jpg" alt="" />
										</div>
										<i class="fas fa-star fa-2x text-gold"></i>
										<i class="fas fa-star fa-2x text-gold"></i>
										<i class="fas fa-star fa-2x text-gold"></i>
										<i class="fas fa-star fa-2x text-gold"></i>
										<i class="fas fa-star fa-2x text-gold"></i>
										<p class="margin-top-25px center-col text-large text-weight-300 text-gray-light width-70">Awalnya ragu buat beli disini tapi pas barangnya sampai produknya bener" bagus.</p>
										<div class="separator center-col width-90 bottom-border border-1px border-color-gray-dark margin-top-bottom-20px"></div>
										<p class="text-white text-uppercase text-weight-600 text-small margin-bottom-5px">Jon Sewna</p>
										<p class="text-gray-regular text-uppercase text-weight-500 text-extra-small margin-bottom-5px">12 December</p>
										<p class="text-gray-regular text-weight-500 text-extra-small no-margin-bottom">2019</p>
									</div>
								</li>
							</ul>
							<a class="uk-position-center-left uk-position-small uk-hidden-hover left-minus-50" href="#" data-uk-slidenav-previous data-uk-slider-item="previous"></a>
							<a class="uk-position-center-right uk-position-small uk-hidden-hover right-minus-50" href="#" data-uk-slidenav-next data-uk-slider-item="next"></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<div class="bg-black padding-top-bottom-50px">
			<div class="container">
				<h4 class="text-weight-600 text-white margin-bottom-10px text-center">Lainnya di Toko ini</h4>
				<p class="text-small text-gray-light text-center no-margin-bottom">And an inner pocket. Thick ribbing at cuffs and hem. Mesh lining.</p>
				<div class="separator width-50 center-col bottom-border border-1px border-color-gray-extra-dark margin-top-10px margin-bottom-30px"></div>

				<div class="row" data-uk-scrollspy="cls: uk-animation-scale-up; target: > div; delay: 50; repeat: false">
					<div class="col-md-3 col-sm-12 col-xs-12 center-col text-center margin-auto sm-margin-bottom-30px">
						<a href="#"><img src="images/shop/product-01/07.jpg" alt="" /></a>
						<p class="margin-top-20px text-extra-large text-weight-300 text-white no-margin-bottom">Bright Golden</p>
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