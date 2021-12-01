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
	if(empty($_SESSION['username'])){
		header('location: login.php');
	}
	$id_user = $_SESSION['id_user'];
?>
	<body>
		<a href="javascript:" id="return-to-top"><span data-uk-icon="icon: arrow-up; ratio: 1" class="text-gray-extra-dark"></span></a>
		
		<?php include('layouts/header.php'); ?>

		<div class="padding-top-30px padding-bottom-150px">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 center-col text-left margin-auto">
						<div class="position-relative overflow-x-auto overflow-y-hidden width-100 padding-150px-bottom">
							<table class="uk-table uk-table-striped no-margin-bottom">
								<thead>
									<tr>
										<th>Preview</th>
										<th>Nama Produk</th>
										<th>Harga</th>
										<th>Jumlah</th>
										<th>Total</th>
										<th>Hapus</th>
								</thead>
								<tbody>
								<?php
									$subtotal = 0;
									$tas = mysqli_query($conn, "select * from tas t, produk p where t.id_user='$id_user' and t.id_produk=p.id_produk");
									while($rt = mysqli_fetch_array($tas)){
										$idp = $rt['id_produk'];
										$ftpr = mysqli_query($conn, "select * from foto_produk where id_produk='$idp'");
										$rf = mysqli_fetch_array($ftpr);
										$total = $rt['jml_prod']*$rt['harga'];
										$subtotal+=$total;
								?>
									<tr>
										<td><img src="<?php echo $rf['loc_pfile'].''.$rf['file_prod']; ?>" width="60px"></td>
										<td><a href="detil-produk.php?id=<?php echo $rt['id_produk']; ?>&p=<?php echo $rt['slug_produk']; ?>" target="_blank"><?php echo $rt['nama_produk']; ?></a></td>
										<td>Rp. <?php echo number_format($rt['harga']); ?></td>
										<td><input type="number" class="form-control width-50px jml-<?php echo $idp ?>" min="1" value="<?php echo $rt['jml_prod']; ?>"></td>
										<script type="text/javascript">
											$(document).ready(function(){
												var timeout = null;
												$('#nilai-{{$h->ids}}').keyup(function(){
													var id_serah = '{{$h->ids}}';
													var nilai = $(this).val();

													clearTimeout(timeout);
													timeout = setTimeout(function () {
														sending_nilai(id_serah, nilai);
													}, 2000);
												});
											});
										</script>
										<td>Rp. <?php echo number_format($total); ?></td>
										<td><a href="remove-cart.php?id=<?php echo $rt['id_tas']; ?>" class="btn btn-small btn-transparent-black">Remove</a></td>
									</tr>
								<?php
									}
								?>
								</tbody>
							</table>
						</div>
						<div class="col-lg-12">
							<table width="100%">
								<tr>
									<td width="50%"><b>SUBTOTAL</b></td>
									<td align="right"><b>Rp. <?php echo number_format($subtotal); ?></b></td>
								</tr>
							</table>
							<div class="text-right margin-top-30px">
								<a href="checkout.php" class="btn btn-small btn-black">Lanjut ke pembayaran</a>
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
<script type="text/javascript">
	function sending_nilai(id_serah, nilai){
		var http = false;
		if (window.XMLHttpRequest) {
			http = new XMLHttpRequest();
		}
		else if (window.ActiveXObject){
			http = new ActiveXObject("Microsoft.XMLHTTP");
		}

		http.responseText;
		http.abort();
		http.onreadystatechange=function(){
			if (http.readyState == 4) {
				$(document).Toasts('create', {
			        class: 'bg-primary', 
			        title: 'Penilaian',
			        autohide: true,
			        delay: 2000,
			        body: this.responseText
			    });
			}
		}
		
		if(nilai==""){
			nilai = "empty";
		}
		http.open("GET", ""+"/"+id_serah+"/"+nilai, true);
		http.send(null);
		console.log(nilai);
	}
</script>
</html>