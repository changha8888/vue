<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Quản lý website</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.4 -->
  <link rel="stylesheet" type="text/css" href="{{ url('/backend/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('/backend/css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('/backend/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('/backend/css/_all-skins.min.css') }}">
  <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ url('/backend/uploadify/uploadify.css') }}">
  <!-- js ckediter -->
  <script src="{{ url('/backend/js/jQuery-2.1.4.min.js') }}"></script>
  <!-- ckediter và ckfinder -->

  <script type="text/javascript">
    var baseURL ="{!! url('/') !!}";
  </script>
  <script type="text/javascript" src="{{ url('/backend/func_ckfinder.js') }}"></script>

  <!-- end ckediter và ckfinder -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <meta id="token" name="token" value="{{ csrf_token() }}">
</head>
<body class="skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="{!! url('admin') !!}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
                           
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              
              
            <!-- Notifications: style can be found in dropdown.less -->
            
            <!-- Tasks: style can be found in dropdown.less -->
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              </a>
              <ul class="dropdown-menu">
                
                <li class="user-footer">
                 <div class="pull-left">
                    <a href="" class="btn btn-default btn-flat">Đổi mật khẩu</a>
                  </div>
                  <div class="pull-right">
                    <a href="" class="btn btn-default btn-flat">Logout</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
       
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..." />
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="@yield('trangchu') treeview">
            <a href="{!! url('admin') !!}">
              <i class="fa fa-dashboard"></i> <span>Trang chủ Admin</span>
            </a>
          </li>

          
          <li class="treeview @yield('danhmuc')">
            <a href="javascript:void(0)">
              <i class="glyphicon glyphicon-road"></i> <span>Quản lý địa điểm</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li class="@yield('them_dm')"><a href="{!! url('admin/place/add') !!}"><i class="fa fa-circle-o"></i> Thêm biển báo</a></li>
              <li class="@yield('list_dm')"><a href="{!! url('admin/place/index') !!}"><i class="fa fa-circle-o"></i> Danh sách biển báo</a></li>
            </ul>
          </li>
           
          <li class="treeview @yield('user')">
            <a href="javascript:void(0)">
              <i class="glyphicon glyphicon-user"></i> <span>Quản lý User</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li class="@yield('them_user')"><a href="{!! url('admin/user/add') !!}"><i class="fa fa-circle-o"></i> Thêm User</a></li>
              <li class="@yield('list_user')"><a href="{!! url('admin/user/index') !!}"><i class="fa fa-circle-o"></i> Danh sách User</a></li>
            </ul>
          </li>
          <!-- end menu -->
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          @yield('controller')
          <small>@yield('action')</small>
        </h1>
      </section>
      <div class="col-lg-12" style="margin-top:12px;"> 
        @if(Session::has('flash_message'))
        <div class="alert alert-{!! Session::get('flash_level') !!}">
          {!! Session::get('flash_message') !!}
        </div>
        @endif
      </div>
      <!-- Main content -->
      <section class="content">
      @yield('content')
      </section>
      <!-- /.content -->

    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 3.0
      </div>
      <strong>Copyright &copy; 2016</strong>
    </footer>
    
      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    

    <script src="{{ url('/backend/js/app.min.js') }}"></script>
    <script src="{{ url('/backend/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ url('/backend/js/bootstrap.min.js') }}"></script>
    
  @yield('js')
  </body>
  </html>
