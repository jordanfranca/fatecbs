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
              <div class="panel-title"> <i class="glyphicons glyphicons-circle_plus"></i> Adicionar novo Curso</div>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/administracao/addcurso">

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Sigla: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="sigla" value="" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Título do Curso: </label>
                    <div class="col-lg-10">
                      <input type="text" id="inputStandard" name="titulo" value="" class="form-control" placeholder="" required>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Descrição: </label>
                    <div class="col-lg-10">
                      <textarea class="ckeditor editor1" id="editor1" name="descricao" rows="14"></textarea>
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