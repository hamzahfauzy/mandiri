<?php
namespace controllers;

use libs\Controller;
/**
* 
*/
class Sample extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function actionIndex(){
		echo "This is Sample";
	}
}