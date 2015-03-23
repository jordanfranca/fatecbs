<body>
  <?php $this->load->view('administracao/header-brand'); ?>
  <!-- Conteudo -->
  <div id="main"> 
  <?php $this->load->view('administracao/menu'); ?>
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
              <div class="panel-title"> <i class="fa fa-table"></i>  Lista de Cursos </div>
            </div>
            <div class="panel-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($objCursos as $objCurso) { ?>
                    <tr>
                      <th><?php echo $objCurso->cd_curso ?></th>
                      <th><?php echo $objCurso->nm_curso ?></th>
                      <th><a href="/administracao/editarcurso/<?php echo $objCurso->cd_curso ?>">Editar</a></th>
                      <th><a href="/administracao/excluircurso/<?php echo $objCurso->cd_curso ?>">Excluir</a></th>
                    </tr>
                    <?php } ?>                  
                </tbody>
              </table>
              <!-- Paginação -->
              <div class="paginacao">
                <?php echo $paginacao; ?>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </section>
  <!-- Fim conteudo --> 