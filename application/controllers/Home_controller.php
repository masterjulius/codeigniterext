<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Home_controller extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->library( array('user_security', 'user_actions') );

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

				// load datas to export
				// Load database reference
				$this->load->database();

				$this->load->model('Home_model', 'HM');
				if ( $this->HM->get_items() != NULL ) {

					/**
					 * Comment this line for testing purposes.
					 */
					$data['item_datas'] = $this->HM->get_items();
					$this->load->view('admin_dashboard', $data);

					// $asd = $this->user_actions->_register_admin_page( 'my_view', 'myView' );
					// echo "<pre>";
					// 	print_r($asd);
					// echo "</pre>";

				}

			} else {
				redirect('/Home_controller/');
			}
		}

		// user roles
		public function user_roles() {

			if ( $this->user_security->is_user_logged_in() == true ) {

				
				
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