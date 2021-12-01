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
					$id_produk = $_GET['id'];
					$produk = mysqli_query($conn, "select * from produk where id_produk='$id_produk' AND id_toko='$id_toko'");
					if(mysqli_num_rows($produk)>0){
						$rpr = mysqli_fetch_array($produk);
						$id_kat = $rpr['id_kategori'];
			?>
					<!-- ============================= FORM EDIT PRODUK ============================= -->
					<div class="padding-top-20px padding-bottom-50px">
						<div class="container">
							<div class="row">
								<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 center-col text-left margin-auto">
									<div class="container contact-wrapper">
										<h5 class="text-black text-weight-600 margin-bottom-10px sm-text-center">Edit - <?php echo $rpr['nama_produk'] ?></h5>
										<div class="separator width-100 bottom-border border-1px border-color-gray-light margin-top-30px sm-margin-left-right-auto"></div>
										<form class="margin-top-35px contact-form" method="post" action="pedit-produk.php" enctype="multipart/form-data">
											<div class="controls">
												<div class="row">
													<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<input type="hidden" name="id_toko" value="<?php echo $id_toko ?>">
															<input type="hidden" name="id_produk" value="<?php echo $id_produk ?>">
															<label><b>Nama Produk *</b></label>
															<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="text" name="nm_prod"  placeholder="Nama Produk" required value="<?php echo $rpr['nama_produk']; ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<label><b>Deskripsi Produk *</b></label>
															<textarea class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="text" name="desc_prod" placeholder="Deskripsi Produk" rows="5" required><?php echo $rpr['desc_produk']; ?></textarea>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<label><b>Jumlah Stok *</b></label>
															<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="number" name="stok" min="1" value="<?php echo $rpr['stok']; ?>" required>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<label><b>Harga Satuan *</b></label>
															<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="number" name="harga" min="1" value="<?php echo $rpr['harga']; ?>" required>
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
																	$idk = $rk['id_kategori'];
																	$sex_cat = $rk['sex_cat'];
																	if($sex_cat == 'men'){
																		$sex_cat = 'Pria';
																	}
																	else{
																		$sex_cat = 'Wanita';
																	}
															?>
																<option value="<?php echo $idk; ?>" <?php if($idk==$id_kat){echo"selected";} ?>><?php echo $nm_kategori." - ".$sex_cat; ?></option>
															<?php
																}
															?>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 col-sm-12 col-xs-12">
														<label><b>Foto Produk</b></label>
														<table class="table">
															<thead>
																<tr>
																	<th>#</th>
																	<th>Foto</th>
																	<th>Opsi</th>
																</tr>
															</thead>
															<tbody>
															<?php
																$i=1;
																$ftpr = mysqli_query($conn, "select * from foto_produk where id_produk='$id_produk'");
																while($rftp = mysqli_fetch_array($ftpr)){
																	$id_ft_p = $rftp['id_fprod'];
															?>
																<tr>
																	<td><?php echo $i++; ?></td>
																	<td><img src="<?php echo $rftp['loc_pfile'].''.$rftp['file_prod']; ?>" style="height: 100px;"></td>
																	<td><a href="#" class="btn btn-small btn-danger" data-toggle="modal" data-target="#hapus-foto-<?php echo $id_ft_p; ?>"><i class="fa fa-trash"></i></a></td>
																	<?php include('modal/hapus_foto_produk.php'); ?>
																</tr>
															<?php
																}
															?>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<label><b>Tambah Foto Produk</b></label>
															<br><i>*Ukuran file maksimal 2MB</i>
															<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="file" name="pic[]">
															<div class="lampiran">
															</div>
														</div>
														<label class="btn btn-small btn-default md-margin-bottom-15px sm-margin-left-right-auto sm-display-table btn-attach" style="cursor: pointer;"><i class="fa fa-plus"></i> Tambah foto lainnya</label>
													</div>
												</div>
												<div class="margin-top-15px row">
													<div class="col-md-6">
														<a href="my-store.php" class="btn btn-small btn-default">Kembali</a>
													</div>
													<div class="col-md-6 text-right">
														<input type="submit" class="btn-send btn btn-small btn-gray-extra-dark md-margin-bottom-15px sm-margin-left-right-auto sm-display-table" name="btn-edit-produk" value="Simpan Perubahan">
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
						include('404.php');
					}
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