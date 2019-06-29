<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Instalacoes extends MY_Controller{

    public function __construct(){
        $this->load->model('DadosModel', 'model');
    }

    public function index(){
        $this->load->view("header");
        $this->load->view("navbar");
        $this->model->salvar();
        $this->load->view("form");
        $this->load->view("footer");
    }

    public function listar(){
        $this->load->view("header");
        $this->load->view("navbar");
        $v['editar'] = $this->model->lista_editar();
        $this->load->view("listar_view", $v);
        $this->load->view("footer");
    }

    public function delete($id){
        $this->model->delete($id);
        redirect('instalacoes/listar');
    }

    public function edit($id){
        $this->load->view("header");
        $this->load->view("navbar");
        $this->model->atualizar($id);
        $v['dados'] = $this->model->carrega_dados($id);
        $this->load->view("form", $v);
        $this->load->view("footer");
       
    }

}