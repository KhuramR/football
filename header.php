<?php
include_once "include/connection.php";
$file =  basename($_SERVER["SCRIPT_FILENAME"]);
$ip = $_SERVER['REMOTE_ADDR'];
@$_SESSION['currency'] == "dollar";
if (isset($_SESSION['user_id'])) {
	$sessionid = $_SESSION['user_id'];
	$selectSession = mysqli_query($con, "SELECT * FROM users where id='$sessionid'");
	$fetchSession = mysqli_fetch_array($selectSession);
}
if (!isset($_SESSION['currency']) && !isset($_SESSION["currency_symbol"])) {
	$_SESSION['currency'] = "euro";
	$_SESSION["currency_symbol"] = "€";
}

if (isset($_GET['currency'])) {
	$_SESSION['currency'] = $_GET['currency'];
	if ($_GET['currency'] == "dollar") {
		$_SESSION["currency_symbol"] = "$";
	} elseif ($_GET['currency'] == "euro") {
		$_SESSION["currency_symbol"] = "€";
	}
}
if (!isset($_SESSION["lang"])) {
	$_SESSION['lang'] = "eng";
	// $_SESSION['lang'] = "fr";
}
if (isset($_GET['lang'])) {
	$_SESSION['lang'] = $_GET['lang'];
}
include_once "include/function.php";
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?= $websitefetch["site_name"] ?> || <?= $pagename ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?= base64_decode($fetchmp["description"]) ?>">
	<meta name="keywords" content="<?= base64_decode($fetchmp["keywords"]) ?>">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= $url ?>uploads/settings/<?= $websitefetch["site_favicon"] ?>">
	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= $url ?>frontassets/images/fav.png">
	<!-- bootstrap v3.3.6 css -->
	<link rel="stylesheet" href="<?= $url ?>frontassets/css/bootstrap.min.css">
	<!-- font-awesome css -->
	<link rel="stylesheet" href="<?= $url ?>frontassets/css/font-awesome.min.css">
	<!-- animate css -->
	<link rel="stylesheet" href="<?= $url ?>frontassets/css/animate.css">
	<!-- Main Menu css -->
	<link rel="stylesheet" href="<?= $url ?>frontassets/css/rsmenu-main.css">
	<!-- rsmenu transitions css -->
	<link rel="stylesheet" href="<?= $url ?>frontassets/css/rsmenu-transitions.css">
	<!-- hover-min css -->
	<link rel="stylesheet" href="<?= $url ?>frontassets/css/hover-min.css">
	<!-- magnific-popup css -->
	<link rel="stylesheet" href="<?= $url ?>frontassets/css/magnific-popup.css">
	<!-- owl.carousel css -->
	<link rel="stylesheet" href="<?= $url ?>frontassets/css/owl.carousel.css">
	<!-- Slick css -->
	<link rel="stylesheet" href="<?= $url ?>frontassets/css/slick.css">
	<!-- Slick Theme css -->
	<link rel="stylesheet" href="<?= $url ?>frontassets/css/slick-theme.css">
	<!-- style css -->
	<link rel="stylesheet" href="<?= $url ?>frontassets/css/style.css">
	<!-- responsive css -->
	<link rel="stylesheet" href="<?= $url ?>frontassets/css/responsive.css">
	<link rel="stylesheet" href="<?= $url ?>snackbar/dist/snackbar.min.css" />
	<!-- modernizr js -->
	<script src="<?= $url ?>frontassets/js/modernizr-2.8.3.min.js"></script>
	<style>
	    @media screen and (max-width: 768px) {
  .res_logo {
    width: 22% !important;
  }
  form{
          padding-left: 15px;
    padding-right: 15px;
}
  .contact-comment-section h3 {
    padding-left: 15px;
}
}
	</style>
</head>

<body class="home-two">
	<!--Preloader start here-->
	<!--<div id="preloader">-->
	<!--	<span></span>-->
	<!--	<span></span>-->
	<!--	<span></span>-->
	<!--	<span></span>-->
	<!--	<span></span>-->
	<!--</div>-->
	<!--Preloader area end here-->

	<!--Header area start here-->
	<header class="header-inner-page">
		<div class="header-top-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
						<div class="header-top-left">
							<ul>
								<li><a href="mailto:<?= $websitefetch["site_email"] ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?= $websitefetch["site_email"] ?></a></li>
							
							</ul>
						</div>
					</div>
					<div class="<?= (isset($_SESSION["user_id"])) ? 'col-lg-4 col-md-4' : 'col-lg-6 col-md-6' ?>  col-sm-4 col-xs-12">
						<div class="social-media-area">
							<nav>
								<ul>

									<?php
									if ($websitefetch["fb_link"] != "") {
									?>
										<li class="facebook"><a href="<?= $websitefetch["fb_link"] ?>" target="_blank" class="active"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<?php } ?>
									<?php
									if ($websitefetch["twitter_link"] != "") {
									?>
										<li class="twitter"><a href="<?= $websitefetch["twitter_link"] ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<?php } ?>
									<?php
									if ($websitefetch["youtube_link"] != "") {
									?>
										<li class="youtube"><a href="<?= $websitefetch["youtube_link"] ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
									<?php } ?>
									<?php
									if ($websitefetch["insta_link"] != "") {
									?>
										<li class="instagram"><a href="<?= $websitefetch["insta_link"] ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									<?php } ?>
									<li><a href="<?=$url?>cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <sup>
										<?php 
										
										// echo $data['total'];
										$selectNumCart = mysqli_query($con, "SELECT count(*) as total from cart where ip='$ip' and status=0 order by id desc ");
										$data=mysqli_fetch_assoc($selectNumCart);
										echo $data['total'];
										?>
									</sup></a></li>

									<?php
									if (!isset($_SESSION["user_id"])) {
									?>
										<li class="log"><a href="<?= $url ?>login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
										<li class="sign"><a href="<?= $url ?>register"><span>/</span> Sign Up</a></li>
									<?php
									}
									?>
								</ul>
							</nav>

						</div>

					</div>
					<?php
					if (isset($_SESSION["user_id"])) {
					?>
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
							<div class="header-top-left my-left">
								<ul>
									<li><img src="<?=$url?>uploads/users/<?=$fetchSession['profile']?>" alt=""><a href="#"><?=$fetchSession['firstname']?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
										<ul>
											<?php 
											if ($_SESSION["role"] == 1) {
											?>
											<li><a href="<?= $url ?>admin/index"><?= content(5) ?></a></li>
											<li><a href="<?= $url ?>admin/logout"><?= content(15) ?></a></li>
											
                                    <?php } else { ?>
                                        <!-- <li><a href="<?= $url ?>account"><?= content(6) ?></a></li> -->
                                        <li><a href="<?= $url ?>admin/logout"><?= content(15) ?></a></li>
                                    <?php     }
                                  ?>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		<div class="header-middle-area menu-sticky">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-12 col-xs-12 logo">
						<a href="<?= $url ?>"><img src="<?= $url ?>uploads/settings/<?= $websitefetch["site_logo"] ?>" class="res_logo" alt="logo" style="width: 50%;"></a>
					</div>
					<div class="col-md-10 col-sm-12 col-xs-12 mobile-menu">
						<div class="main-menu">
							<a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
							<nav class="rs-menu">
								<ul class="nav-menu">
									<!-- Home -->
									<li>
										<a href="<?= $url ?>">About Us</a>

									</li>
									<!-- End Home -->

									<!-- Drop Down -->
									<li>
										<a href="<?= $url ?>team">Team Sheet</a>

									</li>
									<!-- Drop Down -->
									<li>
										<a href="<?= $url ?>transfer-news">Transfer News</a>

									</li>
									<!--End Icons -->

									<li><a href="<?=$url?>shop">Shop</a></li>

								</ul>
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--Header area end here-->