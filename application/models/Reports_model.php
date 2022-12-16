<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Reports_model extends CI_Model{
		function __construct() {
			parent::__construct();
		}

		// Default route model
		public function index(){
		}
		
		// Get exam data
		public function getExamData($data){
			$this->db->select('*')
			->from('exam')
			->where('academic_year', $data['academic_year'])
			->where('class_group', $data['class_group'])
			->where('exam_type', $data['exam_type'])
			->where('section_name', $data['section'])
			->where('class_name', $data['class']);
			
			$query = $this->db->get();

			if($query){
				return $query->result();
			}
				
			return false;
		}

		// Get marks data
		public function getMarksData($student_id, $exam_ids){
			$this->db->select('m.*, e.subjective_mark as max_subjective, e.objective_mark as max_objective, e.practical_mark as max_practical')
			->from('mark m')
			->join('exam e', 'm.exam_id = e.exam_id')
			->where('m.student_id', $student_id)
			->where_in('m.exam_id', explode(',', $exam_ids))
			->order_by('m.course_name', 'asc');
			
			$query = $this->db->get();

			if($query){
				return $query->result();
			}
				
			return false;
		}
	}
?>