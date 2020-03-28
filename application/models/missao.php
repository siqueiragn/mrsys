<?php

class Missao extends CI_Model  {

    var $table 	    = 'missoes';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }

    function salvar( $cliente, $servico, $data_hora_inicio, $data_hora_final, $km_inicial, $km_final, $local, $motorista, $placa, $endereco, $feriado, $agente, $agente_aux, $usuario ){

        $data = array(
            'data_hora_inicial'   => $data_hora_inicio,
            'data_hora_final'     => $data_hora_final,
            'km_inicial'          => $km_inicial,
            'km_final'            => $km_final,
            'motorista'           => $motorista,
            'placa'               => $placa,
            'destino'             => $local,
            'endereco'            => $endereco,
            'agente'              => $agente,
            'agente2'             => $agente_aux,
            'servico'             => $servico,
            'cliente'             => $cliente,
            'feriado'             => $feriado,
            'usuario'             => $usuario,
            'status'              => 0,
        );

        $this->db->insert($this->table, $data);

    }


    function atualizar($id, $cliente, $servico, $data_hora_inicio, $data_hora_final, $km_inicial, $km_final, $local, $motorista, $placa, $endereco, $feriado, $agente, $agente_aux, $usuario ) {

        $data = array(
            'data_hora_inicial'   => $data_hora_inicio,
            'data_hora_final'     => $data_hora_final,
            'km_inicial'          => $km_inicial,
            'km_final'            => $km_final,
            'motorista'           => $motorista,
            'placa'               => $placa,
            'destino'             => $local,
            'endereco'            => $endereco,
            'agente'              => $agente,
            'agente2'             => $agente_aux,
            'servico'             => $servico,
            'cliente'             => $cliente,
            'feriado'             => $feriado,
            'usuario'             => $usuario,
            'status'              => 0,
        );

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