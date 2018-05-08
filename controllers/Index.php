<?php

namespace controllers;
use libs\Controller;
use libs\Session;

class Index extends Controller {

	function __construct(){
		parent::__construct();
		Session::init();
		if(Session::get("username") && Session::get("level") == 2 && Session::get("bagian") > 0)
			$this->redirect("catalog");
		else if(!Session::get("username") && Session::get("bagian") > 0)
			$this->redirect("auth");
	}

	function actionIndex(){
		$this->view->title = "Index";
		return $this->view->render("index",1);
	}
	

}