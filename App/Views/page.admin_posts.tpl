{assign title "Publications - FromScratch"}
{extends file='layout.admin.tpl'}
{block css}
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
{/block}
{block js}
		<script type="text/javascript">
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
		</script>
{/block}
{block content}
			<div class="templatemo-content">
				<ol class="breadcrumb">
					<li><a href="{View::Path('admin-dashboard')}">Tableau de bord</a></li>
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
										<img src="{$post.author_avatar}" width="32">
									</td>
									<td>
{if $auth->IsOwner($post.author_id)}
										<em>Vous</em>
{else}
										{$post.author_firstname} {$post.author_lastname}
{/if}
									</td>
									<td>
{if $post.published}
										<i data-toggle="tooltip" data-placement="top" data-original-title="Publié" class="fa fa-2x fa-fw fa-eye"></i>
{else}
										<i data-toggle="tooltip" data-placement="top" data-original-title="Non publié" class="fa fa-2x fa-fw fa-eye-slash"></i>
{/if}
									</td>
									<td>
										<div class="btn-group btn-xs">
											<a href="{View::Path('post-view', ['name'=>$post.url])}" class="btn btn-default btn-xs"><i class="fa fa-fw s fa-search"></i> Voir </a>
{if $auth->IsSuperAdmin() || (!$auth->IsRestricted() && $auth->IsOwner($post.author_id))}
											<a href="{View::Path('admin-post-edit', ['id'=>$post.id])}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-pencil"></i> Editer</a>
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
