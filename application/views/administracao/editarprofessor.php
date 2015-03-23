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
              <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/administracao/editprofessor/<?php echo $objProfessor->cd_professor; ?>">
                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">R.M.: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="rm" value="<?php echo $objProfessor->ds_rm; ?>" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Nome: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="nome" value="<?php echo $objProfessor->nm_professor; ?>" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">E-mail pessoal: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="emailpessoal" value="<?php echo $objProfessor->ds_email_pessoal; ?>" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">E-mail corporativo: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="emailcorporativo" value="<?php echo $objProfessor->ds_email_corporativo; ?>" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">CPF: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="cpf" value="<?php echo $objProfessor->ds_cpf ?>" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">LATTES: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="lattes" value="<?php echo $objProfessor->ds_lattes; ?>" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Ativo?: </label>
                  <div class="col-lg-10">
                    <select class="form-control" id="standard-list1" name="ativo">
                        <option value="1" <?php if($objProfessor->ind_status == 1) echo 'seleted'; ?>>Sim</option>
                        <option value="0" <?php if($objProfessor->ind_status == 0) echo 'seleted'; ?>>Não</option>
                    </select>
                  </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Contrato</label>
                    <div class="col-lg-10">
                      <textarea class="ckeditor editor1" id="editor1" name="contrato" rows="14"><?php echo $objProfessor->ds_contrato; ?></textarea>
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