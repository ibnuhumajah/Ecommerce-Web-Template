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
?>
	<body>
		<a href="javascript:" id="return-to-top"><span data-uk-icon="icon: chevron-up; ratio: 1" class="text-gray-extra-dark"></span></a>
		<!-- Loading Screen -->
		<div id="loader-wrapper">
			<div class="loader-img"><img src="images/logo-dark.png" alt="" /></div>
			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
		</div> 
		<?php include('layouts/header.php') ?>
		<div class="padding-bottom-30px padding-top-20px">
			<div class="container-spread">
				<div class="row">
					<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 center-col" data-uk-scrollspy="cls: uk-animation-scale-up; target: > .row > div ; delay: 50; repeat: false">
						<div class="row">
							<div class="col-md-4 col-sm-12 col-xs-12 center-col text-center margin-bottom-30px">
								<a href="shop-style-05-col-02-boxed.html" class="uk-inline-clip uk-transition-toggle">
									<img src="images/shop/style-03/02.jpg" alt="" />
									<div class="uk-position-cover uk-overlay uk-overlay-primary">
										<div class="uk-position-center">
											<h6 class="margin-bottom-5px text-weight-700 text-uppercase text-white letter-spacing-2">Jackets</h6>
											<div class="separator width-10 bottom-border border-3px border-color-gray-extra-light margin-left-right-auto margin-top-bottom-15px"></div>
											<p class="btn btn-small btn-white sm-display-table sm-margin-left-right-auto no-margin-bottom">New Arrivals</p>
										</div>
									</div>
								</a>
							</div>
							<div class="col-md-4 col-sm-12 col-xs-12 center-col text-center margin-bottom-30px">
								<a href="shop-style-05-col-02-boxed.html" class="uk-inline-clip uk-transition-toggle">
									<img src="images/shop/style-03/01.jpg" alt="" />
									<div class="uk-position-cover uk-overlay uk-overlay-primary">
										<div class="uk-position-center">
											<h6 class="margin-bottom-5px text-weight-700 text-uppercase text-white letter-spacing-2">Hoodies</h6>
											<div class="separator width-10 bottom-border border-3px border-color-gray-extra-light margin-left-right-auto margin-top-bottom-15px"></div>
											<p class="btn btn-small btn-transparent-white sm-display-table sm-margin-left-right-auto no-margin-bottom">browse</p>
										</div>
									</div>
								</a>
							</div>
							<div class="col-md-4 col-sm-12 col-xs-12 center-col text-center margin-bottom-30px">
								<a href="shop-style-05-col-02-boxed.html" class="uk-inline-clip uk-transition-toggle">
									<img src="images/shop/style-03/03.jpg" alt="" />
									<div class="uk-card-badge uk-label text-small padding-10px text-uppercase bg-black">Sale</div>
									<div class="uk-position-cover uk-overlay uk-overlay-default">
										<div class="uk-position-center">
											<h6 class="margin-bottom-5px text-weight-700 text-uppercase text-black letter-spacing-2">Shirts</h6>
											<div class="separator width-10 bottom-border border-3px border-color-gray-dark margin-left-right-auto margin-top-bottom-15px"></div>
											<p class="btn btn-small btn-black sm-display-table sm-margin-left-right-auto no-margin-bottom">browse</p>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 center-col text-center">
								<a href="shop-style-05-col-02-boxed.html" class="uk-inline-clip uk-transition-toggle">
									<img src="images/shop/style-04/03-small.jpg" alt="" />
									<div class="uk-position-cover uk-overlay uk-overlay-primary">
										<div class="uk-position-center">
											<h2 class="text-weight-700 text-uppercase text-white letter-spacing-2 no-margin-bottom sm-hidden">25% OFF</h2>
											<div class="separator width-100 bottom-border border-3px border-color-gray-extra-light margin-left-right-auto margin-top-bottom-20px sm-hidden"></div>
											<h6 class="margin-bottom-5px text-weight-700 text-uppercase text-white letter-spacing-2 margin-bottom-25px sm-margin-bottom-10px">Shop Women Clothing</h6>
											<p class="btn btn-small btn-transparent-white sm-display-table sm-margin-left-right-auto no-margin-bottom">browse</p>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<section>
			<div class="container-full">
				<div data-uk-filter="target: .works">
					<div class="works uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-2@l uk-text-center uk-grid-collapse" data-uk-grid data-uk-scrollspy="cls: uk-animation-scale-up; target: > div > a; delay: 50; repeat: false">
						<div class="images">
							<a href="#" class="uk-inline-clip uk-transition-toggle">
								<img src="images/shop/style-04/12.jpg" alt="" />
								<div class="uk-position-cover">
									<div class="uk-position-center overlay-white padding-80px">
										<h3 class="margin-bottom-5px text-weight-700 text-black text-uppercase">Boys</h3>
										<div class="separator width-50 bottom-border border-3px border-color-gray-dark margin-left-right-auto margin-top-20px margin-bottom-30px"></div>
										<p class="btn btn-small btn-black sm-display-table sm-margin-left-right-auto no-margin-bottom">browse</p>
									</div>
								</div>
							</a>
						</div>
						<div class="images">
							<a href="#" class="uk-inline-clip uk-transition-toggle">
								<img src="images/shop/style-04/10.jpg" alt="" />
								<div class="uk-position-cover">
									<div class="uk-position-center overlay-white padding-80px">
										<h3 class="margin-bottom-5px text-weight-700 text-black text-uppercase">Girls</h3>
										<div class="separator width-50 bottom-border border-3px border-color-gray-dark margin-left-right-auto margin-top-20px margin-bottom-30px"></div>
										<p class="btn btn-small btn-black sm-display-table sm-margin-left-right-auto no-margin-bottom">browse</p>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="bg-gray-extra-light padding-top-100px padding-bottom-30px">
			<div class="container">
				<div data-uk-scrollspy="cls: uk-animation-slide-bottom-medium; target: > .row > div ; delay: 50; repeat: false">
					<div class="row">
					<?php
						$prod = mysqli_query($conn, "select * from produk order by id_produk desc");
						while($rp = mysqli_fetch_array($prod)){
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
		</section>

		<!-- New Arrivals -->
		<div class="bg-gray-extra-light padding-top-30px padding-bottom-100px">
			<div class="container-spread">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 uk-flex uk-flex-middle" data-uk-scrollspy="cls: uk-animation-scale-up; target: > div ; delay: 50; repeat: false">
						<div class="md-text-center md-margin-bottom-75px">
							<h3 class="text-weight-700 text-black text-uppercase">Browse new arrivals.</h3>
							<a href="#" class="btn btn-large btn-black sm-display-table sm-margin-left-right-auto no-margin-bottom">See all</a>
						</div>
					</div>
					
					<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 center-col" data-uk-scrollspy="cls: uk-animation-scale-up; target: > .row > div ; delay: 50; repeat: false">
						<div data-uk-scrollspy="cls: uk-animation-scale-up; target: > .row > div ; delay: 50; repeat: false">
							<div class="row">
								<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 margin-bottom-100px">
									<div class="row">
										<div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
											<a href="images/shop/style-03/10.jpg" data-caption="Item Caption">
												<img class="border-radius-7 margin-bottom-20px md-no-margin-bottom sm-margin-bottom-20px" src="images/shop/style-03/10.jpg" alt="" />
											</a>
										</div>
										<div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 uk-flex uk-flex-middle">
											<div class="">
												<a href="product-style-05.html"><h5 class="text-medium text-weight-700 text-black text-uppercase margin-bottom-10px">Purple Shirt</h5></a>
												<p class="margin-bottom-10px"><a href="#">Men</a> <span data-uk-icon="icon: close; ratio: 1.1" class="margin-left-right-5px text-gray-light"></span><a href="#">Clothing</a></p>
												<h6 class="text-medium text-weight-700 roboto text-gray-extra-dark margin-bottom-10px">$33</h6>
												<a href="page-cart.html"><span data-uk-icon="icon: cart; ratio: 1" class="text-black"></span></a>
											</div>
										</div>
									</div>
								</div>
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