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
		<div id="loader-wrapper">
			<div class="loader-img"><img src="images/logo-dark.png" alt="" /></div>
			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
		</div> 

		<?php
			if(empty($_SESSION['username'])){
				header("location: login.php");
			}
			else{
				include('layouts/header.php');
				$id_user = $_SESSION['id_user'];
				$cek_toko = mysqli_query($conn, "select * from toko where id_user='$id_user'");
				if(mysqli_num_rows($cek_toko) > 0){
					$rt = mysqli_fetch_array($cek_toko);
					$id_toko = $rt['id_toko'];
			?>
					<div class="col-md-9 col-sm-12 col-xs-12 center-col margin-top-30px margin-bottom-30px">
						<div class="row">
							<div class="col-md-2 col-sm-12 col-xs-12 text-center">
								<img src="<?php echo $rt['foto_toko'] ?>" alt="" width="150"/>
							</div>
							<div class="col-md-10 col-sm-12 col-xs-12 uk-flex uk-flex-middle">
								<div>
									<h6 class="text-weight-600 text-gray-extra-dark margin-bottom-5px sm-margin-top-15px"><?php echo $rt['nama_toko'] ?></h6>
									<p class="text-weight-300 text-gray-extra-dark margin-bottom-15px"><i class="fa fa-map-marker-alt margin-right-5px"></i> <?php echo $rt['alamat'] ?></p>
									<p class="margin-bottom-15px"><?php echo $rt['desc_toko'] ?></p>
									<a class="btn btn-small btn-default sm-display-table" href="#"><i class="fa fa-edit"></i> Edit Toko</a>
									<a class="btn btn-small btn-transparent-black sm-display-table" href="add-produk.php">Tambah Produk</a>
								</div>
							</div>
						</div>
						<div class="separator width-100 bottom-border border-1px border-color-gray-light margin-top-30px sm-margin-left-right-auto"></div>
					</div>

					<!-- ============================= ETALASE TOKO ============================= -->
					<section class="padding-top-bottom-30px">
						<div class="container">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" data-uk-scrollspy="cls: uk-animation-slide-bottom; target: > .row > div ; delay: 50; repeat: false">
									<div class="width-95 margin-left-auto sm-width-100 sm-margin-left-right-auto">
										<div data-uk-scrollspy="cls: uk-animation-slide-left-medium; target: > .row > div ; delay: 50; repeat: false">
											<div class="row">
											<?php
												$myProd = mysqli_query($conn, "select * from produk where id_toko='$id_toko' order by id_produk desc");
												while($rp = mysqli_fetch_array($myProd)){
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
													<div class="col-md-3 col-sm-6 col-xs-12 margin-bottom-20px text-center">
														<div style="height: 200px !important;">
															<a href="#"><img src="<?php echo $loc_pfile.''.$file_prod; ?>" alt="" style="height: 200px !important;" /></a>
														</div>
														<p class="margin-top-20px margin-bottom-5px text-weight-700 text-large">
															<a href="#" class="text-black"><?php echo $rp['nama_produk'] ?></a>
															<a href="edit-produk.php?id=<?php echo $id_produk; ?>" class="margin-left-right-10px text-gold"><i class="fa fa-edit"></i></a>
															<a data-target="#hapus-produk-<?php echo $id_produk; ?>" data-toggle="modal" class="margin-left-right-10px text-danger"><i class="fa fa-trash"></i></a>
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
			<?php
				}
				else{
					// ============================= FORM BUKA TOKO =============================
			?>
				<div class="padding-top-20px padding-bottom-50px">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 center-col text-left margin-auto">
								<div class="container contact-wrapper">
									<h5 class="text-black text-weight-600 margin-bottom-10px sm-text-center">Buka Toko Sendiri</h5>
									<div class="separator width-10 bottom-border border-1px border-color-gray-light margin-top-30px sm-margin-left-right-auto"></div>
									<form class="margin-top-35px contact-form" method="post" action="popen_toko.php" enctype="multipart/form-data">
										<div class="controls">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="text" name="nm_toko"  placeholder="Nama Toko*" required>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<textarea class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" name="desc_toko" placeholder="Deskripsi Toko*" required></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<textarea class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" name="add_toko" placeholder="Alamat Toko*" required></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label>Logo Toko*</label>
														<input type="file" name="pic" class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" required>
														<i>Note: Pastikan ukuran panjang dan lebar logo sama</i>
													</div>
												</div>
											</div>
											<div class="margin-top-15px row">
												<div class="col-md-12">
													<input type="submit" class="btn-send btn btn-small btn-gray-extra-dark md-margin-bottom-15px sm-margin-left-right-auto sm-display-table" value="Buka Sekarang">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
				}
			}
		?>

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