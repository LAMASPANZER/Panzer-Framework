{assign title $post.title}
{assign description $post.description}
{assign author $post.author_firstname|cat:" "|cat:$post.author_lastname}
{assign picture $post.path_main_picture}
{assign url View::Path('post-view', ['name'=>$post.url], true)}
{assign keywords $post.keywords}
{extends file='layout.tpl'}
{block css}
		<link href="/{#dir_vendor#}/highlightjs/css/obsidian.css" rel="stylesheet">
		<link href="/{#dir_vendor#}/section-scroll/css/section-scroll.css" rel="stylesheet">
{/block}
{block js}
		<!--<script src="/{#dir_js#}/jquery.sticky.min.js"></script>-->
		<script src="/{#dir_vendor#}/highlightjs/js/highlight.min.js"></script>
		<script src="/{#dir_vendor#}/stellar/js/jquery.stellar.min.js"></script>
		<script src="/{#dir_vendor#}/section-scroll/js/jquery.section-scroll.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$.stellar({
					verticalOffset: 75,
				});
				$('pre code').each(function(i, block) {
					hljs.highlightBlock(block);
				});
				$('body').sectionScroll(); // Easy Peasy Lemon Squeezy
			})
		</script>
		<script id="dsq-count-scr" src="//panzer.disqus.com/count.js" async></script>
{/block}
{block content}
		<div class="header-post" data-stellar-background-ratio="2" style="background-image: url('{$post.path_banner_picture}');">
			<div class="container">
				<div class="header-content">
					<h1>{$post.title}</h1>
					<h4><span class="hidden-xs">Mis en ligne le </span><span class="visible-xs-inline"><i class="fa fa-calendar" aria-hidden="true"></i></span> {ucwords(strftime("%e %b %Y", $post.date_published))} {if $post.date_edited}<span class="hidden-xs">et mis à jour le {ucwords(strftime("%e %b %Y", $post.date_edited))}{/if}</span></span> par</span><span class="visible-xs-inline"></span> {$post.author_firstname} {$post.author_lastname} <a href="#disqus_thread" data-disqus-identifier="{$post.url}"></a></h4>

				</div>
			</div>
		</div>

		<!--<div class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<span><span class="hidden-xs">Publié le</span><span class="visible-xs-inline"><i class="fa fa-calendar" aria-hidden="true"></i></span> {ucwords(strftime("%e %b %Y", $post.date_published))} {if $post.date_edited}<span class="hidden-xs">et mis à jour le {ucwords(strftime("%e %b %Y", $post.date_edited))}{/if}</span></span>
						<span class="pull-right"><span class="hidden-xs">Rédigé par</span><span class="visible-xs-inline"></span> {$post.author_firstname} {$post.author_lastname} <img src="{$post.author_avatar}"></span>
					</div>
				</div>
			</div>
		</div>-->

		<div class="container">
{if !$post.published}
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
{/if}

			<div class="space20"></div>

			<div class="row">

				<div class=" col-md-12">
					<div class="post-content">
{$post.content}
					</div>
					<hr class="visible-sm visible-xs">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">

					<div class="sidebar-widget">
						<h3>Voir aussi</h3>
						<ul class="list-unstyled">
{foreach from=$randposts item=post}
							<li><a href="{View::Path('post-view', ['name'=>$post.url])}">{$post.title}</a></li>
{/foreach}
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
{if $post.published}
		<div class="space50"></div>
		<div class="container">
			<div class="row">
			  <div class="col-sm-12">
				<div id="disqus_thread"></div>
				<script>
					var disqus_config = function () {
					  this.page.identifier = "{$post.url}";
					};
					(function() {
					  var d = document, s = d.createElement('script');
					  s.src = 'https://panzer.disqus.com/embed.js';
					  s.setAttribute('data-timestamp', +new Date());
					  (d.head || d.body).appendChild(s);
					})();
				</script>
			  </div>
			</div>
		</div>
		<div class="space10"></div>
{/if}
{/block}
