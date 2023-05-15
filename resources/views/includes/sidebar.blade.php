<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
    <a class="sidebar-brand brand-logo" href="index.html"><img src="{{asset('assets/images/logo.svg')}}"
        alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img
        src="{{asset('assets/images/logo-mini.svg')}}" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="{{asset('assets/images/faces/face1.jpg')}}" alt="profile" />
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column pr-3">
          <span class="font-weight-medium mb-2">Henry Klein</span>
        </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
          aria-controls="ui-basic">
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
          <span class="menu-title">Quản lý Thể loại</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('categories.index')}}">Danh sách</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('categories.trash')}}">Thùng rác</a>
            </li>
          </ul>
        </div>
      </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
        aria-controls="ui-basic">
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        <span class="menu-title">Quản lý phòng</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('rooms.index')}}">Danh sách</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('rooms.trash')}}">Thùng rác</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('groups.index')}}">
          <i class="mdi mdi-contacts menu-icon"></i>
          <span class="menu-title">Quản lý phân quyền  </span>
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('users.index')}}">
        <i class="mdi mdi-contacts menu-icon"></i>
        <span class="menu-title">Quản lý nhân viên </span>
      <a class="nav-link" href="{{route('customers.index')}}">
        <i class="mdi mdi-contacts menu-icon"></i>
        <span class="menu-title">Quản lý khách hàng</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('orders.index')}}">
        <i class="mdi mdi-contacts menu-icon"></i>
        <span class="menu-title">Quản lý đơn đặt phòng</span>
      </a>
    </li>
  </ul>
</nav>
