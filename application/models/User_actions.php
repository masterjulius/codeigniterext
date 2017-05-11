<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_actions extends CI_Model {

	public function index() {

		

	}

	public function validate_user( $username, $password ) {
		$retValue = NULL;
		$stmt = "SELECT `user_id`, `user_name`, `user_password` FROM `tbl_users` WHERE `user_name`=? AND `user_password`=?";
		$query = $this->db->query( $stmt, array($username, $password) );
		if ( $query->num_rows() > 0 ) {

			while ( $row = $query->unbuffered_row() ):

				if ( $row->user_name != $username || $row->user_password != $password ) {
					$retValue = NULL;
				} else {
					$retValue = array(
						'user_id' => $row->user_id,
						'user_name' => $row->user_name
					);
				}

			endwhile;	

		}
		return $retValue;

	}

}

?>