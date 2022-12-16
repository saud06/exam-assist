<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Reports extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('reports_model');
			$this->load->model('log_model');
		}

		// Default route
		public function index(){
		} 

		// Get student progress route
		public function student_progress(){
			$this->load->view('reports/student_progress');
		}

		// Generate Student Progress report
		public function student_progress_report(){
			$exam_data = array(
				'academic_year' => $this->input->post('academic_year'),
				'class_group' 	=> $this->input->post('class_group'),
				'exam_type' 		=> $this->input->post('exam_type'),
				'section' 			=> $this->input->post('section'),
				'class' 				=> $this->input->post('class')
			);

			$student_data = array(
				'student_id' 		=> $this->input->post('student_id'),
				'student_roll' 	=> $this->input->post('student_roll'),
				'student_name' 	=> $this->input->post('student_name')
			);

			$exam_data = $this->reports_model->getExamData($exam_data);
			$exam_ids = [];

			foreach($exam_data as $value){
				array_push($exam_ids, $value->exam_id);
			}
			
			$log_data = array(
				'user_id'  => $this->session->userdata('user_id'),
				'table_id' => 0,
				'message'  => 'Progress Report PDF Generated'
			);

			$this->log_model->insert_log($log_data);
				
			// Generate PDF
			ob_start();
			$html = ob_get_clean();
			$html = utf8_encode($html);
			
			$data['exam_data'] = $exam_data;
			$data['student_data'] = $student_data;
			$data['marks_data'] = $this->reports_model->getMarksData($student_data['student_id'], implode(',', $exam_ids));

			$mpdf = new \Mpdf\Mpdf();
			$html = $this->load->view('reports/student_progress_pdf', $data, true);
			$mpdf->allow_charset_conversion = true;
			$mpdf->charset_in = 'UTF-8';
			$mpdf->WriteHTML($html);
			$mpdf->Output('student_progress.pdf','I');
		}
	}
?>