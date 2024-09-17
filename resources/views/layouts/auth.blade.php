<!DOCTYPE html>
<html lang="en">

<head>
   <title>auth Dashboard</title>
   <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
   <!-- Favicon icon -->
   <link rel="shortcut icon" href="{{asset('assets/auth/images/favicon.png')}}" type="image/x-icon">
   <link rel="icon"  href="{{asset('assets/auth/images/favicon.ico')}}"  type="image/x-icon">

   <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

   <!-- themify -->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/icon/themify-icons/themify-icons.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/icon/themify-icons/style.css')}}">


   <!-- iconfont -->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/icon/icofont/css/icofont.css')}}">

   <!-- simple line icon -->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/icon/simple-line-icons/css/simple-line-icons.css')}}">

   <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/icon/simple-line-icons/css/style.css')}}">

   <!-- Required Fremwork -->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/plugins/bootstrap/css/bootstrap.min.css')}}">

   <!-- Chartlist chart css -->
   <link rel="stylesheet" href="{{asset('assets/auth/plugins/chartist/dist/chartist.css')}}" type="text/css" media="all">

   <!-- Weather css -->
   <link href="{{asset('assets/auth/css/svg-weather.css')}}" rel="stylesheet">
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

   <!-- Style.css -->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/css/main.css')}}">

   <!-- Responsive.css-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/auth/css/responsive.css')}}">

</head>

<body class="sidebar-mini fixed">
   <div class="loader-bg">
      <div class="loader-bar">
      </div>
   </div>
   <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header-top hidden-print bg-success" style="background-color: white">
         <a href="index.html" class="logo">
            <img class="img-fluid able-logo" src="{{ asset('assets/images/turbo_energy_building.jpg') }}">
        </a>

         <nav class="navbar navbar-static-top bg-success">
            <!-- Sidebar toggle button-->
            <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
            <ul class="top-nav lft-nav">
               <li>
                  <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                     <i class="ti-files"> </i><span> Files</span>
                  </a>
               </li>
               <li class="dropdown">
                  <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                     <span>Dropdown </span><i class=" icofont icofont-simple-down"></i>
                  </a>
                  <ul class="dropdown-menu settings-menu">
                     <li><a href="#">List item 1</a></li>
                     <li><a href="#">List item 2</a></li>
                     <li><a href="#">List item 3</a></li>
                     <li><a href="#">List item 4</a></li>
                     <li><a href="#">List item 5</a></li>
                  </ul>
               </li>
               <li class="dropdown pc-rheader-submenu message-notification search-toggle">
                  <a href="#!" id="morphsearch-search" class="drop icon-circle txt-white">
                     <i class="ti-search"></i>
                  </a>
               </li>
            </ul>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu f-right">
              {{-- <div class="upgrade-button">
                <a href="#" class="icon-circle txt-white btn btn-sm btn-primary upgrade-button">
                    <span>Upgrade To Pro</span>
                </a>
              </div> --}}

               <ul class="top-nav">
                  <!--Notification Menu-->

                  <li class="dropdown notification-menu">
                     {{-- <a href="#!" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                        <i class="icon-bell"></i>
                        <span class="badge badge-danger header-badge">9</span>
                     </a> --}}
                     <ul class="dropdown-menu">
                        <li class="not-head">You have <b class="text-primary">4</b> new notifications.</li>
                        <li class="bell-notification">
                           <a href="javascript:;" class="media">
                              <span class="media-left media-icon">
                    <img class="img-circle" src="{{asset('assets/auth/images/avatar-1.png')}}" alt="User Image">
                  </span>
                              <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block-time">2min ago</span></div>
                           </a>
                        </li>
                        <li class="bell-notification">
                           <a href="javascript:;" class="media">
                              <span class="media-left media-icon">
                    <img class="img-circle" src="{{asset('assets/auth/images/avatar-2.png')}}" alt="User Image">
                  </span>
                              <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block-time">20min ago</span></div>
                           </a>
                        </li>
                        <li class="bell-notification">
                           <a href="javascript:;" class="media"><span class="media-left media-icon">
                    <img class="img-circle" src="assets/auth/images/avatar-3.png" alt="User Image">
                  </span>
                                    <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block-time">3 hours ago</span></div></a>
                        </li>
                        <li class="not-footer">
                           <a href="#!">See all notifications.</a>
                        </li>
                     </ul>
                  </li>
                  <!-- chat dropdown -->
                  <li class="pc-rheader-submenu ">
                     {{-- <a href="#!" class="drop icon-circle displayChatbox">
                        <i class="icon-bubbles"></i>
                        <span class="badge badge-danger header-badge">5</span>
                     </a> --}}

                  </li>
                  <!-- window screen -->
                  <li class="pc-rheader-submenu">
                     <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                        <i class="icon-size-fullscreen"></i>
                     </a>

                  </li>
                  <!-- User Menu-->
                  <li class="dropdown bg-success">
                    @auth <!-- Check if the user is authenticated -->
                    <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                        {{-- <span><img class="img-circle " src="{{asset('assets/auth/images/avatar-1.png')}}" style="width:40px;" alt="User Image"></span> --}}
                        <span>{{ Auth::user()->name }} <i class=" icofont icofont-simple-down"></i></span>
                    </a>
                @endauth
                     <ul class="dropdown-menu settings-menu">
                        <li><a href="#!"><i class="icon-settings"></i> Settings</a></li>
                        <li><a href="#"><i class="icon-user"></i> Profile</a></li>
                        <li><a href="#"><i class="icon-envelope-open"></i> My Messages</a></li>
                        <li class="p-0">
                           <div class="dropdown-divider m-0"></div>
                        </li>
                        <li><a href="#"><i class="icon-lock"></i> Lock Screen</a></li>
                        <li class="nav-item">
                           <a>
                           <form action="{{ route('logout') }}" method="POST">
                             @csrf
                             <button type="submit" class="" style="background-color: white; border:none; display:inline-block"><i class="icon-logout"></i> Logout</button>
                           </form>
                        </a>
                         </li>

                     </ul>
                  </li>
               </ul>

               <!-- search -->
               <div id="morphsearch" class="morphsearch bg-success">
                  <form class="morphsearch-form bg-success">

                     <input class="morphsearch-input" type="search" placeholder="Search..." />

                     <button class="morphsearch-submit" type="submit">Search</button>

                  </form>
                  <div class="morphsearch-content">
                     <div class="dummy-column">
                        <h2>People</h2>
                        <a class="dummy-media-object" href="#!">
                           <img class="round" src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&d=identicon&r=G" alt="Sara Soueidan" />
                           <h3>Sara Soueidan</h3>
                        </a>

                        <a class="dummy-media-object" href="#!">
                           <img class="round" src="http://1.gravatar.com/avatar/9bc7250110c667cd35c0826059b81b75?s=50&d=identicon&r=G" alt="Shaun Dona" />
                           <h3>Shaun Dona</h3>
                        </a>
                     </div>
                     <div class="dummy-column">
                        <h2>Popular</h2>
                        <a class="dummy-media-object" href="#!">
                           <img src="{{asset('assets/auth/images/avatar-1.png')}}" alt="PagePreloadingEffect" />
                           <h3>Page Preloading Effect</h3>
                        </a>

                        <a class="dummy-media-object" href="#!">
                           <img src="{{asset('assets/auth/images/avatar-1.png')}}" alt="DraggableDualViewSlideshow" />
                           <h3>Draggable Dual-View Slideshow</h3>
                        </a>
                     </div>
                     <div class="dummy-column">
                        <h2>Recent</h2>
                        <a class="dummy-media-object" href="#!">
                           <img src="{{asset('assets/auth/images/avatar-1.png')}}" alt="TooltipStylesInspiration" />
                           <h3>Tooltip Styles Inspiration</h3>
                        </a>
                        <a class="dummy-media-object" href="#!">
                           <img src="{{asset('assets/auth/images/avatar-1.png')}}" alt="NotificationStyles" />
                           <h3>Notification Styles Inspiration</h3>
                        </a>
                     </div>
                  </div>
                  <!-- /morphsearch-content -->
                  <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
               </div>
               <!-- search end -->
            </div>
         </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print ">
         <section class="sidebar" id="sidebar-scroll">
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
                <li class="nav-level">--- Navigation</li>
                <li class="active treeview">
                    <a class="waves-effect waves-dark" href="{{ url('dashboard') }}">
                        <i class="icon-speedometer"></i><span> Dashboard</span>
                    </a>
                </li>
                <li class="nav-level">--- Components</li>
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-briefcase"></i><span> Admin Config</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="{{ url('add-staff') }}"><i class="icon-arrow-right"></i>Add staff</a></li>
                        <li><a class="waves-effect waves-dark" href="{{ url('view-staff') }}"><i class="icon-arrow-right"></i> View Staff</a></li>
                    </ul>
                </li>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="float-chart.html"><i class="icon-arrow-right"></i> Float Charts</a></li>
                        <li><a class="waves-effect waves-dark" href="morris-chart.html"><i class="icon-arrow-right"></i> Morris Charts</a></li>
                    </ul>
                </li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-book-open"></i><span>Warehouse</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                     <li><a class="waves-effect waves-dark" href="{{ url('add-warehouse') }}"><i class="icon-arrow-right"></i>Add warehouse</a></li>

                        <li><a class="waves-effect waves-dark" href="{{ url('view-warehouse') }}"><i class="icon-arrow-right"></i>Warehouses</a></li>
                       </li>
                    </ul>
                </li>

                <li class="nav-level">--- More</li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-docs"></i><span>Items</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                     <li class="treeview"><a href="{{ url('add-items') }}"><i class="icon-arrow-right"></i><span>Add Items</span><i class="icon-arrow-down"></i></a>
                        </li>
                        </ul>
                    <ul class="treeview-menu">
                        <li class="treeview"><a href="{{ url('view-items') }}"><i class="icon-arrow-right"></i><span>View Items</span><i class="icon-arrow-down"></i></a>
                        </li>
                        </ul>
                    <ul class="treeview-menu">
                        <li class="treeview"><a href="{{ url('warehouses/move-items') }}"><i class="icon-arrow-right"></i><span>Move Items</span><i class="icon-arrow-down"></i></a>
                        </li>
                        </ul>
                </li>
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-docs"></i><span>department</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                     <li class="treeview"><a href="{{ url('department') }}"><i class="icon-arrow-right"></i><span>Add department</span><i class="icon-arrow-down"></i></a>
                        </li>
                        </ul>
                    <ul class="treeview-menu">
                        <li class="treeview"><a href="{{ url('view-department') }}"><i class="icon-arrow-right"></i><span>View department</span><i class="icon-arrow-down"></i></a>
                        </li>
                        </ul>
                </li>
                <li class="nav-level">--- Task</li>
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-docs"></i><span>Task</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                     <li class="treeview"><a href="{{ url('add-task') }}"><i class="icon-arrow-right"></i><span>Add Task</span><i class="icon-arrow-down"></i></a>
                        </li>
                        </ul>
                    <ul class="treeview-menu">
                        <li class="treeview"><a href="{{ url('view-task') }}"><i class="icon-arrow-right"></i><span>View Task</span><i class="icon-arrow-down"></i></a>
                        </li>
                        </ul>
                </li>
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-docs"></i><span>Users</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                     <li class="treeview"><a href="{{ url('user-add') }}"><i class="icon-arrow-right"></i><span>Add user</span><i class="icon-arrow-down"></i></a>
                        </li>
                        </ul>
                    <ul class="treeview-menu">
                        <li class="treeview"><a href="{{ url('view-users') }}"><i class="icon-arrow-right"></i><span>View users</span><i class="icon-arrow-down"></i></a>
                        </li>
                        </ul>
                        <li class="treeview"><a href="{{ url('accounting/create') }}"><i class="icon-arrow-right"></i><span>send fund</span><i class="icon-arrow-down"></i></a>
                        </li>
                        </ul>
                        <li class="treeview"><a href="{{ route('cashier.inbox') }}"><i class="icon-arrow-right"></i><span>view inbox</span></i></a>
                        </li>
                </li>


                {{-- <li class="nav-level">--- Menu Level</li> --}}

                {{-- <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icofont icofont-company"></i><span>Menu Level 1</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="waves-effect waves-dark" href="#!">
                                <i class="icon-arrow-right"></i>
                                Level Two
                            </a>
                        </li>
                        <li class="treeview">
                            <a class="waves-effect waves-dark" href="#!">
                                <i class="icon-arrow-right"></i>
                                <span>Level Two</span>
                                <i class="icon-arrow-down"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="waves-effect waves-dark" href="#!">
                                        <i class="icon-arrow-right"></i>
                                        Level Three
                                    </a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-dark" href="#!">
                                        <i class="icon-arrow-right"></i>
                                        <span>Level Three</span>
                                        <i class="icon-arrow-down"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a class="waves-effect waves-dark" href="#!">
                                                <i class="icon-arrow-right"></i>
                                                Level Four
                                            </a>
                                        </li>
                                        <li>
                                            <a class="waves-effect waves-dark" href="#!">
                                                <i class="icon-arrow-right"></i>
                                                Level Four
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
            </ul>
         </section>
      </aside>
      <!-- Sidebar chat start -->
      <div id="sidebar" class="p-fixed header-users showChat">
         <div class="had-container">
            <div class="card card_main header-users-main">
               <div class="card-content user-box">
                  <div class="md-group-add-on p-20">
                     <span class="md-add-on">
                                    <i class="icofont icofont-search-alt-2 chat-search"></i>
                                 </span>
                     <div class="md-input-wrapper">
                        <input type="text" class="md-form-control" name="username" id="search-friends">
                        <label>Search</label>
                     </div>

                  </div>
                  <div class="media friendlist-main">

                     <h6>Friend List</h6>

                  </div>
                  <div class="main-friend-list">
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="{{asset('assets/auth/images/avatar-1.png')}}" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="{{asset('assets/auth/images/avatar-2.png')}}" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Alice</div>
                           <span>1 hour ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="7" data-status="offline" data-username="Michael Scofield" data-toggle="tooltip" data-placement="left" title="Michael Scofield">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="assets/auth/images/avatar-3.png" alt="Generic placeholder image">
                           <div class="live-status bg-danger"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Michael Scofield</div>
                           <span>3 hours ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="5" data-status="online" data-username="Irina Shayk" data-toggle="tooltip" data-placement="left" title="Irina Shayk">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="{{asset('assets/auth/images/avatar-4.png')}}" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Irina Shayk</div>
                           <span>1 day ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="6" data-status="offline" data-username="Sara Tancredi" data-toggle="tooltip" data-placement="left" title="Sara Tancredi">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="{{asset('assets/auth/images/avatar-5.png')}}" alt="Generic placeholder image">
                           <div class="live-status bg-danger"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Sara Tancredi</div>
                           <span>2 days ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="{{asset('assets/auth/images/avatar-1.png')}}" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="{{asset('assets/auth/images/avatar-2.png')}}" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Alice</div>
                           <span>1 hour ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="{{asset('assets/auth/images/avatar-1.png')}}" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="{{asset('assets/auth/images/avatar-2.png')}}" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Alice</div>
                           <span>1 hour ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="{{asset('assets/auth/images/avatar-1.png')}}" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="{{asset('assets/auth/images/avatar-2.png')}}" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Alice</div>
                           <span>1 hour ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="{{asset('assets/auth/images/avatar-1.png')}}" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="{{asset('assets/auth/images/avatar-1.png')}}" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="{{asset('assets/auth/images/avatar-1.png')}}" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="{{asset('assets/auth/images/avatar-1.png')}}" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
      <div class="showChat_inner">
         <div class="media chat-inner-header">
            <a class="back_chatBox">
               <i class="icofont icofont-rounded-left"></i> Josephin Doe
            </a>
         </div>
         <div class="media chat-messages">
            <a class="media-left photo-table" href="#!">
               <img class="media-object img-circle m-t-5" src="{{asset('assets/auth/images/avatar-1.png')}}" alt="Generic placeholder image">
               <div class="live-status bg-success"></div>
            </a>
            <div class="media-body chat-menu-content">
               <div class="">
                  <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                  <p class="chat-time">8:20 a.m.</p>
               </div>
            </div>
         </div>
         <div class="media chat-messages">
            <div class="media-body chat-menu-reply">
               <div class="">
                  <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                  <p class="chat-time">8:20 a.m.</p>
               </div>
            </div>
            <div class="media-right photo-table">
               <a href="#!">
                  <img class="media-object img-circle m-t-5" src="{{asset('assets/auth/images/avatar-2.png')}}" alt="Generic placeholder image">
                  <div class="live-status bg-success"></div>
               </a>
            </div>
         </div>
         <div class="media chat-reply-box">
            <div class="md-input-wrapper">
               <input type="text" class="md-form-control" id="inputEmail" name="inputEmail">
               <label>Share your thoughts</label>
               <span class="highlight"></span>
               <span class="bar"></span> <button type="button" class="chat-send waves-effect waves-light">
                     <i class="icofont icofont-location-arrow f-20 "></i>
                 </button>

               <button type="button" class="chat-send waves-effect waves-light">
                    <i class="icofont icofont-location-arrow f-20 "></i>
                </button>
            </div>

         </div>
      </div>
      <!-- Sidebar chat end-->
      <div class="content-wrapper" style="background-color: white; marging-top:60px">
         <!-- Container-fluid starts -->
         <!-- Main content starts -->
         @yield('content')


   <!-- Required Jqurey -->
   <script src="{{asset('assets/auth/plugins/Jquery/dist/jquery.min.js')}}"></script>
   <script src="{{asset('assets/auth/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
   <script src="{{asset('assets/auth/plugins/tether/dist/js/tether.min.js')}}"></script>

   <!-- Required Fremwork -->
   <script src="{{asset('assets/auth/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

   <!-- Scrollbar JS-->
   <script src="{{asset('assets/auth/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
   <script src="{{asset('assets/auth/plugins/jquery.nicescroll/jquery.nicescroll.min.js')}}"></script>

   <!--classic JS-->
   <script src="{{asset('assets/auth/plugins/classie/classie.js')}}"></script>

   <!-- notification -->
   <script src="{{asset('assets/auth/plugins/notification/js/bootstrap-growl.min.js')}}"></script>

   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


   <!-- Sparkline charts -->
   <script src="{{asset('assets/auth/plugins/jquery-sparkline/dist/jquery.sparkline.js')}}"></script>

   <!-- Counter js  -->
   <script src="{{asset('assets/auth/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
   <script src="{{asset('assets/auth/plugins/countdown/js/jquery.counterup.js')}}"></script>

   <!-- Echart js -->
   <script src="{{asset('assets/auth/plugins/charts/echarts/js/echarts-all.js')}}"></script>

   <script src="https://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
   <script src="https://code.highcharts.com/highcharts-3d.js"></script>

   <!-- custom js -->
   <script type="text/javascript" src="{{asset('assets/auth/js/main.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('assets/auth/pages/dashboard.js')}}"></script>
   <script type="text/javascript" src="{{asset('assets/auth/pages/elements.js')}}"></script>
   <script src="{{asset('assets/auth/js/menu.min.js')}}"></script>

<script>
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function(){
    if ($window.scrollTop() >= 200) {
       nav.addClass('active');
    }
    else {
       nav.removeClass('active');
    }
});
</script>

</body>

</html>
