<nav class="main-header navbar navbar-expand  navbar-light" style="background-color: #3498db">
    <!-- Left navbar links -->
    <ul class="navbar-nav ">
        <li class="nav-item">
            <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="javascript:void(0)" class="nav-link department {{ setFont() }} text-white"
                style="
            margin-top:-15px;font-size: 16px;
               line-height: 21px;
              ">


                {{ clientInfo()->name }}, {{ clientInfo()->district_name }}, {{ clientInfo()->province_name }}
                <br>


                @if (clientInfo()->local_body_type_id == 4)
                    {{ getLan() == 'np'
                        ? ' गाउँ कार्यपालिकाको कार्यालय'
                        : '
                                            Office of Rural Municipal Executive' }}
                @else
                    {{ getLan() == 'np' ? ' नगर  कार्यपालिकाको कार्यालय ' : 'Office of Municipal Executive' }}
                @endif



                <br>


            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li style="margin-right: 10px;" class="d-none d-sm-inline-block">

            <a style="font-size: 16px; line-height:20px;">
                <label style="margin-bottom:20px; font-weight: 500" class="nav-link {{ setFont() }} text-white">
                    {{-- @if (Session::get('fiscal_year_code') != '')
                    {{trans('common.fiscal_year')}}
                    @endif
                    <br> --}}
                    आर्थिक वर्ष
                    <span class="{{ setFont() }}">
                        @if (Session::get('fiscal_year_code') != '')
                            {{ Session::get('fiscal_year_code') }}
                        @else
                            {{ currentFy()->code }}
                        @endif
                    </span>
                </label>
            </a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link dateandtime">
                <label class="date {{ setFont() }} font-weight-bold text-white"
                    style="margin-bottom: 0px;
                    font-size: 16px;
                    font-weight: 500;
                    margin-top: -6px;
                    line-height: 19px; "
                    class="{{ setFont() }}">

                    {{ (new \App\Helpers\DateConverter())->eng_to_nep(date('Y-m-d'), 'np') }},
                    <label class="time font-weight-bold" id="timeset"
                        style="font-weight: 400 !important;margin-right:50px">

                    </label>
                    <br>
                    <lablel class="year">
                        {{ date('l jS \of F Y ') }}
                    </lablel>
                </label>
            </a>

        </li>

        <!-- Navbar Search -->
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li> --}}

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link text-white" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link text-white" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-white" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li> --}}
        {{-- <li class="nav-item">
          <div class="theme-switch-wrapper nav-link">
              <label class="theme-switch" for="checkbox">
                  <input type="checkbox" class="switch_theme" />
              </label>
          </div>
      </li> --}}

        {{-- language change --}}
        <li class="nav-item">
            <div class="nav-link">
                <label class="nav-item switch">
                    <input type="checkbox" id="language-toggle"
                        {{ session()->get('locale') == 'en' ? 'checked' : '' }}>
                    <span class="slider round"></span>
                </label>
            </div>
        </li>
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->

                {{-- @if (file_exists(CRUDBooster::me()->photo))
              <img src="{{ CRUDBooster::myPhoto() }}" class="user-image" alt="User Image" />
              @else --}}
                <img src="{{ url('/') }}/images/noimages.png" class="user-image"
                    style="margin-top: 2px;" alt="user-image" />

                {{-- @endif --}}

                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                {{-- <span class="hidden-xs">rkcb</span> --}}
            </a>
            <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                    {{-- @if (file_exists(CRUDBooster::me()->photo))
                  <img src="{{ CRUDBooster::myPhoto() }}" class="img-circle" alt="User Image" />
                  @else --}}
                    <img src="{{ url('/') }}/images/noimages.png" class="img-circle"
                        alt="{{ trans('crudbooster.user_image') }}" />

                    {{-- @endif --}}

                    <p>
                        {{getUserName(userInfo()->id)}}
                        <small>({{roleName(userInfo()->role_id)}})</small>
                        <small><em><?php echo date('d F Y'); ?></em> </small>
                    </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="" style="float: left">
                        <a href="" class="btn btn-primary btn-flat">
                           <i class="fa fa-user"></i> {{getLan()=='np'?'प्रोफाईल':'Profile' }}</a>
                    </div>
                    <div class="" style="float: right">
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt"></i> {{getLan()=='np'?'लग आउट ':'Logout' }}
                        </button>

                    </div>
                </li>
            </ul>
        </li>

    </ul>
</nav>

<div class="modal fade" id="logoutModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content modal-content-radius">
            <div class="modal-header btn btn-primary">
                <h4 class="modal-title ">
                    @if(systemSetting())
                        {{getLan() == 'np' ? systemSetting()->app_short_name_np : systemSetting()->app_short_name }}
                    @else
                        {{trans('common.app_name')}}
                    @endif
                </h4>
            </div>
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <div class="modal-body">
                    <h6 class="">
                        {{trans('message.header.are_you_sure_you_want_to_sign_out')}}
                    </h6>

                </div>
                <div class="modal-footer justify-content-center ">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-circle"></i>
                        {{trans('message.button.yes')}}
                    </button>
                    &nbsp; &nbsp;
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times-circle"></i>
                        {{trans('message.button.no')}}

                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
