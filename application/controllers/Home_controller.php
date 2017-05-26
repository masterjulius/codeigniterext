<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Home_controller extends CI_Controller {

		public $admin_pages = array();

		public function __construct() {
			parent::__construct();
			$this->load->library( array('user_security', 'user_actions', 'encryption', 'page_actions') );

			// load materializecss
			$this->load->helper('url');

			/**
			 * Assign certain capabilities to the admin pages variable
			 */
			$my_page = $this->page_actions->_register_single_admin_page( 'my_view', 'myView' );
			array_push( $this->admin_pages, $my_page );

		}

		public function index() {

			if ( $this->user_security->is_user_logged_in( 'my_prefix' ) == true ) {
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
			if ( $this->user_security->is_user_logged_in( 'my_prefix' ) == true ) {
				$this->load->helper(array('html', 'form', 'url'));

				// load datas to export
				// Load database reference
				$this->load->database();

				$this->load->model('Home_model', 'HM');
				if ( $this->HM->get_items() != NULL ) {
					
					/**
					 * Comment this line for testing purposes.
					 */
					$data['https'] = $this->admin_pages;
					$data['item_datas'] = $this->HM->get_items();
					$this->load->view('admin_dashboard', $data);

				}

			} else {
				redirect('/Home_controller/');
			}
		}

		// user roles
		public function user_roles() {

			if ( $this->user_security->is_user_logged_in( 'my_prefix' ) == true ) {

				$data['admin_pages'] = $this->admin_pages;
				$this->load->view( 'Roles', $data );
				
			} else {
				redirect('/Home_controller/');
			}

		}

		// sign out
		public function sign_out() {

			if ( $this->user_security->is_user_logged_in( 'my_prefix' ) == true ) {
				$this->user_security->unset_session_data( 'my_prefix' );
				redirect('/Home_controller/');
			} else {
				redirect('/Home_controller/');
			}

		}

	}

?>