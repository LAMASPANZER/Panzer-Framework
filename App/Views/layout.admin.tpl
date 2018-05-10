<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=0.5, user-scalable=no">
		<meta name="author" content="Guillaume GUERIN">

		<title>{$title}</title>

		<link rel="icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/favicon.ico">

		<!-- <link href="/{#dir_bootstrap#}/css/bootstrap.min.css" rel="stylesheet">-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link href="/{#dir_vendor#}/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/{#dir_vendor#}/bootstrap-toggle/css/bootstrap-toggle.min.css">

		<link rel="stylesheet" href="/{#dir_admin#}/{#dir_css#}/style.css">
{block css}{/block}
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<a href="{View::Path('home')}" class="navbar-brand">
					<div class="logo">Debian.ovh</div>
				</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
		</div>
		<div class="template-page-wrapper">
			<div class="navbar-collapse collapse templatemo-sidebar">
				<ul class="templatemo-sidebar-menu">
					<li class="user">
						<img class="img-circle" width="96px" height="96px" src="{nocache}{$auth->data.path_avatar}{/nocache}">
						<h4 class="">{nocache}{$auth->data.firstname} {$auth->data.lastname}{/nocache}</h4>
					</li>
					<li><a href="{View::Path('admin-dashboard')}"><i class="fa fa-tachometer"></i>Tableau de bord</a></li>

					<li><a href="{nocache}{View::Path('admin-profil-view', ['id'=>$auth->data.id])}{/nocache}"><i class="fa fa-user-circle fa-5x"></i> Résumer</a></li>

					<!--<li><a href="/admin/staff"><i class="fa fa-users" aria-hidden="true"></i> Equipe</a></li>-->

					<li class="sub">
						<a href="javascript:;">
							<i class="fa fa-file-text-o"></i> Publications <div class="pull-right"><span class="caret"></span></div>
						</a>
						<ul class="templatemo-submenu">
{nocache}{if !$auth->IsRestricted()}
							<li><a href="{View::Path('admin-post-new')}">Ajouter une publication</a></li>
{/if}{/nocache}
							<li><a href="{View::Path('admin-posts-view')}">Toutes les publications</a></li>
						</ul>
					</li>
<!--{nocache}{if $auth->IsSuperAdmin()}
					<li><a href="{View::Path('admin-categories-view')}"><i class="fa fa-filter"></i>Catégories</a></li>
{/if}{/nocache}-->
{nocache}{if !$auth->IsRestricted()}
					<li class="sub">
						<a href="javascript:;">
							<i class="fa fa-cog"></i> Options <div class="pull-right"><span class="caret"></span></div>
						</a>
						<ul class="templatemo-submenu">
							<li><a href="{View::Path('admin-option-clearall')}">Vider le cache</a></li>
						</ul>
					</li>
{/if}{/nocache}
					<li><a data-confirm="Voulez-vous vraiment vous deconnecter ?" role="button" data-href="{View::Path('admin-staff-logout')}"><i class="fa fa-sign-out"></i> Déconnexion </a></li>
				</ul>
			</div><!--/.navbar-collapse -->
{block content}{/block}
			<footer class="templatemo-footer">
			  <div class="templatemo-copyright">
			    <p>FromScratch - &copy; 2017 Panzer Framework</p>
			  </div>
			</footer>
		</div>

		<script src="/{#dir_vendor#}/jquery/dist/jquery.min.js"></script>
		<!--<script src="/{#dir_vendor#}/bootstrap/js/bootstrap.min.js"></script>-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="/{#dir_vendor#}/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
{block js}{/block}
		<script src="/{#dir_admin#}/{#dir_js#}/app.js"></script>

		<script type="text/javascript">

			$('#myTab a').click(function (e) {
				e.preventDefault();
				$(this).tab('show');
			});

			$('#loading-example-btn').click(function () {
				var btn = $(this);
				btn.button('loading');
				// $.ajax(...).always(function () {
				//   btn.button('reset');
				// });
			});

		</script>
	</body>
</html>
