<body>

	<div class="wrapper fadeInDown">
		<div id="formContent">
		
			<div class="fadeIn first">

				<picture class="logo-img">
					<img src="<?=base_url()?>/public/midia/logo.png" id="icon" alt="Multívago" />
				</picture>
			</div>

			<!-- Login Form -->
			<form id="form-login">
				<input type="text" id="login" name="login" class="fadeIn second" placeholder="Login" required="required">
				<input type="password" id="senha" name="senha" class="fadeIn third"  placeholder="Senha	">
				<input type="submit" class="fadeIn fourth" value="Entrar" required="required">
			</form>

			<!-- Remind Passowrd -->
			<div id="formFooter">
			<button type="button" class="btn btn-info" id="addUsuario">Cadastrar(+)</button>
			</div>

		</div>
	</div>



</body>