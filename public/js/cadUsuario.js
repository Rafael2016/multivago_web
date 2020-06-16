$(function(){

	$(document).ready(function() {
		
		$('#containner-menu').css('display', 'none');
		$('.right-icone-menu').css('display', 'none');
		
	});

	$(document).on('submit', '#frm-addUsuario', function(e) {
		
		e.preventDefault();

		const dados = $('#frm-addUsuario').serialize();

		$.ajax({

	 		url:HTTP_HOST+'cadUsuario/criar', 
	 		method:"POST",
	 		data:dados,
	 		success:function(response){


	 			var obJson = JSON.parse(response);
	 			console.log(dados);

	 			if(obJson.sucess == true && obJson.type == 'success'){
	 				
	 			
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

		// $("#logSistema").css('display', 'block');
	});

	$('.back-login').click(function (e){ 

	 	window.location =  HTTP_HOST+'logoff';

	 });


});