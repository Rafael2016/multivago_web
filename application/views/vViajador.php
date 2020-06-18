<body>

    <div class="containner" style="margin-top: 2%">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                       <i class="fas fa-hiking"></i> Adicionar Viajador
                   </div>
                   <div class="card-body">
                    <form id="frm-addViajador">
                        <input type="hidden" name="codViajador" id="codViajador">
                        <div class="form-group">
                            <label for="saida">Viajador(a):</label>
                            <input class="form-control" type="text" name="viajador" id="viajador">
                        </div>
                        <div class="form-group">
                            <label for="rg">RG</label>
                            <input class="form-control" type="text" name="di" id="di">
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone:</label>
                            <input class="form-control" type="text" name="telefone" id="telefone">
                        </div>
                        <div class="form-group">
                            <label for="numParcipante">E-mail:</label>
                            <input class="form-control" type="text" name="email" id="email">
                        </div>
                       <div class="input-group">
                        <input type="submit" id="btn-submit" value="Adicionar(+)" class="btn btn-primary btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <i class="fas fa-list"></i> Registros
           </div>
           <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm" id="listagem">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Viajador</th>
                            <th>RG</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
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