<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->library(array('ion_auth', 'form_validation'));
			$this->load->helper(array('url', 'language'));

			$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

			$this->lang->load('auth');
			$this->load->model('log_model');
		}

		// redirect if needed, otherwise display the user list
		public function index(){
			if (!$this->ion_auth->logged_in()){
				// redirect them to the login page
				redirect('auth/login', 'refresh');
			} elseif(!$this->ion_auth->is_admin()){
				// redirect them to the home page because they must be an administrator to view this
				return show_error('You must be an administrator to view this page.');
			} else{
				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->load->view('dashboard');
			}
		}

		// log the user in
		public function login(){
			$this->data['title'] = $this->lang->line('login_heading');

			//validate form input
			$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
			$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

			if ($this->form_validation->run() == true){
				// check to see if the user is logging in
				// check for "remember me"
				$remember = (bool) $this->input->post('remember');

				if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)){
					//if the login is successful
					//redirect them back to the home page
					$data = $this->ion_auth_model->set_data_in_session($this->input->post('identity'));
					$this->session->set_userdata($data);

					$this->session->set_flashdata('message', $this->ion_auth->messages());
					$this->load->view('dashboard', $data);
				} else{
					// if the login was un-successful
					// redirect them back to the login page
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect('auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
				}
			} else{
				// the user is not logging in so display the login page
				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['identity'] = array('name' => 'identity',
					'id'    => 'identity',
					'type'  => 'text',
					'value' => $this->form_validation->set_value('identity'),
				);
				$this->data['password'] = array('name' => 'password',
					'id'   => 'password',
					'type' => 'password',
				);

				$this->_render_page('auth/login', $this->data);
			}
		}

		// log the user out
		public function logout(){
			$this->data['title'] = "Logout";

			// log the user out
			$logout = $this->ion_auth->logout();

			// redirect them to the login page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('auth/login', 'refresh');
		}

		public function dashboard(){
			$this->load->view('dashboard');
		}
		
		public function _get_csrf_nonce(){
			$this->load->helper('string');
			$key   = random_string('alnum', 8);
			$value = random_string('alnum', 20);
			$this->session->set_flashdata('csrfkey', $key);
			$this->session->set_flashdata('csrfvalue', $value);

			return array($key => $value);
		}

		public function _valid_csrf_nonce(){
			$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
			if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue')){
				return TRUE;
			} else{
				return FALSE;
			}
		}

		public function _render_page($view, $data=null, $returnhtml=false){
			$this->viewdata = (empty($data)) ? $this->data: $data;

			$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

			if($returnhtml)
				return $view_html;
		}
	}
?>
