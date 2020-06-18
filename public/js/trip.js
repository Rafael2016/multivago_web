$(function(){


	$(document).ready(function() {

		$('#cidade').prop('readonly', true);
		
		/**
		 *Load 
		 */
		 $.get(HTTP_HOST+'trip/load', function(response){

		 	const dados = JSON.parse(response);
		 	
		 	new HDataTable('listagem', { 
		 		dataset : dados.data,
		 		removerBotao: [ 'copy'],
		 		btnAction    : ['codTrip'] 
		 	});

		 });

		/**
		 * Ajax Busca UF API IBGE
		 */
		 $.get('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome', function(response){

		 	var elHtml = '';

		 	response.forEach( function(element, index) {

		 		elHtml += '<option value="'+element.id+'">'+element.nome+'</option>';

		 	});

		 	$('#uf').append(elHtml);
		 });

		});

	$(document).on('submit', '#frm-addTrip', function(e) {
		
		e.preventDefault();

		const dados = $('#frm-addTrip').serialize();

		$.ajax({

			url:HTTP_HOST+'trip/add', 
			method:"POST",
			data:dados,
			success:function(response){


				var obJson = JSON.parse(response);
				console.log(dados);

				if(obJson.success == true && obJson.type == 'success'){

					$('#frm-addTrip')[0].reset();

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

	/**
	 * @Function Excluir
	 */
	 $(document).on('click', '.btnExcluir', function () {

	 	var codTrip = parseInt(this.getAttribute("data-id")) ;

	 	$.ajax({

	 		url:HTTP_HOST+'trip/delete', 
	 		method:"POST",
	 		data:{codTrip: codTrip},
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

	 /**
	 * @Function Editar
	 */
	 $(document).on('click', '.btnEditar', function () {

	 	var codTrip = parseInt(this.getAttribute("data-id"));

	 	$.ajax({

	 		url:HTTP_HOST+'trip/get', 
	 		method:"POST",
	 		data:{codTrip: codTrip},
	 		success:function(response){

	 			var obJson = JSON.parse(response);
	 			var dados  = obJson.data; 

	 			if(obJson.success == true && obJson.type == 'success'){

		 			dados.forEach( function(el,i) {
		 				
		 				$("#codTrip").val(el.codTrip);
		 				$("#descricao").val(el.descricao);
		 				$('#uf').val(el.uf).prop('selected', true);
		 				$("#cidade").val(el.cidade);
		 				$("#saida").val(el.saida);
		 				$("#retorno").val(el.retorno);
		 				$("#viajantes").val(el.viajantes);
		 				$("#hospedagem").val(parseFloat(el.vlrHospedagem).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}));
		 				$("#logistica").val( parseFloat(el.vlrLogistica).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}));
		 				$('#cidade').prop('readonly', false);
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
	 * Ajax Busca Cidade por UF
	 */
	 $('#uf').on('change',  function(){

	 	var idUf = this.value;
	 	var url  = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/'+idUf+'/distritos';
	 	$('#cidade').prop('readonly', false);
	 	

	 	$.get(url, function(response){ 

	 		elHtml = '';

	 		response.forEach( function(element, index) {
	 			
	 			elHtml += '<option value="'+element.nome+'">';

	 		});

	 		$("#cidades").append(elHtml);
	 	});

	 });

	 /**
	  * INPUT HOSPEDAGEM FORMAT
	  */

	  $('#hospedagem').change(function(){

	  	var vlrHospedagem  = $('#hospedagem').val();
	  	var vlrHospedagemF = parseFloat(vlrHospedagem).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"});

	  	$('#hospedagem').val(vlrHospedagemF);

	  });

	  /**
	  * INPUT HOSPEDAGEM FORMAT
	  */

	  $('#logistica').change(function(){

	  	var vlrLogistica  = $('#logistica').val();
	  	var vlrLogisticaF = parseFloat(vlrLogistica).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"});

	  	$('#logistica').val(vlrLogisticaF);

	  	

	  });


	});