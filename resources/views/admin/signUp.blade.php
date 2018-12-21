<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="{{URL::to('log in/css/style.css')}}">
<link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/skins/_all-skins.min.css')}}">
  
</head>

<body style="background:url('frontend/images/blog/asd.jpg');background-repeat:none">
	
  <div class="login-wrap" style="margin-left:200px;height:100px">
  	<P class="alert-info" id="add">
  	<?php
$message=Session::get('message');
if($message)
{
	echo $message;
	Session::put('message',null);
}
  	?>
  </p>
	<div class="login-html">
		<label for="tab-2" class="tab pull-right" style="color:white;margin-top:-50px">انشاء حساب جديد</label>
		<div class="login-form" style="margin-top:20px">
			<div>
				<form action="{{url('saveAdmin')}}" method="post">
					{{ csrf_field() }}
				<div class="group">
					<label for="user" class="label">اسم المستخدم</label>
					<input id="user" type="text" class="input" name="userName">
				</div>
                <div class="group">
					<label for="pass" class="label">البريد الالكتروني</label>
					<input id="pass" type="text" class="input" name="email">
				</div>
				<div class="group">
					<label for="pass" class="label">كلمة السر</label>
					<input id="pass" type="password" class="input" data-type="password" name="password">
				</div>
				<div class="group">
					<label for="pass" class="label">اعادة ادخال كلمة السر</label>
					<input id="pass" type="password" class="input" data-type="password" name="repeatPassword">
				</div>
				<div class="group">
					<input type="submit" class="button" value="انشاء حساب">
				</div>
				<div class="hr"></div>
			</form>
		</div>
	</div>
</div>

<script src="{{asset('backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('backend/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
 <script src="{{asset('backend/dist/js/demo.js')}}"></script>
<script>
$("#add").fadeTo(3000,3000).slideUp(3000,function()
{
$("#add").slideUp(3000);
});
</script> 
  

</body>

</html>