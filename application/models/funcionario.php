<?php

class Funcionario extends CI_Model  {

    var $table 	    = 'funcionarios';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }

    function salvar($nome, $cpf, $rg, $data_nascimento, $contratacao, $vencimentocnh, $cnh, $pai, $mae, $endereco, $complemento, $cep, $cidade, $tel, $cel, $conta, $banco, $agencia, $tipoconta, $veiculo, $placa, $cor, $ano, $rastreador, $diaria, $salario, $avatar, $avatar = null){

        $data = array(
            'nome'            => $nome,
            'cpf'             => $cpf,
            'rg'              => $rg,
            'nascimento'      => $data_nascimento,
            'contratacao'     => $contratacao,
            'vencimentocnh'   => $vencimentocnh,
			'cnh'             => $cnh,
            'pai'             => $pai,
            'mae'             => $mae,
            'endereco'        => $endereco,
            'complemento'     => $complemento,
            'cep'             => $cep,
            'cidade'          => $cidade,
			'tel'             => $tel,
            'cel'             => $cel,
			'conta'           => $conta,
            'banco'           => $banco,
		    'agencia'         => $agencia,
            'tipodeconta'     => $tipoconta,
			'veiculo'         => $veiculo,
            'placa'           => $placa,
			'cor'             => $cor,
            'rastreador'      => $rastreador,
			'diaria'          => $diaria,
			'salario'         => $salario,
			'ativo'           => "1",
        );

        if ( $avatar ) {
            $data['foto'] = $avatar;
        }

        $this->db->insert($this->table, $data);

    }


    function atualizar($id, $nome, $cpf, $rg, $data_nascimento, $contratacao, $vencimentocnh, $cnh, $pai, $mae, $endereco, $complemento, $cep, $cidade, $tel, $cel, $conta, $banco, $agencia, $tipoconta, $veiculo, $placa, $cor, $ano, $rastreador, $diaria, $salario, $desligamento, $status, $avatar = null) {

        $data = array(
            'nome'          => $nome,
            'cpf'           => $cpf,
            'rg'            => $rg,
            'nascimento'    => $data_nascimento,
            'contratacao'   => $contratacao,
            'vencimentocnh' => $vencimentocnh,
			'cnh'           => $cnh,
            'pai'           => $pai,
            'mae'           => $mae,
            'endereco'      => $endereco,
            'complemento'   => $complemento,
            'cep'           => $cep,
            'cidade'        => $cidade,
			'tel'           => $tel,
            'cel'           => $cel,
			'conta'         => $conta,
            'banco'         => $banco,
		    'agencia'       => $agencia,
            'tipodeconta'   => $tipoconta,
			'veiculo'       => $veiculo,
            'placa'         => $placa,
			'cor'           => $cor,
            'rastreador'    => $rastreador,
			'diaria'        => $diaria,
			'salario'       => $salario,
			'ativo'         => $status,
			'desligamento'  => $desligamento,
        );

        if ( $avatar ) {
            $data['foto'] = $avatar;
        }

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

    }
    function getAllByUsername( $Charactername ) {

            return $this->db->select('*')
                            ->where("username = '$Charactername'")
                            ->order_by('ID')
                            ->get($this->table);

    }
    function getAll() {

            return $this->db->select('*')
                            ->order_by('ID')
                            ->get($this->table);

    }

    function getAllWaiting() {

        return $this->db->query("SELECT a.ID, a.Username, b.uNome FROM accounts a INNER JOIN ucp_users b ON a.ucpOwn = b.uID WHERE a.STATUS = 0 ORDER BY a.ID");

    }

}

?>