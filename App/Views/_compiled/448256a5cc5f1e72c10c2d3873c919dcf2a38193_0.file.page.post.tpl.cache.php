<?php
/* Smarty version 3.1.32, created on 2018-05-10 13:05:17
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af4276da7df72_26769582',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '448256a5cc5f1e72c10c2d3873c919dcf2a38193' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.post.tpl',
      1 => 1525887670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af4276da7df72_26769582 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->compiled->nocache_hash = '18168858925af4276da47261_47500602';
$_smarty_tpl->_assignInScope('title', $_smarty_tpl->tpl_vars['post']->value['title']);
$_smarty_tpl->_assignInScope('description', $_smarty_tpl->tpl_vars['post']->value['description']);
$_smarty_tpl->_assignInScope('author', (($_smarty_tpl->tpl_vars['post']->value['author_firstname']).(" ")).($_smarty_tpl->tpl_vars['post']->value['author_lastname']));
$_smarty_tpl->_assignInScope('picture', $_smarty_tpl->tpl_vars['post']->value['path_main_picture']);
$_smarty_tpl->_assignInScope('url', Panzer\View::Path('post-view',array('name'=>$_smarty_tpl->tpl_vars['post']->value['url']),true));
$_smarty_tpl->_assignInScope('keywords', $_smarty_tpl->tpl_vars['post']->value['keywords']);?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20059285325af4276da59083_56127831', 'css');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12529780275af4276da5c4e2_64604149', 'js');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17364475135af4276da60cf2_35476522', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'css'} */
class Block_20059285325af4276da59083_56127831 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'css' => 
  array (
    0 => 'Block_20059285325af4276da59083_56127831',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<link href="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/highlightjs/css/obsidian.css" rel="stylesheet">
		<link href="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/section-scroll/css/section-scroll.css" rel="stylesheet">
<?php
}
}
/* {/block 'css'} */
/* {block 'js'} */
class Block_12529780275af4276da5c4e2_64604149 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_12529780275af4276da5c4e2_64604149',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<!--<?php echo '<script'; ?>
 src="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_js');?>
/jquery.sticky.min.js"><?php echo '</script'; ?>
>-->
		<?php echo '<script'; ?>
 src="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/highlightjs/js/highlight.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/stellar/js/jquery.stellar.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/section-scroll/js/jquery.section-scroll.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript">
			$(document).ready(function () {
				$.stellar({
					verticalOffset: 75,
				});
				$('pre code').each(function(i, block) {
					hljs.highlightBlock(block);
				});
				$('body').sectionScroll(); // Easy Peasy Lemon Squeezy
			})
		<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 id="dsq-count-scr" src="//panzer.disqus.com/count.js" async><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'js'} */
/* {block 'content'} */
class Block_17364475135af4276da60cf2_35476522 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17364475135af4276da60cf2_35476522',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div class="header-post" data-stellar-background-ratio="2" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['post']->value['path_banner_picture'];?>
');">
			<div class="container">
				<div class="header-content">
					<h1><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h1>
					<h4><span class="hidden-xs">Mis en ligne le </span><span class="visible-xs-inline"><i class="fa fa-calendar" aria-hidden="true"></i></span> <?php echo ucwords(strftime("%e %b %Y",$_smarty_tpl->tpl_vars['post']->value['date_published']));?>
 <?php if ($_smarty_tpl->tpl_vars['post']->value['date_edited']) {?><span class="hidden-xs">et mis à jour le <?php echo ucwords(strftime("%e %b %Y",$_smarty_tpl->tpl_vars['post']->value['date_edited']));
}?></span></span> par</span><span class="visible-xs-inline"></span> <?php echo $_smarty_tpl->tpl_vars['post']->value['author_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['post']->value['author_lastname'];?>
 <a href="#disqus_thread" data-disqus-identifier="<?php echo $_smarty_tpl->tpl_vars['post']->value['url'];?>
"></a></h4>

				</div>
			</div>
		</div>

		<!--<div class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<span><span class="hidden-xs">Publié le</span><span class="visible-xs-inline"><i class="fa fa-calendar" aria-hidden="true"></i></span> <?php echo ucwords(strftime("%e %b %Y",$_smarty_tpl->tpl_vars['post']->value['date_published']));?>
 <?php if ($_smarty_tpl->tpl_vars['post']->value['date_edited']) {?><span class="hidden-xs">et mis à jour le <?php echo ucwords(strftime("%e %b %Y",$_smarty_tpl->tpl_vars['post']->value['date_edited']));
}?></span></span>
						<span class="pull-right"><span class="hidden-xs">Rédigé par</span><span class="visible-xs-inline"></span> <?php echo $_smarty_tpl->tpl_vars['post']->value['author_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['post']->value['author_lastname'];?>
 <img src="<?php echo $_smarty_tpl->tpl_vars['post']->value['author_avatar'];?>
"></span>
					</div>
				</div>
			</div>
		</div>-->

		<div class="container">
<?php if (!$_smarty_tpl->tpl_vars['post']->value['published']) {?>
			<div class="space30"></div>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-warning" style="margin: 0!important;" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span>
						Cette page n'est pas encore publiée
					</div>
				</div>
			</div>
<?php }?>

			<div class="space20"></div>

			<div class="row">

				<div class=" col-md-12">
					<div class="post-content">
<?php echo $_smarty_tpl->tpl_vars['post']->value['content'];?>

					</div>
					<hr class="visible-sm visible-xs">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">

					<div class="sidebar-widget">
						<h3>Voir aussi</h3>
						<ul class="list-unstyled">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['randposts']->value, 'post');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
?>
							<li><a href="<?php echo Panzer\View::Path('post-view',array('name'=>$_smarty_tpl->tpl_vars['post']->value['url']));?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</a></li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</ul>
					</div>

					<div class="sidebar-widget">
						<div style="width: 100%; height: 250px; background-color: ghostwhite;"></div>
					</div>


					<div class="sidebar-widget">
						<div class="licensed">
							<a data-toggle="tooltip" data-placement="left" title="Le contenu de cette page est sous la license Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License" rel="license" href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.fr">
								<img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /><br />
							</a>
						</div>
					</div>

					<!--<div class="sidebar-widget">
						<h3>Tags</h3>
						<ul class="list-inline tag-list">
							<li><a href="#">Courses</a></li>
							<li><a href="#">Design</a></li>
							<li><a href="#">Development</a></li>
							<li><a href="#">Marketing</a></li>
							<li><a href="#">AngularJs</a></li>
							<li><a href="#">Meteor</a></li>
							<li><a href="#">ReactJs</a></li>
							<li><a href="#">.Net</a></li>
							<li><a href="#">Jquery</a></li>
						</ul>
					</div>-->
				</div>
			</div>
		</div>
<?php if ($_smarty_tpl->tpl_vars['post']->value['published']) {?>
		<div class="space50"></div>
		<div class="container">
			<div class="row">
			  <div class="col-sm-12">
				<div id="disqus_thread"></div>
				<?php echo '<script'; ?>
>
					var disqus_config = function () {
					  this.page.identifier = "<?php echo $_smarty_tpl->tpl_vars['post']->value['url'];?>
";
					};
					(function() {
					  var d = document, s = d.createElement('script');
					  s.src = 'https://panzer.disqus.com/embed.js';
					  s.setAttribute('data-timestamp', +new Date());
					  (d.head || d.body).appendChild(s);
					})();
				<?php echo '</script'; ?>
>
			  </div>
			</div>
		</div>
		<div class="space10"></div>
<?php }
}
}
/* {/block 'content'} */
}
