<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Template extends MY_Controller{

    public function index(){
        $html = 'A partir deste template, crie o seu incrível módulo!';
        $this->show($html);
    }

}