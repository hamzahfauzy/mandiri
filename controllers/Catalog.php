<?php
namespace controllers;
use libs\Controller;
use libs\Session;
use models\Obat_Model;
use models\Penyakit_Model;
use models\Gejala_Model;
use models\Transaksi_Model;

/**
* 
*/
class Catalog extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		Session::init();
		if(!Session::get("username") || !Session::get("bagian"))
			$this->redirect();
		$this->view->title = "Catalog";
	}

	function actionIndex(){
		$model = new Gejala_Model;
		$model->find()->where(["gejalaID"=>Session::get("gejala")])->one();
		$obat = new Obat_Model;
		$obat->find()->where(["penyakitID"=>$model->penyakitID])->execute();
		$penyakit = new Penyakit_Model;
		$penyakit->find()->where(["penyakitID"=>$model->penyakitID])->one();
		return $this->view->render("index",1,["obat"=>$obat,"penyakit"=>$penyakit]);
	}

	function actionTransaksi(){
		$model = new Transaksi_Model;
		if($this->request("POST")){
			$model->find()->where(["transaksiID"=>$_POST['transaksiID']])->one();
			$model->jumlah = $_POST['jumlah'];
			$model->status = 2;
			if($model->save()){
				$obat = new Obat_Model;
				$obat->find()->where(["obatID"=>$model->obatID])->one();
				$obat->stok -= $model->jumlah;
				$obat->save();
			}

		}
		$model->find()->where(["username"=>Session::get("username")])->execute();
		$obat = function($obatID){
			$model = new Obat_Model;
			$model->find()->where(["obatID"=>$obatID])->one();
			return $model;
		};
		$this->view->render("transaksi",1,["model"=>$model,"obat"=>$obat]);
	}

	function actionBeli($obatID){
		$model = new Transaksi_Model;
		$model->find()->where(["obatID"=>$obatID,"username"=>Session::get("username"),"status"=>0])->one();
		if(!$model->length){
			$model->obatID = $obatID;
			$model->username = Session::get("username");
			$model->jumlah = 1;
			$model->status = 1;
			$model->tanggal = "CURRENT_TIMESTAMP";
			$model->save();
				
		}
		$this->redirect("catalog/transaksi");
	}
}
