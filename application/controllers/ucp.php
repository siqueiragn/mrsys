<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ucp extends MY_Controller {

    public function index()
    {
        if ($this->nativesession->get("autenticado")) {
            redirect($this->router->class . '/home');
        } else {
            redirect($this->router->class . '/login');
        }
    }

    public function home()
    {

        $dados[] = array('NATURA', 25 );
        $dados[] = array('EMPRESA Y', 5 );
        $dados[] = array('EMPRESA X', 2 );

        $dadosPie[] = array('MOTOLINKNATURA', 25);
        $dadosPie[] = array('ESCOLTA Y', 5);
        $dadosPie[] = array('TRANSPORTE X', 2);

        $data['dados'] = json_encode($dados);
        $data['dadosPie'] = json_encode($dadosPie);

        $this->load->view('estruturas/header');
        $this->load->view('estruturas/home', $data);
        $this->load->view('estruturas/footer');
    }

    public function login() {

        $this->load->view('estruturas/header');
        $this->load->view('estruturas/home');
        $this->load->view('estruturas/footer');

    }

    public function gerarHash() {


        if ( $this->input->get()) {
            echo "Hash para " . $this->input->get('texto') . "<br>";
            echo pre(hash('whirlpool', $this->input->get('texto')));
        } else {
            echo pre("Use ?texto=string na url para gerar o hash equivalente!");
        }

    }


    public function dbAuthme() {

        if ($this->input->post()) {

            $user = $this->input->post('user');
            $pass = $this->input->post('pass');

            $this->load->model('User');
            $result = $this->User->authMe($user, $pass);

            if ($result->num_rows()) {
                setLoginData($result->row());
            }
            else {

                flashdata('alert-danger', 'Usuário e senha inválidos!');
               redirect($this->router->class . '/login');
            }

            redirect( $this->router->class . '/home');

        }

    }


    public function download_arquivo()
    {

        $modulo      = $this->input->get('modulo')  ?      $this->input->get('modulo')   : '';
        $ged         = $this->input->get('pasta')   ? "/" .$this->input->get('pasta')    : '';
        $id          = $this->input->get('id')      ? "/" .$this->input->get('id')       : '';
        $arquivo     = $this->input->Get('arquivo') ?      $this->input->get('arquivo')  : '';

        $local_file        = $this->dados_globais['imgPath']. "{$modulo}{$id}{$ged}/{$arquivo}";

        $download_file  = $arquivo;

        // set the download rate limit (=> 20,5 kb/s)
        $download_rate = 200.5;
        if(file_exists($local_file) && is_file($local_file))
        {
            header('Cache-control: private');
            header('Content-Type: application/octet-stream');
            header('Content-Length: '.filesize($local_file));
            header('Content-Disposition: filename='.$download_file);

            flush();
            $file = fopen($local_file, "r");
            while(!feof($file))
            {
                // send the current file part to the browser
                print fread($file, round($download_rate * 1024));
                // flush the content to the browser
                flush();
                // sleep one second
                sleep(1);
            }
            fclose($file);}
        else {
            die('Arquivo não existente');
        }

    }

    function logout() {
        logout();
    }

    function registrar() {

        if (!$this->nativesession->get('autenticado')) {

            $this->load->view('estruturas/header');
            $this->load->view('estruturas/registrar');

        } else {
            redirect( 'ucp/home?error=1');
        }

    }

    function forgotPass() {

        $this->load->view('estruturas/header');
        $this->load->view('estruturas/forgotPass');

    }

}