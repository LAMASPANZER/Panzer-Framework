<?php
/* Smarty version 3.1.32, created on 2018-05-10 13:10:45
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.admin_post_edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af428b5364694_95694118',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5445d1ae670a05682741af2c7082909c2ab0d748' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.admin_post_edit.tpl',
      1 => 1525922234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af428b5364694_95694118 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->_assignInScope('title', (("Edition de la publication n°").($_smarty_tpl->tpl_vars['post']->value['id'])).(' :: FromScratch'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2609930725af428b5349575_72909737', 'css');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9605766105af428b534be66_63173575', 'js');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_465201205af428b534eac3_79461809', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.admin.tpl');
}
/* {block 'css'} */
class Block_2609930725af428b5349575_72909737 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'css' => 
  array (
    0 => 'Block_2609930725af428b5349575_72909737',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<link href="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/highlightjs/css/default.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<?php
}
}
/* {/block 'css'} */
/* {block 'js'} */
class Block_9605766105af428b534be66_63173575 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_9605766105af428b534be66_63173575',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php echo '<script'; ?>
 src="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/highlightjs/js/highlight.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript">
			$(document).ready(function () {
				var simplemde = new SimpleMDE({
					element: document.getElementById("content"),
					spellChecker: false,
					autoDownloadFontAwesome: false,
					renderingConfig: {
						singleLineBreaks: true,
						codeSyntaxHighlighting: true,}
				});

				//var needToConfirm = true; //Defaut value

				//window.onbeforeunload = confirmExit;
				//function confirmExit(){
				//	if (needToConfirm) return '';
				//}
			});
		<?php echo '</script'; ?>
>

<?php
}
}
/* {/block 'js'} */
/* {block 'content'} */
class Block_465201205af428b534eac3_79461809 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_465201205af428b534eac3_79461809',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<div class="templatemo-content">

		<ol class="breadcrumb">
			<li><a href="<?php echo Panzer\View::Path('admin-dashboard');?>
">Tableau de bord</a></li>
			<li><a href="<?php echo Panzer\View::Path('admin-posts-view');?>
">Publications</a></li>
			<li class="active"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</li>
		</ol>

		<form method="POST" role="form">

			<div class="row">
				<div class="col-md-7 margin-bottom-15">
					<label for="title" class="control-label">Titre</label>
					<input name="title" type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
">
				</div>

				<div class="col-md-5 margin-bottom-15">
					<label for="title" class="control-label">Banniere</label>
					<input name="title" type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['path_banner_picture'];?>
">
				</div>
			</div>

			<div class="row">
				<div class="col-md-7 margin-bottom-15">
					<label for="url" class="control-label">URL</label>
					<input name="url" type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['url'];?>
">
				</div>
				<div class="col-md-5 margin-bottom-15">
					<label for="singleSelect">Catégorie</label>
					<select name="category" class="form-control" id="singleSelect">
					<?php echo print_r($_smarty_tpl->tpl_vars['categories']->value);?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['category']->value['id'] == $_smarty_tpl->tpl_vars['post']->value['id_category']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['category']->value['title'];?>
</option>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5 margin-bottom-15">
					<label for="picture" class="control-label">Image principal</label>
					<input name="picture" type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['picture'];?>
">
				</div>

				<div class="col-md-7 margin-bottom-15">
					<label for="keywords" class="control-label">Mots clés</label>
					<input name="keywords" type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['keywords'];?>
">
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 margin-bottom-15">
					<label for="description" class="control-label">Description</label>
					<textarea name="description" class="form-control" rows="3"><?php echo $_smarty_tpl->tpl_vars['post']->value['description'];?>
</textarea>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 margin-bottom-15">

					<label class="checkbox-inline">
						<input data-style="col-md-6" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['post']->value['published']) {?>checked<?php }?> data-on="Publié" data-off="Non publié" data-toggle="toggle"  data-onstyle="success" data-offstyle="warning">
					</label>
					<label class="checkbox-inline">
						<input class="col-md-6"  type="checkbox" <?php if ($_smarty_tpl->tpl_vars['post']->value['finished']) {?>checked<?php }?> data-on="Terminé" data-off="En cours" data-toggle="toggle"  data-onstyle="success" data-offstyle="warning">
					</label>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<textarea name="content" class="form-control" rows="3" id="content"><?php echo $_smarty_tpl->tpl_vars['post']->value['content'];?>
</textarea>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 text-center margin-bottom-15">
					<input type="submit" class="col-xs-12 btn btn-success" onclick="needToConfirm = false;" value="Enregistrer"/>
				</div>
			</div>
		</form>

		<!--<a id="delete-post" class="btn btn-link text-center" data-href="<?php echo Panzer\View::Path('admin-post-delete',array('id'=>$_smarty_tpl->tpl_vars['post']->value['id']));?>
">Supprimer cette publication</a>-->
	</div>
<?php
}
}
/* {/block 'content'} */
}
