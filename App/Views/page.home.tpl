{assign title "Debian.ovh"}
{extends file='layout.tpl'}
{block css}
		<link href="/{#dir_vendor#}/owl-carousel/assets/owl.carousel.min.css" rel="stylesheet">
		<link href="/{#dir_vendor#}/owl-carousel/assets/owl.theme.default.min.css" rel="stylesheet">
		<style type="text/css" media="screen">
			.grid .grid-item[visible='false'],
			.no-result{
			  display:none;
			}

			.results .grid-item[visible='true']{
			  display:table-row;
			}
		</style>
{/block}
{block js}
		<script src="/{#dir_vendor#}/isotope/jquery.isotope.min.js"></script>
		<script src="/{#dir_vendor#}/owl-carousel/owl.carousel.min.js"></script>
		<script type="text/javascript">
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
					0:{ldelim}items:1{rdelim},
					750:{ldelim}items:2{rdelim},
					1170:{ldelim}items:3{rdelim}
				}
			});
		</script>
{/block}
{block content}
		<!--<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="{View::Path('home')}"><span class="logo">FromScratch</span></a>
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
										<a class="btn btn-inverse btn-box filter active">Tous ({$posts|count})</a>
									</div>
		{foreach from=$categories item=category}
									<div class="col-lg-2">
										<a href="#posts" class="btn btn-inverse btn-box filter" data-filter=".{$category.name}">{$category.title} ({$category.total_posts})</a>
									</div>
		{/foreach}
								</div>
							</div>
						</div>

						<div class="space20"></div>

						<div class="row">
							<div class="grid">
								<div class="col-sm-4 grid-sizer"></div>
{foreach from=$posts item=post}
								<div class="col-sm-4 grid-item {$post.name_category} card">
									<div class="card-content">
										<a href="{View::Path('post-view', ['name'=>$post.url])}">
											<div class="item-img-wrap">
												<img src="{$post.picture}" class="card-img-top img-responsive" alt="{$post.title}">
												<div class="item-img-overlay">
													<span></span>
												</div>
											</div>
										</a>
										<div class="card-block">
											<a href="{View::Path('post-view', ['name'=>$post.url])}">
												<h4 class="card-title">{$post.title}</h4>
											</a>
											<div class="card-text">
												{$post.description}
											</div>
										</div>
											<div class="card-footer">
												<span>Le {strftime("%d/%m/%Y", $post.date_published)} dans {$post.title_category}</span>
												<span>par {$post.author_firstname} {$post.author_lastname}</span>
										</div>

									</div>
								</div>
{/foreach}
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
	{foreach from=$staffs item=staff}
							<div class="item card">
								<div class="card-content">
									<img class="card-img-top" src="{$staff.path_avatar}">
									<div class="card-block">
										<h4 class="card-title">{$staff.firstname} {$staff.lastname}</h4>
										<div class="card-text">
											{$staff.biography}
										</div>
									</div>
									<div class="card-footer">
										<span>{$staff.nbposts} Publication{if $staff.nbposts > 1}s{/if}</span>
									</div>
								</div>
							</div>
	{/foreach}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--<a href="https://paypal.me/lamas" class="btn btn-block btn-full-width">FAIRE UN DONS</a>-->
{/block}
