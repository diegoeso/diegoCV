<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('index');
    }

    public function downloadCV()
    {
        $cv   = file_get_contents('./assets/CV_Diego_ESO_Acta.pdf');
        $name = 'Diego_Enrique_SanchezCV.pdf';
        force_download($name, $cv);
    }

    public function enviar()
    {

        $config = array(
            'protocol'    => 'smtp',
            'smtp_host'   => 'mail.gdsoft.com.mx',
            'smtp_user'   => 'diego.sanchez@gdsoft.com.mx', //Su Correo de Gmail Aqui
            'smtp_pass'   => 'B1zOTkkozK1K', // Su Password de Gmail aqui
            'smtp_port'   => '587',
            'smtp_crypto' => 'tls',
            'mailtype'    => 'html',
            'wordwrap'    => true,
            'charset'     => 'utf-8',
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($this->input->post('email'), $this->input->post('nombre'));
        $this->email->subject($this->input->post('asunto'));
        $this->email->message($this->input->post('mensaje'));
        $this->email->to('diego.sanchez@gdsoft.com.mx');
        $this->email->cc('diego.enrique76@gmail.com');
        if ($this->email->send(false)) {
            echo "enviado";
            // echo $this->email->print_debugger(array('headers'));
        } else {
            echo "fallo";
            // echo "error: " . $this->email->print_debugger(array('headers'));
        }
    }

}
