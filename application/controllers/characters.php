<?php

class Characters extends MY_Controller {

	public function index()
	{

	    redirect( $this->router->class . '/listar');

	}
	 
	public function cadastrar()
	{

        $this->load->model('character');

        $data['objeto'] = $this->character->getByID( $this->nativesession->get('userID') );

        if ( $data['objeto']->num_rows() == 3 ) {
            redirect($this->router->class . '/listar?msg=8002');
        } else {
            $this->load->view('estruturas/topo_ucp');
            $this->load->view($this->router->class . '/cadastrar');
        }
	}

	public function editar()
	{
	    $this->load->model('character');

        $data['objeto'] = $this->character->getByIDView( $this->uri->segment(3), $this->nativesession->get('userID') )->row();

        if ($data['objeto']) {

            $this->load->view('estruturas/topo_ucp');

            switch ($data['objeto']->STATUS) {
                case 0:
                    $this->load->view($this->router->class . '/consultar', $data);
                    break;
                case 1:
                    $this->load->view($this->router->class . '/editar', $data);
                    break;
                case 2:
                    $this->load->view($this->router->class . '/consultar_recusado', $data);
                    break;
            }

            $this->load->view('estruturas/rodape_ucp');
        } else {
            redirect( $this->router->class . '/listar?msg=8001');
        }
	}

	public function listar()
    {
        $this->load->view('estruturas/topo_ucp');

        $this->load->model('character');

        $data['objetos'] = $this->character->getAllByUserID($this->nativesession->get('userID'));

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

        $this->load->model('character');

            switch ( $this->input->get('acao')) {

                case 'salvar':

                    $nome           = str_replace(" ", "_", $this->input->post("nome") );
                    $dataNascimento = $this->input->post("data_nascimento");
                    $sexo           = $this->input->post("sexo");
                    $origem         = $this->input->post("origem");
                    $idade          = calcularIdadade( $dataNascimento );
                    $skin           = $this->input->post('skin');
                    $historia       = strip_tags( $this->input->post('historia') );
                    $questao1       = strip_tags( $this->input->post('questao1') );
                    $questao2       = strip_tags( $this->input->post('questao2') );


                    $this->character->salvar($nome, $origem, $idade, $skin, $sexo, $dataNascimento, 0, $historia, $questao1, $questao2, $this->nativesession->get('userID'), $this->dados_globais['stamp']);


                break;
                case 'atualizar':


                break;
                case 'reenviar':

                    $codigo         = $this->input->get('cd');
                    $nome           = str_replace(" ", "_", $this->input->post("nome") );
                    $dataNascimento = $this->input->post("data_nascimento");
                    $sexo           = $this->input->post("sexo");
                    $origem         = $this->input->post("origem");
                    $idade          = calcularIdadade( $dataNascimento );
                    $skin           = $this->input->post('skin');
                    $historia       = strip_tags( $this->input->post('historia') );
                    $questao1       = strip_tags( $this->input->post('questao1') );
                    $questao2       = strip_tags( $this->input->post('questao2') );


                    $this->character->reenviar_aplicacao($codigo, $nome, $origem, $idade, $skin, $sexo, $dataNascimento, 0, $historia, $questao1, $questao2, $this->nativesession->get('userID'), $this->dados_globais['stamp']);


                    break;

            }

        redirect( $this->router->class . '/listar?msg=1');
    }


}
