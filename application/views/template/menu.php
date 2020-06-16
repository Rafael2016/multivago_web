<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?=base_url()?>home">Multívago  <i class="fas fa-suitcase-rolling"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto" id="containner-menu">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cadastro <i class="fas fa-plus"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=base_url().'cadTrip'?>"><i class="fas fa-suitcase"></i> Viagem</a>
          <a class="dropdown-item" href="<?=base_url().'cadParticipante'?>"><i class="fas fa-users"></i> Participante</a>
          <a class="dropdown-item" href="<?=base_url().'CCadUsuario'?>"><i class="fas fa-user-plus"></i> Usuário</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Relatório <i class="fas fa-chart-bar"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="fas fa-dollar-sign"></i> Pagamentos</a>
          <a class="dropdown-item" href="#"><i class="fas fa-chart-pie"></i> Analitíco</a>
        </div>
      </li>
    </ul>
    <ul class="text-right right-icone-menu">
      <a href="#" style="color:#FFFFFF !important;">
        <i class="fas fa-user-alt"></i>
        <?=$this->session->userdata('usuario')?>
      </a>
    </ul>
    <ul class="text-right right-icone-menu">
      <a class="nav-link dropdown-toggle" href="<?=base_url().'logoff'?>" style="color:#FFFFFF !important;">
        <i class="fas fa-sign-out-alt"></i>
        Logoff
      </a>
    </ul>
  </div>
</nav>