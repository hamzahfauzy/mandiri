<?php
namespace controllers;
use libs\Controller;
use libs\Session;
use models\Gejala_Model;
use models\Penyakit_Model;

class Gejala extends Controller {

	function __construct(){
		parent::__construct();
		Session::init();
		$this->view->title = "Data Gejala";
	}

	function actionIndex(){
		if(!Session::get("username") || Session::get("level")!=1)
			$this->redirect();
		$model = new Gejala_Model;
		$model->find()->execute();
		$penyakit = function($id){
			$model = new Penyakit_Model;
			$model->find()->where(["penyakitID"=>$id])->one();
			return $model;
		};
		return $this->view->render("index",1,["model"=>$model,"penyakit"=>$penyakit]);
	}

	function actionTambah(){
		if(!Session::get("username") || Session::get("level")!=1)
			$this->redirect();
		$model = new Gejala_Model;
		if($this->request("POST")){
			$model->attr($_POST);
			if($model->save())
				$this->redirect("gejala");
		}
		$penyakit = new Penyakit_Model;
		$penyakit->find()->execute();
		return $this->view->render("form",1,["penyakit"=>$penyakit]);
	}

	function actionEdit($id){
		if(!Session::get("username") || Session::get("level")!=1)
			$this->redirect();
		$model = new Gejala_Model;
		if($this->request("POST")){
			$model->attr($_POST);
			if($model->save())
				$this->redirect("gejala");
		}
		$model->find()->where(["gejalaID"=>$id])->one();
		$penyakit = new Penyakit_Model;
		$penyakit->find()->execute();
		return $this->view->render("form",1,["model"=>$model,"penyakit"=>$penyakit]);
	}

	function actionHapus($id){
		if(!Session::get("username") || Session::get("level")!=1)
			$this->redirect();
		$model = new Gejala_Model;
		$model->delete(["gejalaID"=>$id]);
		return $this->redirect("gejala");
	}

	function actionGetData($bagian){
		$model = new Gejala_Model;
		$model->find()->where(["kategori_bagian"=>$bagian])->execute();
		if($model->length){
			echo '<h3 align="center">Pilih Gejala</h3>';
			$n=0;
			foreach ($model->data as $value) {
				$checked = ($n==0) ? "checked" : "";
				$n++;
				echo '<div class="form-group">
						<input type="radio" name="gejala" value="'.$value['gejalaID'].'" id="p'.$value['gejalaID'].'" '.$checked.'>
						<label for="p'.$value['gejalaID'].'">'.$value['nama_gejala'].'</label>
					  </div>';
			}
		}else{
			echo 0;
		}
	}
}