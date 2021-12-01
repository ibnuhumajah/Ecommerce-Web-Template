<?php
	$nm_user = "<a href='login.php'>Masuk</a>";
	$id_user = '0';
	if(!empty($_SESSION['username'])){
		$nm_user = $_SESSION['fname'].' '.$_SESSION['lname'];
		$id_user = $_SESSION['id_user'];
	}
?>
<div class="z-index-999">
	<div class="navbar-dark" data-uk-sticky>
		<nav class="uk-navbar-container" data-uk-navbar="boundary-align: true; align: center;">
			<div class="uk-navbar-left padding-left-four-percent">
				<a class="uk-navbar-item uk-logo " href="#" data-uk-scroll><img class="width-100px" src="images/logo-white.png" alt="" /></a>
			</div>
			<div class="uk-navbar-right uk-dark padding-right-four-percent">
				<ul class="uk-navbar-nav text-weight-600">
					<li>
						<a class="text-gray-extra-light text-extra-small uk-visible@l" href="index.php">Beranda</a>
					</li>
					<li>
						<a class="text-gray-extra-light text-extra-small uk-visible@l" href="#">Kategori</a>
						<div class="uk-navbar-dropdown uk-navbar-dropdown-width-2 bg-gray-extra-dark uk-light" data-uk-dropdown>
							<div class="uk-navbar-dropdown-grid uk-child-width-1-2" data-uk-grid>
								<div>
									<ul class="uk-nav uk-navbar-dropdown-nav">
										<li class="uk-nav-header text-small"><a href="produk.php?sex=men">Pria</a></li>
										<li class="uk-nav-divider"></li>
										<?php
											$mencat = mysqli_query($conn, "select * from kategori where sex_cat='men' order by nm_kategori asc");
											while($rm = mysqli_fetch_array($mencat)){
												$nm_kat = $rm['nm_kategori'];
												$lownmk = strtolower($nm_kat);
										?>
											<li><a href="produk.php?sex=men&category=<?php echo $lownmk; ?>"><?php echo $nm_kat; ?></a></li>
										<?php
											}
										?>
									</ul>
								</div>
								<div>
									<ul class="uk-nav uk-navbar-dropdown-nav">
										<li class="uk-nav-header text-small"><a href="produk.php?sex=women">Wanita</a></li>
										<li class="uk-nav-divider"></li>
										<?php
											$womencat = mysqli_query($conn, "select * from kategori where sex_cat='women' order by nm_kategori asc");
											while($rm = mysqli_fetch_array($womencat)){
												$nm_kat = $rm['nm_kategori'];
												$lownmk = strtolower($nm_kat);
										?>
											<li><a href="produk.php?sex=women&category=<?php echo $lownmk; ?>"><?php echo $nm_kat; ?></a></li>
										<?php
											}
										?>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<li>
						<a class="text-gray-extra-light text-extra-small uk-visible@l" href="#">Brand</a>
						<div class="bg-gray-extra-dark" data-uk-dropdown>
							<ul class="uk-nav uk-navbar-dropdown-nav">
								<?php
									$brand = mysqli_query($conn, "select * from toko where status='official' limit 15");
									while($rb = mysqli_fetch_array($brand)){
										$nm_toko = $rb['nama_toko'];
										$lownmt = strtolower($nm_toko);
								?>
								<li><a href="produk.php?brand=<?php echo $lownmt; ?>"><?php echo $nm_toko ?></a></li>
								<?php
									}
								?>
								<li><a href="brands.php">Lihat semua</a></li>
							</ul>
						</div>
					</li>
					<li>
						<a class="uk-visible@l" href="#"><span class="text-white" data-uk-icon="icon: user; ratio: 1"></span></a>
						<div class="bg-gray-extra-dark" data-uk-dropdown>
							<ul class="uk-nav uk-navbar-dropdown-nav">
								<li class="uk-nav-header text-small"><?php echo $nm_user; ?></li>
								<li class="uk-nav-divider"></li>
								<li><a href="my-store.php">Toko Saya</a></li>
								<li><a href="account.php">Akun Saya</a></li>
								<li><a href="wishlist.php">Wishlist</a></li>
								<li><a href="bag.php">Tas</a></li>
								<li><a href="checkout.php">Transaksi</a></li>
								<li><a href="about.php">Tentang Kami</a></li>
								<?php
									if(!empty($_SESSION['username'])){
								?>
									<li class="uk-nav-divider"></li>
									<li><a href="logout.php">Keluar</a></li>
								<?php
									}
								?>
							</ul>
						</div>
					</li>
					<li>
						<?php
							$jTas = mysqli_query($conn, "select SUM(jml_prod) from tas where id_user='$id_user'");
							$rjTas = mysqli_fetch_array($jTas);
							$jmlTas = $rjTas[0];
						?>
						<a class="uk-visible@m" href="bag.php"><span class="text-white" data-uk-icon="icon: cart; ratio: 1"></span>
						<?php
							if($jmlTas>0){
						?>
							<span class="uk-badge bg-gold text-black badge-small margin-left-minus-10px"><?php echo $jmlTas; ?></span>
						<?php
							}
						?>
						</a>
					</li>
					<li>
						<?php
							$jWish = mysqli_query($conn, "select * from wishlist where id_user='$id_user'");
							$jmlWishlist = mysqli_num_rows($jWish);
						?>
						<a class="uk-visible@m" href="wishlist.php"><span class="text-white" data-uk-icon="icon: heart; ratio: 1"></span>
						<?php
							if($jmlWishlist>0){
						?>
							<span class="uk-badge bg-gold text-black badge-small margin-left-minus-10px"><?php echo $jmlWishlist; ?></span>
						<?php
							}
						?>
						</a>
					</li>
					<li>
						<div class="uk-navbar-right uk-hidden@l">
							<a class="uk-navbar-toggle" data-uk-navbar-toggle-icon data-uk-toggle="target: #offcanvas-nav"></a>
						</div>
					</li>
					<li>
						<a class="uk-navbar-toggle" href="#modal-full4" data-uk-search-icon data-uk-toggle></a>
						<div id="modal-full4" class="uk-modal-full uk-modal" data-uk-modal>
							<div class="bg-black uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" data-uk-height-viewport>
								<button class="bg-black uk-modal-close-full" type="button" data-uk-close></button>
								<form class="uk-search width-100 uk-search-large">
									<input class="uk-search-input text-uppercase text-weight-500 text-center letter-spacing-1" type="search" placeholder="Search">
								</form>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>

<!-- ========================== MOBILE NAVIGATION ========================== -->

<div id="offcanvas-nav" data-uk-offcanvas="mode: push; overlay: true; esc-close: true;">
	<div class="uk-offcanvas-bar menu-dark bg-gray-extra-dark">
		<ul class="uk-nav-default uk-nav-parent-icon text-left" data-uk-nav>
			<li class="margin-top-20px"><a class="uk-navbar-item uk-logo" href="#" data-uk-scroll><img class="width-100px" src="images/logo-white.png" alt="" /></a></li>
			<li class="margin-bottom-10px">
				<a href="index.php" class="bottom-border border-1px border-color-gray-extra-dark"><span class="text-small text-gray-light roboto text-weight-400 padding-bottom-20px">Beranda</span></a>
			</li>
			<li class="uk-parent margin-bottom-10px">
				<a href="#" class="bottom-border border-1px border-color-gray-extra-dark"><span class="text-small text-gray-light roboto text-weight-400 padding-bottom-20px">Kategori</span></a>
				<ul class="uk-nav-sub">
					<li class="text-small text-uppercase text-gray-light text-weight-700 bottom-border border-1px border-color-gray-extra-dark padding-bottom-10px margin-top-10px margin-bottom-5px">
						<a href="produk.php?sex=men">Pria</a>
					</li>
					<?php
						$mencat = mysqli_query($conn, "select * from kategori where sex_cat='men' order by nm_kategori asc");
						while($rm = mysqli_fetch_array($mencat)){
							$nm_kat = $rm['nm_kategori'];
							$lownmk = strtolower($nm_kat);
					?>
						<li><a href="produk.php?sex=men&category=<?php echo $lownmk; ?>"><?php echo $nm_kat; ?></a></li>
					<?php
						}
					?>

					<li class="text-small text-uppercase text-gray-light text-weight-700 bottom-border border-1px border-color-gray-extra-dark padding-bottom-10px margin-top-20px margin-bottom-5px">
						<a href="produk.php?sex=women">Wanita</a>
					</li>
					<?php
						$womencat = mysqli_query($conn, "select * from kategori where sex_cat='women' order by nm_kategori asc");
						while($rm = mysqli_fetch_array($womencat)){
							$nm_kat = $rm['nm_kategori'];
							$lownmk = strtolower($nm_kat);
					?>
						<li><a href="produk.php?sex=women&category=<?php echo $lownmk; ?>"><?php echo $nm_kat; ?></a></li>
					<?php
						}
					?>
				</ul>
			</li>
			<li class="uk-parent margin-bottom-10px">
				<a href="#" class="bottom-border border-1px border-color-gray-extra-dark"><span class="text-small text-gray-light roboto text-weight-400 padding-bottom-20px">Brand</span></a>
				<ul class="uk-nav-sub">
					<?php
						$brand = mysqli_query($conn, "select * from toko where status='official' limit 15");
						while($rb = mysqli_fetch_array($brand)){
							$nm_toko = $rb['nama_toko'];
							$lownmt = strtolower($nm_toko);
					?>
					<li><a href="produk.php?brand=<?php echo $lownmt; ?>"><?php echo $nm_toko ?></a></li>
					<?php
						}
					?>
					<li><a href="brands.php">Lihat semua</a></li>
				</ul>
			</li>
			<li class="uk-parent margin-bottom-10px">
				<a href="#" class="bottom-border border-1px border-color-gray-extra-dark"><span class="text-small text-gray-light roboto text-weight-400 padding-bottom-20px">Tas</span></a>
				<ul class="uk-nav-sub elements-nav">
					<li class="padding-bottom-10px">
						<a href="#" class="uk-icon-link float-left" data-uk-icon="close"></a>
						<img class="float-left width-30px margin-left-10px margin-right-10px" src="images/shop/style-03/01.jpg" alt="" />
						<a href="#" class="text-black text-weight-400 text-small roboto"><span class="text-white">Blue Shirt X2</span></a>
					</li>
					<li class="margin-top-20px uk-nav-divider"></li>
					<li class="padding-top-bottom-20px text-small">Subtotal: $499</li>
					<li class="uk-nav-divider"></li>
					<li><a href="page-cart.html"><span class="text-white text-small text-small text-underline">Lihat isi tas</span></a></li>
					<li><a href="page-checkout.html"><span class="text-white text-small text-small text-underline">Bayar sekarang</span></a></li>
				</ul>
			</li>
			<li class="uk-parent">
				<a href="#" class="bottom-border border-1px border-color-gray-extra-dark"><span class="text-small text-gray-light roboto text-weight-400 padding-bottom-20px">Wishlist</span></a>
				<ul class="uk-nav-sub elements-nav">
					<li class="padding-bottom-10px">
						<a href="#" class="uk-icon-link float-left" data-uk-icon="close"></a>
						<img class="float-left width-40px margin-left-10px margin-right-10px" src="images/shop/style-03/03.jpg" alt="" />
						<a href="#" class="text-white text-weight-400 text-small roboto"><span class="text-white">Blue Shirt</span></a>
						<p class="text-white text-weight-400 text-small roboto no-margin-bottom">$45</p>
					</li>
					<li><a href="page-cart.html"><span class="text-white text-small text-small text-underline">Tambahkan ke tas</span></a></li>
					<li><a href="page-wishlist.html"><span class="text-white text-small text-small text-underline">Lihat Wishlist</span></a></li>
				</ul>
			</li>
			<li class="uk-parent margin-top-bottom-10px">
				<a href="#" class="bottom-border border-1px border-color-gray-extra-dark"><span class="text-small text-gray-light roboto text-weight-400 padding-bottom-20px">Akun</span></a>
				<ul class="uk-nav-sub">
					<li><?php echo $nm_user; ?></li>
					<li class="uk-nav-divider"></li>
					<li><a href="my-store.php">Toko Saya</a></li>
					<li><a href="account.php">Akun Saya</a></li>
					<li><a href="checkout.php">Transaksi</a></li>
					<li><a href="about.php">Tentang Kami</a></li>
					<?php
						if(!empty($_SESSION['username'])){
					?>
						<li class="uk-nav-divider"></li>
						<li><a href="logout.php">Keluar</a></li>
					<?php
						}
					?>
				</ul>
			</li>
		</ul>
		<div class="nav-footer margin-top-50px">
			<ul class="list-unstyled no-margin-bottom margin-top-20px">
				<li class="display-inline-block margin-right-25px"><a href="#"><i class="fab fa-twitter twitter"></i></a></li>
				<li class="display-inline-block margin-right-25px"><a href="#"><i class="fab fa-instagram instagram"></i></a></li>
			</ul>
			<p class="no-margin-bottom margin-top-20px text-small text-gray-light text-weight-400">Copyright © 2019 SAYo</p>
			<p class="no-margin-bottom text-small text-gray-light text-weight-400 text-black">All rights reserved.</p>
		</div>
	</div>
</div>