<?php

require 'vendor/autoload.php';
use \PHPMailer\PHPMailer\PHPMailer;


class Mails extends MY_Controller {

    public function index()
    {
        if ($this->nativesession->get("autenticado")) {
            redirect($this->router->class . '/home');
        } else {
            redirect($this->router->class . '/login');
        }
    }

    public function recPassword() {

        header('Content-Type: text/html; charset=UTF-8');
        $data['mensagem'] = false;
        if ( $this->input->post() ) {

            $email = $this->input->post('email');

            $this->load->model('user');

            $usuario = $this->user->getByEmail( $email )->row();

            if ($usuario) {

                $mail = new PHPMailer(true);
                authMail($mail);

                $mail->Subject = "[LS-RP] Credenciais de Acesso";
                $mail->AddBCC($email);

                $doc = new DOMDocument();
                $doc->loadHTMLFile(modelo_email("passwordRec.html"));
                $mail->Body = $doc->saveHTML();

                $senha     = generateRandomString();
                $hash      = hash('whirlpool', $senha );

                $mail->Body = str_replace("#username#", $usuario->uNome, $mail->Body);
                $mail->Body = str_replace("#pass#", $senha, $mail->Body);
                $mail->Body = str_replace("#stamp#", $this->dados_globais['stamp'], $mail->Body);


                $mail->Send();

                $this->user->setTmpPass( $usuario->uID, $hash);
                $data['mensagem'] = true;
            }


        }

        $this->load->view( 'estruturas/topo' );
        $this->load->view( $this->router->class . '/retorno', $data );
    }


}