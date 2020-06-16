<body>

    <div class="containner" style="margin-top: 2%">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Cadastro de Participante
                    </div>
                    <div class="card-body">
                        <form id="frm-addUsuario">
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input class="form-control" type="text" name="nome" id="nome">
                            </div>
                            <div class="form-group">
                                <label for="login">Login:</label>
                                <input class="form-control" type="text" name="login" id="login" required>
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha:</label>
                                <input class="form-control" type="password" name="senha" id="senha" required>
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input class="form-control" type="text" name="email" id="email" required>
                            </div>
                            <div class="input-group">
                                <input type="submit" value="Adicionar(+)" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>