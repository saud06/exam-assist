<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Exam extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->model('exam_model');
      $this->load->model('log_model');
    }

    // Default route
    public function index(){
    }

    // Exam list
    public function exam_list(){
      $data['data'] = $this->exam_model->getExams();

      $this->load->view('exam/list', $data);
    }

    // Configure exam route
    public function configure(){
      $this->load->view('exam/configure');
		}
    
		// Add exam
    public function add_exam(){
			$this->load->helper('security');

			// Validation
      $this->form_validation->set_rules('academic_year', 'Academic Year', 'trim|required|min_length[1]|callback_alpha_dash_space|xss_clean');
			$this->form_validation->set_rules('class', 'Class', 'trim|required|min_length[1]|callback_alpha_dash_space|xss_clean');
			$this->form_validation->set_rules('section', 'Section', 'trim|required|min_length[1]|callback_alpha_dash_space|xss_clean');
			$this->form_validation->set_rules('exam_type', 'Exam Type', 'trim|required|min_length[1]|callback_alpha_dash_space|xss_clean');
			$this->form_validation->set_rules('class_group', 'Class Group', 'trim|required|min_length[1]|callback_alpha_dash_space|xss_clean');
			$this->form_validation->set_rules('course_name', 'Course Name', 'trim|required|min_length[1]|callback_alpha_dash_space|xss_clean');
			$this->form_validation->set_rules('is_subjective', 'Subjective', 'trim|required|numeric|xss_clean');
      $this->form_validation->set_rules('subjective_mark', 'Subjective Mark', 'trim|required|numeric|xss_clean');
      $this->form_validation->set_rules('subjective_pass_mark', 'Subjective Pass Mark', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('is_objective', 'Objective', 'trim|required|numeric|xss_clean');
      $this->form_validation->set_rules('objective_mark', 'Objective Mark', 'trim|required|numeric|xss_clean');
      $this->form_validation->set_rules('objective_pass_mark', 'Objective Pass Mark', 'trim|required|numeric|xss_clean');
      $this->form_validation->set_rules('is_practical', 'Practical', 'trim|numeric|xss_clean');
      $this->form_validation->set_rules('practical_mark', 'Practical Mark', 'trim|numeric|xss_clean');
      $this->form_validation->set_rules('practical_pass_mark', 'Practical Pass Mark', 'trim|numeric|xss_clean');
      $this->form_validation->set_rules('total_mark', 'Exam Mark', 'trim|required|numeric|xss_clean');
      $this->form_validation->set_rules('is_attendance', 'Attendance', 'trim|numeric|xss_clean');
      $this->form_validation->set_rules('is_status', 'Status', 'trim|required|numeric|xss_clean');

			if (!$this->form_validation->run()){
				$this->configure();
			} else{
				date_default_timezone_set('Asia/Dhaka');
				$datetime = date('Y-m-d H:i:s');

				$data = array(
					'academic_year'         => $this->input->post('academic_year'),
					'class_name'            => $this->input->post('class'),
					'section_name'          => $this->input->post('section'),
					'exam_type'             => $this->input->post('exam_type'),
					'class_group'           => $this->input->post('class_group'),
					'course_name'           => $this->input->post('course_name'),
					'is_subjective'         => $this->input->post('is_subjective'),
					'subjective_mark'       => $this->input->post('subjective_mark'),
					'subjective_pass_mark'  => $this->input->post('subjective_pass_mark'),
          'is_objective'          => $this->input->post('is_objective'),
					'objective_mark'        => $this->input->post('objective_mark'),
          'objective_pass_mark'   => $this->input->post('objective_pass_mark'),
          'is_practical'          => $this->input->post('is_practical') ? $this->input->post('is_practical') : 0,
					'practical_mark'        => $this->input->post('practical_mark'),
          'practical_pass_mark'   => $this->input->post('practical_pass_mark'),
          'total_mark'            => $this->input->post('total_mark'),
          'is_attendance'         => $this->input->post('is_attendance') ? $this->input->post('is_attendance') : 0,
          'is_status'             => $this->input->post('is_status'),
					'user_id'               => $this->session->userdata('user_id'),
					'datetime'              => $datetime,
					'last_update_by'        => $this->session->userdata('user_id'),
					'last_update_date'      => $datetime
				);

        if($id = $this->exam_model->addModel($data)){ 
          $log_data = array(
            'user_id'  => $this->session->userdata('user_id'),
            'table_id' => $id,
            'message'  => 'Exam Configured'
          );

          $this->log_model->insert_log($log_data);

          $this->session->set_flashdata('success_message', 'Exam configured successfully.');

          redirect('exam/exam_list', 'refresh');
        } else{
          $this->session->set_flashdata('failure_message', 'Exam can not be configured. Please try again.');

          redirect('exam/configure', 'refresh');
        }
			}
		}
    
		// Edit exam eoute
    public function edit($exam_id){
			$data['data'] = $this->exam_model->getRecord($exam_id);

			$this->load->view('exam/edit', $data);
		}
    
    // Edit exam
		public function edit_exam(){
      $this->load->helper('security');

			// Validation
      $this->form_validation->set_rules('academic_year', 'Academic Year', 'trim|required|min_length[1]|callback_alpha_dash_space|xss_clean');
			$this->form_validation->set_rules('class', 'Class', 'trim|required|min_length[1]|callback_alpha_dash_space|xss_clean');
			$this->form_validation->set_rules('section', 'Section', 'trim|required|min_length[1]|callback_alpha_dash_space|xss_clean');
			$this->form_validation->set_rules('exam_type', 'Exam Type', 'trim|required|min_length[1]|callback_alpha_dash_space|xss_clean');
			$this->form_validation->set_rules('class_group', 'Class Group', 'trim|required|min_length[1]|callback_alpha_dash_space|xss_clean');
			$this->form_validation->set_rules('course_name', 'Course Name', 'trim|required|min_length[1]|callback_alpha_dash_space|xss_clean');
			$this->form_validation->set_rules('is_subjective', 'Subjective', 'trim|required|numeric|xss_clean');
      $this->form_validation->set_rules('subjective_mark', 'Subjective Mark', 'trim|required|numeric|xss_clean');
      $this->form_validation->set_rules('subjective_pass_mark', 'Subjective Pass Mark', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('is_objective', 'Objective', 'trim|required|numeric|xss_clean');
      $this->form_validation->set_rules('objective_mark', 'Objective Mark', 'trim|required|numeric|xss_clean');
      $this->form_validation->set_rules('objective_pass_mark', 'Objective Pass Mark', 'trim|required|numeric|xss_clean');
      $this->form_validation->set_rules('is_practical', 'Practical', 'trim|numeric|xss_clean');
      $this->form_validation->set_rules('practical_mark', 'Practical Mark', 'trim|numeric|xss_clean');
      $this->form_validation->set_rules('practical_pass_mark', 'Practical Pass Mark', 'trim|numeric|xss_clean');
      $this->form_validation->set_rules('total_mark', 'Exam Mark', 'trim|required|numeric|xss_clean');
      $this->form_validation->set_rules('is_attendance', 'Attendance', 'trim|numeric|xss_clean');
      $this->form_validation->set_rules('is_status', 'Status', 'trim|required|numeric|xss_clean');

      $exam_id = $this->input->post('exam_id');

			if (!$this->form_validation->run()){
				$this->edit($exam_id);
			} else{
				date_default_timezone_set('Asia/Dhaka');
				$datetime = date('Y-m-d H:i:s');

				$data = array(
					'academic_year'         => $this->input->post('academic_year'),
					'class_name'            => $this->input->post('class'),
					'section_name'          => $this->input->post('section'),
					'exam_type'             => $this->input->post('exam_type'),
					'class_group'           => $this->input->post('class_group'),
					'course_name'           => $this->input->post('course_name'),
					'is_subjective'         => $this->input->post('is_subjective'),
					'subjective_mark'       => $this->input->post('subjective_mark'),
					'subjective_pass_mark'  => $this->input->post('subjective_pass_mark'),
          'is_objective'          => $this->input->post('is_objective'),
					'objective_mark'        => $this->input->post('objective_mark'),
          'objective_pass_mark'   => $this->input->post('objective_pass_mark'),
          'is_practical'          => $this->input->post('is_practical') ? $this->input->post('is_practical') : 0,
					'practical_mark'        => $this->input->post('practical_mark'),
          'practical_pass_mark'   => $this->input->post('practical_pass_mark'),
          'total_mark'            => $this->input->post('total_mark'),
          'is_attendance'         => $this->input->post('is_attendance') ? $this->input->post('is_attendance') : 0,
          'is_status'             => $this->input->post('is_status'),
					'user_id'               => $this->session->userdata('user_id'),
					'datetime'              => $datetime,
					'last_update_by'        => $this->session->userdata('user_id'),
					'last_update_date'      => $datetime
				);

				if($this->exam_model->editModel($data, $exam_id)){ 
					$log_data = array(
						'user_id'  => $this->session->userdata('user_id'),
						'table_id' => $exam_id,
						'message'  => 'Exam Updated'
					);

					$this->log_model->insert_log($log_data);

          $this->session->set_flashdata('success_message', 'Exam updated successfully.');
					
					redirect('exam/exam_list', 'refresh');
				}
				else{
					$this->session->set_flashdata('failure_message', 'Exam can not be updated. Please try again.');
          
					redirect('exam/edit/' . $exam_id, 'refresh');
				}
			}
		}

    // Delete exam
		public function delete_exam($exam_id){
			if($this->exam_model->deleteModel($exam_id)){
				$log_data = array(
					'user_id'  => $this->session->userdata('user_id'),
					'table_id' => $exam_id,
					'message'  => 'Exam Deleted'
				);

				$this->log_model->insert_log($log_data);

        $this->session->set_flashdata('success_message', 'Exam deleted successfully.');
				
				redirect('exam/exam_list', 'refresh');
			}
			else{
				$this->session->set_flashdata('failure_message', 'Exam can not be deleted. Please try again.');
        
        redirect('exam/exam_list', 'refresh');
			}
		}

    // Get exam data
    public function exam_data($exam_id){
			$data['data'] = $this->exam_model->getRecord($exam_id);

			echo json_encode($data);
		}
    
		// Validate field data
    function alpha_dash_space($str){
			if (!preg_match('/^([-a-zA-Z0-9() ])+$/i', $str)){
				$this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha-numeric characters, spaces, brackets and dashes.');
				return FALSE;
			} else{
				return TRUE;
			}
		}
	} 
?>