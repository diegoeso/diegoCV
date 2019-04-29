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

    // public function enviar()
    // {

    //     //Cargamos la librería email
    //     $this->load->library('email');

    //     //Indicamos el protocolo a utilizar
    //     $config['protocol'] = 'smtp';

    //     //El servidor de correo que utilizaremos
    //     $config["smtp_host"] = 'mail.gdsoft.com.mx';

    //     //Nuestro usuario
    //     $config["smtp_user"] = 'diego.sanchez@gdsoft.com.mx';

    //     //Nuestra contraseña
    //     $config["smtp_pass"] = 'B1zOTkkozK1K';

    //     //El puerto que utilizará el servidor smtp
    //     $config["smtp_port"] = '587';

    //     //El juego de caracteres a utilizar
    //     $config['charset'] = 'utf-8';

    //     //Permitimos que se puedan cortar palabras
    //     $config['wordwrap'] = true;

    //     //El email debe ser valido
    //     $config['validate'] = true;

    //     //Establecemos esta configuración
    //     $this->email->initialize($config);

    //     //Ponemos la dirección de correo que enviará el email y un nombre
    //     $this->email->from($this->input->post('email'), $this->input->post('nombre'));

    //     /*
    //      * Ponemos el o los destinatarios para los que va el email
    //      * en este caso al ser un formulario de contacto te lo enviarás a ti
    //      * mismo
    //      */
    //     $this->email->to('diego.enrique76@gmail.com', 'Diego Enrique Sánchez Ordoñez');

    //     //Definimos el asunto del mensaje
    //     $this->email->subject($this->input->post("asunto"));

    //     //Definimos el mensaje a enviar
    //     $this->email->message(
    //         "Email: " . $this->input->post("email") .
    //         " Mensaje: " . $this->input->post("mensaje")
    //     );

    //     //Enviamos el email y si se produce bien o mal que avise con una flasdata
    //     if ($this->email->send()) {
    //         echo "Se envio el correo";
    //     } else {
    //         echo "No se envio el correo";
    //     }

    // }

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
            echo "enviado<br/>";
            echo $this->email->print_debugger(array('headers'));
        } else {
            echo "fallo <br/>";
            echo "error: " . $this->email->print_debugger(array('headers'));
        }
    }

}
