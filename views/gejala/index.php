<?php require 'views/layouts/admin-menu.php'; ?>
<h2>Data Gejala</h2>
<button class="btn btn-success" onclick="location='<?=URL;?>/gejala/tambah'"><i class="fa fa-plus"></i> Tambah Data</button>
<p></p>
<table class="table table-bordered">
	<tr>
		<td>No</td>
		<td>Nama Gejala</td>
		<td>Nama Penyakit</td>
		<td>Aksi</td>
	</tr>
	<?php
	$no=1;
	if($model->length){
		foreach ($model->data as $value) {
			$penyakit_model = $penyakit($value['penyakitID']);
	?>
	<tr>
		<td><?=$no;$no++;?></td>
		<td><?=$value['nama_gejala'];?></td>
		<td><?=$penyakit_model->nama_penyakit;?></td>
		<td>
			<button class="btn" onclick="location='<?=URL;?>/gejala/edit?id=<?=$value['gejalaID'];?>'"><i class="fa fa-pencil"></i> Edit</button>
			<button class="btn btn-warning" onclick="location='<?=URL;?>/gejala/hapus?id=<?=$value['gejalaID'];?>'"><i class="fa fa-close"></i> Hapus</button>
		</td>
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