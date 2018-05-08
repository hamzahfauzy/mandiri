<?php
namespace libs;
/**
* View Class
*/
class View 
{
	
	function __construct()
	{
		$vendor = require_once("config/vendor.php");
		$this->vendor = $vendor;
	}

	function render($file, $layout = false, $data = false){
		if(file_exists('views/'.$this->controller.'/'.$file.'.php')){
			if($data==true){
				if(is_array($data)){
					extract($data);
				}else{
					return Bootloader::error500();
				}
			}
			if($layout==true){
				require 'views/layouts/header.php';
				require 'views/'.$this->controller.'/'.$file.'.php';
				require 'views/layouts/footer.php';
			}else{
				require 'views/'.$this->controller.'/'.$file.'.php';
			}
		}else
			return Bootloader::error404();
	}
}