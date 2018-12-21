<?php
use App\Admin;
$adminId=Session::get('adminId');
$adminInfo=Admin::where('adminId',$adminId)->first();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
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
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                
                                <li><a href="#">{{$adminInfo->adminName}} مرحبا</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="http://www.google.com"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
            	<P class="alert-info" id="add">
                  	<?php
                    $message=Session::get('message');
                    if($message)
                   {
	                 echo $message;
	                 Session::put('message',null);
                    }
                  	?>
                <div class="row">
                    <div class="col-md-4 clearfix">
                        <div class="logo pull-left">
                       <input type="button" name="tab" id="btn" value="اضافة ملف">
                        </div>
                        
                    </div>
                    <div class="col-md-8 clearfix">
                        <div class="shop-menu clearfix pull-right">
                            <ul class="nav navbar-nav">
                              <li><a href="{{url('signUp')}}"><i class="fa fa-edit"></i> انشاء حساب</a></li>
                                <li><a href="{{url('personalHome/'.$adminId)}}"><i class="fa fa-user"></i> الصفحة الشخصية</a></li>
                                <li><a href="{{url('logout')}}"><i class="fa fa-lock"></i> تسجيل الخروج</a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="row" id="file" style="display:none">
 <form class="form-horizontal" action="{{url('saveFile')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">اسم الملف</label>

                  <div class="col-sm-10">
                    <input type="text" name="fileName" placeholder="اضف الاسم" size="20">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">اضافة صورة</label>

                  <div class="col-sm-10">
                    <input type="file" class="input_file uniform_on" name="fileImage">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">اضافة فيديو</label>

                  <div class="col-sm-10">
                    <input type="file" class="input_file uniform_on" name="fileVideo">
                  </div>
                </div>
                <input type="submit" class="btn btn-info" value="حفظ" style="margin-left:200px">
            </div>
  </form>
                </div>
                <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">جميع الملفات</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <P class="alert-success" id="delete">
            <?php
            $message=Session::get('message');
             if ($message) {
               echo $message;
               Session::put('message',null);
             }
            ?>
              <table class="table table-hover">
                <tr>
                  <th>رقم الملف</th>
                  <th>اسم الملف</th>
                  <th>صورة الملف</th>
                  <th>فيديو الملف</th>
                  <th>الحدث</th>
                  <th></th>
                </tr>
                @foreach($allFiles as $v_file)
                <tr>
                  <td>{{$v_file->fileId}}</td>
                  <td>{{$v_file->fileName}}</td>
                  @if($v_file->fileImage)
                  <td><img src="../storage/app/public/{{$v_file->fileImage}}" style="width:80px"></td>
                  @else
                  <td><span> No Image</span></td>
                  @endif
                  @if($v_file->fileVideo)
                  <td>
                  <video style="width:150px" controls>
                  <source src="../storage/app/public/{{$v_file->fileVideo}}"></source>
                  <video>
                  </td>
                  @else
                  <td><span> No Video</span></td>
                  @endif
                  <td style="width:10px">	
                  <a class="btn btn-info" href="{{URL::to('deleteFile/'.$v_file->fileId)}}">
                  <i class="glyphicon glyphicon-trash"></i>
                  </td>
                  <td>	
                  <a class="btn btn-success" href="{{URL::to('notification/'.$v_file->fileId)}}">
                  <i class="glyphicon glyphicon-envelope"></i>
                  </td>
                </tr>
                @endforeach
                              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div>
            </div>
        </div><!--/header-middle-->
    
        
        
        
    </footer><!--/Footer-->
    

  
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script type="text/javascript">
    function myFunction(x)
    {
        x.style.width="300px";
    }
    $(document).ready(function (){

    	$("#btn").click(function (){
         $("#file").toggle();
    	});
    });

$("#add").fadeTo(3000,3000).slideUp(3000,function()
{
$("#add").slideUp(3000);
});
</script> 
    </script>
</body>
</html>