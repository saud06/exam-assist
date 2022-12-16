<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Exam_model extends CI_Model{
    function __construct() {
      parent::__construct();
    }

    public function index(){
    }
    
		public function getExams(){
			$this->db->select('*')->from('exam');

			return $this->db->get()->result();
		}
    
		public function addModel($data){
			// log_message('debug', print_r($data, true));

			if($this->db->insert('exam', $data)){
				$id = $this->db->insert_id();

				return $id;
			}

			return false;
		}
    
		public function getRecord($data){
			$this->db->select('*')
			->from('exam')
			->where('exam_id', $data);
			
			$query = $this->db->get();

			if($query){
				return $query->result();
			}
				
			return false;
		}
    
		public function editModel($data, $exam_id){
			if($this->db->where('exam_id', $exam_id)->update('exam', $data)){
				return true;
			}

			return false;
		}

    public function deleteModel($exam_id){
      if($this->db->where('exam_id', $exam_id)->delete('exam')){
        return true;
      }

      return false;
    }
  }
?>