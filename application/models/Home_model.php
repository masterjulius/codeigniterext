<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Home_model extends CI_Model {

		public function get_items() {

			$retValue = NULL;

			$this->db->select('item_id, item_code, item_name, item_description, item_date_created');
			$this->db->where('item_is_active', 1);
			
			if ( $this->db->count_all_results('tbl_items') > 0 ) {
				$retValue = array();
				$query = $this->db->get('tbl_items');
				foreach ($query->result() as $row) {
					$dataArray = (object) array(
						'id' 			=> $row->item_id,
						'code' 			=> $row->item_code,
						'name'			=> $row->item_name,
						'description'	=> $row->item_description,
						'date'			=> $row->item_date_created
					);
					array_push($retValue, $dataArray);
				}
			}

			return $retValue;

		}

	}

?>	