<?php

class Missoes extends MY_Controller {

	public function index()
	{

	    redirect( $this->router->class . '/listar');

	}
	 
	public function cadastrar()
	{
            $this->load->model('funcionario');
            $data['funcionarios'] = $this->funcionario->getAtivos()->result();

            $this->load->model('cliente');
            $data['clientes'] = $this->cliente->getAll()->result();

            $this->load->model('servico');
            $data['servicos'] = $this->servico->getAll()->result();

            $this->load->view('estruturas/header');
            $this->load->view($this->router->class . '/cadastrar', $data);
	}

	public function editar()
	{
	    $this->load->model('missao');

        $data['objeto'] = $this->missao->getByID( $this->uri->segment(3) )->row();

        if ($data['objeto']) {

            $this->load->model('funcionario');
            $data['funcionarios'] = $this->funcionario->getAtivos()->result();

            $this->load->model('cliente');
            $data['clientes'] = $this->cliente->getAll()->result();

            $this->load->model('servico');
            $data['servicos'] = $this->servico->getAll()->result();

            $this->load->view('estruturas/header');
            $this->load->view($this->router->class . '/editar', $data);
            $this->load->view('estruturas/footer');

        } else {
            redirect( $this->router->class . '/listar');
        }
	}



    public function aprovar()
    {
        $this->load->model('missao');
        $id = $this->uri->segment(3);
        //@todo fix admin levels
        if ( true || $this->nativesession->get('admin') == 3 ) {
            if (is_numeric($id)) {

                $this->missao->aprovar($id);

            }
        }
        redirect( $this->router->class . '/listar');
    }


    public function reprovar()
    {
        $this->load->model('missao');
        $id = $this->uri->segment(3);
        //@todo fix admin levels
        if ( true || $this->nativesession->get('admin') == 3 ) {
            if (is_numeric($id)) {

                $this->missao->reprovar($id);

            }
        }
        redirect( $this->router->class . '/listar');
    }


    public function listar()
    {

        $this->load->model('missao');

        $this->load->model('cliente');
        $data['clientes'] = $this->cliente->getAll()->result();

        $this->load->model('funcionario');
        $data['funcionarios'] = $this->funcionario->getAtivos()->result();

        if ($this->input->get()) {

            $data_hora_inicial   = $this->input->get('data_hora_inicial');
            $data_hora_final     = $this->input->get('data_hora_final');
            $cliente             = $this->input->get('cliente');
            $agente              = $this->input->get('agente');
            $status              = $this->input->get('status');

            $data['objetos'] = $this->missao->getAll( $data_hora_inicial, $data_hora_final, $cliente, $agente, $status );


        } else {

            $data['objetos'] = $this->missao->getAll();

        }

        $this->load->view('estruturas/header');
        $this->load->view($this->router->class . '/listar', $data);
        $this->load->view('estruturas/footer');

    }

	public function DB()
    {

        $this->load->model('missao');
        $agente                = $this->input->post('agente');
        $agente_aux            = $this->input->post('agente_aux');
        $servico               = $this->input->post('servico');
        $data_hora_inicio      = $this->input->post('data_hora_inicio');
        $data_hora_final       = $this->input->post('data_hora_final');
        $diferenca_horas       = $this->input->post('diferenca_horas');
        $hora_extra_quantidade = $this->input->post('hora_extra_quantidade');
        $hora_extra_valor      = $this->input->post('hora_extra_valor');
        $km_inicial            = $this->input->post('km_inicial');
        $km_final              = $this->input->post('km_final');
        $km_total              = $this->input->post('km_total');
        $km_extra_quantidade   = $this->input->post('km_extra_quantidade');
        $km_extra_valor        = $this->input->post('km_extra_valor');
        $local                 = $this->input->post('local');
        $motorista             = $this->input->post('motorista');
        $placa                 = $this->input->post('placa');
        $destino               = $this->input->post('destino');
        $feriado               = $this->input->post('feriado')            ? 1 : 0;
        $batida_extra          = $this->input->post('batida_extra')       ? 1 : 0;
        $deslocamento_extra    = $this->input->post('deslocamento_extra') ? 1 : 0;
        $pedagio               = $this->input->post('pedagio')            ? 1 : 0;
        $pernoite              = $this->input->post('pernoite')           ? 1 : 0;


        switch ( $this->input->get('acao')) {

                case 'salvar':
				
                    $this->missao->salvar( $agente, $agente_aux, $servico, $data_hora_inicio, $data_hora_final, $km_inicial, $km_final, $local, $motorista, $placa, $destino, $feriado, $batida_extra, $deslocamento_extra, $pedagio, $pernoite, $this->nativesession->get('userID') );

                break;
                case 'atz':

					$id = $this->input->get('id');
                    $this->missao->atualizar( $id, $agente, $agente_aux, $servico, $data_hora_inicio, $data_hora_final, $km_inicial, $km_final, $local, $motorista, $placa, $destino, $feriado, $batida_extra, $deslocamento_extra, $pedagio, $pernoite, $this->nativesession->get('userID'));

                break;

            }


        flashdata('alert-success', 'Operação realizada com sucesso!');
        redirect( $this->router->class . '/listar');
    }

    public function servicos()
    {
        $this->load->model('servico');
        $servico = $this->servico->getByID($this->input->post('servico'))->row();
        echo "$servico->franquiahora{QUEBRA}$servico->extrahora{QUEBRA}$servico->franquiakm{QUEBRA}$servico->extrakm{QUEBRA}$servico->valor_franquia{QUEBRA}$servico->valor_pago_agente{QUEBRA}$servico->valor_batida_extra{QUEBRA}$servico->valor_extra_agente{QUEBRA}$servico->valor_km_agente{QUEBRA}$servico->valor_pernoite_agente{QUEBRA}$servico->valor_deslocamentos_agente{QUEBRA}$servico->valor_adicional_agente{QUEBRA}$servico->domfer{QUEBRA}$servico->batida{QUEBRA}$servico->deslocamento{QUEBRA}$servico->pedagio{QUEBRA}$servico->pernoite";

    }
}