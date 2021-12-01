<?php
	 session_start();
	 require_once("koneksi.php");
	 $username = $_POST['username'];
	 $pass = $_POST['password'];   
	 $sql = "SELECT * FROM user WHERE username = '$username'";
	 $query = mysqli_query($conn, $sql);
	 $hasil = mysqli_fetch_array($query);
	 if(mysqli_num_rows($query) == 0) {
		echo "<script>
			alert('Username salah');
			window.location='login.php';
		</script>";
	 } else {
		if($pass != $hasil['password']) {
			echo "<script>
				alert('Password salah');
				window.location='login.php';
			</script>";
		} else {
			$_SESSION['id_user'] = $hasil['id_user'];
			$_SESSION['username'] = $hasil['username'];
			$_SESSION['fname'] = $hasil['fname'];
			$_SESSION['lname'] = $hasil['lname'];
			header('location:index.php');
		}
	 }
?>