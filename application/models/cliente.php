<?php

class Cliente extends CI_Model  {

    var $table 	    = 'clientes';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }

    function getByIDView( $codigo, $user ) {

        return $this->db->select('*')
                        ->where("ucpOwn = $user and ID = $codigo")
                        ->get($this->table);

    }

    function getByCharacterID( $codigo ) {

        return $this->db->select('*')
                        ->where("ID = $codigo")
                        ->get($this->table);

    }

    function getByIDToUser( $codigo, $username ) {

        return $this->db->select('*')
                        ->where("ucpOwn = $codigo")
                        ->get($this->table);

    }

    function salvar($nome, $cnpj, $endereco, $responsavel, $tel, $mail){

        $data = array(
            'nome'         => $nome,
            'cnpj'           => $cnpj,
            'endereco'              => $endereco,
            'responsavel'      => $responsavel,
            'contato'           => $tel,
            'mail'        => $mail,
			'ativo' => "1",
			
		
        );

        $this->db->insert($this->table, $data);

    }


    function atualizar($id, $nome, $cnpj, $endereco, $responsavel, $tel, $mail, $status) {

        $data = array(
            'nome'         => $nome,
            'cnpj'           => $cnpj,
            'endereco'              => $endereco,
            'responsavel'      => $responsavel,
            'contato'           => $tel,
            'mail'        => $mail,
			'ativo'  => $status,
			);

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

    }
    function getAll() {

            return $this->db->select('*')
                            ->order_by('id')
                            ->get($this->table);

    }

    function getAllWaiting() {

        return $this->db->query("SELECT a.ID, a.Username, b.uNome FROM accounts a INNER JOIN ucp_users b ON a.ucpOwn = b.uID WHERE a.STATUS = 0 ORDER BY a.ID");

    }

}

?>