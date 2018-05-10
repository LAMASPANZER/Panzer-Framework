{assign title "Publications de "|cat:$author.firstname|cat:" "|cat:$author.lastname|cat:" - FromScratch"}
{extends file='layout.admin.tpl'}
{block content}
	<div class="templatemo-content">

		<ol class="breadcrumb">
			<li><a href="{View::Path('admin-dashboard')}">Tableau de bord</a></li>
			<li class="active">Profil de {$author.firstname} {$author.lastname}</li>
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
											<img width="96px" height="96px" src="{$author.path_avatar}" class="img-circle">
										</div>
										<div class="media-body media-middle">
											<h2 class="media-heading">{$author.firstname} {$author.lastname} </h2>
											<p>{$author.biography}</p>
										</div>
									</div>
						   </td>

						   <td class="col-sm-5 stats">
							   <div class="col-xs-4">
								   <h2><strong>{$posts|count}</strong></h2>
								   <p><small>Publications</small></p>
							   </div>
							   <div class="col-xs-4">
								   <h2><strong>{$countpostspublishedbyauthor}</strong></h2>
								   <p><small>Publiés</small></p>

							   </div>
							   <div class="col-xs-4">
								   <h2><strong>{$countpostsnotfinishedbyauthor}</strong></h2>
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
{foreach from=$posts item=post}
						<tr {if !$post.finished} class="warning"{/if}>
							<td>
								{$post.title}
							</td>
							<td>
								{$post.title_category}
							</td>
							<td>{strftime("%d/%m/%Y", $post.date_added)}</td>
							<td>
{if $post.published}
								<i data-toggle="tooltip" data-placement="top" data-original-title="Publié" class="fa fa-2x fa-fw fa-eye"></i>
{else}
								<i data-toggle="tooltip" data-placement="top" data-original-title="Non publié" class="fa fa-2x fa-fw fa-eye-slash"></i>
{/if}
							</td>
							<td>
								<div class="btn-group btn-sm">
									<a href="{View::Path('post-view', ['name'=>$post.url])}" class="btn btn-default btn-sm"><i class="fa fa-fw s fa-search"></i> Voir</a>
{if $auth->IsSuperAdmin() || (!$auth->IsRestricted() && $auth->IsOwner($author.id))}
									<a href="{View::Path('admin-post-edit', ['id'=>$post.id])}" class="btn btn-default btn-sm"><i class="fa fa-fw fa-pencil"></i> Editer</a>
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
{/block}
