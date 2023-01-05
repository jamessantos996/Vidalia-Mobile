<?php $expDate = date("Y-m-d"); ?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<!-- Document Title -->
	<title>Vidalia Lending App | Vidalia Lending </title>
	<meta name="description" content="Since 2008, we've helped people finance their debts, grow their small businesses, and invest for the future."/>
	<meta name="keywords" content=""/>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- favicon -->
	<link rel="shortcut icon" href="../images/favicon/img-logo.png?<?php echo $expDate; ?>"/>
	<!-- end favicon -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="../plugins/bootstrap-5.2.2/css/bootstrap.css">
	<!-- Swiper CSS -->
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
	/>
	<!-- Custom CSS -->
	<link rel="stylesheet" href="../css/mobile/style.css">
	<!-- Responsive -->
	<link rel="stylesheet" href="../css/mobile/responsive.css">
	<!-- FontAwesome CSS -->
	<link rel="stylesheet" href="../plugins/fontawesome-6.2.0/css/all.css">
	<!-- Javascripts -->

	<!-- FontAwesome JS -->
	<script src="../plugins/fontawesome-6.2.0/js/all.js"></script>
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
	<!-- <script type="text/javascript" src="../js/jquery.js?<?php echo $expDate; ?>"></script> -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112191277-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-112191277-1');
	</script>
	
	<!-- UET Tag - Bing -->
	<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"26040466"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>
</head>
<body>
    <header class="fixed-top bg-white">
        <nav class="navbar navbar-expand-lg container">
            <div class="container-fluid d-flex justify-content-between">
                <a class="navbar-brand" href="https://vidalia.com.ph/">
                    <img src="../images/mobile/logo.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mb-2 mb-lg-0 d-flex gap-4">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="https://vidalia.com.ph/">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="https://app.vidalia.com.ph/login">Borrow</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="https://vidalia.com.ph/loans/">Loans</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="https://vidalia.com.ph/help/">Help</a>
						</li>
					</ul>
                </div>
            </div>
        </nav>
    </header>
	<main>
		<section class="banner">
			<div class="swiper banner-swiper">
				<div class="swiper-wrapper d-flex align-items-center">
					<div class="swiper-slide banner-swiper-slide banner-slide-1 d-flex align-items-center justify-content-center d-lg-block">
						<div class="banner-header d-flex flex-column gap-4 ms-auto">
							<h1 class="text-center">Get A Hassle-Free Loan Today</h1>
							<p class="text-center text-white"><span class="fw-bold">Humiram ng pera sa madaling paraan!</span> Mag-register, piliin ang loan na kailangan, dumaan sa screening at i-claim ang loan.</p>
							<a href="https://play.google.com/store/apps/details?id=com.vidalia.lending" class="d-none d-md-flex align-items-center justify-content-center">
								<img src="../images/mobile/google-play.png" alt="">
							</a>
						</div>
					</div>
					<div class="swiper-slide banner-swiper-slide banner-slide-2 d-flex align-items-center justify-content-center d-lg-block">
						<div class="banner-header d-flex flex-column gap-4 ms-auto">
							<h1 class="text-center">A Trusted Financial Solution</h1>
							<p class="text-center text-white">Subok at Pinagkakatiwalaang lending app ng maraming Pilipino. Siguradong problemang pinansyal ay may solusyon.</p>
						</div>
					</div>
					<div class="swiper-slide banner-swiper-slide banner-slide-3 d-flex align-items-center justify-content-center d-lg-block">
						<div class="banner-header d-flex flex-column gap-4 ms-xl-auto mb-xl-auto">
							<h1 class="text-center"> SEC and NPC Compliant</h1>
							<p class="text-white text-center">Ang Vidalia Lending Corp. ay kontrolado at sumusunod sa panuntunan ng SEC (Securities and Exchange Commission) at NPC (National Privacy Commission) kaya siguradong loan mo ay ligtas at impormasyon mo ay protektado.</p>
						</div>
					</div>
				</div>

				<div class="swiper-button-prev banner-swiper-button-prev"></div>
				<div class="swiper-button-next banner-swiper-button-next"></div>
			</div>
		</section>
		<section class="product">
			<div class="container">
				<h2 class="section-title">Loan Types to Fit Your Needs</h2>
				<p class="section-subtitle">Vidalia Lending is your Financial Partner; we offer a variety of loans to suit your needs. <span>Select your loan today!<span></p>
				<div class="row justify-content-center p-3">
					<a href="https://play.google.com/store/apps/details?id=com.vidalia.lending" target="_blank"	class="col col-4 d-flex flex-column align-items-center">
						<img src="../images/mobile/personal.png" alt="personal loan">
						<h3 class="text-center">Personal Loan</h3>
						<p class="text-center">A loan to improve your home, pay off credit cards, consolidate debt, or for other personal reasons.</p>
					</a>
					<a href="https://play.google.com/store/apps/details?id=com.vidalia.lending" class="col col-4 d-flex flex-column align-items-center">
						<img src="../images/mobile/salary.png" alt="personal loan">
						<h3 class="text-center">Salary Loan</h3>
						<p class="text-center">A loan to meet your urgent expenses. It has flexible installments, and no guarantor is needed.</p>
					</a>
					<a href="https://play.google.com/store/apps/details?id=com.vidalia.lending" class="col col-4 d-flex flex-column align-items-center">
						<img src="../images/mobile/business.png" alt="personal loan">
						<h3 class="text-center">Business Loan</h3>
						<p class="text-center">A loan  to get your business off the ground. It has unsecured and collateral loans that will help you succeed.</p>
					</a>
					<a href="https://play.google.com/store/apps/details?id=com.vidalia.lending" class="col col-4 d-flex flex-column align-items-center">
						<img src="../images/mobile/small-business.png" alt="personal loan">
						<h3 class="text-center">Small Business Loan</h3>
						<p class="text-center">A loan to grow your small business. It has fixed-rate loans and collateral loans that offer more protection from loss.</p>
					</a>
					<a href="https://play.google.com/store/apps/details?id=com.vidalia.lending" class="col col-4 d-flex flex-column align-items-center">
						<img src="../images/mobile/e-commerce.png" alt="personal loan">
						<h3 class="text-center">E-Commerce Loan</h3>
						<p class="text-center">A loan to get you started in online selling. It offers online sellers fund to grow, market and increase sales.</p>
					</a>
					<a href="https://play.google.com/store/apps/details?id=com.vidalia.lending" class="col col-4 d-flex flex-column align-items-center">
						<img src="../images/mobile/lite.png" alt="personal loan">
						<h3 class="text-center">Lite Loan</h3>
						<p class="text-center">A loan to keep your finances afloat, to pay your bills, and make purchases until your payday</p>
					</a>
				</div>
			</div>
		</section>
		<section class="step">
			<div class="container">
				<h2 class="section-title text-center text-white">How to use Vidalia Lending App</h2>
				<div class="position-relative">
					<div class="swiper step-swiper">
						<div class="swiper-wrapper">
							<div class="swiper-slide step-swiper-slide d-flex align-items-center flex-column flex-md-row">
								<img src="../images/mobile/step-slide-1-img.png" alt="step 1 2 3">
								<ul class="d-flex flex-column">
									<li class="d-flex gap-3 gap-md-5 align-items-center">
										<div class="step-number-wrapper d-flex align-items-center justify-content-center"><h5>1</h5></div>
										<p><span>Download the app</span> or Log in to our website.</p>
									</li>
									<li class="d-flex gap-3 gap-md-5 align-items-center">
										<div class="step-number-wrapper d-flex align-items-center justify-content-center"><h5>2</h5></div>
										<p><span>Register</span> and make sure the contact information is active.</p>
									</li>
									<li class="d-flex gap-3 gap-md-5 align-items-center">
										<div class="step-number-wrapper d-flex align-items-center justify-content-center"><h5>3</h5></div>
										<p><span>OTPs</span> are sent to your registered email.</p>
									</li>
								</ul>
							</div>
							<div class="swiper-slide step-swiper-slide d-flex align-items-center flex-column flex-md-row">
								<img src="../images/mobile/step-slide-2-img.png" alt="step 4 5 6">
								<ul class="d-flex flex-column">
									<li class="d-flex gap-5 align-items-center">
										<div class="step-number-wrapper d-flex align-items-center justify-content-center"><h5>4</h5></div>
										<p><span>Profile Completion.</span> Fill in all required fields to verify to verify your profile.</p>
									</li>
									<li class="d-flex gap-5 align-items-center">
										<div class="step-number-wrapper d-flex align-items-center justify-content-center"><h5>5</h5></div>
										<p><span>Choose Loan.</span> After completing your profile, choose the loan product that fits you.</p>
									</li>
									<li class="d-flex gap-5 align-items-center">
										<div class="step-number-wrapper d-flex align-items-center justify-content-center"><h5>6</h5></div>
										<p><span>Pre-Approve.</span> Your dashboard will let you know about the status of your loan application.</p>
									</li>
								</ul>
							</div>
							<div class="swiper-slide step-swiper-slide d-flex align-items-center flex-column flex-md-row">
								<img src="../images/mobile/step-slide-3-img.png" alt="step 7 8 9">
								<ul class="d-flex flex-column">
									<li class="d-flex gap-5 align-items-center">
										<div class="step-number-wrapper d-flex align-items-center justify-content-center"><h5>7</h5></div>
										<p><span>Verification.</span> To identify your credit worthiness, all information and documents provided must to be true and correct in order to get a higher chance of loan approval. </p>
									</li>
									<li class="d-flex gap-5 align-items-center">
										<div class="step-number-wrapper d-flex align-items-center justify-content-center"><h5>8</h5></div>
										<p><span>Final Recommendation.</span> Once the verification complete, the borrower must wait for the finals approval which will appear on the loan dashboard and email..</p>
									</li>
									<li class="d-flex gap-5 align-items-center">
										<div class="step-number-wrapper d-flex align-items-center justify-content-center"><h5>9</h5></div>
										<p><span>Loan approved.</span> You may choose to claim or cancel the loan.</p>
									</li>
								</ul>
							</div>
							<div class="swiper-slide step-swiper-slide d-flex align-items-center flex-column flex-md-row">
								<img src="../images/mobile/step-slide-4-img.png" alt="step 10">
								<ul class="d-flex flex-column">
									<li class="d-flex gap-5 align-items-center">
										<div class="step-number-wrapper d-flex align-items-center justify-content-center"><h5>10</h5></div>
										<p><span>Claiming of Loan.</span> When your loan is available for release, you'll be invited to drop by our office to claim your loan. </p>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="swiper-button-prev step-swiper-button-prev d-none d-xl-block"></div>
					<div class="swiper-button-next step-swiper-button-next d-none d-xl-block"></div>
					<div class="swiper-pagination step-swiper-pagination"></div>
				</div>
			</div>
		</section>
		<section class="cta">
			<div class="container">
				<div class="row align-items-center flex-column flex-lg-row">
					<div class="section-header col col-12 col-lg-5 d-flex flex-column align-items-center">
						<h2 class="section-title text-center text-white">Download, Share the Vidalia app and Apply for a Loan now!</h2>
						<a href="https://play.google.com/store/apps/details?id=com.vidalia.lending" target="_blank" class="btn">Download & Install Now</a>
					</div>
					<div class="section-img col-12 col-lg-4 d-flex justify-content-center align-items-center">
						<img src="../images/mobile/cta-phone.png" alt="vidalia app">
					</div>
				</div>
			</div>
		</section>
		<section class="testimonial">
			<div class="container">
				<div class="row  flex-column align-items-center gap-3 flex-lg-row gap-lg-0 gx-xl-5 justify-content-center">
					<div class="section-header col col-12 col-lg-5 d-flex flex-column gap-3">
						<h2 class="section-title text-center text-white text-lg-start">Testimonial</h2>
						<h3 class="section-subtitle text-white text-center text-lg-start">Maraming tao na ang nagtitiwala at subok na <span class="d-block">sa masa.</span></h3>
						<a href="#" class="btn btn-outline-primary">Learn more</a>
					</div>
					<div class="section-testimonies col col-12 col-lg-6">
						<div class="swiper testimonial-swiper">
							<div class="swiper-wrapper testimonial-swiper-wrapper d-flex">
								<div class="swiper-slide testimonial-swiper-slide d-flex flex-column">
									<div class="header d-flex align-items-center gap-3">
										<img src="../images/mobile/testimony-1-img.jpg" alt="testimony img">
										<div class="d-flex flex-column gap-1">
											<h5 class="m-0">Janice E.</h5>
											<h6>Business Owner</h6>
										</div>
									</div>
									<p class="body">Salamat, Vidalia! Kahit na dumaan ako sa mabusising proseso ng loan application ko, naging okay naman siya at nakadagdag ng puhunan sa small business ko.</p>
									<ul class="footer d-flex justify-content-center gap-2">
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
									</ul>
								</div>
								<div class="swiper-slide testimonial-swiper-slide d-flex flex-column">
									<div class="header d-flex align-items-center gap-3">
										<img src="../images/mobile/testimony-2-img.jpg" alt="testimony img">
										<div class="d-flex flex-column gap-1">
											<h5 class="m-0">Sarah V.</h5>
											<h6>Satisfied Customer</h6>
										</div>
									</div>
									<p class="body">Na-achieve ko ang dream house ko ngayong taon dahil sa Vidalia! Kumpara sa ibang lending company, mas maayos proseso dito at bonus na yung mababa ang interes!.</p>
									<ul class="footer d-flex justify-content-center gap-2">
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
									</ul>
								</div>
								<div class="swiper-slide testimonial-swiper-slide d-flex flex-column">
									<div class="header d-flex align-items-center gap-3">
										<img src="../images/mobile/testimony-3-img.jpg" alt="testimony img">
										<div class="d-flex flex-column gap-1">
											<h5 class="m-0">Russel John S.</h5>
											<h6>Business Owner</h6>
										</div>
									</div>
									<p class="body">This is a very good lending company, especially for start-up business owners like me, they give reasonable interest rates and are quick to lend me money to grow my business.</p>
									<ul class="footer d-flex justify-content-center gap-2">
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<footer>
		<section class="bg-dark py-5 px-3 px-md-3">
			<div class="container">
				<div class="col-12">
					<div class="row row-cols-2 gy-3 footer-links d-flex justify-content-between row-cols-md-3 ">
						<ul class="col-6 d-flex flex-column col-md-3">
							<li><a href="https://vidalia.com.ph/" class="text-white">Home</a></li>
							<li><a href="https://vidalia.com.ph/invest/" class="text-white">Invest</a></li>
							<li><a href="https://vidalia.com.ph/loans/" class="text-white">Loans</a></li>
							<li><a href="https://vidalia.com.ph/careers/" class="text-white">Careers</a></li>
							<li><a href="https://vidalia.com.ph/loan-calculator/" class="text-white">Loan Calculator</a></li>
							<li><a href="https://vidalia.com.ph/sitemap/" class="text-white">Sitemap</a></li>
						</ul>
						<ul class="col-6 d-flex flex-column col-md-3">
							<li><a href="https://vidalia.com.ph/contact/" class="text-white">Contact Us</a></li>
							<li><a href="https://vidalia.com.ph/terms/" class="text-white">Terms</a></li>
							<li><a href="https://vidalia.com.ph/blog/" class="text-white">Blog</a></li>
							<li><a href="https://vidalia.com.ph/privacy/" class="text-white">Privacy</a></li>
							<li><a href="https://vidalia.com.ph/help/" class="text-white">Help</a></li>
						</ul>
						<div class="col-12 history col-md-6 d-flex flex-column gap-4">
							<p>Since 2008, we've helped thousands of Filipinos get easy access to short term financing in the forms of personal loan, salary loan and small business loan.</p>
							<p>Through our website, We offer different type of loans in our platform. We make it easy and convenient for you to avail of our financial products.</p>
						</div>
					</div>
				</div>
				<div class="col-12 footer-divider w-100 my-4"></div>
				<div class="col-12 d-flex flex-column gap-4 flex-md-row justify-content-md-between">
					<div class="footer-contacts d-flex flex-column gap-4">
						<div class="d-flex flex-column gap-2">
							<h5 class="text-uppercase">Call Us:</h5>
							<h3 class="text-white">8518 0112 PLDT</h3>
						</div>
						<div class="d-flex flex-column gap-2">
							<h5 class="text-uppercase">Cellphone:</h5>
							<h3 class="text-white">0939 927 2375 SMART</h3>
						</div>
						<div class="d-flex flex-column gap-2">
							<h5 class="text-uppercase">Cellphone:</h5>
							<h3 class="text-white">0917 328 4072 GLOBE</h3>
						</div>
					</div>
					<div class="footer-share d-flex flex-column justify-content-between gap-3 flex-sm-row gap-md-3">
						<div class="d-flex flex-column gap-2">
							<h5>Vidalia Mobile App</h5>
							<a href="https://play.google.com/store/apps/details?id=com.vidalia.lending">
								<img src="../images/mobile/google-play.png" alt="google-play" style="height: 35px;">
							</a>
						</div>
						<div class="d-flex flex-column gap-3">
							<a href="#" class="amazon">
								<img src="../images/mobile/amazon_web_services.jpg" alt="">
							</a>
							<a href="https://www.facebook.com/VidaliaLending" class="facebook d-flex gap-3">
								<div class="logo-wrapper d-flex justify-content-center align-items-center">
									<i class="fa-brands fa-facebook-f"></i>
								</div>
								<div class="d-flex flex-column gap-1">
									<h5>Like us</h5>
									<h6>on Facebook</h6>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="py-2 px-3">
			<div class="company container py-2">
				<div class="row gap-2 w-100 text-center row-cols-md-2 text-sm-start">
					<p class="col-12 col-md-4 p-0">Copyright © 2008-2022 Vidalia Lending Corp. All Rights Reserved.</p>
					<div class="col-12 col-md-7 p-0 address d-flex flex-column gap-4">
						<p>Vidalia Lending Corp. is regulated by Securities and Exchange Commission (SEC) with License No. CS200813771 and Certificate of Authority No. 279 issued October 2008. Incorporated with registered office at 6/F Aster Business Center Mandala Park, 312 Shaw Boulevard, Mandaluyong City Metro Manila 1550</p>
						<p>Please study the terms and conditions in the Disclosure Statement before proceeding with the loan transaction</p>
					</div>
				</div>
			</div>
		</section>
	</footer>
	<!-- Scripts -->
	<!-- Bootstrap -->
	<script src="../plugins/bootstrap-5.2.2/js/bootstrap.js"></script>
	<!-- Swiper JS -->
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
	<!-- Custom Script -->
	<script src="../js/mobile/script.js"></script>
</body>
</html>
	