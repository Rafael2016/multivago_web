class HDataTable {

	/**
	 * Gera DataTable
	 * @param {string} idElementoDestino: id html da tabela
	 * @param {objeto} [opcional] dataset: objeto normato {atributo: valor}
	 * @param {array} [opcional] ordemColuna: array com os nome dos atributos, irá estabelecer a ordem que aparece na tela
	 * @param {array} [opcional] removerBotao: array com os nome dos botões que devem ser removidos ['excel', 'pdf', 'copy']
	 * @param {objeto} [opcional] linhaPadrao: objeto {coluna: valorDefault} para quando a coluna no dataset estiver vazia
	 */
	constructor(idElementoDestino, {dataset, ordemColuna, removerBotao,btnAction, linhaPadrao} = {}) {
		/**
		 * ATRIBUTOS
		 */
		if(idElementoDestino.charAt(0) != '.' && idElementoDestino.charAt(0) != '#') {
			this.idElemento = '#'+idElementoDestino;
		}else {
			this.idElemento   = idElementoDestino;
		}
		this.dataset      = null;
		this.column       = null;
		this.ordemColuna  = ordemColuna;
		this.removerBotao = removerBotao;
		this.btnAction     = btnAction;
		this.linhaPadrao = linhaPadrao;

		if(dataset instanceof Array) {
   			this.dataset = this.prepareDataset(dataset);
			this.column = this.getColumn(this.dataset);
   		}else if (dataset instanceof Object) {
   			var tmpArr = [];
			var key = '';

			for(key in dataset) {
				tmpArr[tmpArr.length] = dataset[key]
			}
			this.dataset = this.prepareDataset(tmpArr);
			this.column = this.getColumn(this.dataset);
   		}

		/**
		 * ATRIBUTO PADRÃO
		 */
		var atributoPadrao = this.getAtributoPadrao();

		/**
		 * GERAR DATATABLE
		 */

		 if ($(this.idElemento).is('div')) {
		 	var htmlTable = "<table><thead><tr>";
		 	this.column.forEach(function(item){

		 		htmlTable += "<th>{0}</th>".format(item.data);
		 	});
		 	htmlTable += "</tr></thead><tbody></tbody></table>";
		 	$(this.idElemento).html(htmlTable).show();
		 	this.idElemento +=  " >table";
		 }

		if( $.fn.DataTable.isDataTable(this.idElemento) ) {
			var htmlAux = $(this.idElemento).html();
			$(this.idElemento).DataTable().clear().destroy();
			$(this.idElemento).html(htmlAux);
			htmlAux = '';
		}

		$(this.idElemento).DataTable(atributoPadrao);


   	}

   	prepareDataset(dataset) {


   		var rows = [];
   		var columns = [];
   		var rowPadrao = {};

   		/**
   		 *  Adicionado Botões Ações Editar Exlcuir
   		 */

   			if(typeof this.btnAction != 'undefined'){

   				for(var i=0; i< dataset.length; i++){

   					var auxBtn = this.getBtnAction(dataset[i]);
   					var btn    = {acoes:auxBtn};
   					Object.assign(dataset[i],btn);

   				}

   			}

   		/**
   		 * Determinar colunas
   		 */
   		dataset.forEach(function(obj){
   			rowPadrao = $.extend(rowPadrao, obj);
   		});

   		/**
   		 * Criar obj padrão
   		 */
		for(var key in rowPadrao ) {
			rowPadrao[key] = '';
		}
		
   		 if (typeof this.linhaPadrao != 'undefined') {
   		 	rowPadrao = $.extend(rowPadrao, this.linhaPadrao);
   		 }
   		 


		/**
		 * Criar obj incluindo atributos que não possui
		 */
   		dataset.forEach(function(obj) {
   			var aux = JSON.parse(JSON.stringify(rowPadrao));//Clonar objeto
   			aux = Object.assign(aux, obj);
   			var obj = $.extend(aux, obj);

   			rows.push(obj);
   		});

   		return rows;
   	}

   	getColumn(dataset) {

   		var objColuna = {};
   		var colunas = [];

   		/**
   		 * Criar objeto coluns
   		 */
   		dataset.forEach(function(obj){
   			objColuna = $.extend(objColuna, obj);
   		});


   		for(var nomeColuna in objColuna) {

			colunas.push({data: nomeColuna});
		}


		/**
		 * Ordenar coluna
		 */
		var ordemColuna = this.ordemColuna;
		if(ordemColuna instanceof Array) {
			var ordenados = [];
			var naoOrdenados = [];

			ordemColuna.forEach(function(key, idx) {
				var item = colunas.filter(obj => {
				  return obj.data === key
				});
				if(item != '') {
					ordenados.push(item[0]);
				}
			});

			colunas.forEach(function(obj) {
				if($.inArray(obj.data, ordemColuna) == -1) {
					naoOrdenados.push(obj);
				}
			});

			colunas = ordenados.concat(naoOrdenados);
		}

		return colunas;

   	}

   	getAtributoPadrao() {

   		var buttons = this.getButton();

   		var atributoPadrao = {
   			dom: "<'row'<'col-md-12'B>>" +
			"<'row'<'col-md-6 nRegistros'l><'col-md-6 pesquisar'f>>" +
			"<'row'<'col-md-12't>><'row'<'col-md-12'ip>>",
			buttons,
	        language: {
	            "paginate": {
	                  "previous": " Anterior ",
	                  "next"    : " Próximo "
	                    },
	            "emptyTable"    : "Sem registros",
	            "sSearch"       : "Pesquisar :",
	            "info"          : "_START_ a _END_  de _TOTAL_ Registros", 
	            "infoFiltered"  : "(Total de _MAX_ Registros )",
	            "zeroRecords"   : "Nenhum resultado encontrado",
	            "lengthMenu"    : "Mostrar _MENU_ por página",
	            "infoEmpty"     : "Sem registros",

	        },
	        iDisplayLength: 10,
	        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]]
   		};

   		if(this.dataset instanceof Array && this.dataset.length > 0) {
   			atributoPadrao.data = this.dataset;
   			atributoPadrao.columns = this.column;
   		}

   		return atributoPadrao;
   	}

   	getButton() {
   		var btnExcel = { extend: 'excel', text: '<i class="fas fa-file-excel"></i>'};
		var btnPdf = { extend: 'pdf', text: '<i class="fas fa-file-pdf"></i>', orientation:'landscape'};
		var btnCopy = { extend: 'copy', text: '<img src="<?= base_url(); ?>public/midias/icon_copy.png" title="Copiar tabela" style="width:15px; height:15px;"></img>'};
		var buttons = [];


   		if(this.removerBotao !== undefined && this.removerBotao.length > 0) {
   			if($.inArray('excel', this.removerBotao) == -1) {
				buttons.push(btnExcel);
			}
			if($.inArray('pdf', this.removerBotao) == -1) {
				buttons.push(btnPdf);
			}
			if($.inArray('copy', this.removerBotao) == -1) {
				buttons.push(btnCopy);
			}
   		}
   		else {
   			buttons = [btnExcel, btnPdf, btnCopy];
   		}

   		return buttons;
   	}

   	/**
   	 * @function Gera Button Editar e Excluir
   	 *
   	 */

   	 getBtnAction(obj){

   	 	for (var [key, value] of Object.entries(obj)){

   	 		if(key == this.btnAction){

		   	 	var btnAcoes  = `<button type="button" class="btn btn-danger btn-sm" id="btnExcluir" data-id="`+value+`">
		   	 					 <i class="fas fa-trash-alt"></i>
		   	 					 </button>
		   	 					 <button type="button" class="btn btn btn-info btn-sm" id="btnEditar" data-id="`+value+`">
		   	 					 <i class="fas fa-edit"></i>
		   	 					 </button>	

		   	 		`;

		   	 	return 	btnAcoes;
	   	 	}
   	 	}
   	}
}