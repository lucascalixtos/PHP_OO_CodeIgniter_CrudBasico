<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Tarefa extends MY_Controller{

    public function __construct(){
        $this->load->model('TarefaModel', 'model');
    }

    /**
     * Página que exibe a lista de turmas. Note que listar as turmas não 
     * é responsabilidade deste módulo, mas é importante para o seu funcionamento.
     * Esta página foi criada para que você possa entender a dependência entre 
     * módulos e como você deve lidar com esta situação.
     * 
     * O módulo "tarefa" é dependente do módulo "turma". Por este motivo, simulamos 
     * o comportamento do módulo "turma" usando conteúdo estático que serve apenas 
     * para que o uso do módulo "tarefa" seja o mais realista possível.
     */
    public function index(){
        $data['titulo'] = 'Lista de Turmas';
        $data['rotulo_botao'] = 'Nova Turma';
        $data['form_subject'] = 'nova_turma';
        $data['show_form'] = false;
        $data['topo_pagina'] = $this->load->view('topo_pagina', $data, true);
        $data['formulario'] = $this->load->view('fake_form', $data, true);
        $data['lista'] = $this->model->fake_list();

        $html = $this->load->view('main', $data, true);
        $this->show($html);
    }

    /**
     * Página para criação de tarefas
     * @param int turma_id: o id da turma para a qual será direcionada a tarefa
     */
    public function criar($turma_id){
        $this->add_script('tarefa/mascara');
        
        $this->validate_id($turma_id);
        $turma = $this->model->nome_turma($turma_id);
        $data['show_form'] = $this->model->nova_tarefa($turma_id);

        $data['home'] = true;
        $data['titulo'] = "Tarefas da Turma - $turma";
        $data['rotulo_botao'] = 'Nova Tarefa';
        $data['form_subject'] = 'nova_tarefa';
        $data['topo_pagina'] = $this->load->view('topo_pagina', $data, true);
        $data['formulario'] = $this->load->view('form_tarefa', $data, true);
        $data['lista'] = $this->model->lista_tarefas($turma_id);

        $html = $this->load->view('main', $data, true);
        $this->show($html);
    }

    /**
     * Página para edição das tarefas
     * @param int tarefa_id: o id da tarefa editada
     */
    public function editar($tarefa_id){
        $this->validate_id($tarefa_id);
        $turma_id = $this->model->edita_tarefa($tarefa_id);
        $turma = $this->model->nome_turma($turma_id);
        $data['show_form'] = true;

        $data['titulo'] = "Editar Tarefa da Turma - $turma";
        $data['rotulo_botao'] = 'Nova Tarefa';
        $data['form_subject'] = 'nova_tarefa';
        $data['topo_pagina'] = $this->load->view('topo_pagina', $data, true);
        $data['formulario'] = $this->load->view('tarefa/form_tarefa', $data, true);

        $html = $this->load->view('main', $data, true);
        $this->show($html);
    }

    public function deletar($tarefa_id){
        $this->validate_id($tarefa_id);
        $data = $this->model->deleta_tarefa($tarefa_id);
        $turma = $this->model->nome_turma($data['turma_id']);

        $data['home'] = true;
        $data['titulo'] = "Remover Tarefa da Turma - $turma";
        $data['turma'] = $this->model->nome_turma($data['turma_id']);
        $data['topo_pagina'] = $this->load->view('topo_pagina', $data, true);
        $html = $this->load->view('confirm_delete', $data, true);
        $this->show($html);
    }

}