<?php

class Servico extends CI_Model  {

    var $table 	    = 'servicos';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }


    function salvar($nome, $valor, $franquiahora, $franquiakm, $valorhora, $valorkm, $custo, $salario, $combustivel, $alimentacao, $periculosidade, $auxveiculo, $addnoturno){

        $data = array(
            'nome'         => $nome,
            'valor'           => $valor,
            'franquiahora'              => $franquiahora,
            'franquiakm'      => $franquiakm,
            'valorhora'           => $valorhora,
			'valorkm'           => $valorkm,
            'custo'        => $custo,
			'salario'         => $salario,
            'combustivel'           => $combustivel,
            'alimentacao'              => $alimentacao,
            'periculosidade'      => $periculosidade,
            'auxveiculo'           => $auxveiculo,
            'addnoturno'        => $addnoturno,
			
		
        );

        $this->db->insert($this->table, $data);

    }


    function atualizar($id, $nome, $valor, $franquiahora, $franquiakm, $valorhora, $valorkm, $custo, $salario, $combustivel, $alimentacao, $periculosidade, $auxveiculo, $addnoturno, $domfer) {

        $data = array(
            'nome'         => $nome,
            'valor'           => $valor,
            'franquiahora'              => $franquiahora,
            'franquiakm'      => $franquiakm,
            'valorhora'           => $valorhora,
			'valorkm'           => $valorkm,
            'custo'        => $custo,
			'salario'         => $salario,
            'combustivel'           => $combustivel,
            'alimentacao'              => $alimentacao,
            'periculosidade'      => $periculosidade,
            'auxveiculo'           => $auxveiculo,
            'addnoturno'        => $addnoturno,
			'domfer'        => $domfer,
			
		
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

    }
    function getAll() {

            return $this->db->select('*')
                            ->order_by('id')
                            ->get($this->table);

    }


}

?>