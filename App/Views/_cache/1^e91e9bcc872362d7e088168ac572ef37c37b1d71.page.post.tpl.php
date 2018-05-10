<?php
/* Smarty version 3.1.32, created on 2018-05-10 11:48:31
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af4156f338271_94665856',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '448256a5cc5f1e72c10c2d3873c919dcf2a38193' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.post.tpl',
      1 => 1525887670,
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
function content_5af4156f338271_94665856 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr" xmlns:og="http://ogp.me/ns#">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">

		<title>Installer et configurer isc-dhcp sous debian</title>
		<meta name="description" content="Installer et configurer isc-dhcp sous debian">
		<meta name="keywords" content="isc-dhcp, configuration, serveur, dhcp, debian">
		<meta name="author" content="Guillaume GUERIN">

		<meta property="og:site_name" content="FromScratch">
		<meta property="og:title" content="Installer et configurer isc-dhcp sous debian">
		<meta property="og:url" content="http://dev2.panzer.lan/article/configuration-isc-dhcp-debian">
		<meta property="og:description" content="Installer et configurer isc-dhcp sous debian">
		<meta property="og:image" content="http://data.dev.panzer.lan/images/dhcp.jpg">

		<link rel="icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/favicon.ico">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="/css/style.css" rel="stylesheet">

		<link href="/vendor/highlightjs/css/obsidian.css" rel="stylesheet">
		<link href="/vendor/section-scroll/css/section-scroll.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

		<div class="header-post" data-stellar-background-ratio="2" style="background-image: url('https://berniollesmaxime31700.files.wordpress.com/2013/05/dhcp.jpg');">
			<div class="container">
				<div class="header-content">
					<h1>Installer et configurer isc-dhcp sous debian</h1>
					<h4><span class="hidden-xs">Mis en ligne le </span><span class="visible-xs-inline"><i class="fa fa-calendar" aria-hidden="true"></i></span> 20 Août 2014 <span class="hidden-xs">et mis à jour le  1 Janv. 1970</span></span> par</span><span class="visible-xs-inline"></span> Guillaume GUERIN <a href="#disqus_thread" data-disqus-identifier="configuration-isc-dhcp-debian"></a></h4>

				</div>
			</div>
		</div>

		<!--<div class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<span><span class="hidden-xs">Publié le</span><span class="visible-xs-inline"><i class="fa fa-calendar" aria-hidden="true"></i></span> 20 Août 2014 <span class="hidden-xs">et mis à jour le  1 Janv. 1970</span></span>
						<span class="pull-right"><span class="hidden-xs">Rédigé par</span><span class="visible-xs-inline"></span> Guillaume GUERIN <img src="http://data.fromscratch.ovh/images/lamaspanzer.jpg"></span>
					</div>
				</div>
			</div>
		</div>-->

		<div class="container">

			<div class="space20"></div>

			<div class="row">

				<div class=" col-md-12">
					<div class="post-content">
<h1>Protocole DHCP ?</h1>
<p>Brièvement le protocole DHCP qui signifie Dynamic Host Configuration Protocol qui littéralement traduit signifie Protocole Dynamique de Configuration d'hôtes va permettre à un hôte n'ayant aucune configuration IP définis, d'obtenir une adresse IP ainsi que l'ensemble des paramètres réseau.</p>
<hr />
<h1>Installation</h1>
<blockquote>
<p>apt-get install isc-dhcp</p>
</blockquote>
<h1>Configuration</h1>
<p>Les plages d'adresses privées, c'est à dire qu'elles ne sont pas routable en dehors d'un réseau local, doivent être comprise dans celles décrient de la <a href="https://fr.wikipedia.org/wiki/R%C3%A9seau_priv%C3%A9">RFC1918</a>.</p>
<h2>Exemple de configuration</h2>
<p>La configuration de isc-dhcp se trouve dans &quot;/etc/dhcp/dhcpd.conf&quot;:</p>
<pre><code class="lang-bash"> vim /etc/dhcp/dhcpd.conf</code></pre>
<pre><code class="lang-bash">#Autorité sur les autres serveurs DHCP
authoritative; 

ddns-update-style none;
#Adresse du réseau et son masque
subnet 192.168.0.0 netmask 255.255.255.0 {
    #Plage
    range 192.168.0.10 192.168.0.254;
    #DNS (Google et OpenDNS)
    option domain-name-servers 8.8.8.8, 208.67.222.222;
    #Passerelle
    option routers 192.168.0.1;
    #Bail
    default-lease-time 600;
    max-lease-time 7200;
}</code></pre>
<p>Redémarrer le service</p>
<blockquote>
<p>service isc-dhcp restart</p>
</blockquote>
					</div>
					<hr class="visible-sm visible-xs">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">

					<div class="sidebar-widget">
						<h3>Voir aussi</h3>
						<ul class="list-unstyled">
							<li><a href="/article/remplacer-la-livebox-par-un-routeur-ou-une-debian">Remplacer la livebox par un routeur/debian</a></li>
							<li><a href="/article/environement-web-linux">Environement de développement web sous Linux</a></li>
							<li><a href="/article/cisco-ios-routeur-simple-configuration">Cisco IOS, configuration basic d'un routeur</a></li>
							<li><a href="/article/serveur-source-debian">Installation d'un serveur de jeu source sous Debian</a></li>
							<li><a href="/article/site-virtuel-avec-apache">Configuration de site virtuel avec apache2</a></li>
							<li><a href="/article/configuration-isc-dhcp-debian">Installer et configurer isc-dhcp sous debian</a></li>
						</ul>
					</div>

					<div class="sidebar-widget">
						<div style="width: 100%; height: 250px; background-color: ghostwhite;"></div>
					</div>


					<div class="sidebar-widget">
						<div class="licensed">
							<a data-toggle="tooltip" data-placement="left" title="Le contenu de cette page est sous la license Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License" rel="license" href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.fr">
								<img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /><br />
							</a>
						</div>
					</div>

					<!--<div class="sidebar-widget">
						<h3>Tags</h3>
						<ul class="list-inline tag-list">
							<li><a href="#">Courses</a></li>
							<li><a href="#">Design</a></li>
							<li><a href="#">Development</a></li>
							<li><a href="#">Marketing</a></li>
							<li><a href="#">AngularJs</a></li>
							<li><a href="#">Meteor</a></li>
							<li><a href="#">ReactJs</a></li>
							<li><a href="#">.Net</a></li>
							<li><a href="#">Jquery</a></li>
						</ul>
					</div>-->
				</div>
			</div>
		</div>
		<div class="space50"></div>
		<div class="container">
			<div class="row">
			  <div class="col-sm-12">
				<div id="disqus_thread"></div>
				<script>
					var disqus_config = function () {
					  this.page.identifier = "configuration-isc-dhcp-debian";
					};
					(function() {
					  var d = document, s = d.createElement('script');
					  s.src = 'https://panzer.disqus.com/embed.js';
					  s.setAttribute('data-timestamp', +new Date());
					  (d.head || d.body).appendChild(s);
					})();
				</script>
			  </div>
			</div>
		</div>
		<div class="space10"></div>

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

		<!--<script src="/js/jquery.sticky.min.js"></script>-->
		<script src="/vendor/highlightjs/js/highlight.min.js"></script>
		<script src="/vendor/stellar/js/jquery.stellar.min.js"></script>
		<script src="/vendor/section-scroll/js/jquery.section-scroll.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$.stellar({
					verticalOffset: 75,
				});
				$('pre code').each(function(i, block) {
					hljs.highlightBlock(block);
				});
				$('body').sectionScroll(); // Easy Peasy Lemon Squeezy
			})
		</script>
		<script id="dsq-count-scr" src="//panzer.disqus.com/count.js" async></script>

		<script src="/js/app.js"></script>
	</body>
</html>
<?php }
}
