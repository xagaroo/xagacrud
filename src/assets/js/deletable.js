var deletable = {

	initialize: function() {
		console.log("deletable module init");

		deletable.bindEvents();
	},

	bindEvents: function() {
		$('body').on('click', '.delete', deletable.deleteClick);
		$('body').on('click', '.doDelete', deletable.doDeleteClick);
	},

	deleteClick: function() {
		var url = $(this).attr('href');
		$('.modal').modal('toggle');
		$('.doDelete').attr('href', url);
		return false;
	},

	doDeleteClick: function() {
		var ref = $(this).attr('href');
		callData = {
			'_token' : $('meta[name="csrf-token"]').attr('content')
		};
		$.post(ref, callData, function(data) {
			$('.modal').modal('toggle');
			if (data.result) {
				$('[data-id='+data.id+']').remove();
				$('.modal-backdrop').remove();
			} else {
				if (data.reason) {
					alert(data.reason);	
				} else {
					alert("Se ha producido un error al eliminar");
				} 				
			}
		});
		return false;		
	},
}

if ($('.delete').length > 0) {
	deletable.initialize();
}