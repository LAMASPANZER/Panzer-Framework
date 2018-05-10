<?php
/* Smarty version 3.1.32, created on 2018-05-10 17:41:55
  from '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5af4684380d7f1_96245163',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '816020ac1ca7672f38edfad448fbbb052cc43dd3' => 
    array (
      0 => '/home/lamaspanzer/srv_apache/dev2.panzer.lan/App/Views/page.home.tpl',
      1 => 1525788343,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af4684380d7f1_96245163 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->compiled->nocache_hash = '9541869535af468437e55d8_76152533';
$_smarty_tpl->_assignInScope('title', "Debian.ovh");?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14051761295af468437ea078_66707471', 'css');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2978326615af468437ecfd7_66551608', 'js');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3219465455af468437f3a52_61877477', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'css'} */
class Block_14051761295af468437ea078_66707471 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'css' => 
  array (
    0 => 'Block_14051761295af468437ea078_66707471',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<link href="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/owl-carousel/assets/owl.carousel.min.css" rel="stylesheet">
		<link href="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/owl-carousel/assets/owl.theme.default.min.css" rel="stylesheet">
		<style type="text/css" media="screen">
			.grid .grid-item[visible='false'],
			.no-result{
			  display:none;
			}

			.results .grid-item[visible='true']{
			  display:table-row;
			}
		</style>
<?php
}
}
/* {/block 'css'} */
/* {block 'js'} */
class Block_2978326615af468437ecfd7_66551608 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_2978326615af468437ecfd7_66551608',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php echo '<script'; ?>
 src="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/isotope/jquery.isotope.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="/<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir_vendor');?>
/owl-carousel/owl.carousel.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript">
			var $container = $('.grid');
			var $filter = $('.filters');
			var filterButton = $('.filters .filter');
			$("img").one("load", function() {
				$('.grid').isotope({
				  itemSelector: '.grid-item',
				  percentPosition: true,
				  masonry: {
					// use outer width of grid-sizer for columnWidth
					columnWidth: '.grid-sizer'
				  }
				});
			}).each(function() {
				if(this.complete) $(this).load();
			});
			// Isotope Filter
			$filter.find('.filter').click(function () {
				var selector = $(this).attr('data-filter');
				$container.isotope({
				filter: selector,
				layoutMode: 'masonry',
				animationOptions: {
					duration: 750
				}});
				return false;
			});

			filterButton.on('click', function () {
				var $this = $(this);
				if (!$this.hasClass('active')) {
					filterButton.removeClass('active');
					$this.addClass('active');
				}
			});

			$(".search").keyup(function () {
				var searchTerm = $(".search").val();
				var listItem = $('.grid').children('.grid-item');
				var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

				$.extend($.expr[':'], {
					'containsi': function(elem, i, match, array){
						return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
					}
				});

				$(".grid-item").not(":containsi('" + searchSplit + "')").each(function(e){
					$(this).attr('visible','false');
				});

				$(".grid-item:containsi('" + searchSplit + "')").each(function(e){
					$(this).attr('visible','true');
				});

				var jobCount = $('.grid-item[visible="true"]').length;
				$('.counter').text(jobCount + ' publications');

				if(jobCount == '0') {
					$('.no-result').show();
				} else {
					$('.no-result').hide();
				}
			});

			$(".staffs").owlCarousel({
				margin:30,
				loop:true,
				dots:true,
				autoplay:true,
				autoplayTimeout:2000,
				autoplayHoverPause:false,
				responsive:{
					0:{items:1},
					750:{items:2},
					1170:{items:3}
				}
			});
		<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'js'} */
/* {block 'content'} */
class Block_3219465455af468437f3a52_61877477 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_3219465455af468437f3a52_61877477',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<!--<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo Panzer\View::Path('home');?>
"><span class="logo">FromScratch</span></a>
				</div>
			</div>
		</nav>-->

		<div class="bg-lightgrey">
			<div class="space20"></div>

			<div class="container">

				<div class="space10"></div>

				<div id="posts" class="row">
					<div class="col-md-12">

						<div class="row filters">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<div class="input">
											<input type="text" class="form-control btn-lg search" placeholder="Rechercher" aria-describedby="basic-addon2">
										</div>
									</div>
								</div>

								<div class="visible-lg space10"></div>

								<div class="row">
									<div class="col-lg-2">
										<a class="btn btn-inverse btn-box filter active">Tous (<?php echo count($_smarty_tpl->tpl_vars['posts']->value);?>
)</a>
									</div>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
									<div class="col-lg-2">
										<a href="#posts" class="btn btn-inverse btn-box filter" data-filter=".<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['title'];?>
 (<?php echo $_smarty_tpl->tpl_vars['category']->value['total_posts'];?>
)</a>
									</div>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</div>
							</div>
						</div>

						<div class="space20"></div>

						<div class="row">
							<div class="grid">
								<div class="col-sm-4 grid-sizer"></div>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
?>
								<div class="col-sm-4 grid-item <?php echo $_smarty_tpl->tpl_vars['post']->value['name_category'];?>
 card">
									<div class="card-content">
										<a href="<?php echo Panzer\View::Path('post-view',array('name'=>$_smarty_tpl->tpl_vars['post']->value['url']));?>
">
											<div class="item-img-wrap">
												<img src="<?php echo $_smarty_tpl->tpl_vars['post']->value['picture'];?>
" class="card-img-top img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
">
												<div class="item-img-overlay">
													<span></span>
												</div>
											</div>
										</a>
										<div class="card-block">
											<a href="<?php echo Panzer\View::Path('post-view',array('name'=>$_smarty_tpl->tpl_vars['post']->value['url']));?>
">
												<h4 class="card-title"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h4>
											</a>
											<div class="card-text">
												<?php echo $_smarty_tpl->tpl_vars['post']->value['description'];?>

											</div>
										</div>
											<div class="card-footer">
												<span>Le <?php echo strftime("%d/%m/%Y",$_smarty_tpl->tpl_vars['post']->value['date_published']);?>
 dans <?php echo $_smarty_tpl->tpl_vars['post']->value['title_category'];?>
</span>
												<span>par <?php echo $_smarty_tpl->tpl_vars['post']->value['author_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['post']->value['author_lastname'];?>
</span>
										</div>

									</div>
								</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg-lightgrey">
		<div class="space60"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="center-heading margin-btm-50">
							<h2>Rédacteurs</h2>
							<span class="border-width"></span>
						</div>
						<div class="owl-carousel staffs">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['staffs']->value, 'staff');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['staff']->value) {
?>
							<div class="item card">
								<div class="card-content">
									<img class="card-img-top" src="<?php echo $_smarty_tpl->tpl_vars['staff']->value['path_avatar'];?>
">
									<div class="card-block">
										<h4 class="card-title"><?php echo $_smarty_tpl->tpl_vars['staff']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['staff']->value['lastname'];?>
</h4>
										<div class="card-text">
											<?php echo $_smarty_tpl->tpl_vars['staff']->value['biography'];?>

										</div>
									</div>
									<div class="card-footer">
										<span><?php echo $_smarty_tpl->tpl_vars['staff']->value['nbposts'];?>
 Publication<?php if ($_smarty_tpl->tpl_vars['staff']->value['nbposts'] > 1) {?>s<?php }?></span>
									</div>
								</div>
							</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--<a href="https://paypal.me/lamas" class="btn btn-block btn-full-width">FAIRE UN DONS</a>-->
<?php
}
}
/* {/block 'content'} */
}
