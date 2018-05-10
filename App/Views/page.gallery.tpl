{assign title "Galerie - FromScratch"}
{extends file='layout.tpl'}
{block css}
		<link href="/{$dir_theme}/{#dir_vendor#}/lightbox2/dist/css/lightbox.css" rel="stylesheet">
{/block}
{block js}
		<script src="/{$dir_theme}/{#dir_vendor#}/lightbox2/dist/js/lightbox.min.js" type="text/javascript"></script>
{/block}
{block content}
        <div class="page-breadcrumb hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Galerie</h4>
                    </div>
                    <div class="col-sm-6 text-right">
                        <ol class="breadcrumb">
                            <li><a href="/">Accueil</a></li>
                            <li>Galerie</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="space70"></div>

		<script type="text/javascript">
		var img = $("<img />").attr('src', '/{$dir_theme}/{#dir_images#}/g1.jpg')
		    .on('load', function() {
		        if (!this.complete || typeof this.naturalWidth == "undefined" || this.naturalWidth == 0) {
		            alert('broken image!');
		        } else {
		            $("#something").append(img);
		        }
		    });
		</script>
        <div class="container">
            <div class="row">
{foreach from=$pictures item=picture}
                <div class="col-sm-4 margin-btm-30">
                    <a href="{$picture.path}" data-lightbox="gallery">
                        <img src="{$picture.path}" data-title="{$picture.description}" class="img-responsive">
                    </a>
                </div>
{/foreach}
            </div>
            <hr>
            <div class="text-right">
                <nav>
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                            </a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
{/block}
