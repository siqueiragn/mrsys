<?php

class Funcionario extends CI_Model  {

    var $table 	    = 'funcionarios';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }

    function salvar($nome, $cpf, $rg, $data_nascimento, $contratacao, $vencimentocnh, $cnh, $pai, $mae, $endereco, $complemento, $cep, $cidade, $tel, $cel, $conta, $banco, $agencia, $tipoconta, $veiculo, $placa, $cor, $ano, $rastreador, $diaria, $salario, $avatar = null){

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
			'ano'             => $ano,
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


    function atualizar($id, $nome, $cpf, $rg, $data_nascimento, $contratacao, $vencimentocnh, $cnh, $pai, $mae, $endereco, $complemento, $cep, $cidade, $tel, $cel, $conta, $banco, $agencia, $tipoconta, $veiculo, $placa, $cor, $ano, $rastreador, $diaria, $salario, $desligamento, $status, $avatar = null, $funcao, $mei) {

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
			'ano'           => $ano,
            'rastreador'    => $rastreador,
			'diaria'        => $diaria,
			'salario'       => $salario,
			'ativo'         => $status,
			'desligamento'  => $desligamento,
			'funcao'        => $funcao,
			'mei'           => $mei,
			
			
        );

        if ( $avatar ) {
            $data['foto'] = $avatar;
        }

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

    }
    function getAtivos() {

            return $this->db->select('*')
                            ->where("ativo = 1")
                            ->order_by('nome')
                            ->get($this->table);

    }

    function getAll() {

            return $this->db->select('*')
                            ->order_by('ID')
                            ->get($this->table);

    }

    function getFilters($nome = null, $cpf = null, $status = '1' ) {

            $this->db->select('*');

            if ( $nome != '') {
                $this->db->where("lower(nome) like lower('%$nome%')");
            }

            if ( $cpf != '' ) {
                $this->db->where("cpf = '$cpf'");
            }

            if ( $status == '1' ) {
                $this->db->where("ativo = 1");
            } else if ($status == '0') {
                $this->db->where("ativo = 0");
            }


            return $this->db->order_by('id')->get($this->table);

    }

    function getAllWaiting() {

        return $this->db->query("SELECT a.ID, a.Username, b.uNome FROM accounts a INNER JOIN ucp_users b ON a.ucpOwn = b.uID WHERE a.STATUS = 0 ORDER BY a.ID");

    }

}

?>