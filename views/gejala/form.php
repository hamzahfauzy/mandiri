<?php require 'views/layouts/admin-menu.php'; ?>
<?php
$kategori = [1=>"Kepala",2=>"Pencernaan",3=>"Mata",4=>"Telinga",5=>"Hidung",6=>"Mulut",7=>"Gigi"];
?>
<h2>Form Gejala</h2>
<form method="post">
<div class="form-group">
	<input type="hidden" name="gejalaID" value="<?=@$model->gejalaID;?>">
	<label>Nama Gejala</label>
	<input type="text" name="nama_gejala" value="<?=@$model->nama_gejala;?>" class="form-control" required>
</div>
<div class="form-group">
	<label>Pilih Penyakit</label>
	<select name="penyakitID" required="" class="form-control">
		<option value="">Pilih Penyakit</option>
		<?php foreach ($penyakit->data as $value) { ?>
		<option value="<?=$value['penyakitID'];?>" <?php if(isset($model->penyakitID)) if($value['penyakitID']==$model->penyakitID) echo "selected";?>><?=$value['nama_penyakit'];?></option>
		<?php } ?>
	</select>
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