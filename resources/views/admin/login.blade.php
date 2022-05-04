

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/Admin') }}/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="{{ asset('assets/Admin') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet"/>
  <link href="{{ asset('assets/Admin') }}/css/style.css" rel="stylesheet"/>
  <link href="{{ asset('assets/Admin') }}/css/style-responsive.css" rel="stylesheet"/>
  <script src="{{ asset('Admin/assets') }}/js/app.min.js"></script>


  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
  <style>
      .fa{
          font-size: 2rem;
          margin-right: 1rem;
      }
      .group input{
        font-family: Ruda, sans-serif;
        width: 90%;
        height: 4rem;
        border-radius: 5%;
        margin: 0 1rem 0 1rem;
      }
      .group {
          margin-top: 2rem
      }
      .mt-4{
        margin-top: 4rem;
      }
  </style>
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="{{URL::to("quantri/login")}}" method="post" >
        @csrf
        @if(session('thongbao'))
            <div class="alert alert-warning alert-dismissible fade show rounded-pill mb-2" role="alert">
                <span class="font-weight-bold">Tên tài khoản hoặc mật khẩu không đúng !</span>
            </div>
        @endif
        <h2 class="form-login-heading">Đăng Nhập</h2>
        <div class="login-wrap">
            <div class="group">
                <label>Email : </label>
                <input type="text" name="email" placeholder="Email" value="{{old('email')}}">
            </div>
            @error('email')
            <span class="badge bg-danger text-white float-left mb-1 ml-2">{{ $message }}</span>
            @enderror

        <div class="group ">
            <label>Mật khẩu : </label>
            <input type="password" name="password" placeholder="Mật khẩu" value="{{old('password')}}">
            @error('password')
            <span class="badge bg-danger text-white float-left mb-1 ml-2">{{ $message }}</span>
            @enderror
        </div>
        <button class="mt-4 btn btn-theme btn-block rounded-pill"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
          <div class="login-social-link centered">
            <p>or you can sign in via your social network</p>
            <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
            <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
          </div>
          <div class="registration">
            Don't have an account yet?<br/>
            <a class="" href="#">
              Create an account
              </a>
          </div>
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email1" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  {{-- <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script> --}}
  <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("{{ asset('assets/Admin') }}/img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>

