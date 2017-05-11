<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Form_controller extends CI_Controller {

		public function sign_in() {

			$this->load->helper(array('html', 'form', 'url'));

            $this->load->library(array('form_validation', 'session'));

			$this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'You must provide a %s.')
            );

			if ($this->form_validation->run() == FALSE) {
                $this->load->view('login_view');
            } else {
            	$this->load->database();
            	$username = $this->input->post('username');
            	$password = $this->input->post('password');

            	$this->load->model('User_actions', 'UA');
            	$user_result = $this->UA->validate_user( $username, $password );
            	if ( $user_result != NULL ) {
            		$loginOptions = $this->input->post('signinoption');
            		if ( isset( $loginOptions ) ) {
            			// use cookie / keep me logged in
            			echo "<h1>Set</h1>";
            		} else {
            			// use session
            			echo "<h1>Not Set</h1>";
            			$this->session->set_userdata( $user_result );
            		}

            		redirect('/Home_controller/dashboard');
            	} else {
            		echo "<h1>Invalid!</h1>";
            		$this->load->view('login_view');
            	}

                
            }


		}

	}
	
?>		