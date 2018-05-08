<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-offset-3">
			<div class="panel">
				<div class="panel-body">
					<h2 align="center">Register Form</h2>
					<form method="post">
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" name="nama_lengkap" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea name="alamat" class="form-control" required=""></textarea>
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jenis_kelamin" required="" class="form-control">
								<option value="">- Pilih Jenis Kelamin -</option>
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label>No Telepon</label>
							<input type="text" name="no_telepon" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required="">
						</div>
						<div class="form-group">
							<button class="btn btn-success">Register</button>
							<button type="button" class="btn btn-success" onclick="location='<?=URL;?>/auth/login'"><i class="fa fa-sign-in"></i> Login</button>
						</div>
					</form>
				</div>
			</div>	
		</div>
	</div>
</div>