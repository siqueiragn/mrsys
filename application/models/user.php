<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model  {

    var $table 	    = 'ucp_users';

    function getByCode( $codigo ) {

        return $this->db->select('*')
                        ->where("uID = $codigo")
                        ->get($this->table);


    }
    function getByFuncionarioCode( $codigo ) {

        return $this->db->select('*')
                        ->where("funcionario = $codigo")
                        ->get($this->table);


    }

    function getByEmail( $mail ) {

        return $this->db->select('*')
                        ->where("uEmail = '$mail'")
                        ->get($this->table);
    }


    function authMe( $user, $pass ) {

        $pass = hash('whirlpool', $pass);
        return $this->db->query("SELECT * FROM $this->table a INNER JOIN funcionarios b ON a.funcionario = b.id WHERE username = '$user' AND password = '$pass'");

    }

    function register( $user, $email, $pass, $funcionario, $adminLevel ) {

        $pass = hash('whirlpool', $pass);
        $data = array(
            'username'      => $user,
            'password'      => $pass,
            'uEmail'        => $email,
            'funcionario'   => $funcionario,
            'admin'         => $adminLevel,
        );
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

    function update($login_id, $login_usuario, $login_email, $login_senha, $login_admin, $login_ativo) {

        $data = array(
            'username' => $login_usuario,
            'password' => $login_senha,
            'uEmail'   => $login_email,
            'admin'    => $login_admin,
            'ativo'    => $login_ativo,
        );

        $this->db->where('id', $login_id);
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