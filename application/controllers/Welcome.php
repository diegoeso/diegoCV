<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
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
}
