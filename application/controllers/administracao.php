<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controlador da administração da fatec
*
*/
class Administracao extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //Helpers
        $this->load->helper('url');

        //Banco de Dados
        $this->load->database();

        //Bibliotecas
        $this->load->library('form_validation');
      	$this->load->library('pagination');
		
    }
	/**
	 * Função principal da administração Fatec
	 *
	 */
	public function index() {
		
		self::header();
		$this->load->view('administracao/login');
		self::footer();
	}
	
	/**
	* Painel de Administração
	*
	*/
	public function painel() {
		self::header();
		$this->load->view('administracao/painel');
		self::footer();
	}

	//Alunos

	/**
	* Adicionar Novo aluno View
	*
	*/
	public function adicionaraluno() {
		/* Carrega o modelo */
		$this->load->model('cursos_model');

		// Maximo de Cursos
		$intMax = 20;
		//Recebendo a listagem de alunos
		$objCursos = $this->cursos_model->listar($intMax, 0);

		self::header();
		$this->load->view('administracao/adicionaraluno', array("objCursos" => $objCursos));
		self::footer();
	}

	/**
	* Editar ALuno
	*
	*/
	public function editaraluno() {
		//Verficiação de parametro
		if(!$this->uri->segment("3")) 
			redirect('/administracao/listaalunos');
		else 
			$intID = $this->uri->segment("3");

		/* Carrega o modelo */
		$this->load->model('alunos_model');
		$this->load->model('cursos_model');	

		// Maximo de Cursos
		$intMax = 20;
		//Recebendo a listagem de alunos
		$objCursos = $this->cursos_model->listar($intMax, 0);

		//Recupera informacoes do aluno
		$objAluno = $this->alunos_model->getAluno($intID);
		self::header();
		$this->load->view('administracao/editaraluno', array("objAluno" => $objAluno, "objCursos" => $objCursos));
		self::footer();
	}

	/**
	* Adicionar novo Aluno ao banco de dados
	*
	*/ 
	public function addaluno() {		
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[128]');
		$this->form_validation->set_rules('emailpessoal', 'E-mail', 'trim|required|valid_email|max_length[128]');
		$this->form_validation->set_rules('emailcorporativo', 'E-mail', 'trim|required|valid_email|max_length[128]');
	 
		/* Executa a validação e caso houver erro... */
		if ($this->form_validation->run() === FALSE) {
			/* Chama a função index do controlador */
			$this->index();
		/* Senão, caso sucesso na validação... */	
		} else {
			/* Recebe os dados do formulário */
			$data['cd_curso'] = $this->input->post('curso');
			$data['ds_ra'] = $this->input->post('ra');
			$data['ds_nome'] = $this->input->post('nome');
			$data['ds_cpf'] = $this->input->post('cpf');
			$data['ds_email_pessoal'] = $this->input->post('emailpessoal');
			$data['ds_email_corporativo'] = $this->input->post('emailcorporativo');
	 
	 		/* Carrega o modelo */
			$this->load->model('alunos_model');
	 
			/* Chama a função inserir do modelo */
			if ($this->alunos_model->inserir($data)) {
				log_message('success', 'Aluno inserida com sucesso!');
				redirect('/administracao/adicionaraluno');
			} else {
				log_message('error', 'Erro ao inserir o aluno!');
			}
		}
	}

	/**
	* Editar aluno no banco de dados
	*
	*/ 
	public function editaluno() {		
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[128]');
		$this->form_validation->set_rules('emailpessoal', 'E-mail', 'trim|required|valid_email|max_length[128]');
		$this->form_validation->set_rules('emailcorporativo', 'E-mail', 'trim|required|valid_email|max_length[128]');
	 
		/* Executa a validação e caso houver erro... */
		if ($this->form_validation->run() === FALSE) {
			/* Chama a função index do controlador */
			$this->index();
		/* Senão, caso sucesso na validação... */	
		} else {

			//Recupera id do aluno
			if(!$this->uri->segment("3"))
				redirect('/administracao/painel');
			else  
				$intID =$this->uri->segment("3");

			/* Recebe os dados do formulário */
			$data['cd_curso'] = $this->input->post('curso');
			$data['ds_ra'] = $this->input->post('ra');
			$data['ds_nome'] = $this->input->post('nome');
			$data['ds_cpf'] = $this->input->post('cpf');
			$data['ds_email_pessoal'] = $this->input->post('emailpessoal');
			$data['ds_email_corporativo'] = $this->input->post('emailcorporativo');
	 
	 		/* Carrega o modelo */
			$this->load->model('alunos_model');
	 
			/* Chama a função update do modelo */
			if ($this->alunos_model->update($data, $intID)) {
				log_message('success', 'Aluno editado com sucesso!');
				redirect('/administracao/listaalunos');
			} else {
				log_message('error', 'Erro ao inserir o aluno!');
			}
		}
	}

	/* Excluir Aluno do banco de dados */
	public function excluiraluno() {
		//Recupera id do aluno
		if(!$this->uri->segment("3"))
			redirect('/administracao/painel');
		else  
			$intID =$this->uri->segment("3");

		/* Carrega o modelo */
		$this->load->model('alunos_model');

		/* Chama a função update do modelo */
		if ($this->alunos_model->delete($intID)) {
			log_message('success', 'Aluno editado com sucesso!');
			redirect('/administracao/listaalunos');
		} else {
			log_message('error', 'Erro ao inserir o aluno!');
		}
	}

	/**
	* Listagem de Alunos
	*
	*/
	public function listaalunos() {
		/* Carrega o modelo */
		$this->load->model('alunos_model');

		// Maximo de Alunos por página
		$intMax = 15;

		//Receber Parametro de paginação
		$intInicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");

		/* Configuração de Páginação */
		$config['base_url'] = '/administracao/listaalunos';
		$config['total_rows'] = $this->alunos_model->contaRegistros();
		$config['per_page'] = $intMax;
		$this->pagination->initialize($config);    
		$paginacao =  $this->pagination->create_links();

		//Recebendo a listagem de alunos
		$objAlunos = $this->alunos_model->listar($intMax, $intInicio);
	 
	 	//Carregando View
		self::header();
		$this->load->view('administracao/listaalunos', array("alunos" => $objAlunos, "paginacao" =>$paginacao));
		self::footer();
	}

	// Professores

	/**
	* Adicionar novo Professor
 	*
	*/
 	public function adicionarprofessor() {
		self::header();
		$this->load->view('administracao/adicionarprofessor');
		self::footer();
	}

	/**
	* Listagem de Professores
	*
	*/
	public function listaprofessores() {
		/* Carrega o modelo */
		$this->load->model('professores_model');

		// Maximo de Professores por página
		$intMax = 15;

		//Receber Parametro de paginação
		$intInicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");

		/* Configuração de Páginação */
		$config['base_url'] = '/administracao/listaprofessores';
		$config['total_rows'] = $this->professores_model->contaRegistros();
		$config['per_page'] = $intMax;
		$this->pagination->initialize($config);    
		$paginacao =  $this->pagination->create_links();

		//Recebendo a listagem de alunos
		$objProfessores = $this->professores_model->listar($intMax, $intInicio);
	 
	 	//Carregando View
		self::header();
		$this->load->view('administracao/listaprofessores', array("professores" => $objProfessores, "paginacao" =>$paginacao));
		self::footer();
	}

	/**
	* Adicionar novo Professor ao banco
 	*
	*/
 	public function addprofessor() {
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[128]');
		$this->form_validation->set_rules('emailpessoal', 'E-mail', 'trim|required|valid_email|max_length[128]');
		$this->form_validation->set_rules('emailcorporativo', 'E-mail', 'trim|required|valid_email|max_length[128]');
	 
		/* Executa a validação e caso houver erro... */
		if ($this->form_validation->run() === FALSE) {
			/* Chama a função index do controlador */
			$this->index();
		/* Senão, caso sucesso na validação... */	
		} else {
			/* Recebe os dados do formulário */
			$data['ds_rm'] = $this->input->post('rm');
			$data['nm_professor'] = $this->input->post('nome');
			$data['ds_email_pessoal'] = $this->input->post('emailpessoal');
			$data['ds_email_corporativo'] = $this->input->post('emailcorporativo');
			$data['ds_cpf'] = $this->input->post('cpf');
			$data['ds_lattes'] = $this->input->post('lattes');
			$data['ind_status'] = $this->input->post('ativo');
			$data['ds_contrato'] = $this->input->post('contrato');
	 
	 		/* Carrega o modelo */
			$this->load->model('professores_model');
	 
			/* Chama a função inserir do modelo */
			if ($this->professores_model->inserir($data)) {
				log_message('success', 'Professor inserido com sucesso!');
				redirect('/administracao/adicionarprofessor');
			} else {
				log_message('error', 'Erro ao inserir o professor!');
			}
		}
	}

	/**
	* Editar Professor
	*
	*/
	public function editarprofessor() {
		//Verficiação de parametro
		if(!$this->uri->segment("3")) 
			redirect('/administracao/listaprofessores');
		else 
			$intID = $this->uri->segment("3");

		/* Carrega o modelo */
		$this->load->model('professores_model');

		//Recupera informacoes do aluno
		$objProfessor = $this->professores_model->getProfessor($intID);
		self::header();
		$this->load->view('administracao/editarprofessor', array("objProfessor" => $objProfessor));
		self::footer();
	}

	/**
	* Adicionar novo Professor ao banco
 	*
	*/
 	public function editprofessor() {
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[128]');
		$this->form_validation->set_rules('emailpessoal', 'E-mail', 'trim|required|valid_email|max_length[128]');
		$this->form_validation->set_rules('emailcorporativo', 'E-mail', 'trim|required|valid_email|max_length[128]');
	 
		/* Executa a validação e caso houver erro... */
		if ($this->form_validation->run() === FALSE) {
			/* Chama a função index do controlador */
			$this->index();
		/* Senão, caso sucesso na validação... */	
		} else {

			//Recupera id do aluno
			if(!$this->uri->segment("3"))
				redirect('/administracao/painel');
			else  
				$intID =$this->uri->segment("3");

			/* Recebe os dados do formulário */
			$data['ds_rm'] = $this->input->post('rm');
			$data['nm_professor'] = $this->input->post('nome');
			$data['ds_email_pessoal'] = $this->input->post('emailpessoal');
			$data['ds_email_corporativo'] = $this->input->post('emailcorporativo');
			$data['ds_cpf'] = $this->input->post('cpf');
			$data['ds_lattes'] = $this->input->post('lattes');
			$data['ind_status'] = $this->input->post('ativo');
			$data['ds_contrato'] = $this->input->post('contrato');
	 
	 		/* Carrega o modelo */
			$this->load->model('professores_model');
	 
			/* Chama a função inserir do modelo */
			if ($this->professores_model->update($data, $intID)) {
				log_message('success', 'Professor editado com sucesso!');
				redirect('/administracao/listaprofessores');
			} else {
				log_message('error', 'Erro ao editar o professor!');
			}
		}
	}

	/* Excluir Aluno do banco de dados */
	public function excluirprofessor() {
		//Recupera id do aluno
		if(!$this->uri->segment("3"))
			redirect('/administracao/painel');
		else  
			$intID =$this->uri->segment("3");

		/* Carrega o modelo */
		$this->load->model('professores_model');

		/* Chama a função excluir do modelo */
		if ($this->professores_model->delete($intID)) {
			log_message('success', 'Professor excluido com sucesso!');
			redirect('/administracao/listaprofessores');
		} else {
			log_message('error', 'Erro ao excluir o aluno!');
		}
	}

	// Disciplinas

	/**
	* Adicionar nova Disciplina
 	*
	*/
 	public function adicionardisciplina() {
 		/* Carrega o modelo */
		$this->load->model('cursos_model');

		// Maximo de Cursos
		$intMax = 20;
		//Recebendo a listagem de alunos
		$objCursos = $this->cursos_model->listar($intMax, 0);

		self::header();
		$this->load->view('administracao/adicionardisciplina', array("objCursos" => $objCursos));
		self::footer();
	}

	/**
	* Adicionar nova Discplina ao banco
 	*
	*/
 	public function adddisciplina() {
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[128]');
	 
		/* Executa a validação e caso houver erro... */
		if ($this->form_validation->run() === FALSE) {
			/* Chama a função index do controlador */
			$this->index();
		/* Senão, caso sucesso na validação... */	
		} else {
			/* Recebe os dados do formulário */
			$data['ds_codigo'] = $this->input->post('codigo');
			$data['sgl_disciplina'] = $this->input->post('sigla');
			$data['nm_disciplina'] = $this->input->post('titulo');
			$data['ds_ementa'] = $this->input->post('ementa');
			$data['ds_objetivos'] = $this->input->post('objetivo');
			$data['ds_ciclo'] = $this->input->post('ciclo');
			$data['cd_curso'] = $this->input->post('curso');
	 
	 		/* Carrega o modelo */
			$this->load->model('disciplinas_model');
	 
			/* Chama a função inserir do modelo */
			if ($this->disciplinas_model->inserir($data)) {
				log_message('success', 'Disciplina inserido com sucesso!');
				redirect('/administracao/adicionardisciplina');
			} else {
				log_message('error', 'Erro ao inserir a Disciplina!');
			}
		}
	}

	/**
	* Listagem de Disciplinas
	*
	*/
	public function listadisciplinas() {
		/* Carrega o modelo */
		$this->load->model('disciplinas_model');

		// Maximo de Professores por página
		$intMax = 15;

		//Receber Parametro de paginação
		$intInicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");

		/* Configuração de Páginação */
		$config['base_url'] = '/administracao/listadisciplinas';
		$config['total_rows'] = $this->disciplinas_model->contaRegistros();
		$config['per_page'] = $intMax;
		$this->pagination->initialize($config);    
		$paginacao =  $this->pagination->create_links();

		//Recebendo a listagem de alunos
		$objDisciplinas = $this->disciplinas_model->listar($intMax, $intInicio);
	 
	 	//Carregando View
		self::header();
		$this->load->view('administracao/listadisciplinas', array("disciplinas" => $objDisciplinas, "paginacao" =>$paginacao));
		self::footer();
	}

	/**
	* Editar Disciplina
	*
	*/
	public function editardisciplina() {
		//Verficiação de parametro
		if(!$this->uri->segment("3")) 
			redirect('/administracao/listadisciplinas');
		else 
			$intID = $this->uri->segment("3");
	
		/* Carrega o modelo */
		$this->load->model('disciplinas_model');
		$this->load->model('cursos_model');

		// Maximo de Cursos
		$intMax = 20;

		//Recebendo a listagem de alunos
		$objCursos = $this->cursos_model->listar($intMax, 0);

		//Recupera informacoes do aluno
		$obj = $this->disciplinas_model->getDisciplina($intID);
		self::header();
		$this->load->view('administracao/editardisciplina', array("obj" => $obj, "objCursos" => $objCursos));
		self::footer();
	}

	/**
	* Editar Disciplina no banco
 	*
	*/
 	public function editdisciplina() {
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[128]');
	 
		/* Executa a validação e caso houver erro... */
		if ($this->form_validation->run() === FALSE) {
			/* Chama a função index do controlador */
			$this->index();
		/* Senão, caso sucesso na validação... */	
		} else {

			//Verficiação de parametro
			if(!$this->uri->segment("3")) 
				redirect('/administracao/listadisciplinas');
			else 
				$intID = $this->uri->segment("3");

			/* Recebe os dados do formulário */
			$data['ds_codigo'] = $this->input->post('codigo');
			$data['sgl_disciplina'] = $this->input->post('sigla');
			$data['nm_disciplina'] = $this->input->post('titulo');
			$data['ds_ementa'] = $this->input->post('ementa');
			$data['ds_objetivos'] = $this->input->post('objetivo');
			$data['ds_ciclo'] = $this->input->post('ciclo');
			$data['cd_curso'] = $this->input->post('curso');
	 
	 		/* Carrega o modelo */
			$this->load->model('disciplinas_model');

	 
			/* Chama a função inserir do modelo */
			if ($this->disciplinas_model->update($data, $intID)) {
				log_message('success', 'Disciplina editada com sucesso!');
				redirect('/administracao/listadisciplinas');
			} else {
				log_message('error', 'Erro ao editar a Disciplina!');
			}
		}
	}

	/* Excluir Aluno do banco de dados */
	public function excluirdisciplina() {
		//Recupera id do aluno
		if(!$this->uri->segment("3"))
			redirect('/administracao/painel');
		else  
			$intID =$this->uri->segment("3");

		/* Carrega o modelo */
		$this->load->model('disciplinas_model');

		/* Chama a função excluir do modelo */
		if ($this->disciplinas_model->delete($intID)) {
			log_message('success', 'Disciplina excluido com sucesso!');
			redirect('/administracao/listadisciplinas');
		} else {
			log_message('error', 'Erro ao excluir a disciplina!');
		}
	}

	// Cursos

	/**
	* Adicionar novo Curso
 	*
	*/
 	public function adicionarcurso() {
		self::header();
		$this->load->view('administracao/adicionarcurso');
		self::footer();
	}

	/**
	* Adicionar novo Curso
 	*
	*/
 	public function addcurso() {
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[128]');
	 
		/* Executa a validação e caso houver erro... */
		if ($this->form_validation->run() === FALSE) {
			/* Chama a função index do controlador */
			$this->index();
		/* Senão, caso sucesso na validação... */	
		} else {
			/* Recebe os dados do formulário */
			$data['sgl_curso'] = $this->input->post('sigla');
			$data['nm_curso'] = $this->input->post('titulo');
			$data['ds_curso'] = $this->input->post('descricao');
	 
	 		/* Carrega o modelo */
			$this->load->model('cursos_model');
	 
			/* Chama a função inserir do modelo */
			if ($this->cursos_model->inserir($data)) {
				log_message('success', 'Curso inserido com sucesso!');
				redirect('/administracao/listacursos');
			} else {
				log_message('error', 'Erro ao inserir o curso!');
			}
		}
	}

	/**
	* Listagem de Cursos
	*
	*/
	public function listacursos() {
		/* Carrega o modelo */
		$this->load->model('cursos_model');

		// Maximo de Cursos por página
		$intMax = 15;

		//Receber Parametro de paginação
		$intInicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");

		/* Configuração de Páginação */
		$config['base_url'] = '/administracao/listacursos';
		$config['total_rows'] = $this->cursos_model->contaRegistros();
		$config['per_page'] = $intMax;
		$this->pagination->initialize($config);    
		$paginacao =  $this->pagination->create_links();

		//Recebendo a listagem de alunos
		$objCursos = $this->cursos_model->listar($intMax, $intInicio);

		self::header();
		$this->load->view('administracao/listacursos', array("objCursos" => $objCursos, "paginacao" => $paginacao));
		self::footer();
	}

	/**
	* Editar Curso
	*
	**/
	public function editarcurso() {
		//Recupera id do aluno
		if(!$this->uri->segment("3"))
			redirect('/administracao/painel');
		else  
			$intID =$this->uri->segment("3");

		/* Carrega o modelo */
		$this->load->model('cursos_model');

		$objCurso = $this->cursos_model->getCurso($intID);

		self::header();
		$this->load->view('administracao/editarcurso', array("objCurso" => $objCurso));
		self::footer();
	}

	/**
	* Editar curso no banco de dados
	*
	**/
	public function editcurso() {
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[128]');
	 
		/* Executa a validação e caso houver erro... */
		if ($this->form_validation->run() === FALSE) {
			/* Chama a função index do controlador */
			$this->index();
		/* Senão, caso sucesso na validação... */	
		} else {
			if(!$this->uri->segment("3"))
				redirect('/administracao/painel');
			else  
				$intID =$this->uri->segment("3");
			/* Recebe os dados do formulário */
			$data['sgl_curso'] = $this->input->post('sigla');
			$data['nm_curso'] = $this->input->post('titulo');
			$data['ds_curso'] = $this->input->post('descricao');
	 
	 		/* Carrega o modelo */
			$this->load->model('cursos_model');
	 
			/* Chama a função inserir do modelo */
			if ($this->cursos_model->update($data, $intID)) {
				log_message('success', 'Curso editado com sucesso!');
				redirect('/administracao/listacursos');
			} else {
				log_message('error', 'Erro ao editar o curso!');
			}
		}
	}

	/* Excluir Aluno do banco de dados */
	public function excluircurso() {
		//Recupera id do aluno
		if(!$this->uri->segment("3"))
			redirect('/administracao/painel');
		else  
			$intID =$this->uri->segment("3");

		/* Carrega o modelo */
		$this->load->model('cursos_model');

		/* Chama a função update do modelo */
		if ($this->cursos_model->delete($intID)) {
			log_message('success', 'Curso excluido com sucesso!');
			redirect('/administracao/listacursos');
		} else {
			log_message('error', 'Erro ao excluir o curso');
		}
	}
	/* 
	* Função que chama header
	*
	*/
	public function header() {
		$this->load->view('administracao/header');
	}

	/* 
	* Função que chama footer
	*
	*/
	public function footer() {
		$this->load->view('administracao/footer');
	}
}