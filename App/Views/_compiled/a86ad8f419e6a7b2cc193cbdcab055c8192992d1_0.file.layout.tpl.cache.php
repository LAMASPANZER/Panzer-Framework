<?php
/* Smarty version 3.1.32, created on 2018-05-10 17:41:55
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af46843824523_37090657',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a86ad8f419e6a7b2cc193cbdcab055c8192992d1' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/layout.tpl',
      1 => 1525889643,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af46843824523_37090657 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->compiled->nocache_hash = '4966570685af468438118c4_17143138';
?>
<!DOCTYPE html>
<html lang="fr" xmlns:og="http://ogp.me/ns#">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">

		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<?php if (isset($_smarty_tpl->tpl_vars['description']->value) && !empty($_smarty_tpl->tpl_vars['description']->value)) {?>
		<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
">
<?php }
if (isset($_smarty_tpl->tpl_vars['keywords']->value) && !empty($_smarty_tpl->tpl_vars['keywords']->value)) {?>
		<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
">
<?php }?>
		<meta name="author" content="<?php if (isset($_smarty_tpl->tpl_vars['author']->value)) {
echo $_smarty_tpl->tpl_vars['author']->value;
} else { ?>Guillaume GUERIN<?php }?>">

		<meta property="og:site_name" content="FromScratch">
		<meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
">
<?php if (isset($_smarty_tpl->tpl_vars['url']->value)) {?>
		<meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">
<?php }
if (isset($_smarty_tpl->tpl_vars['description']->value) && !empty($_smarty_tpl->tpl_vars['description']->value)) {?>
		<meta property="og:description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
">
<?php }?>
		<meta property="og:image" content="<?php if (isset($_smarty_tpl->tpl_vars['picture']->value)) {
echo $_smarty_tpl->tpl_vars['picture']->value;
} else {
echo Panzer\View::Path('home',array(),true);?>
/favicon.ico<?php }?>">

		<link rel="icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/favicon.ico">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_css');?>
/style.css" rel="stylesheet">
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10668739895af4684381f728_89738169', 'css');
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
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5839813445af468438205c4_28572871', 'content');
?>

		<footer class="footer" id="footer">
			<div class="footer-bottom">
				<a href="#" class="back-to-top hidden-xs-down show" id="back-to-top"><i class="fa fa-angle-up"></i></a>
				<a href="#" class="back-to-home hidden-xs-down show" id="back-to-top"><i class="fa fa-angle-up"></i></a>
				<div class="container">
					<span>FromScratch - &copy; 2017 Panzer Framework</span>
				</div>
			</div>
		</footer>

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
		<!--<?php echo '<script'; ?>
 src="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_js');?>
/bootstrap-hover-dropdown.min.js"><?php echo '</script'; ?>
>-->
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3693615235af46843822df1_67806153', 'js');
?>

		<?php echo '<script'; ?>
 src="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_js');?>
/app.js"><?php echo '</script'; ?>
>
	</body>
</html>
<?php }
/* {block 'css'} */
class Block_10668739895af4684381f728_89738169 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'css' => 
  array (
    0 => 'Block_10668739895af4684381f728_89738169',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'css'} */
/* {block 'content'} */
class Block_5839813445af468438205c4_28572871 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_5839813445af468438205c4_28572871',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'content'} */
/* {block 'js'} */
class Block_3693615235af46843822df1_67806153 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_3693615235af46843822df1_67806153',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'js'} */
}
