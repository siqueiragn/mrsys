<?php

class Missao extends CI_Model  {

    var $table 	    = 'missoes';

    function getByID( $codigo ) {

        return $this->db->query("SELECT M.ID AS missao_id,
		                                M.*,
		                                S.ID as servico_id,
		                                S.*,
		                                M.KM_FINAL - M.KM_INICIAL AS km_diferenca,
		                                ((M.KM_FINAL - M.KM_INICIAL) - S.FRANQUIAKM) * CAST(REPLACE(S.EXTRAKM, ',', '.') AS DECIMAL(12,2))  AS total_km_extra,
		                                ((M.KM_FINAL - M.KM_INICIAL) - S.FRANQUIAKM)  AS qtd_total_km_extra,
		                                TIMESTAMPDIFF(HOUR, STR_TO_DATE(M.DATA_HORA_INICIAL, '%d/%m/%Y %h:%i'), STR_TO_DATE(M.DATA_HORA_FINAL, '%d/%m/%Y %h:%i')) AS hora_diferenca,
		                                ((TIMESTAMPDIFF(HOUR, STR_TO_DATE(M.DATA_HORA_INICIAL, '%d/%m/%Y %h:%i'), STR_TO_DATE(M.DATA_HORA_FINAL, '%d/%m/%Y %h:%i'))) - S.FRANQUIAHORA) * CAST(REPLACE(S.EXTRAHORA, ',', '.') AS DECIMAL(12,2))  AS total_hora_extra,
		                                ((TIMESTAMPDIFF(HOUR, STR_TO_DATE(M.DATA_HORA_INICIAL, '%d/%m/%Y %h:%i'), STR_TO_DATE(M.DATA_HORA_FINAL, '%d/%m/%Y %h:%i'))) - S.FRANQUIAHORA)  AS qtd_total_hora_extra
                                   FROM MISSOES M 
                             INNER JOIN SERVICOS S 
                                     ON M.SERVICO = S.ID 
                                  WHERE M.ID = $codigo");

    }

    function salvar( $agente, $agente_aux, $servico, $data_hora_inicio, $data_hora_final, $km_inicial, $km_final, $local, $motorista, $placa, $destino, $feriado, $batida_extra, $deslocamento_extra, $pedagio, $pernoite, $usuario ){

        $data = array(
            'data_hora_inicial'     => $data_hora_inicio,
            'data_hora_final'       => $data_hora_final,
            'km_inicial'            => $km_inicial,
            'km_final'              => $km_final,
            'motorista'             => $motorista,
            'placa'                 => $placa,
            'destino'               => $destino,
            'endereco'              => $local,
            'agente'                => $agente,
            'agente2'               => $agente_aux,
            'servico'               => $servico,
            'cb_feriado'            => $feriado,
            'cb_batida_extra'       => $batida_extra,
            'cb_deslocamento_extra' => $deslocamento_extra,
            'cb_pedagio'            => $pedagio,
            'cb_pernoite'           => $pernoite,
            'usuario'               => $usuario,
            'status'                => 0,
        );

        $this->db->insert($this->table, $data);

    }


    function atualizar($id, $agente, $agente_aux, $servico, $data_hora_inicio, $data_hora_final, $km_inicial, $km_final, $local, $motorista, $placa, $destino, $feriado, $batida_extra, $deslocamento_extra, $pedagio, $pernoite, $usuario ) {

        $data = array(
            'data_hora_inicial'     => $data_hora_inicio,
            'data_hora_final'       => $data_hora_final,
            'km_inicial'            => $km_inicial,
            'km_final'              => $km_final,
            'motorista'             => $motorista,
            'placa'                 => $placa,
            'destino'               => $destino,
            'endereco'              => $local,
            'agente'                => $agente,
            'agente2'               => $agente_aux,
            'servico'               => $servico,
            'cb_feriado'            => $feriado,
            'cb_batida_extra'       => $batida_extra,
            'cb_deslocamento_extra' => $deslocamento_extra,
            'cb_pedagio'            => $pedagio,
            'cb_pernoite'           => $pernoite,
            'usuario'               => $usuario,
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

    }

    function aprovar($id) {

        $data = array(
            'status'   => 1,
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

    }

    function reprovar($id) {

        $data = array(
            'status'   => 2,
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
                            ->order_by('id')
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