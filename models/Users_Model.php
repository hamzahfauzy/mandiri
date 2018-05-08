<?php

namespace models;
use libs\Model;
use libs\Pelanggan_Model;
/**
* 
*/
class Users_Model extends Model
{
	static $table = "users";
	static $lbl = ["username","password","level"];
	
	function getPelanggan(){
		return $this->hasOne(Pelanggan_Model::class,["username"=>"username"]);
	}
}