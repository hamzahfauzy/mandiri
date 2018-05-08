<?php
namespace controllers;
use libs\Controller;
use libs\Session;
use models\Transaksi_Model;
use models\Obat_Model;
use models\Pelanggan_Model;

class Admin extends Controller {

	function __construct(){
		parent::__construct();
		Session::init();
		if(!Session::get("username") || Session::get("level") != 1)
			$this->redirect("auth/login-admin");
		$this->view->title = "Administrator Panel";
	}

	function actionIndex(){
		return $this->view->render("index",1);
	}

	function actionTransaksi(){
		$model = new Transaksi_Model;
		$model->find()->execute();
		$obat = function($obatID){
			$model = new Obat_Model;
			$model->find()->where(["obatID"=>$obatID])->one();
			return $model;
		};
		$nama = function($nama){
			$model = new Pelanggan_Model;
			$model->find()->where(["username"=>$nama])->one();
			return $model;
		};
		$this->view->render("transaksi",1,["model"=>$model,"obat"=>$obat,"nama"=>$nama]);
	}
}