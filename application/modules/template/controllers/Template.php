<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Template extends MY_Controller{

    public function __construct(){
        $this->load->model('DadosModel', 'model');
    }

    public function index(){
        $this->load->view("header");
        $this->load->view("navbar");
        $this->model->salvar();
        $this->load->view("form");
        print_r($_POST);
        $this->load->view("footer");
    }

    public function listar(){
        $this->load->view("header");
        $this->load->view("navbar");
        
        $this->load->view("footer");
    }

}