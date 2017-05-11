<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Home_controller extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->library('user_security');

			// load materializecss
			$this->load->helper('url');
		}

		public function index() {

			if ( $this->user_security->is_user_logged_in() == true ) {
				// if is logged in
				redirect('/Home_controller/dashboard');
			} else {
				// go to log in
				$this->load->helper( array('html', 'form') );
				
				$this->load->view('login_view');
				// end
			}

		}

		// dashboard
		public function dashboard() {
			if ( $this->user_security->is_user_logged_in() == true ) {
				$this->load->helper(array('html', 'form', 'url'));
				$this->load->view('admin_dashboard');
			} else {
				redirect('/Home_controller/');
			}
		}

		// sign out
		public function sign_out() {

			if ( $this->user_security->is_user_logged_in() == true ) {
				$this->user_security->unset_session();
				redirect('/Home_controller/');
			} else {
				redirect('/Home_controller/');
			}

		}

	}

?>