$(function(){


	$(document).ready(function(){


		$.get(HTTP_HOST+'viajador/load', function(response){

			const dados = JSON.parse(response);
			
			new HDataTable('listagem', { 
				dataset : dados.data,
				removerBotao: [ 'copy'],
				btnAction    : ['codViajador'] 
			});

		});

	});

	/**
	 * ADD E EDIT 
	 */
	$(document).on('submit', '#frm-addViajador', function(e) {
		
		e.preventDefault();

		const dados = $('#frm-addViajador').serialize();

		$.ajax({

			url:HTTP_HOST+'viajador/add', 
			method:"POST",
			data:dados,
			success:function(response){

				var obJson = JSON.parse(response);			

				if(obJson.success == true && obJson.type == 'success'){

					$('#frm-addViajador')[0].reset();

					alerta('success',obJson.message, function(){
						window.location.reload();
					});	

				}else if(obJson.success == false && obJson.type == 'warning') {

					alerta('warning',obJson.message);

				}else{

					alerta('error',obJson.message);

				}

			},

			error : function(e){

				alerta('error', e.responseText);
			}

		});

	});


	/**
	 * EDIT
	 */
	 $(document).on('click', '.btnEditar', function () {

	 	var codViajador = parseInt(this.getAttribute("data-id"));

	 	$.ajax({

	 		url:HTTP_HOST+'viajador/get', 
	 		method:"POST",
	 		data:{codViajador: codViajador},
	 		success:function(response){

	 			var obJson = JSON.parse(response);
	 			var dados  = obJson.data; 

	 			if(obJson.success == true && obJson.type == 'success'){

	 				dados.forEach( function(el,i) {

	 					$("#codViajador").val(el.codViajador);
	 					$("#viajador").val(el.viajador);
	 					$("#di").val(el.di);
	 					$("#telefone").val(el.telefone);
	 					$("#email").val(el.email);
	 					$("#btn-submit").prop('value', 'Salvar Alteração');

	 				});

	 			}else{

	 				alerta('error',obJson.message);

	 			}
	 		},

	 		error : function(e){

	 			alerta('error', e.responseText);
	 		}
	 	});
	 });


	 /**
	 * @Function Excluir
	 */
	 $(document).on('click', '.btnExcluir', function () {

	 	var codViajador = parseInt(this.getAttribute("data-id"));

	 	$.ajax({

	 		url:HTTP_HOST+'viajador/delete', 
	 		method:"POST",
	 		data:{codViajador: codViajador},
	 		success:function(response){


	 			var obJson = JSON.parse(response);
	 			
	 			if(obJson.success == true && obJson.type == 'success'){

	 				alerta('success',obJson.message, function(){
	 					window.location.reload();
	 				});	

	 			}else if (obJson.success == false && obJson.type == 'warning') {

	 				alerta('warning',obJson.message);

	 			}else{

	 				alerta('error',obJson.message);

	 			}

	 		},

	 		error : function(e){

	 			alerta('error', e.responseText);
	 		}

	 	});



	 });


	});