<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Validator extends CI_Object{

    public function form_tarefa(){
        $this->form_validation->set_rules('prazo', 'prazo', 'trim|required|exact_length[10]');
        $this->form_validation->set_rules('titulo', 'titulo', 'trim|required|min_length[3]|max_length[128]');
        $this->form_validation->set_rules('descricao', 'descricao', 'trim|required|min_length[3]|max_length[128]');
        return $this->form_validation->run();
    }

}