$(function(){


	$(document).ready(function() {


		/**
		 *Load 
		 */
		 $.get(HTTP_HOST+'load', function(response){

		 	const dados = JSON.parse(response);
		 	
		 	new HDataTable('listagem', { 
		 		dataset : dados.data,
		 		removerBotao: [ 'copy'],
		 		 btnAction    : ['codViagem'] 
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

			url:HTTP_HOST+'cadTrip/salvar', 
			method:"POST",
			data:dados,
			success:function(response){


				var obJson = JSON.parse(response);
				console.log(dados);

				if(obJson.sucess == true && obJson.type == 'success'){

					$('#frm-addTrip')[0].reset();

					alerta('success',obJson.message, function(){
						window.location.reload();
					});	

				}else if (obJson.sucess == false && obJson.type == 'warning') {

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