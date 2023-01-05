<?php 

$current_url = __DIR__;
$explode_current_url = explode('/var/www/', $current_url);
$explode_baseDom = explode('/', $explode_current_url[1]);
$baseDom = $explode_baseDom[0];
$base_url = 'http://'.$baseDom.'/';

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="images/favicon/img-logo.png"/>
	<link rel="shortcut icon" type="image/png" href="images/favicon/img-logo.png"/>
	<!-- end favicon -->

<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<link rel="stylesheet" href="css/custom.css" type="text/css" />
	<link rel="stylesheet" href="css/custom2.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<!-- Javascripts
	=========================================== -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-42583946-1', 'vidalia.com.ph');
		ga('send', 'pageview');
	</script>

	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- Document Title
	============================================= -->
	<title>About Us | Vidalia Lending </title>
	<meta name="description" content=" By helping borrowers and investors together, we've helped people take control of their debt, grow their small businesses, and invest for the future."/>
	<meta name="keywords" content=""/>
</head>

<body class="stretched no-transition">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="transparent-header full-header" data-sticky-class="not-dark">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.php" class="standard-logo" data-dark-logo="images/logo.png"><img src="images/logo.png" alt="Canvas Logo"></a>
						<a href="index.php" class="retina-logo" data-dark-logo="images/logo@2x.png"><img src="images/logo@2x.png" alt="Canvas Logo"></a>
					</div><!-- #logo end -->
					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu" class="dark">
						<ul>
							<li><a href="#"><div>BORROW</div></a>
								<ul>
									<li><a href="loans/personal-loan/apply"><div>Personal Loan</div></a></li>
									<li><a href="loans/salary-loan/apply"><div>Salary Loan</div></a></li>
									<li><a href="loans/small-business-loans/apply"><div>Small Business Loan</div></a></li>
									<li><a href="loans/business-loans/apply"><div>Business Loan</div></a></li>
								</ul>
							</li>
							<li><a href="invest"><div>INVEST</div></a></li>
							<li><a href="loans"><div>LOANS</div></a></li>
							<li class="current"><a href="help"><div>HELP</div></a></li>
							<!--<li><a href="help-center"><div>HELP CENTER </div></a></li>-->
						</ul>

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->

		<!-- Page Title

		============================================= -->
		<section id="slider" class="slider-parallax swiper_wrapper clearfix" >

			<div class="slider-parallax-inner">
				
				<div class="swiper-container swiper-parent">
					<div class="swiper-wrapper">
						<div class="swiper-slide" style="background-image: url('images/header/about.jpg'); background-position: center top;">
							<div class="container clearfix">
								<div class="slider-caption">
									<h2 data-caption-animate="fadeInUp" class="about-header-text" style="color: #CA8D2C;">About Us</h2>
									<p data-caption-animate="fadeInUp" data-caption-delay="200" class="about-header-content" style="color: #CA8D2C;">Over the last 9 years, we've helped Filipinos finance their goals, grow small businesses, and invest for the future.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>

		</section>

	<!-- #page-title end -->
		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">

					<div class="heading-block center nobottomborder bottommargin-lg">
						<h1>Our commitment to our Borrowers and Investors</h1>

					</div>

					<div class="col_one_third nobottommargin">

						<div class="heading-block fancy-title nobottomborder title-bottom-border">
							<h4>Reinvent credit and investing.</h4>
						</div>

						<p>We’re a finance tech driven company built on the belief that innovative, creative solutions deliver more value and better experience.</p>

					</div>

					<div class="col_one_third nobottommargin">

						<div class="heading-block fancy-title nobottomborder title-bottom-border">
							<h4>Deliver customer focused experiences</span>.</h4>
						</div>

						<p>Getting a credit should be seamless. We’re committed to making borrowing and investing simple and easy for everyone.</p>

					</div>

					<div class="col_one_third nobottommargin col_last">

						<div class="heading-block fancy-title nobottomborder title-bottom-border">
							<h4>Using smarter credit model</h4>
						</div>

						<p>Everyone deserves a better financial future. We’ve built a system that can process applicants to produce creditworthy people</p>

					</div>

					<div class="clear"></div>

				</div>
				<div class="section nobottommargin">
					<div class="container clearfix">
						<div class="col_full col_last">
							<div class="heading-block center">
								<h2>About Vidalia Lending</h2>
							</div>
							<p>Vidalia Lending Corp. is one of the Philippines financing companies with over Php 400 million in funded loans since inception. We uses traditional and tested credit methods in combination with new technologies. Our credit evaluation system improves constantly, learning and optimizing in response to monthly loan repayment and delinquency data.</p>
							<p>Vidalia Lending allows people to invest in the loan we offer to our clients. Borrowers have the options to get a loan between P10,000 and P100,000. While investors can invest as little as P5,000 and terms of 3 months up to 12 months.Our company handles the marketing, servicing and collection of the loan. The only risk for investors is when our company closes. Loan investors are not affected if our borrowers defaulted or delays in repayment.</p>
							<p>Vidalia Lending Corp. is authorised and regulated by Securities and Exchange Commission (SEC) with License No. CS200813771 issued October 2008.</p>
							<p>Vidalia Lending is a corporation backed by experienced and talented private investors with vast experience in the local Financial Industry </p>

						</div>
					</div>
				</div>
				<a href="<?= $base_url; ?>" class="topmargin-sm button button-full center tright footer-stick">
					<div class="container clearfix">
						Join the thousands of borrowers and investors who are happy with our customer service  <strong>Get Started Now!</strong> <i class="icon-caret-right header-footer-icon"></i>
					</div>
				</a>
			</div>
		</section>
<?php include('partials/footer.php'); ?>
