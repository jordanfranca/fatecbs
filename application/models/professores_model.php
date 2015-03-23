<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Modelo de Professores
	*
	**/
	class Professores_model extends CI_MODEL {
		function __construct() {
        	parent::__construct();
    	}

    	/**
    	* Função Inserir professores
    	*
    	**/
    	function inserir($data) {
        	return $this->db->insert('tb_professores', $data);
    	}

    	function listar($intMaximo, $intInicio) {
    		$query = $this->db->get('tb_professores', $intMaximo, $intInicio);
			return $query->result();
		}

		function contaRegistros() {
			return $this->db->count_all_results('tb_professores');
		}

		function getProfessor($id) {
			$this->db->where('cd_professor', $id);
			$query = $this->db->get('tb_professores');
			return $query->row();
		}

		function update($data,$id) {
			$this->db->where('cd_professor', $id);
			return $this->db->update('tb_professores', $data);
		}

		function delete($id) {
			$this->db->where('cd_professor', $id);
			return $this->db->delete('tb_professores');
		}
	}