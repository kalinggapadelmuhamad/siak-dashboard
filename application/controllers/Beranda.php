<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper(['url','form','sia','tgl_indo']);
        $this->load->library(['session','form_validation']);
        $this->load->model('User_model','user',true);
    }
    
    public function index(){
        $this->load->view('beranda');
    }
}