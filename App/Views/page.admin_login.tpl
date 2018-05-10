<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Authentification - FromScratch</title>

		<!-- <link href="/{#dir_bootstrap#}/css/bootstrap.min.css" rel="stylesheet">-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!--template custom css file-->
		<link href="/{#dir_admin#}/{#dir_css#}/login.css" rel="stylesheet">

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
{nocache}
{if !empty($errors)}
				<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		  			<span class="sr-only">Error:</span>
{$errors}
				</div>
{/if}
{/nocache}
				<input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required="" autofocus="" />
				<input type="password" class="form-control" name="password" placeholder="Mot de passe" required=""/>

				<button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
			</form>
		</div>
	</body>
</html>
