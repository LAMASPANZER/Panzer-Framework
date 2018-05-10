<?php
/* Smarty version 3.1.32, created on 2018-05-10 12:01:25
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/layout.error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af418758ebe30_07614969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2558cd4f26d455c29091f945ecfbed132a3785c' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/layout.error.tpl',
      1 => 1525174081,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af418758ebe30_07614969 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->compiled->nocache_hash = '20177881755af418758e9291_19876180';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=0.7">
		<meta name="author" content="Guillaume GUERIN">

		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
    <body class="maintenance-page">
        <div class="container text-center">
            <div class="divide90"></div>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6849069095af418758eb124_68985362', 'content');
?>

        </div>
    </body>
</html>
<?php }
/* {block 'content'} */
class Block_6849069095af418758eb124_68985362 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_6849069095af418758eb124_68985362',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'content'} */
}
