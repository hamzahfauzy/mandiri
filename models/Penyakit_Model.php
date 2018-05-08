<?php
namespace models;
use libs\Model;
use models\Obat_Model;
use models\Gejala_Model;

/**
* 
*/
class Penyakit_Model extends Model
{
	
	static $table = "penyakit";
	static $lbl = ["penyakitID","nama_penyakit","kategori_bagian"];
}