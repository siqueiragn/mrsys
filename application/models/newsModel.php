<?php

class NewsModel extends CI_Model  {

    var $table 	    = 'ucp_news';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("ID = $codigo")
                        ->get($this->table);

    }

    function getByIDToUser( $codigo, $username ) {

        return $this->db->select('*')
                        ->where("ID = $codigo AND Autor = '$username'")
                        ->get($this->table);

    }

    function salvar( $texto, $autor, $visivel, $stamp ) {

        $data = array(
            'texto'   => $texto,
            'autor'   => $autor,
            'visivel' => $visivel,
            'stamp'   => $stamp,
        );

        $this->db->insert($this->table, $data);

    }


    function atualizar( $id, $texto, $autor, $visivel, $stamp ) {

        $data = array(
            'autor'   => $autor,
            'visivel' => $visivel,
        );

        $this->db->where('ID', $id);
        $this->db->update($this->table, $data);

    }

    function listar( $visivel = false ) {

        if ($visivel) {
            return $this->db->select('*')
                            ->where("visivel = 1")
                            ->order_by('ID')
                            ->get($this->table);
        } else {
            return $this->db->select('*')
                            ->order_by('ID')
                            ->get($this->table);
        }

    }


}

?>