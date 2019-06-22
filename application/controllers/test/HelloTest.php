<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . '/controllers/test/Toast.php');

class HelloTest extends Toast{
	
	function __construct() {
		parent::__construct('HelloTest');
	}
	
	// A mensagem abaixo n�o � exibida, pois o teste n�o d� erro
	function test_that_succeed() {
		$this->_assert_equals(1, 1, 'Uhuu! O trem funciona!');
	}
	
	// note que a mensagem deve ser escrita para orientar o testador
	// sobre o que est� dando errado no teste 
	function test_that_fail() {
		$this->_assert_equals(1, 2, 'Oooops... 1 is not equals 2!');
	}
	
}