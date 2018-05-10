<?php
/* Smarty version 3.1.32, created on 2018-05-10 13:05:17
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af4276da9cbf5_35137800',
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
function content_5af4276da9cbf5_35137800 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr" xmlns:og="http://ogp.me/ns#">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">

		<title>Installation d'un serveur de jeu source sous Debian</title>
		<meta name="description" content="Vous apprendrer ici à mettre en place un serveur de jeu sur votre machine dedié">
		<meta name="keywords" content="configurer, serveur counter-strike, serveur garry's mod, server.cfg, debian">
		<meta name="author" content="Guillaume GUERIN">

		<meta property="og:site_name" content="FromScratch">
		<meta property="og:title" content="Installation d'un serveur de jeu source sous Debian">
		<meta property="og:url" content="http://dev2.panzer.lan/article/serveur-source-debian">
		<meta property="og:description" content="Vous apprendrer ici à mettre en place un serveur de jeu sur votre machine dedié">
		<meta property="og:image" content="http://data.dev.panzer.lan/images/linux_sourceengine.png">

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

		<div class="header-post" data-stellar-background-ratio="2" style="background-image: url('https://1d31c772ec21a65b0a71-0707aae3004193da193e1ad4a942592d.ssl.cf2.rackcdn.com/18119/banner-2__large.dib');">
			<div class="container">
				<div class="header-content">
					<h1>Installation d'un serveur de jeu source sous Debian</h1>
					<h4><span class="hidden-xs">Mis en ligne le </span><span class="visible-xs-inline"><i class="fa fa-calendar" aria-hidden="true"></i></span> 20 Mars 2017 </span></span> par</span><span class="visible-xs-inline"></span> Guillaume GUERIN <a href="#disqus_thread" data-disqus-identifier="serveur-source-debian"></a></h4>

				</div>
			</div>
		</div>

		<!--<div class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<span><span class="hidden-xs">Publié le</span><span class="visible-xs-inline"><i class="fa fa-calendar" aria-hidden="true"></i></span> 20 Mars 2017 </span></span>
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
<h1>Présentation</h1>
<p>Vous avez un projet communautaire ou vous voudriez un serveur pour votre team ?<br />
Ici vous découvrirez comment installer et configurer un serveur de jeu <a href="http://blog.counter-strike.net/">Counter-Strike: Global Offensive</a>, <a href="http://www.garrysmod.com/">Garry's Mod</a> ou encore relatif à cette <a href="https://developer.valvesoftware.com/wiki/Dedicated_Servers_List#Linux_Dedicated_Servers">liste</a> sur votre machine !</p>
<h2>Pré-requis</h2>
<ul>
<li>Une distribution basée sous Debian (<a href="https://www.debian.org/">Debian</a>, <a href="https://www.ubuntu.com/">Ubuntu</a>,..)</li>
<li>Une bande passante de 100Mbps est largement suffisante de (~30ko/s par connexion simultanée)</li>
<li>Un espace disque de 10Go minimun</li>
<li>Un processeur avec 2 coeurs minimun</li>
<li>Minimum 1Go de RAM en ECC si possible (Garry's Mod segfault souvent ^^)</li>
</ul>
<h2>L'application SteamCMD</h2>
<p>SteamCMD est une application cliente steam en CLI, celle ci vous permettra de récupérer le contenu nécessaire au serveur.<br />
C'est une application développée avec des librairie 32bits et ne fonctionnera donc pas en 64bits, <strong>passer cette étape si vous êtes déjà en 32bits</strong></p>
<pre><code class="lang-bash">dpkg --add-architecture i386 &amp;&amp; apt-get update &amp;&amp; apt-get install lib32gcc1 libstdc++6 libstdc++6:i386</code></pre>
<h3>Répertoire d'installation</h3>
<p>Ajout d'un utilisateur au choix (csgoserver, l4d2server, gmodserver, tf2,..) peut importe, ici on utilisera &quot;gameserver&quot; et on installera un serveur <a href="http://blog.counter-strike.net/">Counter-Strike: Global Offensive</a>:</p>
<pre><code class="lang-bash">adduser gameserver</code></pre>
<p>Loguez et déplacez vous ensuite dans son répertoire utilisateur qui a été créé par défaut:</p>
<pre><code class="lang-bash">su gameserver
cd  ~</code></pre>
<h3>Téléchargement de SteamCMD</h3>
<p>Toujours dans le répertoire &quot;/home/gameserver&quot;:</p>
<pre><code class="lang-bash">mkdir Steam &amp;&amp; cd Steam &amp;&amp; wget https://steamcdn-a.akamaihd.net/client/installer/steamcmd_linux.tar.gz</code></pre>
<p>Le fichier télécharger est compressé, on le décompresse:</p>
<pre><code class="lang-bash">tar -xvzf steamcmd_linux.tar.gz</code></pre>
<h3>Utilisation de SteamCMD</h3>
<p>Exécuter steamcmd avec la commande:  <code>./steamcmd.sh</code><br />
Une authentification va être nécessaire (comme sur Steam).<br />
Il existe un compte &quot;public&quot; mais <strong>certaine application requière le jeu sur le compte, vous devrez donc vous connecter avec votre compte</strong> pour télécharger les fichiers serveurs.<br />
Le prompt ayant changer vous devriez avoir &quot;Steam&gt;&quot; à l'écran.<br />
Pour vous loguer avec le compte public:</p>
<pre><code>login anonymous</code></pre>
<p>ou avec votre compte:</p>
<pre><code>login nom_utilisateur</code></pre>
<p>Maintenant on va renseigner le chemin d'installation:</p>
<pre><code>force_install_dir /home/gameserver</code></pre>
<p>Puis grâce à l'ID de l'application correspondante (<a href="https://developer.valvesoftware.com/wiki/Dedicated_Servers_List#Linux_Dedicated_Servers">voir ici</a>)</p>
<pre><code>app_update 740 validate</code></pre>
<p>Cette étape peut prendre du temps !<br />
A la fin vous devriez obtenir ceci, sinon réessayer un app_update seul les fichiers manquants seront téléchargés</p>
<pre><code>Success! App '740' fully installed.</code></pre>
<h3>Les jetons d'authentification</h3>
<p>Valve a récemment mis en place un système d’authentification (<a href="https://steamcommunity.com/dev/managegameservers">GLST</a>) fonctionnant avec des jetons, qui permet d'identifier le propriétaire mais aussi d'appliquer des bannissements (rien à voir avec le VAC Secure) d'un serveur, sans celui-ci,votre serveur ne sera pas visible pour les joueurs !<br />
<strong>Vous devrez donc générer un token via steam <a href="https://steamcommunity.com/dev/managegameservers">ici</a></strong></p>
<h3>Lancement du serveur</h3>
<p>Tout le contenu téléchargé du serveur se trouve dans le répertoire utilisateur.<br />
Dans le cas de <a href="http://blog.counter-strike.net/">Counter-Strike: Global Offensive</a>, puisque ce tutoriel porte sur ce jeu, j'expliquerai les demarches de lancement ainsi qu'un configuration simple.<br />
Rendez-vous dans le répertoire &quot;/home/gameserver&quot;, si vous n'y êtes pas déjà.</p>
<pre><code class="lang-bash">cd /home/gameserver</code></pre>
<p>Un fichier nommé &quot;srcds_run&quot; est present. C'est un exécutable !<br />
C'est ce fichier que vous lancerez pour démarrer le serveur, cependant les paramètres de base ne seront pas négligeable au lancement et vous devrez les renseigner:</p>
<pre><code class="lang-bash">./srcds_run -game csgo +ip **X.X.X.X** -console +game_type 1 +game_mode 2 +map de_dust2  +port 27015 +sv_setsteamaccount **XXXXXXXXXXXXXXXXXXXXXX**</code></pre>
<h4>Chaque &quot;+&quot; et &quot;-&quot; correspondent à un paramètre:</h4>
<ul>
<li><strong>ip</strong> : Adresse IP de votre machine, c'est par cette adresse qu'il sera accessible.<br />
Dans le cas ou vous êtes derrière le routeur (Livebox, BBox, Freebox,..) de votre fournisseur d'accès il vous est tout à fait possible de rentre accessible votre serveur depuis l’extérieur en configurant une redirection de port (NAT Port Forwarding) vers votre machine !</li>
<li><strong>game_type</strong> : </li>
<li><strong>game_mode</strong> :  </li>
<li><strong>map</strong> : Le nom de la map, les maps source sont au format .bsp</li>
<li><strong>port</strong> : Par défaut c'est le port 27015 qui est utilisé, mais il doit être compris entre 1025 et 65535, vous avez le choix.</li>
<li><strong>sv_setsteamaccount</strong> : Vous y indiquerez le token que vous avez généré sur <a href="https://steamcommunity.com/dev/managegameservers">GLST</a></li>
</ul>
<h3>Configuration</h3>
<h4>Le fichier server.cfg</h4>
<h4>Les plugins avec Sourcemod</h4>
<p>N'hésitez pas à poser des questions, si vous bloquer quelque part, c'est avec plaisir que je vous répondrai !</p>
					</div>
					<hr class="visible-sm visible-xs">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">

					<div class="sidebar-widget">
						<h3>Voir aussi</h3>
						<ul class="list-unstyled">
							<li><a href="/article/serveur-source-debian">Installation d'un serveur de jeu source sous Debian</a></li>
							<li><a href="/article/cisco-ios-routeur-simple-configuration">Cisco IOS, configuration basic d'un routeur</a></li>
							<li><a href="/article/site-virtuel-avec-apache">Configuration de site virtuel avec apache2</a></li>
							<li><a href="/article/configuration-isc-dhcp-debian">Installer et configurer isc-dhcp sous debian</a></li>
							<li><a href="/article/vim-editeur-unix">Apprendre à utiliser Vim</a></li>
							<li><a href="/article/outils-de-supervision">Quelques outils de monitoring indispensable à l'administration de votre debian</a></li>
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
					  this.page.identifier = "serveur-source-debian";
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
