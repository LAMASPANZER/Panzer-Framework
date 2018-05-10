{assign title "Catégories - FromScratch"}
{extends file='layout.admin.tpl'}
{block js}
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		<script>
			$.validate({
			  scrollToTopOnError: false
			});

			//$("#delete-category").click(function(){

			//	$.ajax({
			//	   url : '{View::Path('admin-category-delete', ['id'=>$categorie.id])}',
			//	   type : 'POST'
			//	});

			//});
$( document ).ready( function( )
{
    $( '.delete' ).bootstrap_confirm_delete( );
} );
		</script>
		<script src="/theme/vendor/bootstrap-confirm-delete/bootstrap-confirm-delete.js"></script>
{/block}
{block content}
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="{View::Path('admin-dashboard')}">Tableau de bord</a></li>
			<li class="active">Catégories</li>
		</ol>
		<div class="panel panel-success">
			<div class="panel-heading"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter une catégorie</div>
			<div class="panel-body">
				<form method="POST" role="form">
					<div class="row">

{nocache}{if isset($error)}
						<div class="col-xs-12">
							<div class="alert alert-{if $error}danger{else}success{/if}" role="alert">
{if !$error}
								La catégorie a bien été ajoutée !
{else}
								<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								Une erreur est survenue !
{/if}
				  				<span class="sr-only">Error:</span>
							</div>
						</div>
{/if}{/nocache}
						<div class="col-xs-7">
							<div class="form-group">
								<input data-validation-error-msg="3 Caratères minimun" data-validation-length="min3" data-validation="length" name="title" type="text" class="form-control" placeholder="Nom">
							</div>
						</div>

						<div class="col-xs-5">
							<div class="form-group">
								<input data-validation-error-msg="Formatage invalide" data-validation="custom" data-validation-regexp="^[a-z0-9][a-z0-9-]*[a-z0-9]$" name="name" type="text" class="form-control" placeholder="URL (ex: ">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<input type="hidden" name="csrf" value="{$auth->GetToken()}">
								<input type="submit" class="col-xs-12 btn btn-success" value="Ajouter">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
					<table class="table table-striped">
						<thead>
							<tr>
							  <th>Nom</th>
							  <th>URL</th>
							  <th></th>
							</tr>
						</thead>
						<tbody>
{foreach from=$categories item=categorie}
							<tr>
								<td>{$categorie.title}</td>
								<td style="width: 120px;">{$categorie.name}</td>
								<td class="text-right">
									<div class="btn-group ">
										<a href="{View::Path('admin-category-edit', ['id'=>$categorie.id])}" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i> Editer</a>
										<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										  <span class="caret"></span>
										  <span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul class="dropdown-menu">
											<li><a href="{View::Path('admin-category-delete', ['id'=>$categorie.id])}" class="delete" data-type="post">Delete</a></li>
										</ul>
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

