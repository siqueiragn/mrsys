<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends CI_Model  {

    var $table 	    = 'ucp_mail';

    function getByCode( $codigo ) {

        return $this->db->select('*')
                        ->where("uID = $codigo")
                        ->get($this->table);


    }

}

?>