<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Modelo de Alunos
	*
	**/
	class Alunos_model extends CI_MODEL {
		function __construct() {
        	parent::__construct();
    	}

    	/**
    	* Função Inserir Alunos
    	*
    	**/
    	function inserir($data) {
        	return $this->db->insert('tb_alunos', $data);
    	}

    	function listar($intMaximo, $intInicio) {
    		$this->db->select('tb_cursos.nm_curso, tb_alunos.cd_aluno, tb_alunos.cd_curso, tb_alunos.ds_ra,ds_nome, tb_alunos.ds_cpf,tb_alunos.ds_email_pessoal, tb_alunos.ds_email_corporativo');
    		$this->db->join('tb_cursos', 'tb_cursos.cd_curso = tb_alunos.cd_curso', 'left');
			$query = $this->db->get('tb_alunos', $intMaximo, $intInicio);
			return $query->result();
		}

		function contaRegistros() {
			return $this->db->count_all_results('tb_alunos');
		}

		function getAluno($id) {
			$this->db->where('cd_aluno', $id);
			$query = $this->db->get('tb_alunos');
			return $query->row();
		}

		function update($data,$id) {
			$this->db->where('cd_aluno', $id);
			return $this->db->update('tb_alunos', $data);
		}

		function delete($id) {
			$this->db->where('cd_aluno', $id);
			return $this->db->delete('tb_alunos');
		}
	}