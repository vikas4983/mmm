<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    <!-- theme meta -->
    <meta name="theme-name" content="mono" />
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ asset('assets/auth/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />
    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('assets/auth/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    @yield('styles') @yield('font-awesome-cdn')
    <link href="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('assets/auth/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ asset('assets/auth/css/style.css') }}" />
    <!-- COUNT CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/badge badge-primary badge-pill.css') }}" />
    <!-- FAVICON -->
    @if ($favicons ?? '')
        <link href="{{ asset('storage/admin/logo-favicon/favicons/' . ($favicons->name ?? '')) }}"
            rel="shortcut icon" />
    @else
        <link href="{{ asset('assets/auth/images/favicon.png') }}" rel="shortcut icon" />
    @endif
    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="{{ asset('assets/auth/plugins/circle-progress/circle-progress.js') }}"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
    <script src="{{ asset('assets/auth/plugins/nprogress/nprogress.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css"
        rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>
    <style>
        .loader-container {
            background-color: rgb(72, 91, 169);
            width: 100vw;
            height: 100vh;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: white;
        }

        .loader {
            border: 16px solid #21db8d;
            border-top: 16px solid #FFFF00;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
            position: relative;

        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }


        .dashboardg {
            display: none;
        }

        #logo {
            max-width: 199px;
        }
    </style>




</head>


<body class="navbar-fixed sidebar-fixed" id="body">
    @php
        $admin = Auth::user();
    @endphp

    <div class="loader-container" id="loader">
        <div class="loader">
        </div>
    </div>






    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">


        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    @if ($logos ?? '')
                        <a href="{{ url('dashboard') }}">
                            <img src="{{ asset('storage/admin/logo-favicon/logos/' . ($logos->name ?? '')) }}"
                                alt="Mono" id="logo">
                            <span class="brand-name"></span>
                        </a>
                    @else
                        <a href="{{ url('dashboard') }}">
                            <img src="{{ asset('assets/auth/images/logo.png') }}" alt="Mono">
                            <span class="brand-name">MONO</span>
                        </a>
                    @endif
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <li class="activev">
                            <a class="sidenav-item-link" href="{{ url('admin/dashboard') }}">
                                <i class="mdi mdi-view-dashboard" style="color: rgb(158,109,226)"></i>
                                <span class="nav-text">Admin Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="{{ route('admins.index') }}">

                                <i class="mdi mdi-briefcase-account-outline" style="color: rgb(158,109,226)"></i>
                                <span class="nav-text">Admins<span
                                        class="badge badge-primary badge-pill">{{ $counts['adminsCount'] ?? '' }}</span></span>
                            </a>
                        </li>
                        {{-- <li class="section-title">
                            Action
                        </li> --}}
                        <li class="section-title">
                            Action
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#users" aria-expanded="false" aria-controls="users">
                                <i class="mdi mdi-account-group-outline" style="color: rgb(158,109,226)"></i>
                                <span class="nav-text">Users</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="users" data-parent="#sidebar-menu">
                                <div class="sub-menu">

                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('users.index') }}">
                                            <span class="nav-text">All Users <span
                                                    class="badge badge-primary badge-pill">{{ $counts['usersCount'] ?? '' }}</span></span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link"
                                            href="{{ route('users.index', ['activeUsers' => 'Users']) }}">
                                            <span class="nav-text">Active Users
                                                <span
                                                    class="badge badge-primary badge-pill">{{ $counts['activeUsersCount'] ?? '' }}</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link"
                                            href="{{ route('users.index', ['inActiveUsers' => 'Users']) }}">
                                            <span class="nav-text">InActive USers
                                                <span
                                                    class="badge badge-primary badge-pill">{{ $counts['inActiveUsersCount'] ?? '' }}</span>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="sidenav-item-link"
                                            href="{{ route('users.index', ['paidUsers' => 'users']) }}">
                                            <span class="nav-text">Paid Users
                                                <span
                                                    class="badge badge-primary badge-pill">{{ $counts['paidUsersCount'] ?? '' }}</span>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('spotelights.index') }}">
                                            <span class="nav-text">Spotlight Users
                                                <span
                                                    class="badge badge-primary badge-pill">{{ $counts['spotlightCount'] ?? '' }}</span>
                                            </span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ url('admin/user-orders') }}">
                                            <span class="nav-text">User Orders</span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="user-notify-settings.html">
                                            <span class="nav-text">User Notify Settings</span>

                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>

                        @php
                        // Define sections and their corresponding route bases
                        $sections = [
                            'countries' => 'Countries',
                            'states' => 'States',
                            'cities' => 'Cities',
                            'religions' => 'Religion',
                            'castes' => 'Caste',
                            'employees' => 'Employee',
                            'educations' => 'Education',
                            'occupations' => 'Occupation',
                            'incomes' => 'Income',
                            'plans' => 'Plan',
                            'successStories' => 'Success Story',
                        ];
                    
                        // Helper function to retrieve section data
                        function getSectionData($modelCounts, $routeBase)
                        {
                            $index = $modelCounts->firstWhere('route_name', "{$routeBase}.index");
                            $create = $modelCounts->firstWhere('route_name', "{$routeBase}.create");
                    
                            return [
                                'index' => $index,
                                'create' => $create,
                                'count' => $index ? $index->count : 0,
                                'indexUrl' => $index ? $index->url : '#',
                                'createUrl' => $create ? $create->url : '#',
                            ];
                        }
                    
                        // Define sections and their corresponding route bases for Site Settings
                        $siteSettingsSections = [
                            'approvals' => ['name' => 'Approval', 'icon' => 'mdi-check-all'],
                            'banners' => ['name' => 'Banner', 'icon' => 'mdi-image'],
                            'cmsPages' => ['name' => 'CMS Pages', 'icon' => 'mdi-file-document'],
                            'emailSettings' => ['name' => 'Email Setting', 'icon' => 'mdi-email-outline'],
                            'favicons' => ['name' => 'Favicon', 'icon' => 'mdi-application'],
                            'logos' => ['name' => 'Logo', 'icon' => 'mdi-image'],
                            'menus' => ['name' => 'Menu', 'icon' => 'mdi-menu'],
                            'profileids' => ['name' => 'Profile Id', 'icon' => 'mdi-account-card-details'],
                            'siteConfigs' => ['name' => 'Site Config', 'icon' => 'mdi-settings'],
                            'siteSettings' => ['name' => 'Site Setting', 'icon' => 'mdi-settings'],
                            'paymentgateways' => ['name' => 'Payment Gateways', 'icon' => 'mdi-credit-card'],
                        ];
                    
                        // Helper function to retrieve Site Settings section data
                        function getSiteSettingsData($modelCounts, $routeBase)
                        {
                            $index = $modelCounts->firstWhere('route_name', "{$routeBase}.index");
                            $create = $modelCounts->firstWhere('route_name', "{$routeBase}.create");
                    
                            return [
                                'index' => $index,
                                'create' => $create,
                                'count' => $index ? $index->count : 0,
                                'indexUrl' => $index ? $index->url : '#',
                                'createUrl' => $create ? $create->url : '#',
                            ];
                        }
                    @endphp
                    
                    <!-- Sidebar menu -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-geographys" aria-expanded="false" aria-controls="ui-geographys">
                            <i class="mdi mdi-earth" style="color: rgb(158,109,226)"></i>
                            <span class="nav-text">Geography</span> <b class="caret"></b>
                        </a>
                        <ul class="collapse" id="ui-geographys" data-parent="#sidebar-menu">
                            <div class="sub-menu">
                                @foreach ($sections as $routeBase => $sectionName)
                                    @php
                                        // Retrieve data for each section
                                        $sectionData = getSectionData($modelCounts, $routeBase);
                                    @endphp
                    
                                    @if (in_array($routeBase, ['countries', 'states', 'cities']))
                                        <!-- Geography sections -->
                                        <li class="has-sub">
                                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#{{ $routeBase }}" aria-expanded="false" aria-controls="{{ $routeBase }}">
                                                @if ($sectionData['index'])
                                                    <span class="nav-text">{{ $sectionName }} <span class="badge badge-primary badge-pill">{{ $sectionData['count'] }}</span></span>
                                                @endif
                                                <b class="caret"></b>
                                            </a>
                                            <ul class="collapse" id="{{ $routeBase }}">
                                                <div class="sub-menu">
                                                    @if ($sectionData['index'])
                                                        <li><a href="{{ $sectionData['indexUrl'] }}">List</a></li>
                                                    @endif
                                                    @if ($sectionData['create'])
                                                        <li><a href="{{ $sectionData['createUrl'] }}">Create</a></li>
                                                    @endif
                                                </div>
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </div>
                        </ul>
                    </li>
                    
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-communities" aria-expanded="false" aria-controls="ui-communities">
                            <i class="mdi mdi-hinduism" style="color: rgb(158,109,226)"></i>
                            <span class="nav-text">Community</span> <b class="caret"></b>
                        </a>
                        <ul class="collapse" id="ui-communities" data-parent="#sidebar-menu">
                            <div class="sub-menu">
                                @foreach (['religions', 'castes'] as $routeBase)
                                    @php
                                        // Retrieve data for each Site Settings section
                                        $sectionData = getSectionData($modelCounts, $routeBase);
                                    @endphp
                    
                                    <li class="has-sub">
                                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#{{ $routeBase }}" aria-expanded="false" aria-controls="{{ $routeBase }}">
                                            <span class="nav-text">{{ ucfirst($routeBase) }} <span class="badge badge-primary badge-pill">{{ $sectionData['count'] }}</span></span>
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="collapse" id="{{ $routeBase }}">
                                            <div class="sub-menu">
                                                @if ($sectionData['index'])
                                                    <li><a href="{{ $sectionData['indexUrl'] }}">List</a></li>
                                                @endif
                                                @if ($sectionData['create'])
                                                    <li><a href="{{ $sectionData['createUrl'] }}">Create</a></li>
                                                @endif
                                            </div>
                                        </ul>
                                    </li>
                                @endforeach
                            </div>
                        </ul>
                    </li>
                    
                    @foreach (['employees', 'educations', 'occupations', 'incomes', 'plans', 'successStories'] as $routeBase)
                        @php
                            $sectionData = getSectionData($modelCounts, $routeBase);
                        @endphp
                    
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#{{ ucfirst($routeBase) }}" aria-expanded="false" aria-controls="{{ ucfirst($routeBase) }}">
                                @php
                                    // Determine icon based on the route base
                                    $icon = ''; // Default icon
                                    switch ($routeBase) {
                                        case 'employees':
                                            $icon = 'account-group'; // Icon for employees
                                            break;
                                        case 'educations':
                                            $icon = 'school'; // Icon for education
                                            break;
                                        case 'occupations':
                                            $icon = 'worker'; // Icon for occupations
                                            break;
                                        case 'incomes':
                                            $icon = 'currency-usd'; // Icon for incomes
                                            break;
                                        case 'plans':
                                            $icon = 'file-document'; // Icon for plans
                                            break;
                                        case 'successStories':
                                            $icon = 'star'; // Icon for success stories
                                            break;
                                    }
                                @endphp
                                <i class="mdi mdi-{{ $icon }}" style="color: rgb(158,109,226)"></i>
                                <span class="nav-text">{{ ucfirst($routeBase) }} <span class="badge badge-primary badge-pill">{{ $sectionData['count'] }}</span></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="{{ ucfirst($routeBase) }}">
                                <div class="sub-menu">
                                    @if ($sectionData['index'])
                                        <li><a href="{{ $sectionData['indexUrl'] }}">List</a></li>
                                    @endif
                                    @if ($sectionData['create'])
                                        <li><a href="{{ $sectionData['createUrl'] }}">Create</a></li>
                                    @endif
                                </div>
                            </ul>
                        </li>
                    @endforeach
                    
                    <li class="section-title">Action</li>
                    
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-siteSettings2" aria-expanded="false" aria-controls="ui-siteSettings2">
                            <i class="mdi mdi-cellphone-settings-variant" style="color: rgb(158,109,226)"></i>
                            <span class="nav-text">Site Settings</span> <b class="caret"></b>
                        </a>
                        <ul class="collapse" id="ui-siteSettings2" data-parent="#sidebar-menu2">
                            <div class="sub-menu">
                                @foreach ($siteSettingsSections as $routeBase => $sectionData)
                                    @php
                                        // Retrieve data for each Site Settings section
                                        $data = getSiteSettingsData($modelCounts, $routeBase);
                                    @endphp
                    
                                    <li class="has-sub">
                                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#{{ $routeBase }}" aria-expanded="false" aria-controls="{{ $routeBase }}">
                                            <i class="mdi {{ $sectionData['icon'] }}" style="color: rgb(158,109,226)"></i>
                                            <span class="nav-text">{{ $sectionData['name'] }} <span class="badge badge-primary badge-pill">{{ $data['count'] }}</span></span>
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="collapse" id="{{ $routeBase }}">
                                            <div class="sub-menu">
                                                @if ($data['index'])
                                                    <li><a href="{{ $data['indexUrl'] }}">List</a></li>
                                                @endif
                                                @if ($data['create'])
                                                    <li><a href="{{ $data['createUrl'] }}">Create</a></li>
                                                @endif
                                            </div>
                                        </ul>
                                    </li>
                                @endforeach
                            </div>
                        </ul>
                    </li>
                    
                        
                    
<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                            data-target="#widgets" aria-expanded="false" aria-controls="icons">

                </div>
        </aside>



        <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
        <div class="page-wrapper">

            <!-- Header -->
            <header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>

                    <span class="page-title">dashboard</span>

                    <div class="navbar-right ">

                        <!-- search form -->
                        <div class="search-form">
                            <form action="index.html" method="get">
                                <div class="input-group input-group-sm" id="input-group-search">
                                    <input type="text" autocomplete="off" name="query" id="search-input"
                                        class="form-control" placeholder="Search..." />
                                    <div class="input-group-append">
                                        <button class="btn" type="button">/</button>
                                    </div>
                                </div>
                            </form>
                            <ul class="dropdown-menu dropdown-menu-search">

                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Morbi leo risus</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Dapibus ac facilisis in</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Porta ac consectetur ac</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Vestibulum at eros</a>
                                </li>

                            </ul>

                        </div>

                        <ul class="nav navbar-nav">
                            <!-- Offcanvas -->
                            <li class="custom-dropdown">
                                <a class="offcanvas-toggler active custom-dropdown-toggler"
                                    data-offcanvas="contact-off" href="javascript:">
                                    <i class="mdi mdi-contacts icon"></i>
                                </a>
                            </li>
                            <li class="custom-dropdown">
                                <button class="notify-toggler custom-dropdown-toggler">
                                    <i class="mdi mdi-bell-outline icon"></i>
                                    <span class="badge badge-xs rounded-circle">21</span>
                                </button>
                                <div class="dropdown-notify">

                                    <header>
                                        <div class="nav nav-underline" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="all-tabs" data-toggle="tab"
                                                href="#all" role="tab" aria-controls="nav-home"
                                                aria-selected="true">All
                                                (5)</a>
                                            <a class="nav-item nav-link" id="message-tab" data-toggle="tab"
                                                href="#message" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">Msgs (4)</a>
                                            <a class="nav-item nav-link" id="other-tab" data-toggle="tab"
                                                href="#other" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Others
                                                (3)</a>
                                        </div>
                                    </header>

                                    <div class="" data-simplebar style="height: 325px;">
                                        <div class="tab-content" id="myTabContent">

                                            <div class="tab-pane fade show active" id="all" role="tabpanel"
                                                aria-labelledby="all-tabs">

                                                <div class="media media-sm bg-warning-10 p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-02.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">John Doe</span>
                                                            <span class="discribe">Extremity sweetness difficult
                                                                behaviour he of. On disposal of as landlord horrible.
                                                                Afraid at highly months do things on at.</span>
                                                            <span class="time">
                                                                <time>Just now</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 bg-light mb-0">
                                                    <div class="media-sm-wrapper bg-primary">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-calendar-check-outline"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">New event added</span>
                                                            <span class="discribe">1/3/2014 (1pm - 2pm)</span>
                                                            <span class="time">
                                                                <time>10 min ago...</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-03.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Sagge Hudson</span>
                                                            <span class="discribe">On disposal of as landlord Afraid at
                                                                highly months do things on at.</span>
                                                            <span class="time">
                                                                <time>1 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper bg-info-dark">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-account-multiple-check"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Add request</span>
                                                            <span class="discribe">Add Dany Jones as your
                                                                contact.</span>
                                                            <div class="buttons">
                                                                <a href="#"
                                                                    class="btn btn-sm btn-success shadow-none text-white">accept</a>
                                                                <a href="#"
                                                                    class="btn btn-sm shadow-none">delete</a>
                                                            </div>
                                                            <span class="time">
                                                                <time>6 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper bg-info">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-playlist-check"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Task complete</span>
                                                            <span class="discribe">Afraid at highly months do things on
                                                                at.</span>
                                                            <span class="time">
                                                                <time>1 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="message" role="tabpanel"
                                                aria-labelledby="message-tab">

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-01.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Selena Wagner</span>
                                                            <span class="discribe">Lorem ipsum dolor sit amet,
                                                                consectetur adipisicing elit.</span>
                                                            <span class="time">
                                                                <time>15 min ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-03.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Sagge Hudson</span>
                                                            <span class="discribe">On disposal of as landlord Afraid at
                                                                highly months do things on at.</span>
                                                            <span class="time">
                                                                <time>1 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm bg-warning-10 p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-02.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">John Doe</span>
                                                            <span class="discribe">Extremity sweetness difficult
                                                                behaviour he of. On disposal of as landlord horrible.
                                                                Afraid
                                                                at highly months do things on at.</span>
                                                            <span class="time">
                                                                <time>Just now</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-04.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Albrecht Straub</span>
                                                            <span class="discribe"> Beatae quia natus assumenda
                                                                laboriosam, nisi perferendis aliquid consectetur
                                                                expedita non tenetur.</span>
                                                            <span class="time">
                                                                <time>Just now</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="other" role="tabpanel"
                                                aria-labelledby="contact-tab">

                                                <div class="media media-sm p-4 bg-light mb-0">
                                                    <div class="media-sm-wrapper bg-primary">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-calendar-check-outline"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">New event added</span>
                                                            <span class="discribe">1/3/2014 (1pm - 2pm)</span>
                                                            <span class="time">
                                                                <time>10 min ago...</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper bg-info-dark">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-account-multiple-check"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Add request</span>
                                                            <span class="discribe">Add Dany Jones as your
                                                                contact.</span>
                                                            <div class="buttons">
                                                                <a href="#"
                                                                    class="btn btn-sm btn-success shadow-none text-white">accept</a>
                                                                <a href="#"
                                                                    class="btn btn-sm shadow-none">delete</a>
                                                            </div>
                                                            <span class="time">
                                                                <time>6 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper bg-info">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-playlist-check"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Task complete</span>
                                                            <span class="discribe">Afraid at highly months do things on
                                                                at.</span>
                                                            <span class="time">
                                                                <time>1 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <footer class="border-top dropdown-notify-footer">
                                        <div class="d-flex justify-content-between align-items-center py-2 px-4">
                                            <span>Last updated 3 min ago</span>
                                            <a id="refress-button" href="javascript:"
                                                class="btn mdi mdi-cached btn-refress"></a>
                                        </div>
                                    </footer>
                                </div>
                            </li>

                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">

                                    @if ($activePlan ?? '')
                                        {{-- <span class="nav-link" class="d-none d-lg-inline-block" ><i
                                                class="mdi mdi-chess-queen mr-1"></i>Premium</span> --}}
                                        <span
                                            style="color: rgb(5, 5, 5); text-decoration: none; font-family:'Karla', 'sans-serif'"
                                            onmouseover="this.style.color='rgb(137,77,217)';"
                                            onmouseout="this.style.color='black';"><i class="mdi mdi-chess-queen mr-1"
                                                style="color: rgb(5, 5, 5); text-decoration: none;"
                                                onmouseover="this.style.color='rgb(137,77,217)';"
                                                onmouseout="this.style.color='black';"></i>Premium</span>
                                    @endif
                                    @if ($free ?? '')
                                        <span
                                            style="color: rgb(5, 5, 5); text-decoration: none; font-family:'Karla', 'sans-serif'"
                                            onmouseover="this.style.color='rgb(137,77,217)';"
                                            onmouseout="this.style.color='black';"><i class="mdi mdi-chess-queen mr-1"
                                                style="color: rgb(5, 5, 5); text-decoration: none;"
                                                onmouseover="this.style.color='rgb(137,77,217)';"
                                                onmouseout="this.style.color='black';"></i>Free</span>
                                    @endif


                                </button>



                                <ul class="dropdown-menu dropdown-menu-right">
                                    @if ($activePlan ?? '')
                                        <li>
                                            <div class="container">
                                                <div>
                                                    <span style="color: #976AD8">Plan Name:</span> <span
                                                        style="color: #0ACB8E; font-size:15px; ">{{ $activePlan->plan->name ?? '' }}</span>
                                                </div>
                                                <hr>
                                                <div>
                                                    <span style="color: #976AD8">Contact Left: </span>
                                                    <span style="color: #0ACB8E; font-size:15px">
                                                        {{ $activePlan->contact }}</span>
                                                </div>
                                                <hr>
                                                <div>
                                                    <span style="color: #976AD8">Plan Expire:</span>
                                                    <span style="color: #0ACB8E; font-size:15px">
                                                        {{ \Carbon\Carbon::parse($activePlan->expiry_date)->format('d-M-Y') }}</span>
                                                </div>
                                            </div>
                                    @endif
                            </li>
                            {{-- <li>
                                        <a class="dropdown-link-item" href="email-inbox.html">
                                            <i class="mdi mdi-email-outline"></i>
                                            <span class="nav-text">Message</span>
                                            <span class="badge badge-pill badge-primary">24</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="user-activities.html">
                                            <i class="mdi mdi-diamond-stone"></i>
                                            <span class="nav-text">Activitise</span></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="user-activities.html">
                                            <i class="mdi mdi-diamond-stone"></i>
                                            <span class="nav-text">Activitise</span></a>
                                    </li>
 --}}


                        </ul>
                        </li>

                        <li class="dropdown user-menu">
                            <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                @php
                                    $admin = Auth::guard('admin')->user();

                                @endphp
                                @if ($admin->image)
                                    <img src="{{ asset('storage/admin/admin-images/' . $admin->image ?? '') }}"
                                        class="user-image rounded-circle" alt="image"
                                        style="width: 50px; height: 50px; overflow: hidden; border-radius: 50%;" />
                                @else()
                                    <img src="{{ asset('storage/admin/image/default.jpg') }}"
                                        class="user-image rounded-circle" alt="image"
                                        style="width: 50px; height: 50px; overflow: hidden; border-radius: 50%;" />
                                @endif
                                @if ($admin = $admin ?? '')
                                    <span class="d-none d-lg-inline-block"
                                        style = "color:#976AD8;">{{ $admin->name = $admin->name ?? '' }}</span>
                                @else
                                    <h5>Gaust</h5>
                                @endif
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a class="dropdown-link-item" href="{{ route('admins.show', $admin->id) }}">
                                        <i class="mdi mdi-account-outline"></i>
                                        <span class="nav-text">My Profile</span>
                                    </a>
                                    {{-- <a class="dropdown-link-item" href="{{ route('profile.show') }}">
                                        <i class="mdi mdi-account-outline"></i>
                                        <span class="nav-text">My Profile</span>
                                    </a> --}}
                                </li>
                                <li>
                                    <a class="dropdown-link-item" href="http://localhost:8000/user/api-tokens">
                                        <i class="mdi mdi-database-plus"></i>
                                        <span class="nav-text">API Tokens</span>
                                        {{-- <span class="badge badge-pill badge-primary">24</span> --}}
                                    </a>
                                </li>
                                {{-- <li>
                                        <a class="dropdown-link-item" href="user-activities.html">
                                            <i class="mdi mdi-diamond-stone"></i>
                                            <span class="nav-text">Activitise</span></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="user-account-settings.html">
                                            <i class="mdi mdi-settings"></i>
                                            <span class="nav-text">Account Setting</span>
                                        </a>
                                    </li> --}}

                                <li class="dropdown-footer">
                                    <form id="admin_logout-form" action="{{ url('logout') }}" method="post">
                                        @csrf
                                        <a id="admin_logout-button" class="dropdown-link-item"
                                            href="javascript:void(0)">
                                            Log Out <i class="mdi mdi-logout" style="color: #976AD8"></i></a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        </ul>
                    </div>
                </nav>


            </header>

            <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->


            @yield('styles')
            @yield('content')
            @yield('widgets')


            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap Template by <a
                            class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
                    </p>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>
        </div>
        <script>
            const RESEND_OTP_URL = '{{ url('resend-otp') }}';
            const CSRF_TOKEN = '{{ csrf_token() }}';
        </script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="{{ asset('assets/auth/plugins/toaster/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/circle-progress/circle-progress.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/simplebar/simplebar.min.js') }}"></script>
        <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="{{ asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>
        <script src="{{ asset('assets/auth/js/mono.js') }}"></script>
        <script src="{{ asset('assets/auth/js/chart.js') }}"></script>
        <script src="{{ asset('assets/auth/js/map.js') }}"></script>
        <script src="{{ asset('assets/auth/js/custom.js') }}"></script>
        <script src="{{ asset('assets/auth/js/custom-new-js/create-delete-active-inactive.js') }}"></script>
        <script src="{{ asset('assets/auth/js/custom-new-js/resend-OTP.js') }}"></script>
        <script src="{{ asset('assets/auth/js/custom-new-js/modal-form-validation.js') }}"></script>
        {{-- Admin Edit Form --}}
        <script src="{{ asset('assets/auth/js/custom-new-js/admin-edit-form.js') }}"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
        <link rel="stylesheet" type="text/css"
            href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>






        <script>
            jQuery(document).ready(function() {
                jQuery('input[name="dateRange"]').daterangepicker({
                    autoUpdateInput: false,
                    singleDatePicker: true,
                    locale: {
                        cancelLabel: 'Clear'
                    }
                });
                jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
                    jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
                });
                jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
                    jQuery(this).val('');
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#admin_logout-button').click(function() {


                    $('#admin_logout-form').submit();


                });
            });
        </script>
        {{-- Razorpay  --}}





        @yield('scripts')
        <!--  -->
</body>

<script>
    // JavaScript code to hide the loader after 2 seconds
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var loader = document.getElementById('loader');
            var dashboard = document.getElementById('dashboard');
            loader.style.display = 'none';
            dashboard.style.display = 'block';
        }, 400);
    });
</script>

@if (Session::has('success'))
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "duration": 3000,
            "positionClass": "toast-bottom-full-width",
            "closeButton": true,
            "progressBar": true,
            "timeOut": 5000, // milliseconds
            "extendedTimeOut": 2000, // milliseconds
            "hideDuration": 300, // milliseconds
        }
        toastr.success("{{ session('success') }}");
    </script>
@endif

@if (Session::has('error'))
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-full-width",
            "closeButton": true,
            "progressBar": true,
            "timeOut": 5000, // milliseconds
            "extendedTimeOut": 2000, // milliseconds
            "hideDuration": 300, // milliseconds
        }
        toastr.error("{{ session('error') }}");
    </script>
@endif

@if (Session::has('info'))
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-full-width",
            "width": "auto",
            "closeButton": true,
            // "progressBar": true,
            "timeOut": 5000, // milliseconds
            "extendedTimeOut": 2000, // milliseconds
            "hideDuration": 300, // milliseconds

        }
        toastr.info("{{ session('info') }}");
    </script>
@endif

@if (Session::has('warning'))
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-full-width",

            "closeButton": true,
            "progressBar": true,
            "timeOut": 5000, // milliseconds
            "extendedTimeOut": 2000, // milliseconds
            "hideDuration": 300, // milliseconds
        }
        toastr.warning("{{ session('warning') }}");
    </script>
@endif

</html>
