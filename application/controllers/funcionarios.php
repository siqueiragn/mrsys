<?php

class Funcionarios extends MY_Controller {

	public function index()
	{

	    redirect( $this->router->class . '/listar');

	}
	 
	public function cadastrar()
	{

        $this->load->model('funcionario');

            $this->load->view('estruturas/topo_ucp');
            $this->load->view($this->router->class . '/cadastrar');
	}

	public function editar()
	{
	    $this->load->model('funcionario');

        $data['objeto'] = $this->funcionario->getByID( $this->uri->segment(3) )->row();

        if ($data['objeto']) {

            $this->load->model('documento');
            $data['documentos'] = $this->documento->getAllByFunc( $this->uri->segment(3) )->result();

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

        $this->load->model('funcionario');

        if ($this->input->get()) {

            $nome   = $this->input->get('nome');
            $cpf    = limpar_campo($this->input->get('cpf'));
            $status = $this->input->get('status');

            $data['objetos'] = $this->funcionario->getFilters( $nome, $cpf, $status );

        } else {

            $data['objetos'] = $this->funcionario->getAll();

        }

        $this->load->view($this->router->class . '/listar', $data);

    }

	public function DB()
    {

        $this->load->model('funcionario');
			
        $nome            = $this->input->post("nome");
        $cpf             = limpar_campo($this->input->post("cpf"));
        $rg         	 = limpar_campo($this->input->post("rg"));
        $data_nascimento = $this->input->post("data_nascimento");
        $contratacao     = $this->input->post('contratacao');
        $vencimentocnh   = $this->input->post('vencimentocnh');
        $cnh             = limpar_campo($this->input->post('cnh'));
        $pai             = $this->input->post('pai');
        $mae             = $this->input->post('mae');
        $endereco        = $this->input->post('endereco');
        $complemento     = $this->input->post('complemento');
        $cep             = limpar_campo($this->input->post('cep'));
        $cidade          = $this->input->post('cidade');
        $tel             = limpar_campo($this->input->post('tel'));
        $cel             = limpar_campo($this->input->post('cel'));
        $conta           = $this->input->post('conta');
        $banco           = $this->input->post('banco');
        $agencia         = $this->input->post('agencia');
        $tipoconta       = $this->input->post('tipoconta');
        $veiculo         = $this->input->post('veiculo');
        $placa           = $this->input->post('placa');
        $cor             = $this->input->post('cor');
        $ano             = $this->input->post('ano');
        $rastreador      = $this->input->post('rastreador');
        $diaria          = $this->input->post('diaria');
        $salario         = $this->input->post('salario');
		$funcao         = $this->input->post('funcao');
		$mei         = $this->input->post('mei');
		

        if ( $_FILES['avatar']['name'] ) {
            $extensao        = strtolower( pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION) );
            $avatar          = "avatar.$extensao";
        }


        switch ( $this->input->get('acao')) {

                case 'salvar':
				
					//echo pre($this->input->post());exit;
                    $this->funcionario->salvar($nome, $cpf, $rg, $data_nascimento, $contratacao, $vencimentocnh, $cnh, $pai, $mae, $endereco,$complemento, $cep, $cidade, $tel, $cel, $conta, $banco, $agencia, $tipoconta, $veiculo, $placa, $cor, $ano, $rastreador, $diaria, $salario, $avatar, $funcao, $mei);

                    $idFunc = $this->db->insert_id();

                    if ( $_FILES['avatar']['name'] ) {

                        $caminho = $this->dados_globais['imgPath'] . $this->router->class . "/$idFunc";
                        if (!is_dir($caminho)) {
                            mkdir($caminho, 0777, true);
                        }
                        $caminho .= "/$avatar";

                        move_uploaded_file($_FILES['avatar']['tmp_name'], $caminho);

                    }

                    foreach ($_FILES['arquivo']['tmp_name'] as $indice=>$file) {

                        $extensao = strtolower( pathinfo($_FILES['arquivo']['name'][$indice], PATHINFO_EXTENSION) );

                        $this->load->model('documento');
                        $this->documento->salvar($extensao, $idFunc);

                        $idArquivo = $this->db->insert_id();

                        $caminho   = $this->dados_globais['imgPath'] . $this->router->class . "/$idFunc/ged";
                        if ( !is_dir($caminho) ) {
                            mkdir($caminho, 0777, true);
                        }
                        $caminho .= "/$idArquivo.$extensao";

                        move_uploaded_file($file, $caminho);
                        
                    }


                break;
                case 'atz':
				
					$status       = $this->input->post('status');
					$desligamento = $this->input->post('desligamento');
					
					$idFunc       = $this->input->get('cd');
					$this->funcionario->atualizar($idFunc, $nome, $cpf, $rg, $data_nascimento, $contratacao, $vencimentocnh, $cnh, $pai, $mae, $endereco,$complemento, $cep, $cidade, $tel, $cel, $conta, $banco, $agencia, $tipoconta, $veiculo, $placa, $cor, $ano, $rastreador, $diaria, $salario, $desligamento, $status, $avatar, $funcao, $mei);

                    if ( $_FILES['avatar']['name'] ) {

                        $caminho = $this->dados_globais['imgPath'] . $this->router->class . "/$idFunc";
                        if (!is_dir($caminho)) {
                            mkdir($caminho, 0777, true);
                        }
                        $caminho .= "/$avatar";

                        move_uploaded_file($_FILES['avatar']['tmp_name'], $caminho);

                    }

                    foreach ($_FILES['arquivo']['tmp_name'] as $indice=>$file) {

                        $extensao    = strtolower( pathinfo($_FILES['arquivo']['name'][$indice], PATHINFO_EXTENSION) );
                        $tipoArquivo = $this->input->post('tipo_documento')[$indice];

                        if ($extensao != '') {
                            $this->load->model('documento');
                            $this->documento->salvar($tipoArquivo, $extensao, $idFunc);

                            $idArquivo = $this->db->insert_id();

                            $caminho   = $this->dados_globais['imgPath'] . $this->router->class . "/$idFunc/ged/";
                            if ( !is_dir($caminho) ) {
                                mkdir($caminho, 0777, true);
                            }
                            $caminho .= "$idArquivo.$extensao";

                            move_uploaded_file($file, $caminho);
                        }

                    }

                break;

            }

        redirect( $this->router->class . '/listar');
    }

    public function inativarGed() {

	    if ( $this->input->get() ) {

	        $idFunc = $this->input->get('func');
	        $idGed  = $this->input->get('ged');

	        if ( !empty($idFunc) && !empty($idGed) ) {
                $this->load->model('documento');
                $this->documento->inativar($idGed, $idFunc);
                redirect( $this->router->class . '/editar/' . $idFunc );
            }
        }

        redirect( $this->router->class );

    }


}