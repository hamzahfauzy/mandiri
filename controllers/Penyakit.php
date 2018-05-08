<?php
namespace controllers;
use libs\Controller;
use libs\Session;
use models\Penyakit_Model;

class Penyakit extends Controller {

	function __construct(){
		parent::__construct();
		Session::init();
		if(!Session::get("username") || Session::get("level")!=1)
			$this->redirect();
		$this->view->title = "Data Penyakit";
	}

	function actionIndex(){
		$model = new Penyakit_Model;
		$model->find()->execute();
		return $this->view->render("index",1,["model"=>$model]);
	}

	function actionTambah(){
		$model = new Penyakit_Model;
		if($this->request("POST")){
			$model->attr($_POST);
			if($model->save())
				$this->redirect("penyakit");
		}
		return $this->view->render("form",1);
	}

	function actionEdit($id){
		$model = new Penyakit_Model;
		if($this->request("POST")){
			$model->attr($_POST);
			if($model->save())
				$this->redirect("penyakit");
		}
		$model->find()->where(["penyakitID"=>$id])->one();
		return $this->view->render("form",1,["model"=>$model]);
	}

	function actionHapus($id){
		$model = new Penyakit_Model;
		$model->delete(["penyakitID"=>$id]);
		return $this->redirect("penyakit");
	}

}