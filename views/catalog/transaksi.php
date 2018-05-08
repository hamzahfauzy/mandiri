<div class="container" style="background-color: #FFF;">
	<h2>Data Transaksi Anda</h2>
	<div class="row">
		<div class="col-sm-9">
			<table class="table table-bordered">
				<tr>
					<td>No</td>
					<td>Nama Obat</td>
					<td>Jumlah</td>
					<td>Total</td>
					<td>Aksi</td>
				</tr>
				<?php 
				$no=1;
				foreach ($model->data as $value){ 
					$ob = $obat($value['obatID']);
				?>
				<tr>
					<td><?=$no++;?></td>
					<td><?=$ob->nama_obat;?></td>
					<?php if($value['status']==1){ ?>
					<form method="post">
						<input type="hidden" name="transaksiID" value="<?=$value['transaksiID'];?>">
					<td><input type="text" name="jumlah" value="1" onkeyup="$('#total').val(this.value*<?=$ob->harga;?>)"></td>
					<td><input type="text" name="total" readonly="" id="total"></td>
					<td><button class="btn btn-primary">Bayar</button></td>
					</form>
					<?php }else{ ?>
					<td><?=$value['jumlah'];?></td>
					<td>Rp. <?=number_format($value['jumlah']*$ob->harga);?></td>
					<td>-</td>
					<?php } ?>
				</tr>
				<?php } ?>
			</table>
		</div>
		<div class="col-sm-3">
			<?php require 'views/layouts/user-menu.php';?>
		</div>
	</div>
</div>