<?php
namespace controllers;
use libs\Controller;
use libs\Session;
use models\Obat_Model;
use models\Penyakit_Model;

/**
* 
*/
class Obat extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		Session::init();
		if(!Session::get("username") || Session::get("level")!=1)
			$this->redirect("auth/login");
		$this->view->title = "Data Obat";
	}

	function actionIndex(){
		$model = new Obat_Model;
		$model->find()->execute();
		$penyakit = function($id){
			$model = new Penyakit_Model;
			$model->find()->where(["penyakitID"=>$id])->one();
			return $model;
		};
		return $this->view->render("index",1,["model"=>$model,"penyakit"=>$penyakit]);
	}

	function actionTambah(){
		$model = new Obat_Model;
		if($this->request("POST")){
			if(copy($_FILES['gambar']['tmp_name'],"uploads/".$_FILES['gambar']['name'])){
				$model->attr($_POST);
				$model->gambar = $_FILES['gambar']['name'];
				if($model->save())
					$this->redirect("obat");
			}
			return;
		}
		$penyakit = new Penyakit_Model;
		$penyakit->find()->execute();
		return $this->view->render("form",1,["penyakit"=>$penyakit]);
	}

	function actionEdit($id){
		$model = new Obat_Model;
		if($this->request("POST")){
			$model->attr($_POST);
			if(!empty($_FILES['gambar']['name'])){
				if(copy($_FILES['gambar']['tmp_name'],"uploads/".$_FILES['gambar']['name'])){
					$model->gambar = $_FILES['gambar']['name'];
				}
			}
			if($model->save())
				$this->redirect("obat");
		}
		$model->find()->where(["obatID"=>$id])->one();
		$penyakit = new Penyakit_Model;
		$penyakit->find()->execute();
		return $this->view->render("form",1,["model"=>$model,"penyakit"=>$penyakit]);
	}

	function actionHapus($id){
		$model = new Obat_Model;
		$model->delete(["obatID"=>$id]);
		return $this->redirect("obat");
	}

	function actionGetStok(){
		$model = new Obat_Model;
		$model->find()->execute();
		$res["cols"][] = ["id"=>"","label"=>"Obat","pattern"=>"","type"=>"string"];
		$res["cols"][] = ["id"=>"","label"=>"Stok","pattern"=>"","type"=>"number"];
		foreach ($model->data as $value) {
			# code...
			$res["rows"][]["c"] = [["v"=>$value['nama_obat']." (".$value['stok'].")","f"=>null],["v"=> (int) $value['stok'],"f"=>null]];
		}
		echo json_encode($res);
	}
}