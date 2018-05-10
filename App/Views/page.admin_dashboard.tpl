{assign title "Tableau de bord - FromScratch"}
{extends file='layout.admin.tpl'}
{block content}
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
										<div class="huge">{$postspublished}</div>
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
										<div class="huge">{$authors}</div>
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
{foreach from=$getlastpostspublished item=post}
									<tr{if !$post.finished} class="warning"{/if}>
										<td style="max-width: 400px;">{$post.title}</td>
										<td>{$post.title_category}</td>
										<td>{if $auth->IsOwner($post.author_id)}<em>Vous</em>{else}{$post.author_firstname} {$post.author_lastname}{/if}</td>
										<td>
											<div class="btn-group btn-xs">
												<a href="{View::Path('post-view', ['name'=>$post.url])}" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-search"></i> Voir</a>
{if $auth->IsSuperAdmin() || (!$auth->IsRestricted() && $auth->IsOwner($post.author_id))}
												<a class="btn btn-xs btn-default" href="{View::Path('admin-post-edit', ['id'=>$post.id])}"><i class="fa fa-pencil"></i></a>
{/if}
											</div>
										</td>
									</tr>
{/foreach}
								</tbody>
							</table>
						</div>
					</div>

					<div class="col-md-6">
						<div class="panel panel-info">
							<div class="panel-heading"><i class="fa fa-pencil" aria-hidden="true"></i> Récemment éditée</div>
							<table class="table table-hover">
								<tbody>
{foreach from=$getgastpostsedited item=post}
									<tr>
										<td>{$post.title}</td>
										<td>{$post.title_category}</td>
										<td>{strftime("%d/%m/%Y", $post.date_edited)}</td>
										<td>
											<div class="btn-group">

{if $auth->IsSuperAdmin() || (!$auth->IsRestricted() && $auth->IsOwner($post.author_id))}
													<a href="{View::Path('admin-post-edit', ['id'=>$post.id])}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Editer</a>
{/if}
													<a href="{View::Path('post-view', ['name'=>$post.url])}" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-search"></i> {if !$auth->IsSuperAdmin() && ($auth->IsRestricted() || !$auth->IsOwner($post.author_id))}Voir{/if}</a>
											</div>
										</td>
									</tr>
{/foreach}
								</tbody>
							</table>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-warning">
						<div class="panel-heading"><i class="fa fa-coffee" aria-hidden="true"></i> En cours ({$getlastpostsnotfinished|count})</div>
							<table class="table table-hover">
								<tbody>
{foreach from=$getlastpostsnotfinished item=post}
									<tr>
										<td>{$post.title}</td>
										<td>{$post.title_category}</td>
										<td>{if $auth->IsOwner($post.author_id)}<em>Vous</em>{else}{$post.author_firstname} {$post.author_lastname}{/if}</td>
										<td>
											<div class="btn-group">
												<a href="{View::Path('post-view', ['name'=>$post.url])}" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-search"></i> Voir</a>
{if $auth->IsSuperAdmin() || (!$auth->IsRestricted() && $auth->IsOwner($post.author_id))}
												<a href="{View::Path('admin-post-edit', ['id'=>$post.id])}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Editer</a>
{/if}
											</div>
										</td>
									</tr>
{/foreach}
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
{/block}
