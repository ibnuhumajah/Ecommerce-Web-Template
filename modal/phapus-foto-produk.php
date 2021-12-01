<?php
	include('../koneksi.php');
	$idf = $_GET['id'];
	$idp = $_GET['idp'];
	$idt = $_GET['idt'];

	$cek = mysqli_query($conn, "select * from produk where id_produk='$idp' and id_toko='$idt'");

	if(mysqli_num_rows($cek) > 0){
		$fot = mysqli_query($conn, "select * from foto_produk where id_fprod='$idf'");
		$rf = mysqli_fetch_array($fot);
		$loc = $rf['loc_pfile']."".$rf['file_prod'];
		if (unlink("../".$loc)) {
			mysqli_query($conn, "delete from foto_produk where id_fprod='$idf'");
			echo "<script>
					alert('Berhasil menghapus foto produk');
					window.location='../edit-produk.php?id=$idp';
				</script>";
		}
		else{
			echo "<script>
					alert('Gagal menghapus foto produk');
					window.location='../edit-produk.php?id=$idp';
				</script>";
		}
	}
	else{
		echo "<script>
			window.location='../edit-produk.php?id=$idp';
		</script>";
	}
?>