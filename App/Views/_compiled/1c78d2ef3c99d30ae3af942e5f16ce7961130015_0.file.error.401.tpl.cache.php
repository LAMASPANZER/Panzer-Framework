<?php
/* Smarty version 3.1.32, created on 2018-05-10 13:11:58
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/error.401.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af428fe57d7a5_61816540',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c78d2ef3c99d30ae3af942e5f16ce7961130015' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/error.401.tpl',
      1 => 1492732029,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af428fe57d7a5_61816540 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->compiled->nocache_hash = '3114435705af428fe576918_96800463';
$_smarty_tpl->_assignInScope('title', "403 Auth Required");?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16339187335af428fe57bfc6_93862859', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.error.tpl');
}
/* {block 'content'} */
class Block_16339187335af428fe57bfc6_93862859 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16339187335af428fe57bfc6_93862859',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <h1>403 Auth Required</h1>
<?php
}
}
/* {/block 'content'} */
}
