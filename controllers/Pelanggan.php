<?php
namespace controllers;
use libs\Controller;
use libs\Session;
use models\Pelanggan_Model;

/**
* 
*/
class Pelanggan extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		Session::init();
		if(!Session::get("username") || Session::get("level")!=1)
			$this->redirect();
		$this->view->title = "Data Pelanggan";
	}

	function actionIndex(){
		$model = new Pelanggan_Model;
		$model->find()->execute();
		return $this->view->render("index",1,["model"=>$model]);
	}
}