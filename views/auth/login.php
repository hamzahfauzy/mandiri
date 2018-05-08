<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-offset-3">
			<div class="panel">
				<div class="panel-body">
					<?php $level = ($mode == 1) ? "Admin" : "Users"; ?>
					<h2 align="center">Login Form <?=$level;?></h2>
					<form method="post">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" id="username" class="form-control" placeholder="Username">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<button class="btn btn-success btn-block btn-lg"><i class="fa fa-sign-in fa-lg"></i> Login</button>
							<?php if($mode == 2): ?>
							<button class="btn btn-warning btn-block btn-lg" type="button" onclick="location='<?=URL;?>/auth/register'"><i class="fa fa-user-plus fa-lg"></i> Register</button>
							<?php endif; ?>
						</div>
					</form>
				</div>
			</div>	
		</div>
	</div>
</div>