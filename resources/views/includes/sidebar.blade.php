<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
      <a class="sidebar-brand brand-logo" href="{{route('login')}}"><img src="{{asset('assets/images/sky-logo.png')}}"
          alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href=""><img
          src="{{asset('assets/images/logo-mini.svg')}}" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{asset(auth()->user()->image)}}" alt="profile" />
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column pr-3">
            <span class="font-weight-medium mb-2">{{auth()->user()->name}}</span>
            <span class="font-weight-normal">{{auth()->user()->group->name}}</span>
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('login')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Trang chủ</span>
        </a>
      </li>
      <li class="nav-item">
        @if (Auth::user()->hasPermission('Category_viewAny'))
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
          @endif
        </li>
      <li class="nav-item">
        @if (Auth::user()->hasPermission('room_viewAny'))
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
                @if (Auth::user()->hasPermission('room_trash'))
              <a class="nav-link" href="{{route('rooms.trash')}}">Thùng rác</a>
              @endif
            </li>
          </ul>
        </div>
        @endif
      </li>
      <li class="nav-item">
        @if (Auth::user()->hasPermission('Group_viewAny'))
          <a class="nav-link" href="{{route('groups.index')}}">
            <i class="mdi mdi-contacts menu-icon"></i>
            <span class="menu-title">Quản lý phân quyền  </span>
          </a>
          @endif
      </li>
      <li class="nav-item">
        @if (Auth::user()->hasPermission('User_viewAny'))
        <a class="nav-link" href="{{route('users.index')}}">
          <i class="mdi mdi-contacts menu-icon"></i>
          <span class="menu-title">Quản lý nhân viên </span>
        </a>
          @endif
      </li>
      <li class="nav-item">
        @if (Auth::user()->hasPermission('Customer_viewAny'))
          <a class="nav-link" href="{{route('customers.index')}}">
            <i class="mdi mdi-contacts menu-icon"></i>
            <span class="menu-title">Quản lý khách hàng</span>
          </a>
          @endif
      </li>
      <li class="nav-item">
        @if (Auth::user()->hasPermission('Order_viewAny'))
        <a class="nav-link" href="{{route('orders.index')}}">
          <i class="mdi mdi-contacts menu-icon"></i>
          <span class="menu-title">Quản lý đơn đặt phòng</span>
        </a>
        @endif
      </li>
    </ul>
  </nav>

