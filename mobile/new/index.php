<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- favicon -->
	<link rel="shortcut icon" href="/images/favicon/img-logo.png" />
	<!-- Seo -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131132824-1?<?php echo $expDate; ?>">
	</script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'AW-828412875');
		gtag('config', 'UA-131132824-1');
	</script>
	<!-- UET Tag - Bing -->
	<script>
		! function (f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function () {
				n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '3219152948110412');
		fbq('track', 'PageView');
	</script>
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic?2022-08-31"
		type="text/css">
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		tailwind.config = {
			theme: {
				extend: {
					container: {
						padding: {
							DEFAULT: '1rem',
							sm: '2rem',
							lg: '4rem',
							xl: '5rem',
							'2xl': '12rem',
						},
					},
					fontFamily: {
						'raleway': ['Raleway'],
					},
					backgroundImage: {
						'tile':"url('/images/loan/tile_background.png')",
						'hero': "url('/images/loan/circles.png')",
					},
				}
			}
		}
	</script>
	<?php include './head.php'; ?>
</head>
<body>
	<?php include './header.php'; ?>
	<?php include './content.php'; ?>
	<?php include './footer.php'; ?>
</body>

</html>