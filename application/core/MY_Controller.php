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

            $CI->nativesession->set('userID', $user->uID);
            $CI->nativesession->set('username', $user->uNome);
            $CI->nativesession->set('email', $user->uEmail);
            $CI->nativesession->set('admin', $user->uNadmin);
            $CI->nativesession->set('register', $user->uRegisterDate);
            $CI->nativesession->set('autenticado', true);

        }

        /* step two, if you have a test before register an user */
        function loginTemporario( $user, $email, $pass ){

            $CI = get_instance();

            $CI->nativesession->set('user', $user);
            $CI->nativesession->set('email', $email);
            $CI->nativesession->set('pass', $pass);
            $CI->nativesession->set('autenticadoTemporariamente', true);

        }/* step two, if you have a test before register an user */
        function destruirTemporario(){

            $CI = get_instance();

            $CI->nativesession->delete('user');
            $CI->nativesession->delete('email');
            $CI->nativesession->delete('pass');
            $CI->nativesession->delete('autenticadoTemporariamente');

        }

        function calcularIdadade( $data )
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
            $CI->nativesession->delete('email');
            $CI->nativesession->delete('admin');
            $CI->nativesession->delete('register');
            $CI->nativesession->delete('lastLogin');
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
        function upload_customizado( $pasta, $arquivo, $nome ){

            if ( !is_dir($pasta)) {
                mkdir($pasta, 777, true);
            }
            move_uploaded_file($arquivo, "$pasta/$nome");

        }

        function pre( $entrada ){
            echo "<pre>";
            print_r($entrada);
            echo "</pre>";
        }


        function extensao($arquivo){

            return strtolower( pathinfo($arquivo, PATHINFO_EXTENSION) );

        }

        function cleanName( $name ) {

            return str_replace("_", " ", $name);
        }

        function modelo_email($arquivo) {

            return "C:/xampp/htdocs/theproject/ucp/application/views/estruturas/mail/$arquivo";

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


         function authMail( &$mail )
        {

        $mail->CharSet = "utf-8";
        $mail->IsHTML(true);
        $mail->IsSMTP();
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = "tls"; // sets the prefix to the servier

        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->Username = "lsrpdevteam@gmail.com";
        $mail->Password = "lsrpdevteam2019";
        $mail->From = "lsrpdevteam@gmail.com";
        $mail->FromName = "Los Santos Roleplay";

        }


        /* ==================== VERIFICAÇÃO LOGIN ==================== */
        $permitidas = array('ucp/login', 'ucp', 'ucp/logout', 'ucp/dbAuthme', 'ucp/registrar', 'ucp/dbRegister', 'ucp/questionario', 'ucp/dbRegisterStepTwo', 'ucp/staff', 'ucp/about', 'ucp/forgotPass', 'mails/recPassword');

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