<?php

class Servicos extends MY_Controller {

	public function index()
	{

	    redirect( $this->router->class . '/listar');

	}
	 
	public function cadastrar()
	{

        $this->load->model('servico');

            $this->load->view('estruturas/topo_ucp');
            $this->load->view($this->router->class . '/cadastrar');
	}

	public function editar()
	{
	    $this->load->model('servico');

        $data['objeto'] = $this->servico->getByID( $this->uri->segment(3) )->row();

        if ($data['objeto']) {

            $this->load->view('estruturas/topo_ucp');

                    $this->load->view($this->router->class . '/editar', $data);
                    
            $this->load->view('estruturas/rodape_ucp');
        } else {
            redirect( $this->router->class . '/listar?msg=8001');
        }
	}

	public function listar()
    {
        $this->load->view('estruturas/topo_ucp');

        $this->load->model('servico');

        $data['objetos'] = $this->servico->getAll();

        $this->load->view($this->router->class . '/listar', $data);

    }

	public function aplicacoes()
	{
        if ($this->nativesession->get('admin') > 0 ) {

            $this->load->view('estruturas/topo_ucp');

            $this->load->model('character');

            $data['objetos'] = $this->character->getAllWaiting();

            $this->load->view( $this->router->class . '/aplicacoes_listar', $data);

        } else {
            redirect($this->router->class . '/listar?msg=8000');
        }
	}

	public function avaliar()
	{

	    if ($this->nativesession->get('admin') > 0 ) {
            $this->load->view('estruturas/topo_ucp');

            $this->load->model('character');

            $data['objeto'] = $this->character->getByCharacterID($this->uri->segment(3))->row();

            $this->load->view($this->router->class . '/avaliar', $data);
        } else {
	        redirect($this->router->class . '/listar?msg=8000');
        }
	}

    public function dbAvaliar()
    {

        if ($this->nativesession->get('admin') > 0 ) {

            $this->load->model('character');
            $id = $this->input->get('id');

            if ($this->input->post('status') == 'aprovar') {
                $this->character->aprovar($id, $this->nativesession->get('username') );
                redirect( $this->router->class . '/aplicacoes?msg=1');
            } else {
                $motivo = $this->input->post('motivo');
                $this->character->recusar($id, $motivo, $this->nativesession->get('username') );
                redirect( $this->router->class . '/aplicacoes?msg=2');
            }



        } else {
            redirect($this->router->class . '/listar?msg=8000');
        }
    }

	public function DB()
    {

        $this->load->model('servico');
			
					$nome = $this->input->post("nome");
                    $valor           = $this->input->post("valor");
					$franquiahora = $this->input->post("franquiahora");
                    //$idade          = calcularIdadade($data_nascimento );
                    $franquiakm           = $this->input->post('franquiakm');
					$valorhora           = $this->input->post('valorhora');
					$valorkm           = $this->input->post('valorkm');
					$custo           = $this->input->post('custo');
					$salario           = $this->input->post('salario');
					$combustivel           = $this->input->post('combustivel');
					$alimentacao           = $this->input->post('alimentacao');
					$periculosidade           = $this->input->post('periculosidade');
					$auxveiculo           = $this->input->post('auxveiculo');
					$addnoturno           = $this->input->post('addnoturno');
					$domfer           = $this->input->post('domfer');
				

            switch ( $this->input->get('acao')) {

                case 'salvar':
				
					//echo pre($this->input->post());exit;
                    $this->servico->salvar($nome, $valor, $franquiahora, $franquiakm, $valorhora, $valorkm, $custo, $salario, $combustivel, $alimentacao, $periculosidade, $auxveiculo, $addnoturno, $domfer);


                break;
                case 'atz':
				
		
					$id=$this->input->get('cd');
					$this->servico->atualizar($id, $nome, $valor, $franquiahora, $franquiakm, $valorhora, $valorkm, $custo, $salario, $combustivel, $alimentacao, $periculosidade, $auxveiculo, $addnoturno, $domfer);
			
                break;

            }

        redirect( $this->router->class . '/listar?msg=1');
    }


}
