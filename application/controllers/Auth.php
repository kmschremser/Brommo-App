<?php

class Auth extends CI_Controller {

        public function __construct()
        {
            parent::__construct();

            $this->load->model('auth_model');
            $this->load->helper('url_helper');
			$this->load->library('session');
			$this->config->load('config_custom');

			$this->language();

        }

        public function language($lang = null)
        {
	        //Get the selected language
	        // Get from session!!
	        if ( $lang != null ) {
	         	$language = $lang;
	        } elseif ( isset( $this->session->language ) ) {
	        	$language = $this->session->language;
			} else {
				$language = "en";
			}

	        //Choose language file according to selected lanaguage
	        if ( $language == "de" ) {
	            $this->lang->load('german_lang','german');
	            $this->session->language = "de";
	        } else {
	         	$this->lang->load('english_lang','english');
	         	$this->session->language = "en";
			}
        }

		public function login()
		{
			$hash_email = $this->uri->segment(3, 0);
			$user_id = $this->uri->segment(4, 0);
			$new_pw = $this->uri->segment(5, 0);

			// check this first to get the right language
			if ( "$hash_email" === "de" ) {
				$this->language('de');
			} else {
				$this->language('en');
			}	

			$data['SALT'] = $this->config->item('salt');

			$data['METADESCRIPTION'] = $this->lang->line('META_DESCRIPTION_INDEX');
			$data['LANGUAGE_SETTINGS'] = $this->lang->line('LANGUAGE_SETTINGS');


			if ( "$new_pw" == "newpw" ) 
			{
				$data['success_message'] = $this->lang->line('return_message_forgottenpw_final');
			}

			$data['data'] = $this->input->post();

			// activate user
			if ( "$hash_email" !== "0" && "$user_id" !== "0" && "$new_pw" === "0" && ( !$this->input->post('validation') ) ) {

				$user_data = $this->auth_model->get_user($user_id);

				// check whether activation data is correct
				if ( md5($user_data['email']) == $hash_email ) {
					$data['success_message'] = $this->lang->line('activating_message_success');
					$this->auth_model->activate_user($user_id);
				} else {
					$data['success_message'] = $this->lang->line('activating_message_failed');					
				}
			}

			if ( is_array( $this->input->post('validation') ) ) {
				$user_data = $this->input->post( 'validation' );
				$user_data_db = $this->auth_model->get_user_by_email( $user_data['email'] );
				//echo $user_data['password'] . " -- " . $user_data_db['password'];

				// check for right password
				if ( crypt( $user_data['password'], $data['SALT'] ) == $user_data_db['password'] && ( isset( $user_data_db['activated'] ) && $user_data_db['activated'] == 1 ) ) {
					$this->session->email = $user_data_db['email'];
					$this->session->user_id = $user_data_db['objid'];
					$this->session->language = $user_data_db['language'];
					$this->session->firstname = $user_data_db['firstname'];
					$this->session->owner_id = $user_data_db['owner_id'];
					redirect('realestate/list_reobjects');
					die();
				} else {
					//if ( ( isset( $user_data_db['activated'] ) && $user_data_db['activated'] == 0 ) ) {
						$data['success_message'] = $this->lang->line('failed_login');
					//}
				}
			}

	        $this->load->view('templates/header_auth', $data);
	        $this->load->view('auth/login', $data);
		}

		public function logout()
		{
			$this->session->email = '';
			$this->session->user_id = 0;

			redirect('auth/login');
			die();
		}

		public function passforgotten()
		{
			$data = $this->input->post();

			$data['SALT'] = $this->config->item('salt');

			$data['METADESCRIPTION'] = $this->lang->line('META_DESCRIPTION_INDEX');
			$data['LANGUAGE_SETTINGS'] = $this->lang->line('LANGUAGE_SETTINGS');

			$data['SERVERHOST'] = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];

			if ( isset( $data['validation']['password'] ) ) {
				$data = $this->auth_model->update_passwordforgotten( $data );
				redirect('auth/login/0/0/newpw');
				die();
			}

			if ( isset( $data['validation']['email'] ) ) {
				$data = $this->auth_model->send_passwordforgotten( $data );
			}

			$hash_email = $this->uri->segment(3, 0);
			$user_id = $this->uri->segment(4, 0);

			if ( $hash_email !== 0 && $user_id !== 0 && ( !isset($data['no_further_checks']) ) ) {

				$user_data = $this->auth_model->get_user($user_id);

				if ( md5($user_data['email']) == $hash_email ) {
					$data['reset_pw'] = true;
					$data['return_message'] = $this->lang->line('add_pw_forgottenpw');
					$data['user_id'] = $user_id;
  				} 
  				else {
					$data['reset_pw'] = false;
					$data['return_message'] = $this->lang->line('add_pw_forgottenpw_failed');
				}
			}

	        $this->load->view('templates/header_auth', $data);
	        $this->load->view('auth/passforgotten', $data);
		}

		public function register()
		{
		    $this->load->helper('form');
		    $this->load->library('form_validation');

		    $data['data'] = $this->input->post();
			$data['SERVERHOST'] = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];

			$data['SALT'] = $this->config->item('salt');

  		    $this->form_validation->set_rules('firstname', $this->lang->line('Firstname'), 'required|min_length[2]|max_length[200]');
  		    $this->form_validation->set_rules('email', $this->lang->line('Email'), 'required|valid_email|is_unique[users.email]');
  		    $this->form_validation->set_rules('password', $this->lang->line('Password'), 'required|min_length[6]|max_length[200]');
  		    //matches[passconf]

			$data['METADESCRIPTION'] = $this->lang->line('META_DESCRIPTION_INDEX');
			$data['LANGUAGE_SETTINGS'] = $this->lang->line('LANGUAGE_SETTINGS');

		    if ($this->form_validation->run() === FALSE) {
		        $this->load->view('templates/header_auth', $data);
		        $this->load->view('auth/register', $data);

		    }
		    else {
		        $objid = $this->auth_model->register_user($data);
		        $data['success'] = $this->lang->line('register_success') . "<br />";

		        $this->load->view('templates/header_auth', $data);
		        $this->load->view('auth/register', $data);

		    }

		}


}

