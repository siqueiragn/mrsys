<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends MY_Controller {

    public function index()
    {
        $this->load->view('estruturas/header');
        if (is_numeric($this->uri->segment(2))) {

            switch ($this->uri->segment(2)) {

                case 1:
                    $this->load->model('cliente');
                    $data['clientes'] = $this->cliente->getAll()->result();

                    $this->load->model('funcionario');
                    $data['funcionarios'] = $this->funcionario->getAtivos()->result();

                    $this->load->view('relatorios/missoes_analitico', $data);

                break;
                default:
                    flashdata('alert-danger', 'Relatório não encontrado!');
                    redirect('/home');
                break;
            }

        }

    }

    public function relatorios_missoes_analitico() {

        echo pre("RELATÓRIO");

    }

}