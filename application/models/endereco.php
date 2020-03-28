<?php

class Endereco extends CI_Model  {

    var $table 	    = 'endereco';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }

    function salvar($nome){

        $data = array(
            'nome'   => $nome,
        );

        $this->db->insert($this->table, $data);

    }


    function atualizar($id, $nome) {

        $data = array(
            'nome'          => $nome,

        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

    }
    function getAll() {

            return $this->db->select('*')
                            ->order_by('ID')
                            ->get($this->table);

    }

}

?>