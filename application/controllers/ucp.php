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

        $this->load->model('NewsModel');

        $data['noticias'] = $this->NewsModel->listar(true);

        $this->load->view('estruturas/topo_ucp');
        $this->load->view('estruturas/home_ucp', $data);
    }

    public function login() {


        $this->load->model('NewsModel');

        $data['noticias'] = $this->NewsModel->listar(true);

        if (!$this->nativesession->get('autenticado')) {
            $this->load->view('estruturas/topo');
            $this->load->view('estruturas/home', $data);
        } else {
            redirect( 'ucp/home?error=1');
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
               redirect($this->router->class . '/login?error=1');
            }

            redirect( $this->router->class . '/home');

        }

    }

    public function dbRegister() {

        if ($this->input->post()) {

            $user  = $this->input->post('user');
            $pass  = $this->input->post('pass');
            $passC = $this->input->post('confirmpass');
            $email = $this->input->post('email');

            $this->load->model('User');

            if ($passC == $pass ) {

                if (!empty($email) && !empty($user)) {

                    loginTemporario($user, $email, $pass);
                    $this->load->model('User');

                    $this->User->register($this->nativesession->get('user'), $this->nativesession->get('email'), $this->nativesession->get('pass'), $this->dados_globais['stamp']);
                    $result = $this->User->authMe($this->nativesession->get('user'), $this->nativesession->get('pass'));
                    if ($result) {
                        setLoginData($result->row());
                        destruirTemporario();
                        redirect($this->router->class . '/home');
                    }
                }

            }
            redirect($this->router->class . '/registrar?error=1');

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

            $this->load->view('estruturas/topo');
            $this->load->view('estruturas/registrar');

        } else {
            redirect( 'ucp/home?error=1');
        }

    }

    function forgotPass() {

        $this->load->view('estruturas/topo');
        $this->load->view('estruturas/forgotPass');

    }

}