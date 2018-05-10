<?php
/* Smarty version 3.1.32, created on 2018-05-10 17:41:55
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af46843828b70_62821708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '816020ac1ca7672f38edfad448fbbb052cc43dd3' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.home.tpl',
      1 => 1525788343,
      2 => 'file',
    ),
    'a86ad8f419e6a7b2cc193cbdcab055c8192992d1' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/layout.tpl',
      1 => 1525889643,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 86400,
),true)) {
function content_5af46843828b70_62821708 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr" xmlns:og="http://ogp.me/ns#">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">

		<title>Debian.ovh</title>
		<meta name="author" content="Guillaume GUERIN">

		<meta property="og:site_name" content="FromScratch">
		<meta property="og:title" content="Debian.ovh">
		<meta property="og:image" content="http://dev2.panzer.lan//favicon.ico">

		<link rel="icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/favicon.ico">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="/css/style.css" rel="stylesheet">

		<link href="/vendor/owl-carousel/assets/owl.carousel.min.css" rel="stylesheet">
		<link href="/vendor/owl-carousel/assets/owl.theme.default.min.css" rel="stylesheet">
		<style type="text/css" media="screen">
			.grid .grid-item[visible='false'],
			.no-result{
			  display:none;
			}

			.results .grid-item[visible='true']{
			  display:table-row;
			}
		</style>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

		<!--<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="/"><span class="logo">FromScratch</span></a>
				</div>
			</div>
		</nav>-->

		<div class="bg-lightgrey">
			<div class="space20"></div>

			<div class="container">

				<div class="space10"></div>

				<div id="posts" class="row">
					<div class="col-md-12">

						<div class="row filters">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<div class="input">
											<input type="text" class="form-control btn-lg search" placeholder="Rechercher" aria-describedby="basic-addon2">
										</div>
									</div>
								</div>

								<div class="visible-lg space10"></div>

								<div class="row">
									<div class="col-lg-2">
										<a class="btn btn-inverse btn-box filter active">Tous (11)</a>
									</div>
											<div class="col-lg-2">
										<a href="#posts" class="btn btn-inverse btn-box filter" data-filter=".deploiment">Mise en service (8)</a>
									</div>
											<div class="col-lg-2">
										<a href="#posts" class="btn btn-inverse btn-box filter" data-filter=".reseau">Réseau (2)</a>
									</div>
											<div class="col-lg-2">
										<a href="#posts" class="btn btn-inverse btn-box filter" data-filter=".programmation">Programmation (1)</a>
									</div>
										</div>
							</div>
						</div>

						<div class="space20"></div>

						<div class="row">
							<div class="grid">
								<div class="col-sm-4 grid-sizer"></div>
								<div class="col-sm-4 grid-item deploiment card">
									<div class="card-content">
										<a href="/article/cisco-ios-routeur-simple-configuration">
											<div class="item-img-wrap">
												<img src="//conceptdraw.com/a1778c3/p1/preview/640/pict--router-cisco-routers---vector-stencils-library.png--diagram-flowchart-example.png" class="card-img-top img-responsive" alt="Cisco IOS, configuration basic d'un routeur">
												<div class="item-img-overlay">
													<span></span>
												</div>
											</div>
										</a>
										<div class="card-block">
											<a href="/article/cisco-ios-routeur-simple-configuration">
												<h4 class="card-title">Cisco IOS, configuration basic d'un routeur</h4>
											</a>
											<div class="card-text">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											</div>
										</div>
											<div class="card-footer">
												<span>Le 17/05/2017 dans Mise en service</span>
												<span>par Guillaume GUERIN</span>
										</div>

									</div>
								</div>
								<div class="col-sm-4 grid-item reseau card">
									<div class="card-content">
										<a href="/article/outils-de-supervision">
											<div class="item-img-wrap">
												<img src="http://data.dev.panzer.lan/images/htop.png" class="card-img-top img-responsive" alt="Quelques outils de monitoring indispensable à l'administration de votre debian">
												<div class="item-img-overlay">
													<span></span>
												</div>
											</div>
										</a>
										<div class="card-block">
											<a href="/article/outils-de-supervision">
												<h4 class="card-title">Quelques outils de monitoring indispensable à l'administration de votre debian</h4>
											</a>
											<div class="card-text">
												La habilement simplement condamnait au frequentes gouverneur et claquaient. Ca sommes glisse le lasser douces canons aimons. Un ames noms tu arcs pris le. Faudrait par ils revendre posseder lumieres trahison ete. Je dentelles je je perruches culbutent. Metal quels hisse me oh. Activite par couleurs que galopent ici fut. 
											</div>
										</div>
											<div class="card-footer">
												<span>Le 09/04/2017 dans Réseau</span>
												<span>par Guillaume GUERIN</span>
										</div>

									</div>
								</div>
								<div class="col-sm-4 grid-item deploiment card">
									<div class="card-content">
										<a href="/article/remplacer-la-livebox-par-un-routeur-ou-une-debian">
											<div class="item-img-wrap">
												<img src="https://upload.wikimedia.org/wikipedia/commons/c/c8/Orange_logo.svg" class="card-img-top img-responsive" alt="Remplacer la livebox par un routeur/debian">
												<div class="item-img-overlay">
													<span></span>
												</div>
											</div>
										</a>
										<div class="card-block">
											<a href="/article/remplacer-la-livebox-par-un-routeur-ou-une-debian">
												<h4 class="card-title">Remplacer la livebox par un routeur/debian</h4>
											</a>
											<div class="card-text">
												Votre forme daims selon sur eut oeufs. Fit petites ils langage facteur. Peu vin pieces arbres guerre. Blason encore peu humain non
											</div>
										</div>
											<div class="card-footer">
												<span>Le 09/04/2017 dans Mise en service</span>
												<span>par Guillaume GUERIN</span>
										</div>

									</div>
								</div>
								<div class="col-sm-4 grid-item deploiment card">
									<div class="card-content">
										<a href="/article/mail-pop-imap-postfix-dovecot">
											<div class="item-img-wrap">
												<img src="http://data.dev.panzer.lan/images/postfix.png" class="card-img-top img-responsive" alt="Serveur de messagerie avec Postfix et Dovecot sous Debian 8">
												<div class="item-img-overlay">
													<span></span>
												</div>
											</div>
										</a>
										<div class="card-block">
											<a href="/article/mail-pop-imap-postfix-dovecot">
												<h4 class="card-title">Serveur de messagerie avec Postfix et Dovecot sous Debian 8</h4>
											</a>
											<div class="card-text">
												Car rebord formes brunes forges aimait peu sur bottes. Entendu pu animaux enfants sa caillou premier. Au je republique ecoutere
											</div>
										</div>
											<div class="card-footer">
												<span>Le 09/04/2017 dans Mise en service</span>
												<span>par Guillaume GUERIN</span>
										</div>

									</div>
								</div>
								<div class="col-sm-4 grid-item reseau card">
									<div class="card-content">
										<a href="/article/virtualisation-avec-esxi">
											<div class="item-img-wrap">
												<img src="https://anotheritguy.com/wp-content/uploads/2017/09/VMWare-Logo.png" class="card-img-top img-responsive" alt="La virtualisation avec VMWare ESXi 6">
												<div class="item-img-overlay">
													<span></span>
												</div>
											</div>
										</a>
										<div class="card-block">
											<a href="/article/virtualisation-avec-esxi">
												<h4 class="card-title">La virtualisation avec VMWare ESXi 6</h4>
											</a>
											<div class="card-text">
												Menions express invites la on ou. Revolution executeurs or tu au en clairieres. Cela mal chez les yeux bon. Uniformes sa chaclosah sanglante apprendre en. Ronds petit navre par fumee quand vie avant. Seulement poussiere attachent on illumines as tremblent si. Du voix je rues pour au. Rit visite poemes rythme repond pic forges sortes.
											</div>
										</div>
											<div class="card-footer">
												<span>Le 08/04/2017 dans Réseau</span>
												<span>par Théo BOUILLET</span>
										</div>

									</div>
								</div>
								<div class="col-sm-4 grid-item deploiment card">
									<div class="card-content">
										<a href="/article/serveur-source-debian">
											<div class="item-img-wrap">
												<img src="http://data.dev.panzer.lan/images/linux_sourceengine.png" class="card-img-top img-responsive" alt="Installation d'un serveur de jeu source sous Debian">
												<div class="item-img-overlay">
													<span></span>
												</div>
											</div>
										</a>
										<div class="card-block">
											<a href="/article/serveur-source-debian">
												<h4 class="card-title">Installation d'un serveur de jeu source sous Debian</h4>
											</a>
											<div class="card-text">
												Vous apprendrer ici à mettre en place un serveur de jeu sur votre machine dedié
											</div>
										</div>
											<div class="card-footer">
												<span>Le 20/03/2017 dans Mise en service</span>
												<span>par Guillaume GUERIN</span>
										</div>

									</div>
								</div>
								<div class="col-sm-4 grid-item deploiment card">
									<div class="card-content">
										<a href="/article/configuration-samba-debian">
											<div class="item-img-wrap">
												<img src="http://data.dev.panzer.lan/images/samba.jpg" class="card-img-top img-responsive" alt="Serveur de fichiers avec samba sous Debian 8">
												<div class="item-img-overlay">
													<span></span>
												</div>
											</div>
										</a>
										<div class="card-block">
											<a href="/article/configuration-samba-debian">
												<h4 class="card-title">Serveur de fichiers avec samba sous Debian 8</h4>
											</a>
											<div class="card-text">
												Un serveur de fichier sous linux est très simple à mettre en place !
											</div>
										</div>
											<div class="card-footer">
												<span>Le 20/03/2017 dans Mise en service</span>
												<span>par Guillaume GUERIN</span>
										</div>

									</div>
								</div>
								<div class="col-sm-4 grid-item deploiment card">
									<div class="card-content">
										<a href="/article/configuration-isc-dhcp-debian">
											<div class="item-img-wrap">
												<img src="http://data.dev.panzer.lan/images/dhcp.jpg" class="card-img-top img-responsive" alt="Installer et configurer isc-dhcp sous debian">
												<div class="item-img-overlay">
													<span></span>
												</div>
											</div>
										</a>
										<div class="card-block">
											<a href="/article/configuration-isc-dhcp-debian">
												<h4 class="card-title">Installer et configurer isc-dhcp sous debian</h4>
											</a>
											<div class="card-text">
												Installer et configurer isc-dhcp sous debian
											</div>
										</div>
											<div class="card-footer">
												<span>Le 20/08/2014 dans Mise en service</span>
												<span>par Guillaume GUERIN</span>
										</div>

									</div>
								</div>
								<div class="col-sm-4 grid-item deploiment card">
									<div class="card-content">
										<a href="/article/environement-web-linux">
											<div class="item-img-wrap">
												<img src="http://data.dev.panzer.lan/images/lamp.jpg" class="card-img-top img-responsive" alt="Environement de développement web sous Linux">
												<div class="item-img-overlay">
													<span></span>
												</div>
											</div>
										</a>
										<div class="card-block">
											<a href="/article/environement-web-linux">
												<h4 class="card-title">Environement de développement web sous Linux</h4>
											</a>
											<div class="card-text">
												Eu de sein me ange chez bras puis vies. He houle sacre te tu je mange. Vie dut sais doit rire fort gens soir ifs. Ici les famille cavites tassent ame sur. Rebord
											</div>
										</div>
											<div class="card-footer">
												<span>Le 20/08/2014 dans Mise en service</span>
												<span>par Guillaume GUERIN</span>
										</div>

									</div>
								</div>
								<div class="col-sm-4 grid-item deploiment card">
									<div class="card-content">
										<a href="/article/site-virtuel-avec-apache">
											<div class="item-img-wrap">
												<img src="http://data.dev.panzer.lan/images/apache.jpg" class="card-img-top img-responsive" alt="Configuration de site virtuel avec apache2">
												<div class="item-img-overlay">
													<span></span>
												</div>
											</div>
										</a>
										<div class="card-block">
											<a href="/article/site-virtuel-avec-apache">
												<h4 class="card-title">Configuration de site virtuel avec apache2</h4>
											</a>
											<div class="card-text">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											</div>
										</div>
											<div class="card-footer">
												<span>Le 20/08/2014 dans Mise en service</span>
												<span>par Guillaume GUERIN</span>
										</div>

									</div>
								</div>
								<div class="col-sm-4 grid-item programmation card">
									<div class="card-content">
										<a href="/article/vim-editeur-unix">
											<div class="item-img-wrap">
												<img src="http://data.dev.panzer.lan/images/vim.png" class="card-img-top img-responsive" alt="Apprendre à utiliser Vim">
												<div class="item-img-overlay">
													<span></span>
												</div>
											</div>
										</a>
										<div class="card-block">
											<a href="/article/vim-editeur-unix">
												<h4 class="card-title">Apprendre à utiliser Vim</h4>
											</a>
											<div class="card-text">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											</div>
										</div>
											<div class="card-footer">
												<span>Le 20/08/2014 dans Programmation</span>
												<span>par Ludwig DUBOS</span>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg-lightgrey">
		<div class="space60"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="center-heading margin-btm-50">
							<h2>Rédacteurs</h2>
							<span class="border-width"></span>
						</div>
						<div class="owl-carousel staffs">
								<div class="item card">
								<div class="card-content">
									<img class="card-img-top" src="http://data.fromscratch.ovh/images/lamaspanzer.jpg">
									<div class="card-block">
										<h4 class="card-title">Guillaume GUERIN</h4>
										<div class="card-text">
											Administration systèmes et développement
										</div>
									</div>
									<div class="card-footer">
										<span>9 Publications</span>
									</div>
								</div>
							</div>
								<div class="item card">
								<div class="card-content">
									<img class="card-img-top" src="http://data.fromscratch.ovh/images/jalibter.jpg">
									<div class="card-block">
										<h4 class="card-title">Ludwig DUBOS</h4>
										<div class="card-text">
											Programmeur
										</div>
									</div>
									<div class="card-footer">
										<span>1 Publication</span>
									</div>
								</div>
							</div>
								<div class="item card">
								<div class="card-content">
									<img class="card-img-top" src="http://data.fromscratch.ovh/images/user_avatar.png">
									<div class="card-block">
										<h4 class="card-title">Théo BOUILLET</h4>
										<div class="card-text">
											Développement
										</div>
									</div>
									<div class="card-footer">
										<span>2 Publications</span>
									</div>
								</div>
							</div>
								<div class="item card">
								<div class="card-content">
									<img class="card-img-top" src="http://data.fromscratch.ovh/images/user_avatar.png">
									<div class="card-block">
										<h4 class="card-title">Adriano SIMAO</h4>
										<div class="card-text">
											Administration/Supervision système
										</div>
									</div>
									<div class="card-footer">
										<span>0 Publication</span>
									</div>
								</div>
							</div>
							</div>
					</div>
				</div>
			</div>
		</div>
		<!--<a href="https://paypal.me/lamas" class="btn btn-block btn-full-width">FAIRE UN DONS</a>-->

		<footer class="footer" id="footer">
			<div class="footer-bottom">
				<a href="#" class="back-to-top hidden-xs-down show" id="back-to-top"><i class="fa fa-angle-up"></i></a>
				<a href="#" class="back-to-home hidden-xs-down show" id="back-to-top"><i class="fa fa-angle-up"></i></a>
				<div class="container">
					<span>FromScratch - &copy; 2017 Panzer Framework</span>
				</div>
			</div>
		</footer>

		<script src="/vendor/jquery/dist/jquery.min.js"></script>
		<!--<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!--<script src="/js/bootstrap-hover-dropdown.min.js"></script>-->

		<script src="/vendor/isotope/jquery.isotope.min.js"></script>
		<script src="/vendor/owl-carousel/owl.carousel.min.js"></script>
		<script type="text/javascript">
			var $container = $('.grid');
			var $filter = $('.filters');
			var filterButton = $('.filters .filter');
			$("img").one("load", function() {
				$('.grid').isotope({
				  itemSelector: '.grid-item',
				  percentPosition: true,
				  masonry: {
					// use outer width of grid-sizer for columnWidth
					columnWidth: '.grid-sizer'
				  }
				});
			}).each(function() {
				if(this.complete) $(this).load();
			});
			// Isotope Filter
			$filter.find('.filter').click(function () {
				var selector = $(this).attr('data-filter');
				$container.isotope({
				filter: selector,
				layoutMode: 'masonry',
				animationOptions: {
					duration: 750
				}});
				return false;
			});

			filterButton.on('click', function () {
				var $this = $(this);
				if (!$this.hasClass('active')) {
					filterButton.removeClass('active');
					$this.addClass('active');
				}
			});

			$(".search").keyup(function () {
				var searchTerm = $(".search").val();
				var listItem = $('.grid').children('.grid-item');
				var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

				$.extend($.expr[':'], {
					'containsi': function(elem, i, match, array){
						return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
					}
				});

				$(".grid-item").not(":containsi('" + searchSplit + "')").each(function(e){
					$(this).attr('visible','false');
				});

				$(".grid-item:containsi('" + searchSplit + "')").each(function(e){
					$(this).attr('visible','true');
				});

				var jobCount = $('.grid-item[visible="true"]').length;
				$('.counter').text(jobCount + ' publications');

				if(jobCount == '0') {
					$('.no-result').show();
				} else {
					$('.no-result').hide();
				}
			});

			$(".staffs").owlCarousel({
				margin:30,
				loop:true,
				dots:true,
				autoplay:true,
				autoplayTimeout:2000,
				autoplayHoverPause:false,
				responsive:{
					0:{items:1},
					750:{items:2},
					1170:{items:3}
				}
			});
		</script>

		<script src="/js/app.js"></script>
	</body>
</html>
<?php }
}
