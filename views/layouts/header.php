<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<title><?=$this->title;?></title>
<?php
foreach($this->vendor as $key => $val){
	if($key == "css"){
		foreach($val as $value){
			echo "<link href='$value' type='text/css' rel='stylesheet'>\n";
		}
	}
}
?>
<?php
foreach($this->vendor as $key => $val){
	if($key == "js"){
		foreach($val as $value){
			echo "<script src='$value'></script>\n";
		}
	}
}
?>
<style>
body, html {
    height: 100%;
    /* background-image: url("<?= $this->vendor['images'][0]['bg']; ?>"); */

    /* Full height */

    /* Center and scale the image nicely */
    background-image: url("<?= $this->vendor['images'][1]['bg-apotek']; ?>");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.transparent {
    border-width: 0px;
    -webkit-box-shadow: 0px 0px;
    box-shadow: 0px 0px;
    background: rgba(255,255,255,0.8);
    background-image: -webkit-gradient(linear, 50.00% 0.00%, 50.00% 100.00%, color-stop( 0% , rgba(0,0,0,0.00)),color-stop( 100% , rgba(0,0,0,0.00)));
    background-image: -webkit-linear-gradient(270deg,rgba(0,0,0,0.00) 0%,rgba(0,0,0,0.00) 100%);
    background-image: linear-gradient(180deg,rgba(0,0,0,0.00) 0%,rgba(0,0,0,0.00) 100%);

}
.navbar .brand, .navbar .nav > li > a {
    color: #2ecc71;
}
.navbar .brand, .navbar .nav > li > a:hover {
    color: #FFF;
}
.navbar-brand {
	color:#FFF;
	font-weight: bold;
}
.custom-navbar {
    height: 70px;
    background-color: #c0392b;
    border:none;
}
.btn-purple {
    background-color: #5f27cd;
    color: #FFF;
}
</style>
</head>
<body>
<div style="padding-top:100px;"></div>
<nav class="navbar navbar-inverse navbar-fixed-top custom-navbar">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="<?=URL;?>" style="color:#FFF;padding: 25px; font-size: 20px; display: inline-block;">
        Sistem Penjualan Obat Di <?=SITENAME;?> Menggunakan Sistem DSS
        </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right" style="padding:10px;">
        <li><a href="javascript:;" data-toggle="modal" data-target="#myModal">Sejarah Singkat</a></li>
        <li><a href="<?=URL;?>/auth/login-user">Login User</a></li>
        <li><a href="<?=URL;?>/admin">Login Admin</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>