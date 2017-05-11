<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package     CodeIgniter
 * @author      Julius Palcong
 * @copyright   Copyright (c) 2017, Cagayan Provincial Capitol.
 * @license     
 * @link        http://www.cagayan.gov.ph
 * @since       Version 1.0
 * @filesource
 */

class User_security {

	protected $CI;

	public function __construct() {
        
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
        $this->CI->load->library('session');

    }

    public function is_user_logged_in( $param = 'user_id' ) {

    	$retValue = false;
    	if ( $this->CI->session->userdata( $param ) ) {

    		return true;

    	}
    	return $retValue;

    }

    public function set_session( $param = NULL ) {

		$this->CI->session->set_userdata($param);

    }

    public function unset_session( $param = 'user_id' ) {

    	$this->CI->session->unset_userdata($param);

    }

}

?>