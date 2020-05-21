<?php

class Servico extends CI_Model  {

    var $table 	    = 'servicos';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }


    function salvar( $nome, $franquiahora, $valorhora, $cliente, $franquiakm, $valorkm, $extrahora, $extrakm, $pernoite, $batida, $domfer, $deslocamentorj, $deslocamentointerestadual, $pedagio, $valor_pago_agente, $valor_extra_agente, $valor_km_agente, $valor_pernoite_agente, $valor_deslocamentos_agente, $valor_adicional_agente, $combustivel, $alimentacao, $periculosidade, $auxveiculo, $addnoturno ){

        $data = array(
            'nome'                       => $nome,
            'franquiahora'               => $franquiahora,
            'valorhora'                  => $valorhora,
            'cliente'                    => $cliente,
            'franquiakm'                 => $franquiakm,
            'valorkm'                    => $valorkm,
            'extrahora'                  => $extrahora,
            'extrakm'                    => $extrakm,
            'pernoite'                   => $pernoite,
            'batida'                     => $batida,
            'domfer'                     => $domfer,
            'deslocamentorj'             => $deslocamentorj,
            'deslocamentointerestadual'  => $deslocamentointerestadual,
            'pedagio'                    => $pedagio,
            'valor_pago_agente'          => $valor_pago_agente,
            'valor_extra_agente'         => $valor_extra_agente,
            'valor_km_agente'            => $valor_km_agente,
            'valor_pernoite_agente'      => $valor_pernoite_agente,
            'valor_deslocamentos_agente' => $valor_deslocamentos_agente,
            'valor_adicional_agente'     => $valor_adicional_agente,
            'combustivel'                => $combustivel,
            'alimentacao'                => $alimentacao,
            'periculosidade'             => $periculosidade,
            'auxveiculo'                 => $auxveiculo,
            'addnoturno'                 => $addnoturno,
        );

        $this->db->insert($this->table, $data);

    }


    function atualizar($id, $nome, $franquiahora, $valorhora, $cliente, $franquiakm, $valorkm, $extrahora, $extrakm, $pernoite, $batida, $domfer, $deslocamentorj, $deslocamentointerestadual, $pedagio, $valor_pago_agente, $valor_extra_agente, $valor_km_agente, $valor_pernoite_agente, $valor_deslocamentos_agente, $valor_adicional_agente, $combustivel, $alimentacao, $periculosidade, $auxveiculo, $addnoturno ){

        $data = array(
            'nome'                       => $nome,
            'franquiahora'               => $franquiahora,
            'valorhora'                  => $valorhora,
            'cliente'                    => $cliente,
            'franquiakm'                 => $franquiakm,
            'valorkm'                    => $valorkm,
            'extrahora'                  => $extrahora,
            'extrakm'                    => $extrakm,
            'pernoite'                   => $pernoite,
            'batida'                     => $batida,
            'domfer'                     => $domfer,
            'deslocamentorj'             => $deslocamentorj,
            'deslocamentointerestadual'  => $deslocamentointerestadual,
            'pedagio'                    => $pedagio,
            'valor_pago_agente'          => $valor_pago_agente,
            'valor_extra_agente'         => $valor_extra_agente,
            'valor_km_agente'            => $valor_km_agente,
            'valor_pernoite_agente'      => $valor_pernoite_agente,
            'valor_deslocamentos_agente' => $valor_deslocamentos_agente,
            'valor_adicional_agente'     => $valor_adicional_agente,
            'combustivel'                => $combustivel,
            'alimentacao'                => $alimentacao,
            'periculosidade'             => $periculosidade,
            'auxveiculo'                 => $auxveiculo,
            'addnoturno'                 => $addnoturno,
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