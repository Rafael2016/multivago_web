<body>

    <div class="containner" style="margin-top: 2%">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                      <i class="fas fa-user-check"></i> Embarca Viajante
                  </div>
                  <div class="card-body">
                    <form id="frm-addEmbarca">
                        <input type="hidden" name="codEmbarcado" id="codEmbarcado">
                        <div class="form-group">
                            <label for="viajador">Viajador(a)</label>
                            <select class="form-control" id="viajador" name="viajador">
                                <option value="0">Escolher</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="trip">Trip</label>
                            <select class="form-control" id="trip" name="trip">
                                <option value="0">Escolher</option>
                            </select>
                        </div>
                        <div class="alert alert-info role="alert">
                            <i class="fas fa-donate"></i> Pagamento
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" name="pagamento"class="form-check-input" value="sim">
                            Sim
                        </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" name="pagamento" class="form-check-input" value="não">
                        Não
                    </label>
                </div><br><br>
                 <div class="alert alert-info" role="alert">
                            <i class="fas fa-donate"></i> Formas Pagamentos
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" name="frmPtgo"class="form-check-input" value="dinheiro">
                            Dinheiro
                        </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" name="frmPtgo" class="form-check-input" value="transferência">
                        Transferência
                    </label>
                </div>
                <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" name="frmPtgo" class="form-check-input" value="boleto">
                        Boleto
                    </label>
                </div><br><br>
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
          <i class="fas fa-list"></i> Relatório
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm" id="listagem">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Viajante</th>
                        <th>RG</th>
                        <th><i class="fas fa-phone-volume"></i></th>
                        <th><i class="fas fa-map-signs"></i> Trip</th>
                        <th>Saida</th>
                        <th>Retorno</th>
                        <th>Pago</th>
                        <th><i class="fas fa-hand-holding-usd"></i></i></th>
                        <th>#<th>
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