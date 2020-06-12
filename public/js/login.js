$(function(){

	/**
	 * LOAD VIEW
	 */
	 $(document).ready(function() {

	 	console.log('Login.js');
	 });

	/**
	 * ADD USUÁRIO
	 */

	 $('#addUsuario').click(function (e){ 

	 	window.location =  HTTP_HOST+'cadUsuario';

	 });

	/**
	 * SUBMIT FORMULÁRIO
	 */
	 $('#form-login').submit(function(e) {
	 	
	 	e.preventDefault();

	 	const dados = $('#form-login').serialize();

	 	$.ajax({

	 		url:HTTP_HOST+'logar', 
	 		method:"POST",
	 		data:dados,
	 		success:function(response){


	 			var obJson = JSON.parse(response);
	 			console.log(dados);

	 			if(obJson.sucess == true){
	 				
					window.location = HTTP_HOST+'home';	

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

})