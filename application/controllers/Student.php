<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Student extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->model('student_model');
      $this->load->model('log_model');
    }

    // Default route
    public function index(){
    }

    // Get student data
    public function student_data(){
      $exam_data = array(
        'class_name'     => $this->input->post('class_name'),
        'section_name'   => $this->input->post('section_name'),
        'class_group'    => $this->input->post('class_group')
      );

      $data['data'] = $this->student_model->getRecord($exam_data);
      $data['data2'] = $this->student_model->getMarks($this->input->post('exam_id'));

      echo json_encode($data);
    }

    // Get marks
    public function marks(){
      $student_marks = json_decode($this->input->post('marks'));

      foreach($student_marks as $value){
        $data[] = array(
          'student_id'      => $value->student_id,
          'exam_id'         => $value->exam_id,
          'course_name'     => $value->course_name,
          'obtained_mark'   => $value->obtained_mark ? $value->obtained_mark : null,
          'subjective_mark' => $value->subjective_mark ? $value->subjective_mark : null,
          'objective_mark'  => $value->objective_mark ? $value->objective_mark : null,
          'practical_mark'  => $value->practical_mark ? $value->practical_mark : null
        );
      }

      if($this->student_model->addMarks($data)){ 
        $log_data = array(
          'user_id'  => $this->session->userdata('user_id'),
          'table_id' => 1,
          'message'  => 'Marks Added'
        );

        $this->log_model->insert_log($log_data);

        $this->session->set_flashdata('success_message', 'Marks added successfully.');

        echo json_encode(true);
      } else{
        $this->session->set_flashdata('failure_message', 'Marks can not be added. Please try again.');

        echo json_encode(false);
      }
    }

    // Get student data to generate report
    public function student_progress_report_data(){
      $student_data = array(
        'academic_year' => $this->input->post('academic_year'),
        'class_name'    => $this->input->post('class_name'),
        'section_name'  => $this->input->post('section_name'),
        'class_group'   => $this->input->post('class_group')
      );

      $data['data'] = $this->student_model->getStudentExamRecord($student_data);

      echo json_encode($data);
    }
	} 
?>