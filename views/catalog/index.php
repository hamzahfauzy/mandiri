<div class="container">
	<h2>Penyakit hasil DSS adalah <?=$penyakit->nama_penyakit;?></h2>
	<p>Di bawah ini adalah rekomendasi obat hasil DSS</p>
	<div class="row">
		<div class="col-sm-9">
			<div class="row">
				<?php if($obat->length) foreach ($obat->data as $value) { ?>
				<div class="col-sm-4">
					
					<div class="panel">
						<div class="panel-body">
							<img src="<?=URL;?>/uploads/<?=$value['gambar'];?>" width="100%">
							<center>
								<span><b><?=$value['nama_obat'];?></b></span><br>
								Rp. <b><?=number_format($value['harga']);?></b><br>
								<?php 
									if($value['stok']>0)
										echo "Sisa : <b>".$value['stok']."</b>";
									else
										echo "Stok Habis";
									?>
							</center>
						</div>
						<div class="panel-footer">
							<button class="btn btn-block btn-purple" onclick="location='<?=URL;?>/catalog/beli?obatID=<?=$value['obatID'];?>'">Beli</button>
						</div>
					</div>
					
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="col-sm-3">
			<?php require 'views/layouts/user-menu.php';?>
		</div>
	</div>
</div>