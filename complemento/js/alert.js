confirmar = function(mensagem,url,sim,nao){
	swal({   
		title: mensagem,
		text: '',
		type: "warning",
		showCancelButton: true,
		confirmButtonText: sim,
		cancelButtonText: nao,
		confirmButtonColor: "#DD6B55",
		closeOnConfirm: false,
		allowOutsideClick : true 
	},
	function(isConfirm){
		if (isConfirm) {
	   		window.location.href = url;
	   	}
	});
}