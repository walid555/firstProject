<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{URL::to('images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
            <div class="container">
          
                  	<?php
                    $message=Session::get('message');
                    if($message)
                   {
	                 echo $message;
	                 Session::put('message',null);
                    }
                  	?>
                </p>
                <div class="col-md-12 clearfix">
                        <div class="logo pull-left">
                       <h4>البيانات الشخصية</h4>
                        </div>
                      </div>
                      <div class="hr"></div>
                    <div class="row pull-left">
 <form class="form-horizontal" action="{{url('updateAdmin',$adminInfo->adminId)}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <tabl>
                  <tr>
          <div class="group">
          <label for="inputEmail3" class="col-sm-4 control-label">اسم المستخدم</label>
          <div class="col-sm-8">
        <input id="user" type="text" class="input" name="newName" size="30" value="{{$adminInfo->adminName}}">
        </div>
        </div></tr>
         <div class="group">
          <label for="inputEmail3" class="col-sm-4 control-label">البريد الالكتروني</label>
          <div class="col-sm-8">
      <input id="user" type="text" class="input" name="newEmail" size="30" value="{{$adminInfo->adminEmail}}">
        </div>
        </div>
           <div class="group">
          <label for="inputEmail3" class="col-sm-4 control-label">كلمة السر</label>
          <div class="col-sm-8">
<input id="user" type="text" class="input" name="newPassword" size="30" value="{{$adminInfo->adminPassword}}">
        </div>
        </div>
        </div>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
       <input type="submit" class="btn btn-info" value="حفظ" style="margin-left:200px">
            </div>
  </form>
                </div>
        </div>
  
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
</body>
</html>