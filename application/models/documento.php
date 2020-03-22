<?php

class Documento extends CI_Model  {

    var $table 	    = 'documentos';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }

    function salvar($tipo_documento, $extensao, $funcionario) {

        $data = array(
            'tipo'            => $tipo_documento,
            'extensao'        => $extensao,
            'funcionario'     => $funcionario,
        );

        $this->db->insert($this->table, $data);

    }


    function atualizar($id, $tipo_documento, $extensao, $funcionario) {

        $data = array(
            'tipo'            => $tipo_documento,
            'extensao'        => $extensao,
            'funcionario'     => $funcionario,
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

    }


    function inativar($id, $funcId) {

        $data = array(
            'status' => 0,
        );

        $this->db->where('id', $id);
        $this->db->where('funcionario', $funcId);

        $this->db->update($this->table, $data);

    }

    function getAll() {

            return $this->db->select('*')
                            ->order_by('ID')
                            ->get($this->table);

    }

    function getAllByFunc( $funcId ) {

        return $this->db->select('*')
                        ->where("funcionario = $funcId")
                        ->where("status <> '0' or status is null")
                        ->get($this->table);
    }

}

?>