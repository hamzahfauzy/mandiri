<?php require 'views/layouts/admin-menu.php'; ?>
<h2>Data Penyakit</h2>
<button class="btn btn-success" onclick="location='<?=URL;?>/penyakit/tambah'"><i class="fa fa-plus"></i> Tambah Data</button>
<p></p>
<table class="table table-bordered">
	<tr>
		<td>No</td>
		<td>Nama Penyakit</td>
		<td>Aksi</td>
	</tr>
	<?php
	$no=1;
	if($model->length){
		foreach ($model->data as $value) {
	?>
	<tr>
		<td><?=$no;$no++;?></td>
		<td><?=$value['nama_penyakit'];?></td>
		<td>
			<button class="btn" onclick="location='<?=URL;?>/penyakit/edit?id=<?=$value['penyakitID'];?>'"><i class="fa fa-pencil"></i> Edit</button>
			<button class="btn btn-warning" onclick="location='<?=URL;?>/penyakit/hapus?id=<?=$value['penyakitID'];?>'"><i class="fa fa-close"></i> Hapus</button>
		</td>
	</tr>
	<?php } //end foreach 
		}else{ 
	?>
	<tr>
		<td colspan="3"><center>Tidak Ada Data!!</center></td>
	</tr>
	<?php } //end if length ?>
</table>
<?php require 'views/layouts/admin-menu-bottom.php'; ?>