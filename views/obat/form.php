<?php require 'views/layouts/admin-menu.php'; ?>
<h2>Form Obat</h2>
<form method="post" enctype="multipart/form-data">
<input type="hidden" name="obatID" value="<?=@$model->obatID;?>">
<div class="form-group">
	<label>Nama Obat</label>
	<input type="text" name="nama_obat" value="<?=@$model->nama_obat;?>" class="form-control">
</div>
<div class="form-group">
	<label>Penyakit</label>
	<select name="penyakitID" required="" class="form-control">
		<option value="">- Pilih Penyakit -</option>
		<?php foreach ($penyakit->data as $value) { ?>
		<option value="<?=$value['penyakitID'];?>" <?php if(isset($model->penyakitID)) if($model->penyakitID==$value['penyakitID']) echo "selected"; ?>><?=$value['nama_penyakit'];?></option>
		<?php } ?>
	</select>
</div>
<div class="form-group">
	<label>Deskripsi</label>
	<textarea type="text" name="deskripsi" class="form-control"><?=@$model->deskripsi;?></textarea>
</div>
<div class="form-group">
	<label>Kategori Usia</label>
	<div class="form-group">
	<input type="radio" name="usia" value="1" id="opt8" <?php if(isset($model->usia)) if($model->usia==1) echo "checked"; ?>>
	<label for="opt8">0-3 Tahun</label>
	</div>
	<div class="form-group">
	<input type="radio" name="usia" value="2" id="opt9" <?php if(isset($model->usia)) if($model->usia==2) echo "checked"; ?>>
	<label for="opt9">4-6 Tahun</label>
	</div>
	<div class="form-group">
	<input type="radio" name="usia" value="3" id="op10" <?php if(isset($model->usia)) if($model->usia==3) echo "checked"; ?>>
	<label for="op10">7-11 Tahun</label>
	</div>
	<div class="form-group">
	<input type="radio" name="usia" value="4" id="opt11" <?php if(isset($model->usia)) if($model->usia==4) echo "checked"; ?>>
	<label for="opt11">12-20 Tahun</label>
	</div>
	<div class="form-group">
	<input type="radio" name="usia" value="5" id="opt12" <?php if(isset($model->usia)) if($model->usia==5) echo "checked"; ?>>
	<label for="opt12">Dewasa</label>
	</div>
</div>
<div class="form-group">
	<label>Harga</label>
	<input type="text" name="harga" class="form-control" value="<?=@$model->harga;?>">
</div>
<div class="form-group">
	<label>Stok</label>
	<input type="text" name="stok" class="form-control" value="<?=@$model->stok;?>">
</div>
<div class="form-group">
	<label>Gambar Obat</label>
	<input type="file" name="gambar" class="">
</div>
<button class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
</form>
<?php require 'views/layouts/admin-menu-bottom.php'; ?>