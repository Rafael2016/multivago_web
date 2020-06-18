<body>

    <div class="containner" style="margin-top: 2%">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                       <i class="fas fa-map-marked-alt"></i> Adicionar Trip(Viagem)
                    </div>
                    <div class="card-body">
                        <form id="frm-addTrip">
                            <input type="hidden" name="codTrip" id="codTrip">
                             <div class="form-group">
                                <label for="cidade">Descrição:</label>
                                <input class="form-control" name="descricao" id="descricao" >
                            </div>
                            <div class="form-group" id="div_uf">
                                <label for="uf">UF:</label>
                                <select class="form-control" id="uf" name="uf">
                                    <option value="0">Escolher Estado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cidade">Cidade:</label>
                                <input class="form-control" list="cidades" name="cidade" id="cidade" readonly="true">
                                <datalist id="cidades">

                                </datalist>
                            </div>
                            <div class="form-group">
                                <label for="saida">Saída:</label>
                                <input class="form-control" type="date" name="saida" id="saida" required>
                            </div>
                            <div class="form-group">
                                <label for="retorno">Retorno:</label>
                                <input class="form-control" type="date" name="retorno" id="retorno" required>
                            </div>
                            <div class="form-group">
                                <label for="numParcipante">Nº Viajantes</label>
                                <input class="form-control" type="number" name="viajantes" id="viajantes" min="5" max="100">
                            </div>
                            <span>
                                <i class="fas fa-comments-dollar"></i>Custos
                            </span>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-house-user"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="hospedagem" id="hospedagem"
                                placeholder="Custo da hospedagem" title="Custo da hospedagem,usar o ponto para separa os centavos">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-bus-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="logistica" id="logistica" 
                                placeholder="Custo da logística" title="Custo da logística,usar o ponto para separa os centavos">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-hand-holding-usd"></i> 
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="vlrParticipante" id="vlrParticipante"
                                placeholder="Rateio por Participante" title="Rateio por Participante" readonly="true">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-hand-holding-usd"></i>
                                        <i class="fas fa-users"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="vlrTotal" id="vlrTotal"
                                placeholder="Valor Total" title="Valor Total" readonly="true">
                            </div>
                            <div class="input-group">
                                <input type="submit" value="Adicionar(+)" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                       Listagem
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-sm" id="listagem">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descrição</th>
                                    <th>UF</th>
                                    <th>Cidade</th>
                                    <th>Saída</th>
                                    <th>Retorno</th>
                                    <th>Viajantes</th>
                                    <th><span class="fas fa-donate">Hospedagem</span></th>
                                    <th><span class="fas fa-donate">Lógistica</span></th>
                                    <th>Moderador</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>