<?php require 'views/layouts/admin-menu.php'; ?>
<?php
$kategori = [1=>"Kepala",2=>"Pencernaan",3=>"Mata",4=>"Telinga",5=>"Hidung",6=>"Mulut",7=>"Gigi"];
?>
<h2>Form Penyakit</h2>
<form method="post">
<div class="form-group">
	<input type="hidden" name="penyakitID" value="<?=@$model->penyakitID;?>">
	<label>Nama Penyakit</label>
	<input type="text" name="nama_penyakit" value="<?=@$model->nama_penyakit;?>" class="form-control">
</div>
<div class="form-group">
	<label>Kategori Bagian</label>
	<select name="kategori_bagian" required="" class="form-control">
		<option value="">- Pilih Kategori -</option>
		<?php foreach ($kategori as $key => $value) { ?>
		<option value="<?=$key;?>" <?php if(isset($model->kategori_bagian)) if($model->kategori_bagian==$key) echo "selected"; ?>><?=$value;?></option>
		<?php } ?>
	</select>
</div>
<button class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
</form>
<?php require 'views/layouts/admin-menu-bottom.php'; ?>