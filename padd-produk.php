<?php
	date_default_timezone_set('asia/jakarta');
	if(isset($_POST['btn-add-produk'])){
		include('koneksi.php');
		$id_toko = $_POST['id_toko'];
		$nm_prod = $_POST['nm_prod'];
		$desc_prod = $_POST['desc_prod'];
		$stok = $_POST['stok'];
		$harga = $_POST['harga'];
		$kategori = $_POST['kategori'];
		$dtnow = date("YmdHis");
		$dt = date("Y-m-d");

		$slug_prod = strtolower(str_replace(' ', '-', $nm_prod));

		mkdir("uploads/produk/$dtnow");
		// insert to tb produk
		$ins = "insert into produk values(DEFAULT,'$id_toko','$nm_prod','$desc_prod','$stok','$harga','$slug_prod','$kategori','$dt','0')";
		if(mysqli_query($conn, $ins)){
			// get last id of produk
			$lprod = mysqli_query($conn, "select * from produk order by id_produk desc limit 1");
			$rlp = mysqli_fetch_array($lprod);
			$lastIdProd = $rlp['id_produk'];

			$countfiles = count($_FILES['pic']['name']);
			// Looping all files
			for($i=0;$i<$countfiles;$i++){
				$locfile = "uploads/produk/$dtnow/";
				$fname = $_FILES["pic"]["name"][$i];
				$pic_name = $locfile . $_FILES["pic"]["name"][$i];

				if(move_uploaded_file($_FILES["pic"]["tmp_name"][$i], $pic_name)){
					mysqli_query($conn, "insert into foto_produk values(DEFAULT, '$fname', '$locfile', '$lastIdProd')");
				}
			}
			echo "<script>
				alert('Berhasil menambah produk');
				window.location='my-store.php';
			</script>";
		}
		else{
			echo "<script>
				alert('Gagal menambah produk');
				window.location='my-store.php';
			</script>";
		}

	}
?>