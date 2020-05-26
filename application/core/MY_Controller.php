<?php

class MY_Controller extends CI_Controller
{

    public $dados_globais;

    function __construct()
    {

        parent::__construct();
        $c = get_instance();

        $this->dados_globais['stamp']   = date('d/m/Y H:i:s');
        $this->dados_globais['imgURL']  = getcwd() . ( '/assets/images/');
        $this->dados_globais['imgPath'] = getcwd() . ( '/assets/upload/');
        $this->dados_globais['externalImgURL']  = site_url( '/assets/images/');
        $this->dados_globais['externalImgPath'] = site_url( '/assets/upload/');

        /* Create sessions with user data */
        function setLoginData( $user ){

            $CI = get_instance();

            $CI->nativesession->set('userID', $user->id);
            $CI->nativesession->set('username', $user->username);
            $CI->nativesession->set('nome_completo', $user->nome);
            $CI->nativesession->set('email', $user->uEmail);
            $CI->nativesession->set('admin', $user->admin);
            $CI->nativesession->set('autenticado', true);

        }

        /* ===== FUNÇÃO FLASHDATA ===== */
        function flashdata( $classe, $mensagem ){

            $ci = get_instance();

            $ci->session->set_flashdata('classe', $classe);
            $ci->session->set_flashdata('mensagem', $mensagem);

        }
        /* ===== FIM FUNÇÃO FLASHDATA ===== */

        function firstName( $name ) {

            return substr( $name, 0, strpos($name, " "));

        }

        function calcularIdade( $data )
        {

            list($dia, $mes, $ano) = explode('/', $data);
            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
            return floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

        }

        function logout()
        {

            $CI = get_instance();

            $CI->nativesession->delete('userID');
            $CI->nativesession->delete('username');
            $CI->nativesession->delete('nome_completo');
            $CI->nativesession->delete('email');
            $CI->nativesession->delete('admin');
            $CI->nativesession->delete('autenticado');

            redirect($CI->router->class.'/login');

        }


        function upload( $pasta, $fonte, $nome, $tamanho_max = '20480' ){
            /* PASTA = A partir de assets/upload */
            /* FONTE = Nome do campo do arquivo */
            /* NOME = Nome para salvar o arquivo */

            if ( !is_dir(getcwd(). "/assets/images/$pasta") ) {
                mkdir(getcwd() ."/assets/images/$pasta", 777, true);
            }

            //echo getcwd() ."/assets/images/$pasta";
            //exit;

            $config['upload_path']   	= getcwd() ."/assets/images/$pasta";
            $config['allowed_types'] 	= '*';
            $config['file_name']     	= $nome;
            $config['max_size']      	= $tamanho_max;
            $config['overwrite']     	= true;
            $config['maintain_ratio'] 	= TRUE;

            $CI = get_instance();
            $CI->load->library('upload', $config);
            $CI->upload->initialize($config);

            return $CI->upload->do_upload($fonte);

        }

        function limpar_campo( $string ){
            /* Recebe o campo com máscaras e retorna apenas os valores numéricos */
            return preg_replace("/[^0-9]/", '', $string);
        }

        function pre( $entrada ){
            echo "<pre>";
            print_r($entrada);
            echo "</pre>";
        }

        function converter_cpf($cpf) {

            $newCpf = '';

            if (strlen($cpf) == 11) {
                for ($i=0; $i < 11; $i++) {

                    $newCpf .= substr($cpf, $i, 1 );
                    if ($i == 2 || $i == 5) {
                        $newCpf .= '.';
                    }
                    if ($i == 8) {
                        $newCpf .= '-';
                    }

                }
                return $newCpf;
            }

            return $cpf;

        }


        function extensao($arquivo){

            return strtolower( pathinfo($arquivo, PATHINFO_EXTENSION) );

        }

        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }


        /* ==================== VERIFICAÇÃO LOGIN ==================== */
        $permitidas = array('ucp/login', 'ucp', 'ucp/logout', 'ucp/dbAuthme', 'ucp/gerarHash');

        if( !$this->nativesession->get('username') ){
            if( !in_array($this->router->class.'/'.$this->router->method, $permitidas) ){
                !$this->nativesession->set('usuario_url_redirecionar', current_url());
                redirect('ucp/login');
            }
        }
        /* ==================== FIM VERIFICAÇÃO LOGIN ==================== */


    }

}

?>