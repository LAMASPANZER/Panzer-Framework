<?php
/* Smarty version 3.1.32, created on 2018-05-10 13:11:09
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/layout.admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af428cd05c861_57582607',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '835980de23f4a5396027b826b87a69cde894d1b2' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/layout.admin.tpl',
      1 => 1525947343,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af428cd05c861_57582607 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=0.5, user-scalable=no">
		<meta name="author" content="Guillaume GUERIN">

		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

		<link rel="icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/favicon.ico">

		<!-- <link href="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_bootstrap');?>
/css/bootstrap.min.css" rel="stylesheet">-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link href="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/bootstrap-toggle/css/bootstrap-toggle.min.css">

		<link rel="stylesheet" href="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_admin');?>
/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_css');?>
/style.css">
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16501634925af428cd043972_19386328', 'css');
?>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
		  <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
		<![endif]-->
	</head>
	<body>
		<div class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<a href="<?php echo Panzer\View::Path('home');?>
" class="navbar-brand">
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
						<img class="img-circle" width="96px" height="96px" src="<?php echo $_smarty_tpl->tpl_vars['auth']->value->data['path_avatar'];?>
">
						<h4 class=""><?php echo $_smarty_tpl->tpl_vars['auth']->value->data['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['auth']->value->data['lastname'];?>
</h4>
					</li>
					<li><a href="<?php echo Panzer\View::Path('admin-dashboard');?>
"><i class="fa fa-tachometer"></i>Tableau de bord</a></li>

					<li><a href="<?php echo Panzer\View::Path('admin-profil-view',array('id'=>$_smarty_tpl->tpl_vars['auth']->value->data['id']));?>
"><i class="fa fa-user-circle fa-5x"></i> Résumer</a></li>

					<!--<li><a href="/admin/staff"><i class="fa fa-users" aria-hidden="true"></i> Equipe</a></li>-->

					<li class="sub">
						<a href="javascript:;">
							<i class="fa fa-file-text-o"></i> Publications <div class="pull-right"><span class="caret"></span></div>
						</a>
						<ul class="templatemo-submenu">
<?php if (!$_smarty_tpl->tpl_vars['auth']->value->IsRestricted()) {?>
							<li><a href="<?php echo Panzer\View::Path('admin-post-new');?>
">Ajouter une publication</a></li>
<?php }?>
							<li><a href="<?php echo Panzer\View::Path('admin-posts-view');?>
">Toutes les publications</a></li>
						</ul>
					</li>
<!--<?php if ($_smarty_tpl->tpl_vars['auth']->value->IsSuperAdmin()) {?>
					<li><a href="<?php echo Panzer\View::Path('admin-categories-view');?>
"><i class="fa fa-filter"></i>Catégories</a></li>
<?php }?>-->
<?php if (!$_smarty_tpl->tpl_vars['auth']->value->IsRestricted()) {?>
					<li class="sub">
						<a href="javascript:;">
							<i class="fa fa-cog"></i> Options <div class="pull-right"><span class="caret"></span></div>
						</a>
						<ul class="templatemo-submenu">
							<li><a href="<?php echo Panzer\View::Path('admin-option-clearall');?>
">Vider le cache</a></li>
						</ul>
					</li>
<?php }?>
					<li><a data-confirm="Voulez-vous vraiment vous deconnecter ?" role="button" data-href="<?php echo Panzer\View::Path('admin-staff-logout');?>
"><i class="fa fa-sign-out"></i> Déconnexion </a></li>
				</ul>
			</div><!--/.navbar-collapse -->
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21276375955af428cd0570d2_94282965', 'content');
?>

			<footer class="templatemo-footer">
			  <div class="templatemo-copyright">
			    <p>FromScratch - &copy; 2017 Panzer Framework</p>
			  </div>
			</footer>
		</div>

		<?php echo '<script'; ?>
 src="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>
		<!--<?php echo '<script'; ?>
 src="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>-->
		<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/bootstrap-toggle/js/bootstrap-toggle.min.js"><?php echo '</script'; ?>
>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13490127605af428cd059d87_51822725', 'js');
?>

		<?php echo '<script'; ?>
 src="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_admin');?>
/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_js');?>
/app.js"><?php echo '</script'; ?>
>

		<?php echo '<script'; ?>
 type="text/javascript">

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

		<?php echo '</script'; ?>
>
	</body>
</html>
<?php }
/* {block 'css'} */
class Block_16501634925af428cd043972_19386328 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'css' => 
  array (
    0 => 'Block_16501634925af428cd043972_19386328',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'css'} */
/* {block 'content'} */
class Block_21276375955af428cd0570d2_94282965 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_21276375955af428cd0570d2_94282965',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'content'} */
/* {block 'js'} */
class Block_13490127605af428cd059d87_51822725 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_13490127605af428cd059d87_51822725',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'js'} */
}
