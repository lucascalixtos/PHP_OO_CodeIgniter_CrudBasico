<?php
include_once APPPATH.'libraries/component/buttons/ActionButtonGroup.php';

class Table{
    /** Matriz que contém os dados da tabela */
    private $data;

    /** Array de labels para a primeira linha da tabela */
    private $header;

    /** Define a cor de fundo do cabeçalho da tabela */
    private $header_color = '';

    /** Decide se a cor do texto será branca */
    private $white_text = '';

    /** Centraliza a tabela na tela */
    private $center_table = 'mx-auto';

    /** Lista de classes da tag table */
    private $table_classes = array('table');
    private $table_action = '';

    private $use_action_button = false;
    private $action_button_group;

    /**
     * Construtor da classe Table
     * @param array data: matriz de dados
     * @param array header: lista de labels 
     */
    function __construct(array $data, array $header){
        $this->header = $header;
        $this->data = $data;
    }

    /**
     * Gera o código da tabela.
     * @return string: código HTML
     */
    public function getHTML(){
        $html = '<table class="'.$this->get_classes().' '.$this->center_table.'">';
        $html .= $this->header();
        $html .= $this->body();
        $html .= '</table>';
        return $html;
    }

    /*
     * Gera o cabeçalho da tabela
     * @return string: código HTML
     */
    private function header(){
        $html = '<thead class="'.$this->header_color.' '.$this->white_text.'"><tr>';
        foreach ($this->header as $col) {
            $html .= '<th scope="col">'.$col.'</th>';
        }

        // se usar botões de ação acrescente mais uma coluna
        if($this->use_action_button){
            $html .= '<th scope="col"></th>';
        }

        $html .= '</tr></thead>';
        return $html;
    }

    private function body(){
        $html = '<tbody>';
        foreach ($this->data as $row) {
            $html .= '<tr>';
            foreach ($row as $col) {
                $link = $this->table_action ? $this->table_action.'/'.$row['id'] : '';
                $html .= '<td><a href="'.$link.'">'.$col.'</a></td>';
            }
            if($this->use_action_button){
                $html .= '<td>'.$this->action_button_group->getHTML($row['id']).'</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody>';
        return $html;
    }

    public function action($url = null){
        $this->table_action = $url ? $url : '';
    }

    private function get_classes(){
        return implode(' ', $this->table_classes);
    }

    /**
     * Define a cor de fundo do cabeçalho da tabela.
     * @param string color: a cor a ser utilizada.
     */
    public function set_header_color($color){
        $this->header_color = $color;
    }

    /**
     * Força o uso de letra branca no cabeçalho.
     */
    public function use_white_text(){
        $this->white_text = 'text-white';
    }

    public function zebra_table(){
        $this->table_classes[] = 'table-striped';
    }

    public function small_table(){
        $this->table_classes[] = 'table-sm';
    }

    public function use_border(){
        $this->table_classes[] = 'table-bordered';
    }

    public function use_hover(){
        $this->table_classes[] = 'table-hover';
    }

    public function use_action_button(ActionButtonGroup $abg){
        $this->action_button_group = $abg;
        $this->use_action_button = true;
    }

    public function column_size($num){
        if($num > 0 && $num <= 12)
        $this->table_classes[] = 'col-md-'.$num;
    }

    public function align_left(){
        $this->center_table = '';
    }

    public function mt($num){
        if($num > 0 && $num <= 5)
        $this->table_classes[] = 'mt-'.$num;
    }

    public function mr($num){
        if($num > 0 && $num <= 5)
        $this->table_classes[] = 'mr-'.$num;
    }

    public function mb($num){
        if($num > 0 && $num <= 5)
        $this->table_classes[] = 'mb-'.$num;
    }

    public function ml($num){
        if($num > 0 && $num <= 5)
        $this->table_classes[] = 'ml-'.$num;
    }
}