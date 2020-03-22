<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model  {

    var $table 	    = 'ucp_users';

    function getByCode( $codigo ) {

        return $this->db->select('*')
                        ->where("uID = $codigo")
                        ->get($this->table);


    }

    function getByEmail( $mail ) {

        return $this->db->select('*')
                        ->where("uEmail = '$mail'")
                        ->get($this->table);
    }

    function setTmpPass ( $id, $pass ) {

        $data = array(
            'tmpPass' => $pass,
        );

        $this->db->where('uID', $id);
        $this->db->update($this->table, $data);

    }

    function authMe( $user, $pass ) {

        $pass = hash('whirlpool', $pass);
        return $this->db->select('*')
                        ->where("uNome = '$user' AND uSenha = '$pass'")
                        ->get($this->table);

    }

    function register( $user, $email, $pass, $stamp ) {

        $pass = hash('whirlpool', $pass);
        $data = array(
            'uNome'         => $user,
            'uSenha'        => $pass,
            'uEmail'        => $email,
            'uRegisterDate' => $stamp,
        );

        //$this->db->set('RegisterDate',"TO_DATE('$stamp','DD/MM/RR HH24:MI:SS')", false);

        $this->db->insert($this->table, $data);

    }

    function getByFilter( $filtro ) {

        return $this->db->select('*')
            ->where("UPPER(uNome) LIKE UPPER('%$filtro%')")
            ->get($this->table);


    }

    function atualizar_descricao($codigo, $img, $sobre) {

        if ($img == null ) {
            $data = array(
                'aboutme' => $sobre,
            );
        } else {
            $data = array(
                'aboutme' => $sobre,
                'imgName' => $img,
            );
        }

        $this->db->where('uID', $codigo);
        $this->db->update($this->table, $data);

    }

    function getCards() {

        return $this->db->select('*')
            ->where("uCargo > 0")
            ->order_by('uCargo')
            ->get($this->table);

    }


}

?>