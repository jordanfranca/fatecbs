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
              <div class="panel-title"> <i class="fa fa-table"></i>  Lista de Disciplinas </div>
            </div>
            <div class="panel-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Curso</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($disciplinas as $objDisciplina) { ?>
                    <tr>
                      <th><?php echo $objDisciplina->cd_disciplina; ?></th>
                      <th><?php echo $objDisciplina->ds_codigo; ?></th>
                      <th><?php echo $objDisciplina->nm_disciplina; ?></th>
                      <th><?php echo $objDisciplina->nm_curso; ?></th>
                      <th><a href="/administracao/editardisciplina/<?php echo $objDisciplina->cd_disciplina; ?>">Editar</a></th>
                      <th><a href="/administracao/excluirdisciplina/<?php echo $objDisciplina->cd_disciplina; ?>">Excluir</a></th>
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