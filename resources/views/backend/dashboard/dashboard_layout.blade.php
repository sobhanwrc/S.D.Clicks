<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/AdminLTE/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Feb 2018 07:16:28 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>S.D.Clicks-Admin| Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {!! Html::style('storage/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
  {!! Html::style('storage/admin/bower_components/font-awesome/css/font-awesome.min.css') !!}
  {!! Html::style('storage/admin/bower_components/Ionicons/css/ionicons.min.css') !!}
  {!! Html::style('storage/admin/bower_components/jvectormap/jquery-jvectormap.css') !!}
  {!! Html::style('storage/admin/css/AdminLTE.min.css') !!}
  {!! Html::style('storage/admin/css/skins/_all-skins.min.css') !!}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- begin #header -->
    @include('backend/partial/dashboard_header')
    <!-- end #header -->
    
    <!-- begin #sidebar -->
    @include('backend/partial/dashboard_sideder')
    <!-- end #sidebar -->
    
    <!-- begin #content -->
    @yield('content')
    <!-- end #content -->

    <!-- begin #footer -->
    @include('backend/partial/dashboard_footer')
    <!-- end #footer -->

  
</div>
<!-- ./wrapper -->
{!! Html::script('storage/admin/bower_components/jquery/dist/jquery.min.js') !!}
{!! Html::script('storage/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
{!! Html::script('storage/admin/bower_components/fastclick/lib/fastclick.js') !!}
{!! Html::script('storage/admin/js/adminlte.min.js') !!}
{!! Html::script('storage/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}
{!! Html::script('storage/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('storage/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
{!! Html::script('storage/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}
{!! Html::script('storage/admin/bower_components/Chart.js/Chart.js') !!}
{!! Html::script('storage/admin/js/pages/dashboard2.js') !!}
{!! Html::script('storage/admin/js/demo.js') !!}
</body>

<!-- Mirrored from adminlte.io/themes/AdminLTE/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Feb 2018 07:16:54 GMT -->
</html>

<script type="text/javascript">
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function (e) {
              $('.image_preview').attr('src', e.target.result);
              $('.header_image_preview').attr('src', e.target.result);
              $('.sidebar_image_preview').attr('src', e.target.result);
          }
          
          reader.readAsDataURL(input.files[0]);
      }
  }
  
  $(".profile_image").change(function(){
      readURL(this);
  });
</script>
