<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="text" content="">
	<meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
	<title>Login SAYo - Fashion & E-Commerce</title>
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
	if(!empty($_SESSION['username'])){
		header('location: index.php');
	}
?>
	<body>
		<a href="javascript:" id="return-to-top"><span data-uk-icon="icon: arrow-up; ratio: 1" class="text-gray-extra-dark"></span></a>
		<?php include('layouts/header.php'); ?>
		<div class="padding-top-20px padding-bottom-150px">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12 center-col text-left margin-auto">
						<div class="container contact-wrapper">
							<h5 class="text-black text-weight-600 margin-bottom-10px sm-text-center">Log In</h5>
							<p class="text-gray-dark text-weight-300 no-margin-bottom sm-text-center">Learn sollicitudin lorem quis bibendum auctor more about our brand.</p>
							<div class="separator width-10 bottom-border border-1px border-color-gray-light margin-top-30px sm-margin-left-right-auto"></div>
							<form class="margin-top-35px contact-form" method="post" action="plogin.php">
								<div class="controls">
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
												<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="text" name="username"  placeholder="Username">
												<div class="help-block with-errors"></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
												<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="password" name="password"  placeholder="Password">
												<div class="help-block with-errors"></div>
											</div>
										</div>
									</div>
									<div class="margin-top-15px row">
										<div class="col-md-12">
											<input type="submit" class="btn-send btn btn-small btn-gray-extra-dark md-margin-bottom-15px sm-margin-left-right-auto sm-display-table" value="Log in">
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<p class="no-margin-bottom sm-text-center sm-margin-top-15px"><a href="#" class="text-underline text-black">Forgot your password?</a></p>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 center-col text-left margin-auto sm-margin-top-75px">
						<div class="container contact-wrapper">
							<h5 class="text-black text-weight-600 margin-bottom-10px sm-text-center">Register</h5>
							<p class="text-gray-dark text-weight-300 no-margin-bottom sm-text-center">Learn  more about our brand.</p>
							<div class="separator width-10 bottom-border border-1px border-color-gray-light margin-top-30px sm-margin-left-right-auto"></div>
							<form class="margin-top-35px contact-form" action="pregis.php" method="post">
								<div class="messages"></div>
								<div class="controls">
									<div class="row">
									
										<!-- Column -->
										<div class="col-md-6 col-sm-12 col-xs-12">
										
											<!-- Form Group -->
											<div class="form-group">

												<!-- Input -->
												<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="text" name="fname"  placeholder="First name *" required>

												<!-- Error Block -->
												<div class="help-block with-errors"></div>
											
											</div>
											<!-- End Form Group -->
											
										</div>
										<!-- End Column -->
										
										
										<!-- Column -->
										<div class="col-md-6 col-sm-12 col-xs-12">
										
											<!-- Form Group -->
											<div class="form-group">

												<!-- Input -->
												<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="text" name="lname"  placeholder="Last name *" required>

												<!-- Error Block -->
												<div class="help-block with-errors"></div>
											
											</div>
											<!-- End Form Group -->
											
										</div>
										<!-- End Column -->
										
									</div>
									
									
									
									<!-- Row -->
									<div class="row">
									
										<!-- Column -->
										<div class="col-md-12 col-sm-12 col-xs-12">
										
											<!-- Form Group -->
											<div class="form-group">

												<!-- Input -->
												<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="email" name="email"  placeholder="Email *" required>

												<!-- Error Block -->
												<div class="help-block with-errors"></div>
											
											</div>
											<!-- End Form Group -->
											
										</div>
										<!-- End Column -->
										
									</div>

									<!-- Row -->
									<div class="row">
									
										<!-- Column -->
										<div class="col-md-12 col-sm-12 col-xs-12">
										
											<!-- Form Group -->
											<div class="form-group">

												<!-- Input -->
												<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="text" name="username"  placeholder="Username *" required>

												<!-- Error Block -->
												<div class="help-block with-errors"></div>
											
											</div>
											<!-- End Form Group -->
											
										</div>
										<!-- End Column -->
										
									</div>
									<!-- End Row -->	

									
									<!-- Row -->
									<div class="row">
									
										<!-- Column -->
										<div class="col-md-12 col-sm-12 col-xs-12">
										
											<!-- Form Group -->
											<div class="form-group">

												<!-- Input -->
												<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="password" name="password"  placeholder="Password *" required>

												<!-- Error Block -->
												<div class="help-block with-errors"></div>
											
											</div>
											<!-- End Form Group -->
											
										</div>
										<!-- End Column -->
										
									</div>
									<!-- End Row -->

									<!-- Row -->
									<div class="row">
									
										<!-- Column -->
										<div class="col-md-12 col-sm-12 col-xs-12">
										
											<!-- Form Group -->
											<div class="form-group">

												<!-- Input -->
												<input class="form-control form_name no-margin-top padding-15px text-small text-gray-extra-dark text-weight-400 roboto" type="password" name="password2"  placeholder="Retype Password *" required>

												<!-- Error Block -->
												<div class="help-block with-errors"></div>
											
											</div>
											<!-- End Form Group -->
											
										</div>
										<!-- End Column -->
										
									</div>
									<!-- End Row -->
			
									
									<!-- Row -->
									<div class="row">
				
										<!-- Column -->
										<div class="col-md-12">
										
											<!-- Input -->
											<input type="submit" class="btn-send btn btn-small btn-gray-extra-dark md-margin-bottom-15px sm-margin-left-right-auto sm-display-table" value="Sign Up">
											
										</div>
										<!-- End Column -->
										
									</div>
									<!-- End Row -->

								</div>
								<!-- End Form Controls -->
								
							</form>
							<!-- End Form Container -->
							
						</div>
						<!-- END Form Container -->
					
					</div>
					<!-- End Register -->
					
				</div>
				<!-- End Row -->

			</div>
			<!-- End Container -->

		</div>

		<?php include('layouts/footer.php'); ?>
		

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
</body>
</html>