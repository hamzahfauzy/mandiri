<?php
namespace models;
use libs\Model;
use model\Penyakit_Model;

/**
* 
*/
class Gejala_Model extends Model
{
	
	static $table = "gejala";
	static $lbl = ["gejalaID","penyakitID","nama_gejala","kategori_bagian"];
}