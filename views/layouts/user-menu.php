<?php
use libs\Session;
?>

<div class="panel panel-default">
	<div class="panel-heading">
	Selamat Datang, <b><?=Session::get("username");?></b>					
	</div>
	<div class="panel-body">
		<!--
		<a href="<?=URL;?>/user/profile"><i class="fa fa-user"></i> Profil</a><br>
	-->
		<a href="<?=URL;?>/catalog"><i class="fa fa-list"></i> Catalog</a><br>
		<a href="<?=URL;?>/catalog/transaksi"><i class="fa fa-shopping-cart"></i> Transaksi</a><br>
		<a href="<?=URL;?>/auth/reset"><i class="fa fa-repeat"></i> Reset DSS</a><br>
		<a href="<?=URL;?>/auth/logout"><i class="fa fa-sign-out"></i> Log Out</a><br>
	</div>
</div>