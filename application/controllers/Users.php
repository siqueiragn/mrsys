<?php

class Users extends MY_Controller {

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
        if ($this->nativesession->get('admin') > 0 ) {

            $this->load->view('estruturas/topo_ucp');

            $this->load->model('user');

            $filtro = $this->input->get('filtro') ? $this->input->get('filtro') : '';

            $data['objetos'] = $this->user->getByFilter($filtro);

            $this->load->view($this->router->class . '/listar', $data);

        } else {
            redirect($this->router->class . '/listar?msg=8000');
        }

    }

    public function consultar() {

        if ($this->nativesession->get('admin') > 0 ) {

            $this->load->view('estruturas/topo_ucp');

            $this->load->model('user');

            $data['objeto'] = $this->user->getByCode( $this->uri->segment(3) )->row();

            $this->load->view($this->router->class . '/editar_usuario', $data);

        } else {
            redirect('ucp/home?msg=8000');
        }

    }

	public function about() {

        if ($this->nativesession->get('admin') > 0 ) {

            $this->load->view('estruturas/topo_ucp');

            $this->load->model('user');

            $data['objeto'] = $this->user->getByCode( $this->nativesession->get('userID') )->row();

            $this->load->view($this->router->class . '/about', $data);

        } else {
            redirect('ucp/home?msg=8000');
        }

    }

	public function DB()
    {

        if ($this->input->post()) {
            $this->load->model('user');

            switch ($this->input->get('action')) {

                case 'atz':

                    $codigo = $this->input->get('cd');
                    $sobre  = $this->input->post('sobre');
                    $img    = null;
                    $cargo  = 1; //admin

                    /* IMAGEM 1  */
                    if (!empty($_FILES['imagem']['name'])) {
                        $ext = extensao($_FILES['imagem']['name']);
                        $img = $codigo;
                        $per = array('jpg', 'jpeg', 'png');
                        if (in_array($ext, $per)) {
                            upload('staff', 'imagem', $img);
                            $img = "$img.$ext";
                        }
                    }

                    $this->user->atualizar_descricao($codigo, $img, $sobre);

                    break;

                case 'atz_usuario':

                    $codigo = $this->input->get('cd');
                    $sobre  = $this->input->post('sobre');
                    $img    = null;
                    $cargo  = 1; //admin

                    /* IMAGEM 1  */
                    if (!empty($_FILES['imagem']['name'])) {
                        $ext = extensao($_FILES['imagem']['name']);
                        $img = $codigo;
                        $per = array('jpg', 'jpeg', 'png');
                        if (in_array($ext, $per)) {
                            upload('staff', 'imagem', $img);
                            $img = "$img.$ext";
                        }
                    }

                    $this->user->atualizar_descricao($codigo, $img, $sobre);

                    break;

            }

        }
            redirect($this->router->class . '/about?msg=1');

    }


}
