/* Credit: http://www.templatemo.com */

$(document).ready( function() {


	    $('a[data-confirm]').click(function(ev) {
	        var href = $(this).attr('data-href');

	        if (!$('#dataConfirmModal').length) {
	            $('body').append('<div id="dataConfirmModal" class="modal fade" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Confirmer</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Non</button><a class="btn btn-danger" id="dataConfirmOK">Oui</a></div></div></div></div>');
	        }
	        $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
	        $('#dataConfirmOK').attr('href', href);
	        $('#dataConfirmModal').modal({show:true});

	        return false;
	    });


    $('[data-toggle="tooltip"]').tooltip();

	$('.templatemo-sidebar-menu li.sub a').click(function(){
		if($(this).parent().hasClass('open')) {
			$(this).parent().removeClass('open');
		} else {
			$(this).parent().addClass('open');
		}
	});

	$("#delete-post").click(function(){
		$.ajax({
			url: $(this).attr('data-href'),
			type: "DELETE",
			success:function(result){
			alert(result);
			}
		});
	});

}); // document.ready
