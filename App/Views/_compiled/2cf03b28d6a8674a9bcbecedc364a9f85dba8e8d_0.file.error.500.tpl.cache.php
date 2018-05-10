<?php
/* Smarty version 3.1.32, created on 2018-05-10 00:54:14
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/error.500.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af37c16535d94_20589462',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2cf03b28d6a8674a9bcbecedc364a9f85dba8e8d' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/error.500.tpl',
      1 => 1490984106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af37c16535d94_20589462 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->compiled->nocache_hash = '8743382015af37c1652f656_34899136';
$_smarty_tpl->_assignInScope('title', "500 Internal Server Error");?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15082491205af37c16534ba0_56693321', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.error.tpl');
}
/* {block 'content'} */
class Block_15082491205af37c16534ba0_56693321 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15082491205af37c16534ba0_56693321',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	        <h1>500 Internal Server Error</h1>
<?php
}
}
/* {/block 'content'} */
}
