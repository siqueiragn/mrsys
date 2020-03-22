<?php

class News extends MY_Controller {

	public function index()
	{
		$this->load->view('estruturas/topo_ucp');
		$this->load->view($this->router->class . '/cadastrar');

	}
	 
	public function cadastrar()
	{
        $this->load->view('estruturas/topo_ucp');
        $this->load->view( $this->router->class . '/cadastrar');
	}

	public function editar()
	{
	    $this->load->model('newsModel');

        $data['objeto'] = $this->newsModel->getByID( $this->uri->segment(3) )->row();

	    if ( true ) {

            $this->load->view('estruturas/topo_ucp');
            $this->load->view( $this->router->class . '/editar', $data);
            $this->load->view('estruturas/rodape_ucp');


        }
	}

	public function listar()
	{
        $this->load->view('estruturas/topo_ucp');

        $this->load->model('newsModel');

        $pesquisa = $this->input->get('pesquisa');
        $data['objetos'] = $this->newsModel->listar( $pesquisa );

        $this->load->view( $this->router->class . '/listar', $data);
	}

	public function DB()
    {

        $this->load->model('newsModel');

            switch ( $this->input->get('acao')) {

                case 'salvar':

                    $texto     = $this->input->post('texto');
                    $visivel   = $this->input->post('visivel') == 'on' ? 1 : 0;

                    $this->newsModel->salvar($texto, $this->nativesession->get('username'), $visivel, $this->dados_globais['stamp']);

                break;
                case 'atualizar':

                    $codigo    = $this->input->get('cd');
                    $texto     = $this->input->post('texto');
                    $visivel   = $this->input->post('visivel') == 'on' ? 1 : 0;

                    $this->newsModel->atualizar($codigo, $texto, $this->nativesession->get('username'), $visivel, $this->dados_globais['stamp']);

                break;

            }

            redirect( $this->router->class . '/listar');

    }


}
