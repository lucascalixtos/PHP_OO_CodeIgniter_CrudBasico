<?php

class CI_Object{
   
   	/**
	 * __get magic
	 *
	 * Allows libraries to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param string $key
	 */
	public function __get($key) {
		return get_instance()->$key;
   }
   
}