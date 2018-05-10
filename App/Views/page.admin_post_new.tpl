{assign title "Nouvelle publication - FromScratch"}
{extends file='layout.admin.tpl'}
{block css}
		<link href="/{$dir_theme}/{#dir_vendor#}/highlightjs/css/default.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
{/block}
{block js}
		<script src="/{$dir_theme}/{#dir_vendor#}/highlightjs/js/highlight.min.js"></script>
		<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
		<script type="text/javascript">
			var simplemde = new SimpleMDE({
				spellChecker: false,
				renderingConfig: {
					singleLineBreaks: false,
					codeSyntaxHighlighting: true,}
			});

			var needToConfirm = true; //Defaut value

			window.onbeforeunload = confirmExit;
			function confirmExit(){
				if (needToConfirm) return '';
			}
		</script>
{/block}
{block content}
	<div class="templatemo-content">


	</div>
{/block}
