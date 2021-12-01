<?php
	session_start();
	include('koneksi.php');

	$id_user = $_SESSION['id_user'];
	$nm_toko = $_POST['nm_toko'];
	$desc_toko = $_POST['desc_toko'];
	$add_toko = $_POST['add_toko'];

	date_default_timezone_set('asia/jakarta');
	$dtnow = date("Y-m-d His");

	mkdir("uploads/toko/avatar/$dtnow");
	$loc_foto = "uploads/toko/avatar/$dtnow/";
	$pic_name = $loc_foto . $_FILES["pic"]["name"];
	$imageFileType = strtolower(pathinfo($loc_foto,PATHINFO_EXTENSION));
	$check = getimagesize($_FILES["pic"]["tmp_name"]);

	if($check != false){
		if ($_FILES["pic"]["size"] > 500000) {
		    echo "<script>
				alert('Gagal. Ukuran file logo terlalu besar');
				window.location='my-store.php';
			</script>";
		}
		else{
			// insert to db toko
			move_uploaded_file($_FILES["pic"]["tmp_name"], $pic_name);
			$newToko = "insert into toko values(DEFAULT, '$id_user', '$nm_toko', '$desc_toko', '$pic_name', '$add_toko', 'unofficial')";
			if(mysqli_query($conn, $newToko)){
				echo "<script>
					alert('Berhasil membuka toko');
					window.location='my-store.php';
				</script>";
			}
			else{
				echo "<script>
					alert('Gagal membuka toko');
					window.location='my-store.php';
				</script>";
			}
		}
	}
	else{
		echo "<script>
			alert('Logo harus gambar');
			window.location='my-store.php';
		</script>";
	}


?>