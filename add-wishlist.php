<?php
	include('koneksi.php');
	session_start();
	$id_user = $_SESSION['id_user'];
	$id_produk = $_GET['id'];

	$cek = mysqli_query($conn, "select * from wishlist where id_produk='$id_produk' and $id_user='$id_user'");
	if(mysqli_num_rows($cek)<1){
		// add to tas
		mysqli_query($conn, "insert into wishlist values(DEFAULT, '$id_user', '$id_produk')");
		echo "<script>alert('Berhasil menambahkan ke wishlist'); history.go(-1);</script>";
	}
	else{
		// update tas
		mysqli_query($conn, "delete from wishlist where id_produk='$id_produk' and $id_user='$id_user'");
		echo "<script>alert('Berhasil menghapus dari wishlist'); history.go(-1);</script>";
	}

?>