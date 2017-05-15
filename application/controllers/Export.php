<?php
defined('BASEPATH') OR exit('No direct script are allowed');
	
	class Export extends CI_controller {

		public function excel() {
			$this->load->database();
			$this->load->model('Home_model', 'HM');
			if ( $this->HM->get_items() != NULL ) {
				$data = $this->HM->get_items();
				$this->load->library('exports');
				$this->exports->excel($data);
			}

		}

	}

?>