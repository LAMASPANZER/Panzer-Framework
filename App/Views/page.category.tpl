{assign title $category.title|cat:" - FromScratch"}
{extends file='layout.tpl'}
{block content}
		<div class="page-breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-xs-6">
						<h4>{$category.title} ({$category.total_posts})</h4>
					</div>
					<div class="col-xs-6 text-right">
						<ol class="breadcrumb">
							<li>Categorie</a></li>
							<li>{$category.title}</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

		<div class="space50"></div>

		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
{counter assign=count}
{foreach from=$posts item=post}
{if $count%2 == 1}
						<div class="col-md-12">
							<div class="row row-posts">
{/if}
								<div class="col-md-6">
								    <div class="card">
								        <a href="{View::Path('post-view', ['name'=>$post.url])}">
								            <div class="item-img-wrap">
								                <img src="{$post.picture}" class="card-img-top img-responsive" alt="{$post.title}">
								                <div class="item-img-overlay">
								                    <span></span>
								                </div>
								            </div>
								        </a><!--work link-->
										<div class="card-block">
										    <h4 class="card-title">{$post.title}</h4>
										    <div class="card-text">
										        {$post.description}
										    </div>
										</div>
										<div class="card-footer">
											<span><i class="fa fa-calendar" aria-hidden="true"></i> Le {strftime("%e %b %Y", $post.date_published)}</span>
										    <span>par {$post.author_firstname} {$post.author_lastname}</span>
										</div>
								    </div><!--blog post-->
								</div><!--col 5-->
{if $count%2 != 1 or $category.total_posts <= 1}
							</div>
						</div>
{/if}
{counter}
{/foreach}
<!--{foreach from=$posts item=post}
						<div class="row">
							<div class="col-md-3">
								<a href="{View::Path('post-view', ['name'=>$post.url])}">
									<div class="item-img-wrap">
										<img width="100%" src="{$post.picture}" alt="{$post.title}">
										<div class="item-img-overlay">
											<span></span>
										</div>
									</div>
								</a>
							</div>
							<div class="col-md-8">
								<h4><a href="{View::Path('post-view', ['name'=>$post.url])}">{$post.title}</a></h4>
								<i class="fa fa-calendar" aria-hidden="true"></i> Le {strftime("%e %b %Y", $post.date_published)} par {$post.author_firstname} {$post.author_lastname}
								<p>{$post.description}</p>
							</div>
						</div>
{/foreach}-->
					</div>
				</div><!--col-->

				<div class="col-md-3 margin-btm-40">

					<div class="sidebar-widget">
						<h3>Voir aussi ..</h3>
						<ul class="list-unstyled">
{foreach from=$randposts item=post}
							<li><a href="{View::Path('post-view', ['name'=>$post.url])}">{$post.title}</a></li>
{/foreach}
						</ul>
					</div>

					<div class="sidebar-widget">
						<h3>Publicité</h3>
						<div style="width: 100%; height: 250px; background-color: ghostwhite;"></div>
					</div>

				</div>
			</div>
		</div>

		<div class="space60 hidden-xs"></div>

		</div><!--blog full main container-->
{/block}
