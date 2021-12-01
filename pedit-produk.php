<?php
	date_default_timezone_set('asia/jakarta');
	include('koneksi.php');
	$id_toko = $_POST['id_toko'];
	$id_produk = $_POST['id_produk'];
	$nm_prod = $_POST['nm_prod'];
	$desc_prod = $_POST['desc_prod'];
	$stok = $_POST['stok'];
	$harga = $_POST['harga'];
	$kategori = $_POST['kategori'];
	$dtnow = date("YmdHis");
	$dt = date("Y-m-d");

	$slug_prod = strtolower(str_replace(' ', '-', $nm_prod));

	// update produk
	$upd = "update produk set nama_produk='$nm_prod', desc_produk='$desc_prod', stok='$stok', harga='$harga', slug_produk='$slug_prod', id_kategori='$kategori' where id_produk='$id_produk'";
	if(mysqli_query($conn, $upd)){
		$countfiles = count($_FILES['pic']['name']);
		if($countfiles>0){
			mkdir("uploads/produk/$dtnow");
			for($i=0;$i<$countfiles;$i++){
				$locfile = "uploads/produk/$dtnow/";
				$fname = $_FILES["pic"]["name"][$i];
				$pic_name = $locfile . $_FILES["pic"]["name"][$i];

				if(move_uploaded_file($_FILES["pic"]["tmp_name"][$i], $pic_name)){
					mysqli_query($conn, "insert into foto_produk values(DEFAULT, '$fname', '$locfile', '$id_produk')");
				}
			}
		}
		echo "<script>
			alert('Berhasil mengubah data produk');
			window.location='edit-produk.php?id=$id_produk';
		</script>";
	}
	else{
		echo "<script>
			alert('Gagal mengubah data produk');
			window.location='edit-produk.php?id=$id_produk';
		</script>";
		// echo mysqli_error($conn);
	}
?>