<?php
require_once "php/functions.php";
$config = getConfig();
?><!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php if ($config->info->descripcion != ""): ?>
		<meta name="description" content="<?php echo $config->info->descripcion; ?>">
		<?php endif; ?>
		<title><?php echo $config->info->titulo ?></title>

		<?php if( $config->configuracion->openGraph == 1 ): ?>
		<!-- Metas OG - Open Graph para contenido compartido en Facebook -->
		<meta property="og:title" content="<?php echo $config->info->titulo ?>">
		<meta property="og:type" content="article"/>
		<meta property="og:url" content="<?php echo validateUrl($config->info->url); ?>">
		<meta property="og:site_name" content="<?php echo $config->info->titulo; ?>">
		<meta property="og:description" content="<?php echo $config->info->descripcion; ?>">
		<meta property="og:image" content="<?php echo $config->info->url; ?><?php echo $config->info->logo ?>"/>
		<?php endif; ?>

		<?php if ( $config->configuracion->pwa == 1 ): ?>
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="theme-color" content="#4f3676">
		<meta name="MobileOptimized" content="width">
		<meta name="HandheldFriendly" content="true">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<link rel="shortcut icon" type="image/png" href="./images/logo/logo_1024.png">
		<link rel="apple-touch-icon" href="./images/logo/logo_1024.png">
		<link rel="apple-touch-startup-image" href="./images/logo/logo_1024.png">
		<link rel="manifest" href="./manifest.json">
		<?php endif; ?>

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
		<link rel="icon" href="images/favicon.png" type="image/x-icon">

		<?php if ( configFonts() != "" ): ?>
		<!-- GOOGLE FONT -->
		<link href="https://fonts.googleapis.com/css?family=<?php echo configFonts(); ?>" rel="stylesheet">
		<?php endif; ?>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" media="screen" href="dist/css/app.css">
		<link rel="stylesheet" media="screen" href="dist/css/styles.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<?php if ( $config->info->fbPixel != "" ): ?>
		<!-- Facebook Pixel Code -->
		<script async>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '<?php echo $config->info->fbPixel; ?>');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" alt="facebook pixel" style="display:none"
		src="https://www.facebook.com/tr?id=<?php echo $config->info->fbPixel; ?>&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
		<?php endif ?>

		<?php if ( $config->info->googleAnalytics != "" ): ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $config->info->googleAnalytics; ?>"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', '<?php echo $config->info->googleAnalytics; ?>');
		</script>
		<!-- End Google Analytics -->
		<?php endif ?>

	</head>
	<body data-gotop="<?php echo $config->configuracion->gotop; ?>" data-popup="<?php echo $config->configuracion->popup; ?>" data-particles="<?php echo $config->configuracion->particlesFooter; ?>">

		<?php if ( $config->configuracion->loading == 1 ): ?>
		<div class="loading" id="particles-js">
			<div class="loading-logo"><img src="images/logo.png" alt="Loading" class="mb-1" width="151" height="70" class="img-fluid" /><br /><p>Cargando...</p></div>
		</div>
		<?php endif; ?>

		<?php if ( $config->contactos->whatsapp != "" ): ?>
		<div class="floating">
			<a href="https://wa.me/<?php echo cleanString($config->contactos->whatsapp); ?>" target="_blank" class="btn-floating">
				<img src="images/ico-float-whatsapp.png" class="img-fluid" width="72" height="72" />
			</a>
		</div>
		<?php endif; ?>

		<?php if ( $config->contactos->messenger != "" ): ?>
		<div class="floating-messenger">
			<a href="http://m.me/<?php echo $config->contactos->messenger; ?>" target="_blank" class="btn-floating">
				<img src="images/ico-float-messenger.png" class="img-fluid" width="72" height="72" />
			</a>
		</div>
		<?php endif; ?>

		<section id="header">
			
			<div class="container">
				<div class="row align-items-center py-1">

					<div class="col-7 col-lg-4">
						<a class="navbar-brand p-1" href="#" data-aos="fade-left" data-aos-delay="0">
							<img src="<?php echo $config->info->logo; ?>" alt="<?php echo $config->info->titulo; ?>" class="img-fluid" width="151" height="70" />
						</a>
					</div>
					<div class="col-5 col-lg-8">
						<nav class="navbar navbar-expand-lg float-right float-lg-none p-0" data-aos="fade-right" data-aos-delay="300">
							<button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#navbarMain2" aria-controls="navbarMain2" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon d-inline"><i class="fas fa-bars fa-lg"></i></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarMain">
								<ul class="navbar-nav w-100 justify-content-end align-items-end">
									<?php echo createMenu($config->menu, 'li'); ?>
									<?php foreach ($config->redes as $red): ?>
									<li class="nav-item"><a href="<?php echo $red->url ?>" target="_blank"><i class="<?php echo $red->icon ?> fa-lg"></i></a></li>
									<?php endforeach; ?>
								</ul>
							</div>
						</nav>
					</div>		
					<div class="col-12 d-lg-none bg-menu">
						<div class="collapse navbar-collapse" id="navbarMain2">
							<ul class="navbar-nav w-100 align-items-center menu-movil">
								<?php echo createMenu($config->menu, 'li'); ?>
								<?php foreach ($config->redes as $red): ?>
								<li class="nav-item"><a href="<?php echo $red->url ?>" target="_blank"><i class="<?php echo $red->icon ?> fa-lg"></i></a></li>
								<?php endforeach; ?>
								<li class="nav-item"><span class="d-none d-xl-inline">Pide más Información al </span><i class="fas fa-phone"></i> <a href="tel:<?php echo cleanString($config->contactos->telefono); ?>"><?php echo $config->contactos->telefono; ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		
		</section>

		<section id="slider">

			<?php include_once ('slider.php'); ?>
			
		</section>


		<section id="nosotros" class="py-5">

			<header class="header-section text-center mb-4 mb-lg-5">
				<h2 class="title-section" data-aos="fade-up" data-aos-delay="0">TRAYENDO SUEÑOS A LA VIDA</h2>
				<img class="img-fluid my-4" src="images/divider.png" data-aos="fade-left" data-aos-delay="300" data-aos-speed="600">
				<p data-aos="fade-left" data-aos-delay="600">DISEÑADORES DE EVENTOS Y BODAS</p>
			</header>

			<div class="container">
				<div class="row">
					
					<div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="300">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.
						</p>
					</div>

					<div class="col-12">
						<header class="header-section text-center mb-2 mb-md-5" data-aos="fade-down" data-aos-delay="0">
							<h3>CONTACTO</h3>
						</header>
					</div>
				</div>
				<div class="row align-items-center py-3 py-lg-4 mb-2 mb-lg-5 row-contact">
					<div class="col-sm-6 col-md-5 text-center text-md-right">
						<div class="text-contact font-weight-bold py-2 py-sm-0 align-items-center" data-aos="fade-left" data-aos-delay="0">
							<i class="fas fa-phone fa-lg"></i> <a href="tel:<?php echo cleanString($config->contactos->telefono); ?>"><?php echo $config->contactos->telefono; ?></a>
						</div>
					</div>
					<div class="col-sm-4 col-md-2 text-center d-none d-md-block align-items-center" data-aos="fade-down" data-aos-delay="300">
						<div class="or-title d-none d-md-block">
							<h4>o</h4>
						</div>
					</div>
					<div class="col-sm-6 col-md-5 text-center text-md-left">
						<div class="text-contact font-weight-bold py-2 py-sm-0 align-items-center" data-aos="fade-right" data-aos-delay="600">
							<i class="far fa-envelope fa-lg"></i> <a href="mailto:<?php echo cleanString($config->contactos->email); ?>"><?php echo $config->contactos->email; ?></a>
						</div>
					</div>

				</div>
			</div>

		</section>

		<section id="servicios" class="mb-md-5">

			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="box-servicio" data-aos="fade-left" data-aos-delay="0">
							<div class="box-servicio-img">
								<img src="images/thumb-1.png" alt="Dress & Makeup" class="img-fluid">
							</div>
							<div class="box-servicio-icon text-center">
								<div class="box-servicio-icon-inner">
									<i class="fas fa-female"></i>
								</div>
							</div>
							<div class="box-servicio-content py-2 mb-2">
								<h2>Dress & Makeup</h2>
								Lorem ipsum, dolor sit amet consectetur adipisicing elit.
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box-servicio" data-aos="fade-up" data-aos-delay="300">
							<div class="box-servicio-img">
								<img src="images/thumb-2.png" alt="Dress & Makeup" class="img-fluid">
							</div>
							<div class="box-servicio-icon text-center">
								<div class="box-servicio-icon-inner">
									<i class="fas fa-birthday-cake"></i>
								</div>
							</div>
							<div class="box-servicio-content py-2 mb-2">
								<h2>Catering & Staffing</h2>
								Lorem ipsum, dolor sit amet consectetur adipisicing elit.
							</div>
						</div>
		
					</div>
					<div class="col-md-4">
						<div class="box-servicio" data-aos="fade-right" data-aos-delay="600">
							<div class="box-servicio-img">
								<img src="images/thumb-3.png" alt="Dress & Makeup" class="img-fluid">
							</div>
							<div class="box-servicio-icon text-center">
								<div class="box-servicio-icon-inner">
									<i class="fas fa-camera-retro"></i>
								</div>
							</div>
							<div class="box-servicio-content py-2 mb-2">
								<h2>Wedding Photography</h2>
								Lorem ipsum, dolor sit amet consectetur adipisicing elit.
							</div>
						</div>
		
					</div>
				</div>
			</div>


		</section>

		<section id="beneficios">

			<div class="beneficios-inner">
				<div class="section-overlay"></div>
				<div class="beneficios-inner-content">
					<img src="images/map-icon.png" alt="Icono map" class="img-fluid" data-aos="fade-up" data-aos-delay="0">
					<h1 class="py-3" data-aos="fade-up" data-aos-delay="300">TU MOMENTO ESPECIAL</h1>
					<h4 data-aos="fade-up" data-aos-delay="600">ELIGE EL MEJOR AMBIENTE PARA TU BODA</h4>
					<a href="#" class="btn btn-primary btn-bordered mt-lg-5 mt-4" data-aos="fade-up" data-aos-delay="900">ESCOGE TU LUGAR</a>
				</div>
			</div>

		</section>

		<section id="porfolio" class="mb-5">

			<div class="container">
				<div class="row">
					<div class="col-12 p-0">						
						<header class="header-section text-center mb-0">
							<h2 class="title-section" data-aos="fade-up" data-aos-delay="0">WEDDING MEMORIES</h2>
							<img class="img-fluid my-4" src="images/divider.png" data-aos="fade-left" data-aos-delay="300" data-aos-speed="600">
							<p data-aos="fade-left" data-aos-delay="600">CONOCE NUESTRO PORTAFOLIO</p>
						</header>
					</div>
				</div>
				<div class="row">
					<div class="col-12 p-0">
						<div class="load-grid">
							<div class="d-flex justify-content-center align-items-center py-5">
								<div class="spinner-border" role="status">
									<span class="sr-only">Loading...</span>
								</div>
							</div>
						</div>
						<div class="grid">
							<?php 
							$files = glob('images/porfolio/*.{jpg,png,gif}', GLOB_BRACE);
							foreach($files as $key => $file): ?>
							<div class="grid-item">
								<img src="<?php echo $file; ?>" class="img-fluid" alt="Porfolio <?php echo $key; ?>" />
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

		</section>

		<section id="contacto" class="mb-5">

			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="box-testimonios align-items-end bg-white pt-5 pl-3 mb-3">
							<div class="row">
								<div class="col-md-5 pb-lg-0 pb-3">
									<img src="images/newsletter-img.png" alt="Testimonio" class="img-fluid" data-aos="fade-up" data-aos-delay="0">
								</div>
								<div class="col-md-7">
									<i class="far fa-heart fa-3x mb-2" data-aos="fade-right" data-aos-delay="300"></i>
									<h5 class="title-testimonio mb-4" data-aos="fade-right" data-aos-delay="600">
										¿QUE OPINAN LOS NOVIOS?
									</h5>

									<div class="slide-testimonios mb-5" data-aos="fade-right" data-aos-delay="900">
										<div class="slide-testimonios-item">
											<div class="slide-testimonios-content d-block mb-4">
												"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quae sequi inventore ab"
											</div>
											<div class="slide-testimonios-author">
												ROBERT & ANNA
											</div>
										</div>
										<div class="slide-testimonios-item">
											<div class="slide-testimonios-content d-block mb-4">
												"Lipsum dolor sit amet consectetur adipisicing elit. Ipsam quae sequi inventore ab"
											</div>
											<div class="slide-testimonios-author">
												JOHN DOE & LISA
											</div>
										</div>
									</div>

								</div>
							</div>

						</div>
					</div>
					<div class="col-md-4">
						<div class="box-newsletter bg-white px-5 pt-5 pb-4 mb-3" data-aos="fade-up" data-aos-delay="300">
							<header class="header-newsletter">
								<i class="far fa-envelope fa-3x mb-2"></i>
								<h3 class="mb-4">Newsletter</h3>
								Registrate para recibir nuestras promociones antes que nadie.
							</header>
							<?php echo createForm( $config->forms->newsletter ); ?>
						</div>
					</div>
				</div>
			</div>

		</section>

		<footer id="footer" class="pt-5 pb-3">
			
			<div class="container pt-md-4">
				<div class="row">
					<div class="col-12 col-lg-3 text-center text-lg-left">
						<div class="logo-footer">
							<img src="images/logo.png" alt="<?php echo $config->info->titulo; ?>" width="151" height="70" class="img-fluid">
						</div>
						<div class="redes-footer py-3">
							<ul class="list-inline">
								<?php foreach ($config->redes as $red): ?>
								<li class="list-inline-item"><a href="<?php echo $red->url ?>" target="_blank"><i class="<?php echo $red->icon ?> fa-lg"></i></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<div class="col-12 col-lg-2 text-center text-lg-left mb-3 mb-lg-0">
						<ul class="navbar-nav w-100">
							<?php echo createMenu($config->menu, 'li'); ?>
						</ul>
					</div>
					<div class="col-12 col-lg-3 text-center text-lg-left">
						<div class="box-direccion-footer">

							<?php echo $config->contactos->direccion; ?><br>
							<div class="phone-footer mt-3">
								Teléfono y Whatsapp<br>
								<i class="fas fa-phone"></i> <a href="tel:<?php echo cleanString($config->contactos->telefono); ?>"><?php echo $config->contactos->telefono; ?></a>
							</div>

						</div>
					</div>
					<div class="col-12 col-lg-4 mt-5 mt-lg-0">
						<div class="form-title mb-3">
							<h5>Regístrate en nuestro Newsletter</h5>
						</div>
						<?php echo createForm( $config->forms->newsletter ); ?>
					</div>
				</div>
			</div>
		</footer>

		<section id="copyright">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<div class="copy py-2">
							<?php echo replaceValues( $config->info->copyright ); ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php if ( $config->configuracion->popup == 1 ): ?>
			<?php include_once "popup.php"; ?>
		<?php endif ?>

		<script src="dist/js/main.js"></script>
		<script defer src="dist/js/app.js"></script>

		<?php if ( $config->configuracion->gotop == 1 ): ?>
		<a href="#" class="scrollup" aria-label="">&nbsp;</a>
		<?php endif; ?>

		<?php if ( $config->configuracion->loading == 1 ): ?>
		<script>
			particlesJS.load('particles-js', 'assets/particlesjs-config.json', function() {});
		</script>
		<?php endif; ?>

		<?php if ( $config->configuracion->pwa == 1 ): ?>
		<script src="script_sw.js"></script>
		<?php endif; ?>

		<script async src="dist/js/bundle.js"></script>

	</body>
</html>