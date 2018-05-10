{assign title "Edition de la publication n°"|cat:$post.id|cat:' :: FromScratch'}
{extends file='layout.admin.tpl'}
{block css}
		<link href="/{#dir_vendor#}/highlightjs/css/default.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
{/block}
{block js}
		<script src="/{#dir_vendor#}/highlightjs/js/highlight.min.js"></script>
		<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
		<script type="text/javascript">
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
		</script>

{/block}
{block content}
	<div class="templatemo-content">

		<ol class="breadcrumb">
			<li><a href="{View::Path('admin-dashboard')}">Tableau de bord</a></li>
			<li><a href="{View::Path('admin-posts-view')}">Publications</a></li>
			<li class="active">{$post.title}</li>
		</ol>

		<form method="POST" role="form">

			<div class="row">
				<div class="col-md-7 margin-bottom-15">
					<label for="title" class="control-label">Titre</label>
					<input name="title" type="text" class="form-control" value="{$post.title}">
				</div>

				<div class="col-md-5 margin-bottom-15">
					<label for="title" class="control-label">Banniere</label>
					<input name="title" type="text" class="form-control" value="{$post.path_banner_picture}">
				</div>
			</div>

			<div class="row">
				<div class="col-md-7 margin-bottom-15">
					<label for="url" class="control-label">URL</label>
					<input name="url" type="text" class="form-control" value="{$post.url}">
				</div>
				<div class="col-md-5 margin-bottom-15">
					<label for="singleSelect">Catégorie</label>
					<select name="category" class="form-control" id="singleSelect">
					{$categories|print_r}
{foreach from=$categories item=category}
						<option value="{$category.id}" {if $category.id==$post.id_category}selected{/if}>{$category.title}</option>
{/foreach}
					</select>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5 margin-bottom-15">
					<label for="picture" class="control-label">Image principal</label>
					<input name="picture" type="text" class="form-control" value="{$post.picture}">
				</div>

				<div class="col-md-7 margin-bottom-15">
					<label for="keywords" class="control-label">Mots clés</label>
					<input name="keywords" type="text" class="form-control" value="{$post.keywords}">
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 margin-bottom-15">
					<label for="description" class="control-label">Description</label>
					<textarea name="description" class="form-control" rows="3">{$post.description}</textarea>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 margin-bottom-15">

					<label class="checkbox-inline">
						<input data-style="col-md-6" type="checkbox" {if $post.published}checked{/if} data-on="Publié" data-off="Non publié" data-toggle="toggle"  data-onstyle="success" data-offstyle="warning">
					</label>
					<label class="checkbox-inline">
						<input class="col-md-6"  type="checkbox" {if $post.finished}checked{/if} data-on="Terminé" data-off="En cours" data-toggle="toggle"  data-onstyle="success" data-offstyle="warning">
					</label>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<textarea name="content" class="form-control" rows="3" id="content">{$post.content}</textarea>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 text-center margin-bottom-15">
					<input type="submit" class="col-xs-12 btn btn-success" onclick="needToConfirm = false;" value="Enregistrer"/>
				</div>
			</div>
		</form>

		<!--<a id="delete-post" class="btn btn-link text-center" data-href="{View::Path('admin-post-delete', ['id'=> $post.id])}">Supprimer cette publication</a>-->
	</div>
{/block}
