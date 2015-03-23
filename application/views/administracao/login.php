<body class="login-page">
<!-- Start: Main -->
<div id="main">
  <div class="container">
    <div class="row">
      <div id="page-logo"><center><img src="http://fatecrl.edu.br/site/assets/img/logo-fatec-bs.svg" alt="Logo Fatec Rubens Lara - Baixada Santista" ></center> </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Usuário e/ou senha incorretos, por favor, tente novamente!
          </div>
        </div>
      <div class="panel">
        <div class="panel-heading">
          <div class="panel-title"><i class="fa fa-lock"></i> Login para administração</div>
        </div>
        <form class="cmxform" id="altForm" method="POST" />
          <div class="panel-body">
            <div class="form-group">
              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                <input type="text" class="form-control phone" name="login" autocomplete="off" placeholder="Usuário" required />
              </div>
            </div>
            <div class="form-group">
              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key"></i> </span>
                <input type="password" class="form-control product" name="senha"  autocomplete="off" placeholder="Senha" required />
              </div>
            </div>
          </div>
          <div class="panel-footer">
            <div class="form-group margin-bottom-none">
              <input class="btn btn-primary pull-right" type="submit" value="Logar" />
              <div class="btn btn-primary pull-left"><a href="http://fatecrl.edu.br/" target="_blank">Voltar ao site</a></div>
              <div class="clearfix"></div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>