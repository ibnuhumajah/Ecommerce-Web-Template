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
					<!-- ============================= FORM TAMBAH PRODUK ============================= -->
					<div class="padding-top-20px padding-bottom-50px">
						<div class="container">
							<div class="row">
								<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 center-col text-left margin-auto">
									<div class="container contact-wrapper">
										<h5 class="text-black text-weight-600 margin-bottom-10px sm-text-center">Tambah Produk</h5>
										<div class="separator width-100 bottom-border border-1px border-color-gray-light margin-top-30px sm-margin-left-right-auto"></div>
										<form class="margin-top-35px contact-form" method="post" action="padd-produk.php" enctype="multipart/form-data">
											<div class="controls">
												<div class="row">
													<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<input type="hidden" name="id_toko" value="<?php echo $id_toko ?>">
															<label><b>Nama Produk *</b></label>
															<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="text" name="nm_prod"  placeholder="Nama Produk" required>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<label><b>Deskripsi Produk *</b></label>
															<textarea class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="text" name="desc_prod" placeholder="Deskripsi Produk" rows="5" required></textarea>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<label><b>Jumlah Stok *</b></label>
															<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="number" name="stok" min="1" value="1" required>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<label><b>Harga Satuan *</b></label>
															<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="number" name="harga" min="1" required>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<label><b>Kategori</b></label>
															<select class="form-control form_name no-margin-top text-small text-gray-extra-dark text-weight-400 roboto" name="kategori">
															<?php
																$kat = mysqli_query($conn, "select * from kategori order by nm_kategori asc");
																while($rk = mysqli_fetch_array($kat)){
																	$nm_kategori = $rk['nm_kategori'];
																	$sex_cat = $rk['sex_cat'];
																	if($sex_cat == 'men'){
																		$sex_cat = 'Pria';
																	}
																	else{
																		$sex_cat = 'Wanita';
																	}
															?>
																<option value="<?php echo $rk['id_kategori']; ?>"><?php echo $nm_kategori." - ".$sex_cat; ?></option>
															<?php
																}
															?>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<label><b>Foto Produk</b></label>
															<br><i>*Ukuran file maksimal 2MB</i>
															<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="file" name="pic[]" required>
															<div class="lampiran">
															</div>
														</div>
														<label class="btn btn-small btn-default md-margin-bottom-15px sm-margin-left-right-auto sm-display-table btn-attach" style="cursor: pointer;"><i class="fa fa-plus"></i> Tambah foto lainnya</label>
													</div>
												</div>
												<div class="margin-top-15px row">
													<div class="col-md-12">
														<input type="submit" class="btn-send btn btn-small btn-gray-extra-dark md-margin-bottom-15px sm-margin-left-right-auto sm-display-table" name="btn-add-produk" value="Tambah Sekarang">
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
				else{
					echo "<script>window.location='my-store.php';</script>";
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
<script type="text/javascript">
	$(function(){
		$(".btn-attach").click(function(){
			$('.lampiran').append("<input class='form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto' type='file' name='pic[]'>");
		});
	});
</script>
</html>