{{--  @extends('home.master')
@section('css')
  <link type="text/css" href="{{ asset('css/login.css')}}" rel="stylesheet">
@endsection
@section('title','Login')
@section('content')
<form  action="/action_page.php" method="post">
    
    <div class="container_login">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container_login" style="background-color:#f1f1f1">
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
    <div class="container_login">
        <a href="{{url('/users/loginfacebook/facebook')}}">LoginFacebook</a>
        <a href="{{url('/users/logingoogle/google')}}">LoginGmail</a>
    </div>
    @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
    @endif
  </form>
@endsection  --}}
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/home/login.css')}}">
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
						<form action="{{route('user.post.login')}}" method="POST">
						@csrf
						<div class="formsix-pos">
							<div class="form-group i-email"> <input type="email" name="email" class="form-control" required="" id="email2" placeholder="Email Address *"> </div>
						</div>
						<div class="formsix-e">
							<div class="form-group i-password"> <input type="password" name="password" class="form-control" required="" id="password2" placeholder="Password *"> </div>
						</div>
						<div class="login_remember_box"> <label class="control control--checkbox"></span> </label> <a href="#" class="forget_password" data-toggle="modal" data-target="#myModal"> Forgot Password </a> </div>
						<div class="login_btn_wrapper"> <button class="btn btn-primary login_btn"> Login </button> </div>
						
						</form>
						<div class="bulkhead"></div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6"> <a href="{{url('/user/loginfacebook/facebook')}}" class="btn btn-primary facebook"> <span>Login with Facebook</span> <i class="fa fa-facebook"></i> </a> </div>
							<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6"> <a href="{{url('/user/logingoogle/google')}}" class="btn btn-primary google-plus"> Login with Google <i class="fa fa-google-plus"></i> </a> </div>
						</div>
						
						@if(session('error'))
							<div class="alert alert-danger">
							{{ session('error') }}
							</div>
    					@endif
					</div> 
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body long-modal">
						<div class="container">
							<div class="row">
								<div class="col-md-5">
									<div class="panel panel-default">
									  <div class="panel-body">
										<div class="text-center">
										  <h3><i class="fa fa-lock fa-4x"></i></h3>
										  <h2 class="text-center">Forgot Password?</h2>
										  <p>You can reset your password here.</p>
										  <div class="panel-body">
											<form action="{{route('user.post.resetpw')}}"  method="post">
												@csrf
												<div class="form-group">
													<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
													<input id="email" name="email" placeholder="email address" class="form-control"  type="email">
													</div>
												</div>
												<div class="form-group">
													<input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
													<input name="recover-submit" class="btn btn-lg btn-danger btn-block" value="Thoát" type="button" data-dismiss="modal">
												</div>
											  
											  	{{--  <input type="hidden" class="hide" name="token" id="token" value="">   --}}
											</form>
							
										  </div>
										</div>
									  </div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
</body>
</html>