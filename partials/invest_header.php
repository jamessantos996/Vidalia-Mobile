<?php $expDate = date("Y-m-d"); ?>
<style>
		@media only screen and (min-width: 1050px) {
			.right { 
			position: relative; left:50%; 
					} 
		}

		#slider.mobile-header {
		display: none;
		}
		#slider.mobile-header p {
			margin: 0;
		}
		#slider.mobile-header .header-form-container {
			padding: 35px 10px;
			background-color: #113b5e;
		}
		.mobile-image {
		background-image: url(../images/header/invest-mobile.svg);

		height: 528px !important;
		background-size: 100%;
		background-repeat: no-repeat;
		}

		@media only screen and (max-width: 479px) {
			#slider {
				display: none;
			}

			#slider.mobile-header {
				display: block;
			}

			#slider.mobile-header .floating-text-mobile-tablet {
				color: #fff;
				background-color: rgba(0, 0, 0, 0.5);
				font-size: 16px;
				width: 100%;
				padding: 15px;
				display: inline-block;
				position: relative;
				top: 0;
			}
		}

			@media (min-width: 456px) and (max-width: 479px) {
				.mobile-image {
				height:790px !important;
				}
			}
			@media (min-width: 419px) and (max-width: 457px) {
				.mobile-image {
				height:792px  !important;
				}
			}
			@media (min-width: 365px) and (max-width: 418px) {
				.mobile-image {
				height:650px  !important;
				}
			}
			@media (min-width: 350px) and (max-width: 364px) {
				.mobile-image {
				height:577px  !important;
				}
			}
	</style>
</head>
<body class="stretched no-transition">
	<!-- Document Wrapper -->
	<div id="wrapper" class="clearfix">
		<!-- Header -->
		<header id="header" class="transparent-header full-header" data-sticky-class="not-dark">
			<div id="header-wrap">
				<div class="container clearfix">
					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
					<!-- Logo-->
					<div id="logo">
						<a href="../" class="standard-logo" data-dark-logo="../images/logo.svg?<?php echo $expDate; ?>"><img src="../images/logo.svg" alt="Vidalia Lending Logo"></a>
						<a href="../" class="retina-logo" data-dark-logo="../images/logo@2x.svg?<?php echo $expDate; ?>"><img src="../images/logo@2x.svg" alt="Vidalia Lending Logo"></a>
					</div><!-- #logo end -->
					<!-- Primary Navigation-->
					<nav id="primary-menu">
						<ul>
							<li><a href="#"><div>BORROW</div></a>
								<ul>
									<li><a href="../loans/personal-loan/apply"><div>Personal Loan</div></a></li>
									<li><a href="../loans/salary-loan/apply"><div>Salary Loan</div></a></li>
									<li><a href="../loans/small-business-loans/apply"><div>Small Business Loan</div></a></li>
									<li><a href="../loans/business-loans/apply"><div>Business Loan</div></a></li>
								</ul>
							</li>
							<li class="current"><a href="../invest"><div>INVEST</div></a></li>
							<li><a href="../loans"><div>LOANS</div></a></li>
							<li><a href="../help"><div>HELP</div></a></li>
						</ul>
					</nav><!-- #primary-menu end -->
				</div>
			</div>
		</header><!-- #header end -->
		<!-- Page Title -->
		<section id="slider" class="slider-parallax swiper_wrapper clearfix" >
			<div class="slider-parallax-inner" style="position: relative; ">
				<div class="swiper-container swiper-parent">
					<div class="swiper-wrapper" >
						<div class="swiper-slide" style="background-image: url('../images/header/invest.jpg'); background-position: center top;">
							<div class="container clearfix">
								<div class="slider-caption right"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- #page-title end -->
		<section id="slider" class="mobile-header sm">
				<div class="container-wrapper mobile-image" ></div>
		</section>