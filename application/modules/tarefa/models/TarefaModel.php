<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/component/buttons/EditDeleteButtonGroup.php';
include_once APPPATH.'libraries/component/Table.php';

class TarefaModel extends CI_Model{

    /**
     * Gera a tabela que contém a lista de turmas
     */
    public function fake_list(){
        $this->load->library('Turma');
        $data = $this->turma->lista();
        $header = array('#', 'Nome', 'Nível', 'Identificador', 'Período');
        $table = new Table($data, $header);
        $table->action('tarefa/criar');
        $table->zebra_table();
        $table->use_border();
        $table->use_hover();
        return $table->getHTML();
    }

    /**
     * Gera a lista das tarefas de uma turma cadastradas no bd
     * @param int turma_id: o identificador da turma 
     * @return string: código html da tabela
     */
    public function lista_tarefas($turma_id){
        $header = array('#', 'Título', 'Data de Entrega', 'Descrição');
        $this->load->library('TarefaTurma', null, 'tarefa');
        $this->tarefa->cols(array('id', 'titulo', 'prazo', 'descricao'));
        $data = $this->tarefa->get(array('turma_id' => $turma_id));
        if(! sizeof($data)) return '';
        
        $table = new Table($data, $header);
        $table->zebra_table();
        $table->use_border();
        $table->use_hover();
        
        $edbg = new EditDeleteButtonGroup('tarefa');
        $table->use_action_button($edbg);
        return $table->getHTML();
    }

    /**
     * Registra uma tarefa no bd
     * @param $_POST['titulo', 'prazo', 'descricao']
     * @return boolean true caso ocorra erro de validação
     */
    public function nova_tarefa($turma_id){
        if(! sizeof($_POST)) return;
        $this->load->library('Validator', null, 'valida');

        if($this->valida->form_tarefa()){
            $this->load->library('TarefaTurma', null, 'tarefa');
            $data = $this->input->post();
            $data['turma_id'] = $turma_id;
            $this->tarefa->insert($data);
        }
        else return true;
    }

    /**
     * Atualiza os dados de uma tarefa
     * @param int tarefa_id: o identificador da tarefa
     * @param int id: o identificador da turma | redireciona para página principal
     */
    public function edita_tarefa($tarefa_id){
        $this->load->library('TarefaTurma', null, 'tarefa');
        $this->load->library('Validator', null, 'valida');
        $task = $this->tarefa->get(array('id' => $tarefa_id));

        if(sizeof($_POST) && $this->valida->form_tarefa()){
            $data = $this->input->post();
            $data['id'] = $tarefa_id;
            $id = $this->tarefa->insert_or_update($data);
            if($id) redirect('tarefa/criar/'.$task[0]['turma_id']);
        }
        else {
            foreach ($task[0] as $key => $value)
                $_POST[$key] = $value;
            return $_POST['turma_id'];
        }
    }

    /**
     * Elimina uma tarefa do bd.
     * @param int tarefa_id: o identificador da tarefa
     * @param array: os dados da tarefa | redireciona para página principal
     */
    public function deleta_tarefa($tarefa_id) {
        $this->load->library('TarefaTurma', null, 'tarefa');
        $task = $this->tarefa->get(array('id' => $tarefa_id));
        
        if(sizeof($_POST)) {
            if($this->tarefa->delete(array('id' => $tarefa_id)))
                redirect('tarefa/criar/'.$task[0]['turma_id']);
        }
        else return $task[0];
    }

    /**
     * Determina o nome de uma turma.
     * @param int turma_id
     * @return string nome da turma
     */
    public function nome_turma($turma_id){
        $this->load->library('Turma');
        return $this->turma->nome($turma_id);
    }
}