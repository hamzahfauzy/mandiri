<?php require 'views/layouts/admin-menu.php'; ?>
	<h2>Data Transaksi</h2>
			<table class="table table-bordered">
				<tr>
					<td>No</td>
					<td>Nama Obat</td>
					<td>Nama Pelanggan</td>
					<td>Jumlah</td>
					<td>Total</td>
				</tr>
				<?php 
				$no=1;
				foreach ($model->data as $value){ 
					$ob = $obat($value['obatID']);
					$nm = $nama($value['username']);
				?>
				<tr>
					<td><?=$no++;?></td>
					<td><?=$ob->nama_obat;?></td>
					<td><?=$nm->nama_lengkap;?></td>
					<td><?=$value['jumlah'];?></td>
					<td>Rp. <?=number_format($value['jumlah']*$ob->harga);?></td>
				</tr>
				<?php } ?>
			</table>
<?php require 'views/layouts/admin-menu-bottom.php'; ?>