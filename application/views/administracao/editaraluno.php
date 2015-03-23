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
          <span></span>
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title"> <i class="glyphicons glyphicons-circle_plus"></i> Adicionar novo aluno</div>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/administracao/editaluno/<?php echo $objAluno->cd_aluno; ?>">
                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">R.A.: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="ra" value="<?php echo $objAluno->ds_ra; ?>" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Nome: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="nome" value="<?php echo $objAluno->ds_nome; ?>" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">E-mail pessoal: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="emailpessoal" value="<?php echo $objAluno->ds_email_pessoal; ?>" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">E-mail corporativo: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="emailcorporativo" value="<?php echo $objAluno->ds_email_corporativo; ?>" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">CPF: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="cpf" value="<?php echo $objAluno->ds_cpf; ?>" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Curso: </label>
                  <div class="col-lg-10">
                    <select class="form-control" id="standard-list1" name="curso">
                         <?php foreach ($objCursos as $objCurso) {
                            ?>
                            <option value="<?php echo $objCurso->cd_curso; ?>" <?php if($objCurso->cd_curso == $objAluno->cd_curso) echo 'selected' ?>><?php echo $objCurso->nm_curso; ?></option>
                            <?php
                          } ?>  
                        </select>
                      </div>
                    </div>

                <!-- Salvar -->
                <div class="form-group">
                  <div class="col-md-12 text-right enviando">
                      <input class="submit btn btn-blue" type="submit" value="Editar">
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