<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="text" content="">
	<meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
	<title>SAYo - Fashion & E-Commerce</title>
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
	$c = '';
	if(!empty($_GET['category'])){
		$c=$_GET['category'];
		$g=$_GET['sex'];
		$getcat = mysqli_query($conn, "select * from kategori where nm_kategori='$c' and sex_cat='$g'");
		$rg = mysqli_fetch_array($getcat);
		$c = $rg['id_kategori'];
		$title = "Kategori: ".$rg['nm_kategori'];
	}
	$b = '';
	if(!empty($_GET['brand'])){
		$b=str_replace("%20", " ", $_GET['brand']);
		$getbrand = mysqli_query($conn, "select * from toko where nama_toko like '$b%'");
		$rb = mysqli_fetch_array($getbrand);
		$b = $rb['id_toko'];
		$title = "Brand: ".$rb['nama_toko'];
	}

	$pr = mysqli_query($conn, "select * from produk where id_kategori='$c' OR id_toko='$b'");
?>
	<body>
		<a href="javascript:" id="return-to-top"><span data-uk-icon="icon: chevron-up; ratio: 1" class="text-gray-extra-dark"></span></a>
		<div id="loader-wrapper">
			<div class="loader-img"><img src="images/logo-dark.png" alt="" /></div>
			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
		</div> 

		<?php include('layouts/header.php'); ?>

		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-30px" data-uk-scrollspy="cls: uk-animation-slide-bottom; target: > .row > div ; delay: 50; repeat: false">
					<h6><?php echo $title ?></h6>
				</div>
			</div>
		</div>
		<section class="padding-top-bottom-30px">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 md-margin-top-150px" data-uk-scrollspy="cls: uk-animation-slide-bottom; target: > .row > div ; delay: 50; repeat: false">
						<div class="width-95 margin-left-auto sm-width-100 sm-margin-left-right-auto">
							<div data-uk-scrollspy="cls: uk-animation-slide-left-medium; target: > .row > div ; delay: 50; repeat: false">
								<div class="row">
								<?php
									while($rp = mysqli_fetch_array($pr)){
										$id_produk = $rp['id_produk'];
										$ftprod = mysqli_query($conn, "select * from foto_produk where id_produk='$id_produk'");
										$rfp = mysqli_fetch_array($ftprod);
										$loc_pfile = $rfp['loc_pfile'];
										$file_prod = $rfp['file_prod'];

										// rating & review
										$review = mysqli_query($conn, "select (SUM(rating)/COUNT(id_review)) as star, COUNT(id_review) as jView from review_produk where id_produk='$id_produk'");
										$rrev = mysqli_fetch_array($review);
										$star = $rrev[0];
										$jRev = $rrev[1];
										$gold = "text-gold";
										if(empty($star)){$star=0;$gold="";}

										// wishlist
										$wish = mysqli_query($conn, "select * from wishlist where id_produk='$id_produk' and id_user='$id_user'");
										$red = "text-red";
										$wishttl = "Remove from wishlist";
										if(mysqli_num_rows($wish)<1){$red="";$wishttl="Add to wishlist";}
								?>
									<div class="col-md-3 col-sm-6 col-xs-12 margin-bottom-30px text-center">
										<a href="detil-produk.php?id=<?php echo $rp['id_produk']; ?>&p=<?php echo $rp['slug_produk']; ?>"><img src="<?php echo $loc_pfile.''.$file_prod; ?>" alt="" style="height: 200px !important;" /></a>
										<p class="margin-top-20px margin-bottom-10px text-weight-700 text-large">
											<a href="detil-produk.php?id=<?php echo $rp['id_produk']; ?>&p=<?php echo $rp['slug_produk']; ?>" class="text-black"><?php echo $rp['nama_produk'] ?></a>
										</p>
										<p class="text-medium">Rp. <?php echo number_format($rp['harga']) ?></p>
										<span href="#" class="margin-right-5px"><i class="fas fa-star <?php echo $gold ?>"></i></span> <?php echo $star ?>
										<span href="#" class="margin-left-15px margin-right-5px"><i class="fas fa-comments text-gray-light"></i></span> <?php echo $jRev ?>
										<a href="add-wishlist.php?id=<?php echo $id_produk; ?>" class="margin-left-15px margin-right-5px" title="<?php echo $wishttl; ?>"><i class="fas fa-heart <?php echo $red; ?>"></i></a>
										<a class="btn btn-small btn-transparent-black sm-margin-left-right-auto sm-display-table xs-margin-bottom-15px margin-top-10px" href="add-cart.php?id=<?php echo $id_produk; ?>">Tambahkan ke Tas</a>
									</div>
								<?php
									}
								?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

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