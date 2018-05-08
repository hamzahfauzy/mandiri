<?php require 'views/layouts/admin-menu.php'; ?>
<h2>Data Pelanggan</h2>
<p></p>
<table class="table table-bordered">
	<tr>
		<td>No</td>
		<td>Nama Pelanggan</td>
		<td>Alamat</td>
		<td>No Telepon</td>
	</tr>
	<?php
	$no=1;
	if($model->length){
		foreach ($model->data as $value) {
	?>
	<tr>
		<td><?=$no;$no++;?></td>
		<td><?=$value['nama_lengkap'];?></td>
		<td><?=$value["alamat"];?></td>
		<td><?=$value["no_telepon"];?></td>
	</tr>
	<?php } //end foreach 
		}else{ 
	?>
	<tr>
		<td colspan="4"><center>Tidak Ada Data!!</center></td>
	</tr>
	<?php } //end if length ?>
</table>
<?php require 'views/layouts/admin-menu-bottom.php'; ?>
