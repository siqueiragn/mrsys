<?php

class Servicos extends MY_Controller {

	public function index()
	{

	    redirect( $this->router->class . '/listar');

	}
	 
	public function cadastrar()
	{
        $this->load->model('cliente');
        $data['clientes'] = $this->cliente->getAll()->result();

        $this->load->view('estruturas/header');
        $this->load->view($this->router->class . '/cadastrar', $data);
	}

	public function editar()
	{
	    $this->load->model('servico');

        $data['objeto'] = $this->servico->getByID( $this->uri->segment(3) )->row();

        if ($data['objeto']) {
            $this->load->model('cliente');
            $data['clientes'] = $this->cliente->getAll()->result();

            $this->load->view('estruturas/header');
            $this->load->view($this->router->class . '/editar', $data);
            $this->load->view('estruturas/footer');
        } else {
            redirect( $this->router->class . '/listar?msg=8001');
        }
	}

	public function listar()
    {
        $this->load->view('estruturas/header');

        $this->load->model('servico');

        $data['objetos'] = $this->servico->getAll();

        $this->load->view($this->router->class . '/listar', $data);

    }

	public function DB()
    {

        $this->load->model('servico');

        $nome                       = $this->input->post('nome');
        $franquiahora               = $this->input->post('franquiahora');
        $cliente                    = $this->input->post('cliente');
        $franquiakm                 = $this->input->post('franquiakm');
        $valor_franquia             = $this->input->post('valor_franquia');
        $extrahora                  = $this->input->post('extrahora');
        $extrakm                    = $this->input->post('extrakm');
        $pernoite                   = $this->input->post('pernoite');
        $batida                     = $this->input->post('batida');
        $domfer                     = $this->input->post('domfer');
        $deslocamentorj             = $this->input->post('deslocamentorj');
        $deslocamentointerestadual  = $this->input->post('deslocamentointerestadual');
        $pedagio                    = $this->input->post('pedagio');
        $valor_pago_agente          = $this->input->post('valor_pago_agente');
        $valor_extra_agente         = $this->input->post('valor_extra_agente');
        $valor_km_agente            = $this->input->post('valor_km_agente');
        $valor_pernoite_agente      = $this->input->post('valor_pernoite_agente');
        $valor_deslocamentos_agente = $this->input->post('valor_deslocamentos_agente');
        $valor_adicional_agente     = $this->input->post('valor_adicional_agente');
        $combustivel                = $this->input->post('combustivel');
        $alimentacao                = $this->input->post('alimentacao');
        $periculosidade             = $this->input->post('periculosidade');
        $auxveiculo                 = $this->input->post('auxveiculo');
        $addnoturno                 = $this->input->post('addnoturno');

        switch ( $this->input->get('acao')) {

            case 'salvar':

                $this->servico->salvar( $nome, $franquiahora, $valor_franquia, $cliente, $franquiakm, $extrahora, $extrakm, $pernoite, $batida, $domfer, $deslocamentorj, $deslocamentointerestadual, $pedagio, $valor_pago_agente, $valor_extra_agente, $valor_km_agente, $valor_pernoite_agente, $valor_deslocamentos_agente, $valor_adicional_agente, $combustivel, $alimentacao, $periculosidade, $auxveiculo, $addnoturno );

            break;
            case 'atz':

                $id = $this->input->get('cd');
                $this->servico->atualizar( $id, $nome, $franquiahora, $valor_franquia, $cliente, $franquiakm, $extrahora, $extrakm, $pernoite, $batida, $domfer, $deslocamentorj, $deslocamentointerestadual, $pedagio, $valor_pago_agente, $valor_extra_agente, $valor_km_agente, $valor_pernoite_agente, $valor_deslocamentos_agente, $valor_adicional_agente, $combustivel, $alimentacao, $periculosidade, $auxveiculo, $addnoturno );

            break;

        }

        redirect( $this->router->class . '/listar?msg=1');
    }


}
