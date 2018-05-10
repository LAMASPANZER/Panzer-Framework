<?php
/* Smarty version 3.1.32, created on 2018-05-10 13:10:48
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.admin_posts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af428b85ae462_36374388',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b2ff1c1fe4599b4395f201762b5cbd42d559aaa' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.admin_posts.tpl',
      1 => 1492503100,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af428b85ae462_36374388 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->_assignInScope('title', "Publications - FromScratch");?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5300153715af428b8593810_58409739', 'css');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11155358285af428b85954d1_62678792', 'js');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11345106955af428b8597bf6_74625388', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.admin.tpl');
}
/* {block 'css'} */
class Block_5300153715af428b8593810_58409739 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'css' => 
  array (
    0 => 'Block_5300153715af428b8593810_58409739',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<style type="text/css">
			.results tr[visible='false'],
			.no-result{
			  display:none;
			}

			.results tr[visible='true']{
			  display:table-row;
			}

			.counter{
			  padding:8px;
			  color:#ccc;
			}
		</style>
<?php
}
}
/* {/block 'css'} */
/* {block 'js'} */
class Block_11155358285af428b85954d1_62678792 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_11155358285af428b85954d1_62678792',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php echo '<script'; ?>
 type="text/javascript">
			$(document).ready(function() {
			  $(".search").keyup(function () {
				var searchTerm = $(".search").val();
				var listItem = $('.results tbody').children('tr');
				var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

			  $.extend($.expr[':'], {
					'containsi': function(elem, i, match, array){
					return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
				}
			  });

			  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
				$(this).attr('visible','false');
			  });

			  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
				$(this).attr('visible','true');
			  });

			  var jobCount = $('.results tbody tr[visible="true"]').length;
				$('.counter').text(jobCount + ' publications');

			  if(jobCount == '0') {
					$('.no-result').show();
				} else {
					$('.no-result').hide();
				}
			  });
			});
		<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'js'} */
/* {block 'content'} */
class Block_11345106955af428b8597bf6_74625388 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11345106955af428b8597bf6_74625388',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			<div class="templatemo-content">
				<ol class="breadcrumb">
					<li><a href="<?php echo Panzer\View::Path('admin-dashboard');?>
">Tableau de bord</a></li>
					<li class="active">Publications</li>
				</ol>


				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input type="text" class="col-md-12 search form-control" placeholder="Rechercher">
						</div>
						<span class="counter pull-right"></span>
						<table class="table table-condensed table-hover results">
							<tbody>
								<tr class="no-result">
								  <td colspan="5">Aucune correspondance</td>
								</tr>
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
										<img src="<?php echo $_smarty_tpl->tpl_vars['post']->value['author_avatar'];?>
" width="32">
									</td>
									<td>
<?php if ($_smarty_tpl->tpl_vars['auth']->value->IsOwner($_smarty_tpl->tpl_vars['post']->value['author_id'])) {?>
										<em>Vous</em>
<?php } else { ?>
										<?php echo $_smarty_tpl->tpl_vars['post']->value['author_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['post']->value['author_lastname'];?>

<?php }?>
									</td>
									<td>
<?php if ($_smarty_tpl->tpl_vars['post']->value['published']) {?>
										<i data-toggle="tooltip" data-placement="top" data-original-title="Publié" class="fa fa-2x fa-fw fa-eye"></i>
<?php } else { ?>
										<i data-toggle="tooltip" data-placement="top" data-original-title="Non publié" class="fa fa-2x fa-fw fa-eye-slash"></i>
<?php }?>
									</td>
									<td>
										<div class="btn-group btn-xs">
											<a href="<?php echo Panzer\View::Path('post-view',array('name'=>$_smarty_tpl->tpl_vars['post']->value['url']));?>
" class="btn btn-default btn-xs"><i class="fa fa-fw s fa-search"></i> Voir </a>
<?php if ($_smarty_tpl->tpl_vars['auth']->value->IsSuperAdmin() || (!$_smarty_tpl->tpl_vars['auth']->value->IsRestricted() && $_smarty_tpl->tpl_vars['auth']->value->IsOwner($_smarty_tpl->tpl_vars['post']->value['author_id']))) {?>
											<a href="<?php echo Panzer\View::Path('admin-post-edit',array('id'=>$_smarty_tpl->tpl_vars['post']->value['id']));?>
" class="btn btn-default btn-xs"><i class="fa fa-fw fa-pencil"></i> Editer</a>
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
