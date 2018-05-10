<!DOCTYPE html>
<html lang="fr" xmlns:og="http://ogp.me/ns#">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">

		<title>{$title}</title>
{if isset($description)&&!empty($description)}
		<meta name="description" content="{$description}">
{/if}
{if isset($keywords)&&!empty($keywords)}
		<meta name="keywords" content="{$keywords}">
{/if}
		<meta name="author" content="{if isset($author)}{$author}{else}Guillaume GUERIN{/if}">

		<meta property="og:site_name" content="FromScratch">
		<meta property="og:title" content="{$title}">
{if isset($url)}
		<meta property="og:url" content="{$url}">
{/if}
{if isset($description)&&!empty($description)}
		<meta property="og:description" content="{$description}">
{/if}
		<meta property="og:image" content="{if isset($picture)}{$picture}{else}{View::Path('home',[],true)}/favicon.ico{/if}">

		<link rel="icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/favicon.ico">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="/{#dir_vendor#}/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="/{#dir_css#}/style.css" rel="stylesheet">
{block css}{/block}
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
{block content}{/block}
		<footer class="footer" id="footer">
			<div class="footer-bottom">
				<a href="#" class="back-to-top hidden-xs-down show" id="back-to-top"><i class="fa fa-angle-up"></i></a>
				<a href="#" class="back-to-home hidden-xs-down show" id="back-to-top"><i class="fa fa-angle-up"></i></a>
				<div class="container">
					<span>FromScratch - &copy; 2017 Panzer Framework</span>
				</div>
			</div>
		</footer>

		<script src="/{#dir_vendor#}/jquery/dist/jquery.min.js"></script>
		<!--<script src="/{#dir_vendor#}/bootstrap/js/bootstrap.min.js"></script>-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!--<script src="/{#dir_js#}/bootstrap-hover-dropdown.min.js"></script>-->
{block js}{/block}
		<script src="/{#dir_js#}/app.js"></script>
	</body>
</html>
