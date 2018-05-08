<?php
namespace controllers;
use libs\Controller;
use models\Users_Model;
use models\Pelanggan_Model;
use libs\Session;

class Auth extends Controller {

	function __construct(){
		parent::__construct();
		Session::init();
	}

	function actionIndex(){
		if($this->request("POST")){
			extract($_POST);
			Session::set("bagian",$bagian);
			Session::set("usia",$usia);
			Session::set("gejala",$gejala);
			print_r($_SESSION);
			return;
		}
		if(Session::get("username")){
			if(Session::get("level")==1){
				$this->redirect("admin");
			}else{
				$this->redirect();
			}
		}else{
			$this->redirect("auth/login-user");
		}
	}

	function actionLoginAdmin(){
		if(Session::get("username"))
			$this->redirect();
		$this->view->title = "Login Form - Apotik Mandiri";
		$model = new Users_Model();
		if($this->request("POST")){
			extract($_POST);
			$password = md5($password);
			$model->find()->where(["username"=>$username,"password"=>$password,"level"=>"1"])->one();
			if($model->length){
				Session::set("username",$username);
				Session::set("level",1);
				$this->redirect("admin");
			}
		}
		echo Session::get("username");
		return $this->view->render("login",1,["mode"=>1]);
	}
	function actionLoginUser(){
		if(Session::get("username"))
			$this->redirect();
		$this->view->title = "Login Form - Apotik Mandiri";
		$model = new Users_Model();
		if($this->request("POST")){
			extract($_POST);
			$password = md5($password);
			$model->find()->where(["username"=>$username,"password"=>$password,"level"=>2])->one();
			if($model->length){
				Session::set("username",$username);
				Session::set("level",2);
				$this->redirect("auth");
			}
		}
		echo Session::get("username");
		return $this->view->render("login",1,["mode"=>2]);
	}

	function actionRegister(){
		if(Session::get("username"))
			$this->redirect();

		$this->view->title = "Register Form - Apotik Mandiri";
		$model = new Users_Model();
		if($this->request("POST")){
			$model->username = $_POST['username'];
			$password = md5($_POST['password']);
			$model->password = $password;
			$model->level = 2;
			if($model->save()){
				extract($_POST);
				$pelanggan = new Pelanggan_Model;
				$pelanggan->nama_lengkap = $nama_lengkap;
				$pelanggan->alamat = $alamat;
				$pelanggan->jenis_kelamin = $jenis_kelamin;
				$pelanggan->no_telepon = $no_telepon;
				$pelanggan->username = $username;
				if($pelanggan->save())
					return $this->view->render("register-sukses",1);
			}
		}
		return $this->view->render("register",1);
	}

	function actionLogout(){
		Session::destroy();
		$this->redirect();
	}

	function actionReset(){
		Session::reset("bagian");
		Session::reset("usia");
		Session::reset("gejala");
		$this->redirect();
	}
}