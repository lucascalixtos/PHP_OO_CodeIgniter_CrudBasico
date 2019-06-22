<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');


class MY_Controller extends MX_Controller {

	protected function show($content, $data = null) {
		$script ['extra_script'] = $this->get_script_list ();
		$style ['extra_style'] = $this->get_style_list ();
		$html  = $this->load->view('common/cabecalho', $style, true);
        $html .= $content;
        $html .= $this->load->view('common/rodape', $script, true);
        echo $html;
	}

	
	private $script_list = array ();
	protected function add_script($src, $inline = false) {
		$this->script_list [] = $inline ? $src : '<script type="text/javascript" src="' . base_url ( 'assets/js/' . $src ) . '.js"></script>' . "\n\t";
	}

	function get_script_list() {
		$aux = '';
		foreach ( $this->script_list as $value ) {
			$aux .= $value;
		}
		return $aux;
	}

	private $style_list = array ();
	protected function add_style($src) {
		$this->style_list [] = '<link href="' . base_url ( 'assets/css/' . $src ) . '.css" rel="stylesheet">'."\n\t";
	}

	function get_style_list() {
		$aux = '';
		foreach ( $this->style_list as $value ) {
			$aux .= $value;
		}
		return $aux;
	}

    protected function validate_id($id) {
        if (intval($id) < 1)
            redirect('tarefa');
    }

}