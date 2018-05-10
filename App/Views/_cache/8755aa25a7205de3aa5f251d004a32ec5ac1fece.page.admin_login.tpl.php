<?php
/* Smarty version 3.1.32, created on 2018-05-10 13:07:21
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.admin_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af427e9a38689_90455254',
  'has_nocache_code' => true,
  'file_dependency' => 
  array (
    '90061fb5a9fd6118f921354552177b181e6ee1d6' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.admin_login.tpl',
      1 => 1525947308,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 86400,
),true)) {
function content_5af427e9a38689_90455254 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Authentification - FromScratch</title>

		<!-- <link href="//css/bootstrap.min.css" rel="stylesheet">-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!--template custom css file-->
		<link href="/admin/css/login.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="wrapper">
			<form method="POST" class="form-signin">
				<h2 class="form-signin-heading">Authentification</h2>

<?php if (!empty($_smarty_tpl->tpl_vars['errors']->value)) {?>
				<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		  			<span class="sr-only">Error:</span>
<?php echo $_smarty_tpl->tpl_vars['errors']->value;?>

				</div>
<?php }?>

				<input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required="" autofocus="" />
				<input type="password" class="form-control" name="password" placeholder="Mot de passe" required=""/>

				<button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
			</form>
		</div>
	</body>
</html>
<?php }
}
