<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/Dao.php';

class Turma extends Dao{

    function __construct(){
        parent::__construct('turma');
    }
    
    /**
     * Lista estática de turmas. Usada apenas para simular a geração 
     * de conteúdo no módulo responsável pelo registro das turmas.
     * Este conteúdo, naturalmente, deveria vir do bd.
     */
    public function lista(){
        return array(
            array('id' => 1, '5º ano', 'Ensino Fundamental', 'A', 'Tarde'),
            array('id' => 2, '5º ano', 'Ensino Fundamental', 'B', 'Tarde'),
            array('id' => 3, '5º ano', 'Ensino Fundamental', 'C', 'Tarde'),
            array('id' => 4, '5º ano', 'Ensino Fundamental', 'D', 'Tarde'),
        );
    }
        
    /**
     * Determina o nome de uma turma.
     * @param int turma_id
     * @return string nome da turma
     */
    public function nome($turma_id){
        $v = array('', '5º Ano A', '5º Ano B', '5º Ano C', '5º Ano D');
        return $v[$turma_id];
    }
}