<?php
namespace models;
use libs\Model;

/**
* 
*/
class Transaksi_Model extends Model
{
	static $table = "transaksi";
	static $lbl = ["transaksiID","obatID","username","jumlah","status","tanggal"];
}