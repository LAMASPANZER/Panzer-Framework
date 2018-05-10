<?php
/* Smarty version 3.1.32, created on 2018-05-10 13:07:21
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.admin_dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af427e9a958b3_73612466',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b804699c73acd578502f8463b8c0a1a26e4eb231' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.admin_dashboard.tpl',
      1 => 1492870933,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af427e9a958b3_73612466 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->_assignInScope('title', "Tableau de bord - FromScratch");?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8134958375af427e9a61986_46572234', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.admin.tpl');
}
/* {block 'content'} */
class Block_8134958375af427e9a61986_46572234 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8134958375af427e9a61986_46572234',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			<div class="templatemo-content">
				<ol class="breadcrumb">
					<li><a href="/">FromScratch</a></li>
					<li class="active">Tableau de bord</li>
				</ol>

				<div class="row">
					<div class="col-sm-8">
						<div class="panel panel-style">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-file-text-o fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $_smarty_tpl->tpl_vars['postspublished']->value;?>
</div>
										<div>Publications</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="panel panel-style">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-user-circle fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $_smarty_tpl->tpl_vars['authors']->value;?>
</div>
										<div>Rédacteurs</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-success">
						<div class="panel-heading"><i class="fa fa-check" aria-hidden="true"></i> Récemment publiée</div>
							<table class="table table-hover">
								<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['getlastpostspublished']->value, 'post');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
?>
									<tr<?php if (!$_smarty_tpl->tpl_vars['post']->value['finished']) {?> class="warning"<?php }?>>
										<td style="max-width: 400px;"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['post']->value['title_category'];?>
</td>
										<td><?php if ($_smarty_tpl->tpl_vars['auth']->value->IsOwner($_smarty_tpl->tpl_vars['post']->value['author_id'])) {?><em>Vous</em><?php } else {
echo $_smarty_tpl->tpl_vars['post']->value['author_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['post']->value['author_lastname'];
}?></td>
										<td>
											<div class="btn-group btn-xs">
												<a href="<?php echo Panzer\View::Path('post-view',array('name'=>$_smarty_tpl->tpl_vars['post']->value['url']));?>
" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-search"></i> Voir</a>
<?php if ($_smarty_tpl->tpl_vars['auth']->value->IsSuperAdmin() || (!$_smarty_tpl->tpl_vars['auth']->value->IsRestricted() && $_smarty_tpl->tpl_vars['auth']->value->IsOwner($_smarty_tpl->tpl_vars['post']->value['author_id']))) {?>
												<a class="btn btn-xs btn-default" href="<?php echo Panzer\View::Path('admin-post-edit',array('id'=>$_smarty_tpl->tpl_vars['post']->value['id']));?>
"><i class="fa fa-pencil"></i></a>
<?php }?>
											</div>
										</td>
									</tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</tbody>
							</table>
						</div>
					</div>

					<div class="col-md-6">
						<div class="panel panel-info">
							<div class="panel-heading"><i class="fa fa-pencil" aria-hidden="true"></i> Récemment éditée</div>
							<table class="table table-hover">
								<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['getgastpostsedited']->value, 'post');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
?>
									<tr>
										<td><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['post']->value['title_category'];?>
</td>
										<td><?php echo strftime("%d/%m/%Y",$_smarty_tpl->tpl_vars['post']->value['date_edited']);?>
</td>
										<td>
											<div class="btn-group">

<?php if ($_smarty_tpl->tpl_vars['auth']->value->IsSuperAdmin() || (!$_smarty_tpl->tpl_vars['auth']->value->IsRestricted() && $_smarty_tpl->tpl_vars['auth']->value->IsOwner($_smarty_tpl->tpl_vars['post']->value['author_id']))) {?>
													<a href="<?php echo Panzer\View::Path('admin-post-edit',array('id'=>$_smarty_tpl->tpl_vars['post']->value['id']));?>
" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Editer</a>
<?php }?>
													<a href="<?php echo Panzer\View::Path('post-view',array('name'=>$_smarty_tpl->tpl_vars['post']->value['url']));?>
" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-search"></i> <?php if (!$_smarty_tpl->tpl_vars['auth']->value->IsSuperAdmin() && ($_smarty_tpl->tpl_vars['auth']->value->IsRestricted() || !$_smarty_tpl->tpl_vars['auth']->value->IsOwner($_smarty_tpl->tpl_vars['post']->value['author_id']))) {?>Voir<?php }?></a>
											</div>
										</td>
									</tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</tbody>
							</table>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-warning">
						<div class="panel-heading"><i class="fa fa-coffee" aria-hidden="true"></i> En cours (<?php echo count($_smarty_tpl->tpl_vars['getlastpostsnotfinished']->value);?>
)</div>
							<table class="table table-hover">
								<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['getlastpostsnotfinished']->value, 'post');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
?>
									<tr>
										<td><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['post']->value['title_category'];?>
</td>
										<td><?php if ($_smarty_tpl->tpl_vars['auth']->value->IsOwner($_smarty_tpl->tpl_vars['post']->value['author_id'])) {?><em>Vous</em><?php } else {
echo $_smarty_tpl->tpl_vars['post']->value['author_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['post']->value['author_lastname'];
}?></td>
										<td>
											<div class="btn-group">
												<a href="<?php echo Panzer\View::Path('post-view',array('name'=>$_smarty_tpl->tpl_vars['post']->value['url']));?>
" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-search"></i> Voir</a>
<?php if ($_smarty_tpl->tpl_vars['auth']->value->IsSuperAdmin() || (!$_smarty_tpl->tpl_vars['auth']->value->IsRestricted() && $_smarty_tpl->tpl_vars['auth']->value->IsOwner($_smarty_tpl->tpl_vars['post']->value['author_id']))) {?>
												<a href="<?php echo Panzer\View::Path('admin-post-edit',array('id'=>$_smarty_tpl->tpl_vars['post']->value['id']));?>
" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Editer</a>
<?php }?>
											</div>
										</td>
									</tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
<?php
}
}
/* {/block 'content'} */
}
