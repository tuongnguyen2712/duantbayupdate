<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

{{-- seo  --}}
    @if(isset($meta_img))
<meta property="og:image" href="{{$meta_img}}">
    <meta property="article:modified_time" content="{{$modified_time}}" />
    @else
<meta property="og:image" href="https://tbay.vn/wp-content/uploads/2021/05/tbay-1.png">
    @endif
{{-- seo hình ảnh --}}
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:title" content="{{$meta_title}}" />
    <meta property="og:url" href="{{$url_canonical}}" />
    <meta property="og:site_name" content="{{$site_name}}"/>
    <meta property="og:type" content=""/>
	<meta property="og:description" content=""/>
	<meta property="description" content=""/>
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="robots" content="index,follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <link rel="canonical" href="{{$url_canonical}}">
{{-- nội dung seo --}}

{{-- end seo  --}}

    <!-- Favicons -->
    <link href="{{ asset('assets/Admin') }}/img/favicon.png" rel="icon">
    <link href="{{ asset('assets/Admin') }}/img/apple-touch-icon.png" rel="apple-touch-icon">


      <!-- Bootstrap core CSS -->
      <link href="{{ asset('assets/Admin') }}/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
      <link href="{{ asset('assets/Admin') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet"/>
      <link href="{{ asset('assets/Admin') }}/css/zabuto_calendar.css" rel="stylesheet"/>
      <link href="{{ asset('assets/Admin') }}/lib/gritter/css/jquery.gritter.css" rel="stylesheet"/>

      <link href="{{ asset('assets/Admin') }}/css/style.css" rel="stylesheet"/>
      <link href="{{ asset('assets/Admin') }}/lib/fancybox/jquery.fancybox.css" rel="stylesheet"/>
      <link href="{{ asset('assets/Admin') }}/css/style-responsive.css" rel="stylesheet"/>
      <link href="{{ asset('assets/Admin') }}/lib/chart-master/Chart.js" rel="stylesheet"/>
      {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script> --}}
      {{-- nhúng datatable --}}
      <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet"/>
      <style>
          .dropdown-toggle{
              background: #4ECDC4;
              border:1px solid #64c3c2 ;
              font-size: 12px;
              color: #f2f2f2;
              -webkit-border-radius: 4px;
              margin-right: 1rem
          }
          .dropdown-toggle:hover{
            color: #333;
             background: #e6e6e;
             border:#adadad ;
          }
      </style>
</head>
<body>
    <section id="container">
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
              <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="/" class="logo"><b>DASH<span>IO</span></b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
              <!--  notification start -->
              <ul class="nav top-menu">
                <!-- settings start -->
                <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                    <i class="fa fa-tasks"></i>
                    <span class="badge bg-theme">4</span>
                    </a>
                  <ul class="dropdown-menu extended tasks-bar">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                      <p class="green">You have 4 pending tasks</p>
                    </li>
                    <li>
                      <a href="index.html#">
                        <div class="task-info">
                          <div class="desc">Dashio Admin Panel</div>
                          <div class="percent">40%</div>
                        </div>
                        <div class="progress progress-striped">
                          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            <span class="sr-only">40% Complete (success)</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="index.html#">
                        <div class="task-info">
                          <div class="desc">Database Update</div>
                          <div class="percent">60%</div>
                        </div>
                        <div class="progress progress-striped">
                          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                            <span class="sr-only">60% Complete (warning)</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="index.html#">
                        <div class="task-info">
                          <div class="desc">Product Development</div>
                          <div class="percent">80%</div>
                        </div>
                        <div class="progress progress-striped">
                          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            <span class="sr-only">80% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="index.html#">
                        <div class="task-info">
                          <div class="desc">Payments Sent</div>
                          <div class="percent">70%</div>
                        </div>
                        <div class="progress progress-striped">
                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                            <span class="sr-only">70% Complete (Important)</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li class="external">
                      <a href="#">See All Tasks</a>
                    </li>
                  </ul>
                </li>
                <!-- settings end -->
                <!-- inbox dropdown start-->
                <li id="header_inbox_bar" class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-theme">5</span>
                    </a>
                  <ul class="dropdown-menu extended inbox">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                      <p class="green">You have 5 new messages</p>
                    </li>
                    <li>
                      <a href="index.html#">
                        <span class="photo"><img alt="avatar" src="img/ui-zac.jpg"></span>
                        <span class="subject">
                        <span class="from">Zac Snider</span>
                        <span class="time">Just now</span>
                        </span>
                        <span class="message">
                        Hi mate, how is everything?
                        </span>
                        </a>
                    </li>
                    <li>
                      <a href="index.html#">
                        <span class="photo"><img alt="avatar" src="img/ui-divya.jpg"></span>
                        <span class="subject">
                        <span class="from">Divya Manian</span>
                        <span class="time">40 mins.</span>
                        </span>
                        <span class="message">
                        Hi, I need your help with this.
                        </span>
                        </a>
                    </li>
                    <li>
                      <a href="index.html#">
                        <span class="photo"><img alt="avatar" src="img/ui-danro.jpg"></span>
                        <span class="subject">
                        <span class="from">Dan Rogers</span>
                        <span class="time">2 hrs.</span>
                        </span>
                        <span class="message">
                        Love your new Dashboard.
                        </span>
                        </a>
                    </li>
                    <li>
                      <a href="index.html#">
                        <span class="photo"><img alt="avatar" src="img/ui-sherman.jpg"></span>
                        <span class="subject">
                        <span class="from">Dj Sherman</span>
                        <span class="time">4 hrs.</span>
                        </span>
                        <span class="message">
                        Please, answer asap.
                        </span>
                        </a>
                    </li>
                    <li>
                      <a href="index.html#">See all messages</a>
                    </li>
                  </ul>
                </li>
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->
                <li id="header_notification_bar" class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge bg-warning">7</span>
                    </a>
                  <ul class="dropdown-menu extended notification">
                    <div class="notify-arrow notify-arrow-yellow"></div>
                    <li>
                      <p class="yellow">You have 7 new notifications</p>
                    </li>
                    <li>
                      <a href="index.html#">
                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                        Server Overloaded.
                        <span class="small italic">4 mins.</span>
                        </a>
                    </li>
                    <li>
                      <a href="index.html#">
                        <span class="label label-warning"><i class="fa fa-bell"></i></span>
                        Memory #2 Not Responding.
                        <span class="small italic">30 mins.</span>
                        </a>
                    </li>
                    <li>
                      <a href="index.html#">
                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                        Disk Space Reached 85%.
                        <span class="small italic">2 hrs.</span>
                        </a>
                    </li>
                    <li>
                      <a href="index.html#">
                        <span class="label label-success"><i class="fa fa-plus"></i></span>
                        New User Registered.
                        <span class="small italic">3 hrs.</span>
                        </a>
                    </li>
                    <li>
                      <a href="index.html#">See all notifications</a>
                    </li>
                  </ul>
                </li>
                <!-- notification dropdown end -->
              </ul>
              <!--  notification end -->
            </div>
            @guest

                @if (Route::has('login'))
                <ul class="nav pull-right top-menu">
                    <li>
                        <a class="logout" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                </ul>
                @endif

                @if (Route::has('register'))
                <ul class="nav pull-right top-menu">
                    <li class="nav pull-right">
                        <a class="logout" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                </ul>
                @endif

                @else
                <div class="top-menu">
                    <button style="margin-top:1.3rem" type="button" class="nav pull-right btn btn-default dropdown-toggle" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                      <span class="caret"></span>
                      </button>
                    <ul class=" nav pull-right top-menu dropdown-menu">
                      <li><a class="logout" href="#">Dropdown link</a></li>
                      <li><a class="logout" href="quantri/logout">Logout</a>
                    </li>
                    </ul>
                  </div>
            @endguest


          </header>
{{--  --}}
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        {{-- <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div> --}}
                    <a class="navbar-brand" href="{{ url('ListCart') }}">
                        {{ config('app.name', 'Cart') }}
                    </a>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center" id="show-cart">

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="{{ asset('assets/Admin') }}/lib/jquery.dcjqaccordion.2.7.js"></script>
    <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/jquery.nicescroll.js"></script>
    <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/jquery.sparkline.js"></script>
    <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/common-scripts.js"></script>
    <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/gritter-conf.js"></script>
    <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/sparkline-chart.js"></script>
    <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/zabuto_calendar.js"></script>
    <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/deletecamon.js"></script>
    <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/upload-img.js"></script>
    <script type="text/javascript" src="{{ asset('assets/Admin') }}/lib/fancybox/jquery.fancybox.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
          integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
          crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- gọi table data --}}
    <script>
        $(document).ready( function () {
      $('#hidden-table-info').DataTable();
  } );
    </script>
      <script type="text/javascript">
          $(function() {
            //    fancybox
            jQuery(".fancybox").fancybox();
          });
        </script>
    {{-- <script type="text/javascript">
      $(document).ready(function() {
        var unique_id = $.gritter.add({
          // (string | mandatory) the heading of the notification
          title: 'Welcome to Dashio!',
          // (string | mandatory) the text inside the notification
          text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
          // (string | optional) the image to display on the left
          image: '{{ asset('assets/Admin') }}/img/ui-sam.jpg',
          // (bool | optional) if you want it to fade out on its own or just sit there
          sticky: false,
          // (int | optional) the time you want it to be alive for before fading out
          time: 8000,
          // (string | optional) the class name you want to apply to that specific message
          class_name: 'my-sticky-class'
        });

        return false;
      });
    </script> --}}
    <script type="application/javascript">
      $(document).ready(function() {
        $("#date-popover").popover({
          html: true,
          trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function(e) {
          $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
          action: function() {
            return myDateFunction(this.id, false);
          },
          action_nav: function() {
            return myNavFunction(this.id);
          },
          ajax: {
            url: "show_data.php?action=1",
            modal: true
          },
          legend: [{
              type: "text",
              label: "Special event",
              badge: "00"
            },
            {
              type: "block",
              label: "Regular event",
            }
          ]
        });
      });

      function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
      }
    </script>

  <script>
      var currentTab = 0; // Current tab is set to be the first tab (0)
      showTab(currentTab); // Display the current tab

      function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
          document.getElementById("prevBtn").style.display = "none";
        } else {
          document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
          document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
          document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
      }

      function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {

          // ... the form gets submitted:
          //show kết quả ra màn hình
          document.getElementById("regForm").submit();
          return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
      }

      function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
          // If a field is empty...
          if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
          }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
          document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
      }

      function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
          x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
      }
      </script>
    <script type="text/javascript">
        function Deleteitemcart(id){
            $.ajax({
            url: "DeleteListCart/"+id,
            type: "GET",
        }).done(function(data){
            $('#list-cart').empty();
            $('#list-cart').html(data);
            alertify.success('Xóa sản phẩm thành công');
        });
        }
        function Updateitemcart(id){

            $.ajax({
            url: "UpdateListCart/"+id+"/"+$('#quanty-item-'+id).val(),
            type: "GET",
        }).done(function(data){
            $('#list-cart').empty();
            $('#list-cart').html(data);
            alertify.success('update sản phẩm thành công');
        });
        }
    //     $(".edit-tatca").on("click", function(){
    //         var lists = [];
    //        $("table tbody tr").each(function(){
    //            $(this).find("input").each(function(){
    //             var element = {key: $(this).data("id"), value: $(this).val()};
    //             lists.push(element);
    //             });
    //        });
    //        $.ajax({
    //             url: "Save-all",
    //             type: "POST",
    //             data: { "data": lists, "_token": "{{ csrf_token() }}"},
    //         }).done(function(response){
    //             alert('ok');
    //         // //     $('#list-cart').empty();
    //         // //     $('#list-cart').html(data);
    //         // //     alertify.success('update sản phẩm thành công');
    //         });

    // });
    </script>
    <script type="text/javascript">
    function AddCart(id){
        $.ajax({
            url: "addCart/"+id,
            type: "GET",
        }).done(function(data){
            $('#show-cart').empty();
            $('#show-cart').html(data);
            alertify.success('Thêm giỏ hàng thành công');
        });
        $("#show-cart").on("click", ".si-close i", function(){
            //console.log($(this).data('id'));
            $.ajax({
                url: "DeleteCart/"+$(this).data("id"),
                type: "GET",
            }).done(function(response){
                $('#show-cart').empty();
                $('#show-cart').html(response);
                alertify.success('Xóa giỏ hàng thành công');
            });
        });
    }

    </script>
    {{-- <script type="text/javascript">
     $.ajaxSetup({ headers: { 'csrf_token' : '{{ csrf_token() }}' } });
        $(".edit-tatca").on("click", function(){
           var lists = [];
           $("table tbody tr").each(function(){
               $(this).find("input").each(function(){
                var element = {key: $(this).data("id"), value: $(this).val()};
                lists.push(element);
                });
           });
           $.ajax({
                url: "Save-all",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data": lists
                }
            }).done(function(response){
                $('#list-cart').empty();
                $('#list-cart').html(data);
                alertify.success('update sản phẩm thành công');
            });

    });
    </script> --}}

</body>
</html>
