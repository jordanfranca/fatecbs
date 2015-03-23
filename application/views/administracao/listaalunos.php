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
              <div class="panel-title"> <i class="fa fa-table"></i>  Lista de Alunos </div>
            </div>
            <div class="panel-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>R.A.</th>
                    <th>Nome</th>
                    <th>Curso</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($alunos as $aluno) { ?>
                    <tr>
                      <th><?php echo $aluno->cd_aluno; ?></th>
                      <th><?php echo $aluno->ds_ra; ?></th>
                      <th><?php echo $aluno->ds_nome; ?></th>
                      <th><?php echo $aluno->nm_curso; ?></th>
                      <th><a href="/administracao/editaraluno/<?php echo $aluno->cd_aluno; ?>">Editar</a></th>
                      <th><a href="/administracao/excluiraluno/<?php echo $aluno->cd_aluno; ?>">Excluir</a></th>
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