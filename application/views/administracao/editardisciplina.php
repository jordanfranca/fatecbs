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
              <div class="panel-title"> <i class="glyphicons glyphicons-circle_plus"></i> Adicionar nova disciplina</div>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/administracao/editdisciplina/<?php echo $obj->cd_disciplina ?>">
                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Código: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="codigo" value="<?php echo $obj->ds_codigo; ?>" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Sigla: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="sigla" value="<?php echo $obj->sgl_disciplina; ?>" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Título: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="titulo" value="<?php echo $obj->nm_disciplina; ?>" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Ementa: </label>
                    <div class="col-lg-10">
                      <textarea class="ckeditor editor1" id="editor1" name="ementa" rows="14"><?php echo $obj->ds_ementa; ?></textarea>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Obj.: </label>
                    <div class="col-lg-10">
                      <textarea class="ckeditor editor1" id="editor1" name="objetivo" rows="14"><?php echo $obj->ds_objetivos; ?></textarea>
                    </div>
                </div>

                 <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Ciclo </label>
                    <div class="col-lg-10">
                      <select class="form-control" id="standard-list1" name="ciclo">
                        <?php for ($i=1; $i <= 6 ; $i++) { 
                          ?>
                          <option value="<?php echo $i; ?>" <?php if($obj->ds_ciclo == $i) echo 'selected'; ?>><?php echo $i; ?>º</option>
                          <?php
                        } ?>
                      </select>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Curso: </label>
                  <div class="col-lg-10">
                    <select class="form-control" id="standard-list1" name="curso">
                      <?php foreach ($objCursos as $objCurso) {
                        ?>
                        <option value="<?php echo $objCurso->cd_curso; ?>" <?php if($obj->cd_curso == $objCurso->cd_curso) echo 'selected'; ?>><?php echo $objCurso->nm_curso; ?></option>
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