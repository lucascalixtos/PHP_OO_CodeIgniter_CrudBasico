<?php


class Dados{

    private $nome;
    private $descricao;
    private $imagem;

    private $db;
    function __construct($nome = null, $descricao = null, $imagem = null){
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $ci = &get_instance();
        $this->db = $ci->db;
    }

    public function save(){
        $sql = "INSERT INTO lp2_empresa(nome, descricao, imagem) 
       VALUES ('$this->nome', '$this->descricao', '$this->imagem')"; 
        $this->db->query($sql);
    }



}