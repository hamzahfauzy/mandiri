<?php

namespace models;
use libs\Model;
/**
* 
*/
class Pelanggan_Model extends Model
{
	static $table = "pelanggan";
	static $lbl = ["pelangganID","username","nama_lengkap","alamat","jenis_kelamin","no_telepon"];
	
}