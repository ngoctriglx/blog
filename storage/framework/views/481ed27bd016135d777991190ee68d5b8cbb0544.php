<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo e(asset('css/home/login.css')); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>Login</title>
</head>

<body>
	<div class="login_form_wrapper">
		<div class="container">
			<div class="row" id="long-wrap">
				<div class="col-md-8">
					<div class="login_wrapper">
						<label id="login">Login</label>
						<form action="<?php echo e(route('admin.post.login')); ?>" method="POST">
							<?php echo csrf_field(); ?>
							<div class="formsix-pos">
								<div class="form-group i-email"> <input type="text" required name="username"
										class="form-control" required placeholder="Username *"> </div>
							</div>
							<div class="formsix-e">
								<div class="form-group i-password"> <input type="password" name="password"
										class="form-control" required placeholder="Password *"> </div>
							</div>
							
							<div class="login_btn_wrapper"> <button type="submit" class="btn btn-primary login_btn"> Login </button>
							</div>

						</form>
						<?php if(session('error')): ?>
						<div class="alert alert-danger">
							<?php echo e(session('error')); ?>

						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html><?php /**PATH E:\xampp\htdocs\blog3\resources\views/admin/login.blade.php ENDPATH**/ ?>