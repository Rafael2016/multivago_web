$(function(){


	$(document).ready(function(){

		$.get(HTTP_HOST+'embarca/load', function(response){

			var obJSon       = JSON.parse(response);
			var dados        = obJSon.data;
			var viajadores   = dados.viajantes;
			var trips        = dados.trips;
			var optionT      = '';
			var optionV      = '';

			viajadores.forEach( function(el,i) {
				
				optionV += `<option value="`+el.codViajador+`">`+el.viajador+`</option>`;

			});

			trips.forEach( function(el,i) {
				
				optionT += `<option value="`+el.codTrip+`">`+el.descricao+`</option>`;
			});

			$('#viajador').append(optionV);
			$('#trip').append(optionT);


			new HDataTable('listagem', { 
				dataset : obJSon.data.embarcados,
				removerBotao: [ 'copy'],
				btnAction    : ['codEmbarcado'] 
			});
		});

	});

	/**
	 * ADD E EDIT 
	 */
	$(document).on('submit', '#frm-addEmbarca', function(e) {
		
		e.preventDefault();

		const dados = $('#frm-addEmbarca').serialize();

		$.ajax({

			url:HTTP_HOST+'embarca/add', 
			method:"POST",
			data:dados,
			success:function(response){

				var obJson = JSON.parse(response);			

				if(obJson.success == true && obJson.type == 'success'){

					$('#frm-addEmbarca')[0].reset();

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

	 	var codEmbarcado = parseInt(this.getAttribute("data-id"));

	 	$.ajax({

	 		url:HTTP_HOST+'embarca/get', 
	 		method:"POST",
	 		data:{codEmbarcado: codEmbarcado},
	 		success:function(response){

	 			var obJson = JSON.parse(response);
	 			var dados  = obJson.data; 
	 			console.log(dados);
	 			if(obJson.success == true && obJson.type == 'success'){

	 				dados.forEach( function(el,i) {

	 					$("#codEmbarcado").val(el.codEmbarcado	);
	 					$('#viajador').val(el.codViajador).prop('selected', true);
	 					$('#trip').val(el.codTrip).prop('selected', true);
	 					$('input:radio[name=pagamento][value='+el.pagamento+']').attr('checked', true);
	 					$('input:radio[name=frmPtgo][value='+el.frmPtgo+']').attr('checked', true);
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

	 	var codEmbarcado = parseInt(this.getAttribute("data-id"));

	 	$.ajax({

	 		url:HTTP_HOST+'viajador/delete', 
	 		method:"POST",
	 		data:{codEmbarcado: codEmbarcado},
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