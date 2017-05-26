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

class Page_actions {

	protected $CI;

	public function __construct() {
        
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
        $this->CI->load->library( array('array_actions') );

    }

    public function _register_admin_pages( $args ) {

    	if ( !empty( $args ) || $args !== NULL ) {

    		foreach ( $args as $key => $value ) {
    			
    			

    		}

    	}

    }
    /**/

    public function _register_single_admin_page( $pageName, $capabilityPrefix, $fullCapability = TRUE, $isArray = FALSE, $extension = 'php' ) {
        
        if ( file_exists( APPPATH."views/{$pageName}." . $extension ) && !empty( $capabilityPrefix ) ) {


        	if ( $fullCapability === TRUE ) {

                $returnValue = array(
                    'name'          => $pageName,
                    'capabilities'  => array(
                    	'create' 		=> true,
                    	'edit'			=> true,
                    	'delete'		=> true,
                    	'read'			=> true,
                    	'save'			=> true,
                    	'edit_others'	=> true,
                    	'delete_others' => true
                    )
                );

                $returnValue =  $isArray == FALSE ? $this->CI->array_actions->array_to_object( $returnValue ) : $returnValue;

                return $returnValue;

            } else {

                $returnValue = array(
                    'name'          => $pageName,
                    'capabilities'  => array(
                    	'create' 		=> true,
                    	'edit'			=> true,
                    	'delete'		=> true,
                    	'read'			=> true,
                    	'save'			=> true
                    )
                );

                $returnValue =  $isArray == FALSE ? $this->CI->array_actions->array_to_object( $returnValue ) : $returnValue;

                return $returnValue;

            }

        } else {

            die('Die: Invalid');

        }  

    }
    /**/

    public function _get_page_capabilities( $pageName  ) {

    	if ( !empty( $pageName ) ) {

    		echo $pageName;

    	}

    }

}    

?>    