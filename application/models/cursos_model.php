<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Modelo de Alunos
	*
	**/
	class Cursos_model extends CI_MODEL {
		function __construct() {
        	parent::__construct();
    	}

    	/**
    	* Função Inserir Alunos
    	*
    	**/
    	function inserir($data) {
        	return $this->db->insert('tb_cursos', $data);
    	}

    	function listar($intMaximo, $intInicio) {
			$query = $this->db->get('tb_cursos', $intMaximo, $intInicio);
			return $query->result();
		}

		function contaRegistros() {
			return $this->db->count_all_results('tb_cursos');
		}

		function getCurso($id) {
			$this->db->where('cd_curso', $id);
			$query = $this->db->get('tb_cursos');
			return $query->row();
		}

		function update($data,$id) {
			$this->db->where('cd_curso', $id);
			return $this->db->update('tb_cursos', $data);
		}

		function delete($id) {
			$this->db->where('cd_curso', $id);
			return $this->db->delete('tb_cursos');
		}
	}