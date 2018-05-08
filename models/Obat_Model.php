<?php
namespace models;
use libs\Model;
use models\Penyakit_Model;

/**
* 
*/
class Obat_Model extends Model
{
	
	static $table = "obat";
	static $lbl = ["obatID","penyakitID","nama_obat","deskripsi","usia","harga","stok","gambar"];
}