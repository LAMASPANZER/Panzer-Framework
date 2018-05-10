<?php
/* Smarty version 3.1.32, created on 2018-05-10 12:01:25
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/error.404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af418758e6712_62074352',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e50213c61897fa2404a2357178c59e151f67270a' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/error.404.tpl',
      1 => 1490984097,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af418758e6712_62074352 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->compiled->nocache_hash = '11967381075af418758e0808_92337856';
$_smarty_tpl->_assignInScope('title', "404 Not Found");?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11527213655af418758e5564_56036089', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.error.tpl');
}
/* {block 'content'} */
class Block_11527213655af418758e5564_56036089 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11527213655af418758e5564_56036089',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <h1>404 Not Found</h1>
<?php
}
}
/* {/block 'content'} */
}
