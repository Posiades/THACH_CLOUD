<div class="header">
         <div class="container">
            <div class="row d_flex">
               <div class=" col-md-2 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a class="mx-5" href="{{url('/')}}"><img src="{{asset('images/logo.png')}}" alt="#" width="200px"></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-8 col-sm-12">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item">
                              <a class="nav-link" href="{{url('/')}}">Trang Chủ</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{url('about')}}">Giới Thiệu</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{url('hosting')}}">Hosting</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{url('vps')}}">VPS</a>
                           </li>
                          
                           <li class="nav-item">
                              <a class="nav-link" href="{{url('contract')}}">Liên Hệ</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{url('showcart')}}">
                                  <i class="fas fa-shopping-cart"></i>
                              </a>
                          </li>
                           @if(!Auth::check())
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('login')}}">Đăng Nhập</a>
                           </li>
                           @endif
                        </ul>
                     </div>
                  </nav>
               </div>
                  @if(Auth::check())
                  <div class="dropdown">
                      <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Hello <strong>{{Auth::user()->username}}</strong>
                      </button>
                        @if(Auth::user()->is_admin == 1)
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          {{-- {{-- <a class="dropdown-item" href="#">Item 1</a> --}}
                          <a class="dropdown-item" href="{{route('dashboard')}}">DashBoard</a>
                          <a class="dropdown-item" href="{{route('admin.logout')}}">Đăng Xuất</a>
                      </div>
                      @else
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        {{-- <a class="dropdown-item" href="#">Item 1</a> --}}
                        <a class="dropdown-item" href="{{route('user.dashboard')}}">User DashBoard</a>
                        <a class="dropdown-item" href="{{route('user.logout')}}">Đăng Xuất</a>
                     </div>
                    @endif
                  </div>
                  @endif
            
            
            
            </div>
         </div>
      </div>