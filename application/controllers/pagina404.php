<?php

class Pagina404 extends MY_Controller {

	public function index()
	{
        $this->load->view('estruturas/header');
        $this->load->view('estruturas/404');
	}

}
