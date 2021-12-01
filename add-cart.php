<?php
	include('koneksi.php');
	session_start();
	$id_user = $_SESSION['id_user'];
	$id_produk = $_GET['id'];

	$cek = mysqli_query($conn, "select * from tas where id_produk='$id_produk' and $id_user='$id_user'");
	if(mysqli_num_rows($cek)<1){
		// add to tas
		mysqli_query($conn, "insert into tas values(DEFAULT, '$id_user', '$id_produk', 1)");
	}
	else{
		// update tas
		mysqli_query($conn, "update tas set jml_prod=jml_prod+1 where id_user='$id_user' and id_produk='$id_produk'");
	}

	echo "<script>alert('Berhasil menambahkan ke tas.'); history.go(-1);</script>";
?>