<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'ActionButtonGroup.php';

class EditDeleteButtonGroup implements ActionButtonGroup{

    /** O url base para as ações dos botões */
    private $base;

    function __construct($base){
        $this->base = $base;
    }
    
    /**
     * Gera os botões de ação
     * @param int id: o identificador do objeto alvo da ação
     * @return string: código html dos botões de ação
     */
    public function getHTML($id = ''){
        $html = '<div class="text-center">';
        $html .= '<a href="'.base_url($this->base."/editar/$id").'" title="Editar" id="editar_'.$id.'"><i class="far fa-edit mr-3 text-gray"></i></a>';
        $html .= '<a href="'.base_url($this->base."/deletar/$id").'" title="Deletar" id="deletar_'.$id.'"><i class="far fa-trash-alt mr-3 text-danger"></i></a>';
        return $html.'</div>';
    }

}
