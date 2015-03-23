<body>
  <?php $this->load->view('administracao/header-brand'); ?>
  <!-- Fim Header --> 
  <!-- Conteudo -->
  <div id="main"> 
  <?php $this->load->view('administracao/menu'); ?>
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#" target="_blank" class="active">Fatec</a></li>
        <li>Painel</li>
      </ol>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title"> <i class="glyphicons glyphicons-circle_plus"></i> Adicionar novo professor</div>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/administracao/addprofessor">
                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">R.M.: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="rm" value="" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Nome: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="nome" value="" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">E-mail pessoal: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="emailpessoal" value="" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">E-mail corporativo: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="emailcorporativo" value="" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">CPF: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="cpf" value="" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">LATTES: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="lattes" value="" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Ativo?: </label>
                  <div class="col-lg-10">
                    <select class="form-control" id="standard-list1" name="ativo">
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                  </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Contrato</label>
                    <div class="col-lg-10">
                      <select class="form-control" id="standard-list1" name="contrato">
                        <option value="Concursado">Concursado</option>
                        <option value="Determinado">Determinado</option>
                        <option value="Emergencial">Emergencial</option>
                      </select>
                    </div>
                </div>

                <!-- Salvar -->
                <div class="form-group">
                  <div class="col-md-12 text-right enviando">
                      <input class="submit btn btn-blue" type="submit" value="Salvar">
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- Fim conteudo --> 