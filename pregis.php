<?php
	 include("koneksi.php");

	 $username = $_POST['username'];
	 $pass = $_POST['password'];
	 $email = $_POST['email'];
	 $fname = $_POST['fname'];
	 $lname = $_POST['lname'];
	 $sql = "SELECT * FROM user WHERE username = '$username'";
	 $query = mysqli_query($conn, $sql);
	 if($query->num_rows != 0) {
		echo "<script>alert('Username telah dipakai');
		window.location='login.php';</script>";
	 } else {
		$addUser = "insert into user values(DEFAULT, '$username', '$pass', '$email', '$fname', '$lname')";
		if(mysqli_query($conn, $addUser)){
			echo "<script>alert('Registrasi berhasil');
			window.location='login.php';</script>";
		}else{
			echo "<script>alert('Registrasi gagal');
			window.location='login.php';</script>";
		}
	 }
?>