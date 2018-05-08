<?php require 'views/layouts/admin-menu.php'; ?>
<h2>Data Obat</h2>
<button class="btn btn-success" onclick="location='<?=URL;?>/obat/tambah'"><i class="fa fa-plus"></i> Tambah Data</button>
<p></p>
<table class="table table-bordered">
	<tr>
		<td>No</td>
		<td>Nama Obat</td>
		<td>Nama Penyakit</td>
		<td>Stok</td>
		<td>Aksi</td>
	</tr>
	<?php
	$no=1;
	if($model->length){
		foreach ($model->data as $value) {
			$penyakit = $penyakit($value['penyakitID']);
	?>
	<tr>
		<td><?=$no;$no++;?></td>
		<td><?=$value['nama_obat'];?></td>
		<td><?=$penyakit->nama_penyakit;?></td>
		<td><?=$value['stok'];?></td>
		<td>
			<button class="btn" onclick="location='<?=URL;?>/obat/edit?id=<?=$value['obatID'];?>'"><i class="fa fa-pencil"></i> Edit</button>
			<button class="btn btn-warning" onclick="location='<?=URL;?>/obat/hapus?id=<?=$value['obatID'];?>'"><i class="fa fa-close"></i> Hapus</button>
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