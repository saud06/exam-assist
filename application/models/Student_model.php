<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Student_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    // Default route model
    public function index(){
    }
    
		// Get student record
    public function getRecord($data){
			$this->db->select('*')
			->from('student')
			// ->join('marks','student.student_id = marks.student_id')
			->where('class_name', $data['class_name'])
      ->where('section_name', $data['section_name'])
      ->where('class_group', $data['class_group']);
			
			$query = $this->db->get();

			if($query){
				return $query->result();
			}
			
      return false;
		}

    // Add marks
    public function addMarks($data){
      foreach($data as $value){
        $query = $this->db->select('mark_id')->from('mark')->where('student_id', $value['student_id'])->where('exam_id', $value['exam_id'])->get();

        if($query->num_rows() == 0){
          $this->db->insert('mark', $value);
        } else{
          $this->db->where('student_id', $value['student_id'])->where('exam_id', $value['exam_id'])->update('mark', $value);
        }
      }
      
      return true;
    }

    // Get marks
    public function getMarks($exam_id){
			$this->db->select('*')
			->from('mark')
			->where('exam_id', $exam_id);
			
			$query = $this->db->get();

			if($query){
				return $query->result();
			}
			
      return false;
		}

    // Get student exam record
    public function getStudentExamRecord($data){
      $this->db->select('*')
			->from('student s')
			->where('s.academic_year', $data['academic_year'])
			->where('s.class_name', $data['class_name'])
      ->where('s.section_name', $data['section_name'])
      ->where('s.class_group', $data['class_group']);
			
			$query = $this->db->get();

			if($query){
				return $query->result();
			}
			
      return false;
    }
  }
?>