<?php

class Clientes extends MY_Controller {

	public function index()
	{

	    redirect( $this->router->class . '/listar');

	}
	 
	public function cadastrar()
	{

        $this->load->model('cliente');

            $this->load->view('estruturas/topo_ucp');
            $this->load->view($this->router->class . '/cadastrar');
	}

	public function editar()
	{
	    $this->load->model('cliente');

        $data['objeto'] = $this->cliente->getByID( $this->uri->segment(3) )->row();

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

        $this->load->model('cliente');

        $data['objetos'] = $this->cliente->getAll();

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

        $this->load->model('cliente');
			
			$nome = $this->input->post("nome");
                    $cnpj           = $this->input->post("cnpj");
					$endereco = $this->input->post("endereco");
                    //$idade          = calcularIdadade($data_nascimento );
                    $responsavel           = $this->input->post('responsavel');
					$tel           = $this->input->post('tel');
					$mail           = $this->input->post('mail');

            switch ( $this->input->get('acao')) {

                case 'salvar':
				
					//echo pre($this->input->post());exit;
                    $this->cliente->salvar($nome, $cnpj, $endereco, $responsavel, $tel, $mail);


                break;
                case 'atz':
				
					$status  = $this->input->post('status');
		
					$id=$this->input->get('cd');
					$this->cliente->atualizar($id, $nome, $cnpj, $endereco, $responsavel, $tel, $mail, $status);
			
                break;

            }

        redirect( $this->router->class . '/listar?msg=1');
    }


}
