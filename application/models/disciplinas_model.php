<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Modelo de Professores
	*
	**/
	class Disciplinas_model extends CI_MODEL {
		function __construct() {
        	parent::__construct();
    	}

    	/**
    	* Função Inserir 
    	*
    	**/
    	function inserir($data) {
        	return $this->db->insert('tb_disciplinas', $data);
    	}

    	function listar($intMaximo, $intInicio) {
    		$this->db->select('tb_cursos.nm_curso, tb_disciplinas.cd_disciplina,tb_disciplinas.cd_curso,tb_disciplinas.ds_ciclo,tb_disciplinas.nm_disciplina,tb_disciplinas.sgl_disciplina,tb_disciplinas.ds_codigo,tb_disciplinas.ds_objetivos, tb_disciplinas.ds_ementa');
    		$this->db->join('tb_cursos', 'tb_cursos.cd_curso = tb_disciplinas.cd_curso', 'left');
    		$query = $this->db->get('tb_disciplinas', $intMaximo, $intInicio);
			return $query->result();
		}

		function contaRegistros() {
			return $this->db->count_all_results('tb_disciplinas');
		}

		function getDisciplina($id) {
			$this->db->where('cd_disciplina', $id);
			$query = $this->db->get('tb_disciplinas');
			return $query->row();
		}

		function update($data,$id) {
			$this->db->where('cd_disciplina', $id);
			return $this->db->update('tb_disciplinas', $data);
		}

		function delete($id) {
			$this->db->where('cd_disciplina', $id);
			return $this->db->delete('tb_disciplinas');
		}
	}