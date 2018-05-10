<?php
/* Smarty version 3.1.32, created on 2018-05-10 13:11:09
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.admin_profil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af428cd03bbf9_73823711',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a25143abc14f5eb66e42234b7623440c8a87b342' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.admin_profil.tpl',
      1 => 1492502792,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af428cd03bbf9_73823711 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->_assignInScope('title', (((("Publications de ").($_smarty_tpl->tpl_vars['author']->value['firstname'])).(" ")).($_smarty_tpl->tpl_vars['author']->value['lastname'])).(" - FromScratch"));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_461302365af428cd022042_95538802', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.admin.tpl');
}
/* {block 'content'} */
class Block_461302365af428cd022042_95538802 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_461302365af428cd022042_95538802',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<div class="templatemo-content">

		<ol class="breadcrumb">
			<li><a href="<?php echo Panzer\View::Path('admin-dashboard');?>
">Tableau de bord</a></li>
			<li class="active">Profil de <?php echo $_smarty_tpl->tpl_vars['author']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['author']->value['lastname'];?>
</li>
		</ol>

		<style type="text/css">

		</style>

		<div class="row">
			<div class="col-lg-12">
				<div class="well resume-profil">
					<table>
						<tr>
						   <td class="col-sm-7">
									<div class="media">
										<div class="media-left ">
											<img width="96px" height="96px" src="<?php echo $_smarty_tpl->tpl_vars['author']->value['path_avatar'];?>
" class="img-circle">
										</div>
										<div class="media-body media-middle">
											<h2 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['author']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['author']->value['lastname'];?>
 </h2>
											<p><?php echo $_smarty_tpl->tpl_vars['author']->value['biography'];?>
</p>
										</div>
									</div>
						   </td>

						   <td class="col-sm-5 stats">
							   <div class="col-xs-4">
								   <h2><strong><?php echo count($_smarty_tpl->tpl_vars['posts']->value);?>
</strong></h2>
								   <p><small>Publications</small></p>
							   </div>
							   <div class="col-xs-4">
								   <h2><strong><?php echo $_smarty_tpl->tpl_vars['countpostspublishedbyauthor']->value;?>
</strong></h2>
								   <p><small>Publiés</small></p>

							   </div>
							   <div class="col-xs-4">
								   <h2><strong><?php echo $_smarty_tpl->tpl_vars['countpostsnotfinishedbyauthor']->value;?>
</strong></h2>
								   <p><small>En cours</small></p>
							   </div>
						   </td>
						</tr>
					</table>
				</div>
			</div>
		</div>



		<div class="row">
			<div class="col-lg-12">

				<table class="table table-condensed table-hover">
					<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
?>
						<tr <?php if (!$_smarty_tpl->tpl_vars['post']->value['finished']) {?> class="warning"<?php }?>>
							<td>
								<?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>

							</td>
							<td>
								<?php echo $_smarty_tpl->tpl_vars['post']->value['title_category'];?>

							</td>
							<td><?php echo strftime("%d/%m/%Y",$_smarty_tpl->tpl_vars['post']->value['date_added']);?>
</td>
							<td>
<?php if ($_smarty_tpl->tpl_vars['post']->value['published']) {?>
								<i data-toggle="tooltip" data-placement="top" data-original-title="Publié" class="fa fa-2x fa-fw fa-eye"></i>
<?php } else { ?>
								<i data-toggle="tooltip" data-placement="top" data-original-title="Non publié" class="fa fa-2x fa-fw fa-eye-slash"></i>
<?php }?>
							</td>
							<td>
								<div class="btn-group btn-sm">
									<a href="<?php echo Panzer\View::Path('post-view',array('name'=>$_smarty_tpl->tpl_vars['post']->value['url']));?>
" class="btn btn-default btn-sm"><i class="fa fa-fw s fa-search"></i> Voir</a>
<?php if ($_smarty_tpl->tpl_vars['auth']->value->IsSuperAdmin() || (!$_smarty_tpl->tpl_vars['auth']->value->IsRestricted() && $_smarty_tpl->tpl_vars['auth']->value->IsOwner($_smarty_tpl->tpl_vars['author']->value['id']))) {?>
									<a href="<?php echo Panzer\View::Path('admin-post-edit',array('id'=>$_smarty_tpl->tpl_vars['post']->value['id']));?>
" class="btn btn-default btn-sm"><i class="fa fa-fw fa-pencil"></i> Editer</a>
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
<?php
}
}
/* {/block 'content'} */
}
