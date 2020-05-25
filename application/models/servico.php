<?php

class Servico extends CI_Model  {

    var $table 	    = 'servicos';

    function getByID( $codigo ) {

        return $this->db->query("SELECT *, CAST(REPLACE(deslocamentorj, ',', '.') AS DECIMAL(12,2)) + CAST(REPLACE(deslocamentointerestadual, ',', '.') AS DECIMAL(12,2)) AS deslocamento FROM SERVICOS WHERE id = $codigo");

    }


    function salvar( $nome, $franquiahora, $valor_franquia, $cliente, $franquiakm, $extrahora, $extrakm, $pernoite, $batida, $domfer, $deslocamentorj, $deslocamentointerestadual, $pedagio, $valor_pago_agente, $valor_batida_extra, $valor_extra_agente, $valor_km_agente, $valor_pernoite_agente, $valor_deslocamentos_agente, $valor_adicional_agente, $combustivel, $alimentacao, $periculosidade, $auxveiculo, $addnoturno ){

        $data = array(
            'nome'                       => $nome,
            'franquiahora'               => $franquiahora,
            'cliente'                    => $cliente,
            'franquiakm'                 => $franquiakm,
            'valor_franquia'             => $valor_franquia,
            'extrahora'                  => $extrahora,
            'extrakm'                    => $extrakm,
            'pernoite'                   => $pernoite,
            'batida'                     => $batida,
            'domfer'                     => $domfer,
            'deslocamentorj'             => $deslocamentorj,
            'deslocamentointerestadual'  => $deslocamentointerestadual,
            'pedagio'                    => $pedagio,
            'valor_pago_agente'          => $valor_pago_agente,
            'valor_batida_extra'         => $valor_batida_extra,
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


    function atualizar($id, $nome, $franquiahora, $valor_franquia, $cliente, $franquiakm, $extrahora, $extrakm, $pernoite, $batida, $domfer, $deslocamentorj, $deslocamentointerestadual, $pedagio, $valor_pago_agente, $valor_batida_extra, $valor_extra_agente, $valor_km_agente, $valor_pernoite_agente, $valor_deslocamentos_agente, $valor_adicional_agente, $combustivel, $alimentacao, $periculosidade, $auxveiculo, $addnoturno ){

        $data = array(
            'nome'                       => $nome,
            'franquiahora'               => $franquiahora,
            'cliente'                    => $cliente,
            'franquiakm'                 => $franquiakm,
            'valor_franquia'             => $valor_franquia,
            'extrahora'                  => $extrahora,
            'extrakm'                    => $extrakm,
            'pernoite'                   => $pernoite,
            'batida'                     => $batida,
            'domfer'                     => $domfer,
            'deslocamentorj'             => $deslocamentorj,
            'deslocamentointerestadual'  => $deslocamentointerestadual,
            'pedagio'                    => $pedagio,
            'valor_pago_agente'          => $valor_pago_agente,
            'valor_batida_extra'         => $valor_batida_extra,
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