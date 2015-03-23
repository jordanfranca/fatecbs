<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Modelo de Alunos
	* @autor Jordã França
	*
	**/
	class Alunos_model extends CI_MODEL {

		private $table = 'tb_alunos';

		//Construtor
		function __construct() {
        	parent::__construct();
    	}

    	//Retorna o nome da tabela
    	function getTable() {
    		return $this->table;
    	}

    	/**
    	* Função Inserir Alunos
    	*
    	**/
    	function inserir($data) {
        	return $this->db->insert('tb_alunos', $data);
    	}

    	//Listar os alunos
    	function listar($intMaximo, $intInicio) {
    		$this->db->select('tb_cursos.nm_curso, tb_alunos.cd_aluno, tb_alunos.cd_curso, tb_alunos.ds_ra,ds_nome, tb_alunos.ds_cpf,tb_alunos.ds_email_pessoal, tb_alunos.ds_email_corporativo');
    		$this->db->join('tb_cursos', 'tb_cursos.cd_curso = tb_alunos.cd_curso', 'left');
			$query = $this->db->get($this->getTable(), $intMaximo, $intInicio);
			return $query->result();
		}

		//contar registros
		function contaRegistros() {
			return $this->db->count_all_results($this->getTable());
		}

		//Buscar aluno pelo ID
		function getAluno($id) {
			$this->db->where('cd_aluno', $id);
			$query = $this->db->get($this->getTable());
			return $query->row();
		}

		//Atualizar aluno
		function update($data,$id) {
			$this->db->where('cd_aluno', $id);
			return $this->db->update($this->getTable(), $data);
		}

		//Deletar Aluno
		function delete($id) {
			$this->db->where('cd_aluno', $id);
			return $this->db->delete($this->getTable());
		}
	}