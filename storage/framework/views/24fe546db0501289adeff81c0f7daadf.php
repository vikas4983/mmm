<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- theme meta -->
    <meta name="theme-name" content="mono" />
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="<?php echo e(asset('assets/auth/plugins/material/css/materialdesignicons.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/auth/plugins/simplebar/simplebar.css')); ?>" rel="stylesheet" />
    <!-- PLUGINS CSS STYLE -->
    <link href="<?php echo e(asset('assets/auth/plugins/nprogress/nprogress.css')); ?>" rel="stylesheet" />
    <?php echo $__env->yieldContent('styles'); ?> <?php echo $__env->yieldContent('font-awesome-cdn'); ?>
    <link href="<?php echo e(asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')); ?>"
        rel="stylesheet" />
    <link href="<?php echo e(asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/auth/plugins/daterangepicker/daterangepicker.css')); ?>" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="<?php echo e(asset('assets/auth/plugins/toaster/toastr.min.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css">

    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="<?php echo e(asset('assets/auth/css/style.css')); ?>" />
    <!-- COUNT CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/auth/css/badge badge-primary badge-pill.css')); ?>" />
    <!-- LOGO CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/auth/css/custom-css/brand-logo.css')); ?>">
    <!-- FAVICON -->
    <link
        href="<?php echo e(isset($favicons->name) && !empty($favicons->name)
            ? asset('storage/admin/logo-favicon/favicons/' . $favicons->name)
            : asset('assets/auth/images/favicon.png')); ?>"
        rel="shortcut icon" />
    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="<?php echo e(asset('assets/auth/plugins/circle-progress/circle-progress.js')); ?>"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
    <script src="<?php echo e(asset('assets/auth/plugins/nprogress/nprogress.js')); ?>"></script>
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
    <div class="loader-container" id="loader">
        <div class="loader">
        </div>
    </div>
    <!--  WRAPPER
     -->
    <div class="wrapper">
        <!-- LEFT SIDEBAR WITH OUT FOOTER
         -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                  
                    <a href="<?php echo e(url('dashboard')); ?>">
                        <img src="<?php echo e($logos && $logos->name
                            ? asset('storage/admin/logo-favicon/logos/' . $logos->name)
                            : asset('assets/auth/images/logo.png')); ?>"
                            alt="Mono" id="logo">
                        <span class="brand-name"><?php echo e($logos && $logos->name ? '' : 'MONO'); ?></span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <li class="activev">
                            <a class="sidenav-item-link" href="<?php echo e(url('admin/dashboard')); ?>">
                                <i class="mdi mdi-view-dashboard" style="color: rgb(158,109,226)"></i>
                                <span class="nav-text">Admin Dashboard</span>
                            </a>
                        </li>
                        <?php $__currentLoopData = $adminMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adminMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                    data-target="#<?php echo e($adminMenu->name ?? ''); ?>" aria-expanded="false"
                                    aria-controls="<?php echo e($adminMenu->name ?? ''); ?>">
                                    <i class="<?php echo e($adminMenu->icon); ?>" style="color: rgb(158,109,226)"></i>
                                    <span class="nav-text"><?php echo e($adminMenu->name); ?>

                                        <?php if($adminMenu->count == 0): ?>
                                        <?php else: ?>
                                            <span
                                                class="badge badge-primary badge-pill"><?php echo e($adminMenu->count ?? ''); ?></span>
                                        <?php endif; ?>

                                    </span>
                                    <b class="caret"></b>
                                </a>
                                <?php if($adminMenu->childrenRecursive->isNotEmpty()): ?>
                                    <ul class="collapse" id="<?php echo e($adminMenu->name ?? ''); ?>" data-parent="#sidebar-menu">
                                        <div class="sub-menu">
                                            <?php $__currentLoopData = $adminMenu->childrenRecursive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($sub->childrenRecursive->isEmpty()): ?>
                                                    <li>
                                                    <li>
                                                        <a href="<?php echo e(url('/admin' . $sub->url ?? '')); ?>"
                                                            style="text-decoration: none;">
                                                            <i class="<?php echo e($sub->icon ?? ''); ?>"
                                                                style="color: #38d3db;"></i> <?php echo e($sub->name ?? ''); ?>

                                                            <?php if($sub->count == 0): ?>
                                                            <?php else: ?>
                                                                <span
                                                                    class="badge badge-primary badge-pill"><?php echo e($sub->count ?? ''); ?></span>
                                                            <?php endif; ?>
                                                        </a>


                                                    </li>
                            </li>
                        <?php else: ?>
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                    data-target="#sub-<?php echo e($sub->name ?? ''); ?>" aria-expanded="false"
                                    aria-controls="sub-<?php echo e($sub->name ?? ''); ?>">
                                    <span class="nav-text"> <i class="<?php echo e($sub->icon ?? ''); ?>"
                                            style="color: #38d3db;"></i> <?php echo e($sub->name ?? ''); ?>

                                        <?php if($sub->count == 0): ?>
                                        <?php else: ?>
                                            <span class="badge badge-primary badge-pill"><?php echo e($sub->count ?? ''); ?></span>
                                        <?php endif; ?>
                                    </span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="collapse" id="sub-<?php echo e($sub->name ?? ''); ?>">
                                    <div class="sub-menu">
                                        <?php $__currentLoopData = $sub->childrenRecursive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href="<?php echo e(url('/admin' . $child->url)); ?>">

                                                    <?php echo e($child->name ?? ''); ?> </a>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                </ul>
                <?php endif; ?>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                                    <?php if($activePlan ?? ''): ?>
                                        
                                        <span
                                            style="color: rgb(5, 5, 5); text-decoration: none; font-family:'Karla', 'sans-serif'"
                                            onmouseover="this.style.color='rgb(137,77,217)';"
                                            onmouseout="this.style.color='black';"><i class="mdi mdi-chess-queen mr-1"
                                                style="color: rgb(5, 5, 5); text-decoration: none;"
                                                onmouseover="this.style.color='rgb(137,77,217)';"
                                                onmouseout="this.style.color='black';"></i>Premium</span>
                                    <?php endif; ?>
                                    <?php if($free ?? ''): ?>
                                        <span
                                            style="color: rgb(5, 5, 5); text-decoration: none; font-family:'Karla', 'sans-serif'"
                                            onmouseover="this.style.color='rgb(137,77,217)';"
                                            onmouseout="this.style.color='black';"><i class="mdi mdi-chess-queen mr-1"
                                                style="color: rgb(5, 5, 5); text-decoration: none;"
                                                onmouseover="this.style.color='rgb(137,77,217)';"
                                                onmouseout="this.style.color='black';"></i>Free</span>
                                    <?php endif; ?>


                                </button>



                                <ul class="dropdown-menu dropdown-menu-right">
                                    <?php if($activePlan ?? ''): ?>
                                        <li>
                                            <div class="container">
                                                <div>
                                                    <span style="color: #976AD8">Plan Name:</span> <span
                                                        style="color: #0ACB8E; font-size:15px; "><?php echo e($activePlan->plan->name ?? ''); ?></span>
                                                </div>
                                                <hr>
                                                <div>
                                                    <span style="color: #976AD8">Contact Left: </span>
                                                    <span style="color: #0ACB8E; font-size:15px">
                                                        <?php echo e($activePlan->contact); ?></span>
                                                </div>
                                                <hr>
                                                <div>
                                                    <span style="color: #976AD8">Plan Expire:</span>
                                                    <span style="color: #0ACB8E; font-size:15px">
                                                        <?php echo e(\Carbon\Carbon::parse($activePlan->expiry_date)->format('d-M-Y')); ?></span>
                                                </div>
                                            </div>
                                    <?php endif; ?>
                            </li>
                        </ul>
                        </li>

                        <li class="dropdown user-menu">
                            <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <?php
                                    $admin = Auth::guard('admin')->user();

                                ?>
                                <?php if($admin->image ?? ''): ?>
                                    <img src="<?php echo e(asset('storage/admin/admin-images/' . $admin->image ?? '')); ?>"
                                        class="user-image rounded-circle" alt="image"
                                        style="width: 50px; height: 50px; overflow: hidden; border-radius: 50%;" />
                                <?php else: ?>
                                    <img src="<?php echo e(asset('storage/admin/image/default.jpg')); ?>"
                                        class="user-image rounded-circle" alt="image"
                                        style="width: 50px; height: 50px; overflow: hidden; border-radius: 50%;" />
                                <?php endif; ?>
                                <?php if($admin = $admin ?? ''): ?>
                                    <span class="d-none d-lg-inline-block"
                                        style = "color:#976AD8;"><?php echo e($admin->name = $admin->name ?? ''); ?></span>
                                <?php else: ?>
                                    <h5>Gaust</h5>
                                <?php endif; ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a class="dropdown-link-item" href="<?php echo e(route('admins.show', $admin->id)); ?>">
                                        <i class="mdi mdi-account-outline"></i>
                                        <span class="nav-text">My Profile</span>
                                    </a>
                                    
                                </li>
                                <li>
                                    <a class="dropdown-link-item" href="http://localhost:8000/user/api-tokens">
                                        <i class="mdi mdi-database-plus"></i>
                                        <span class="nav-text">API Tokens</span>
                                        
                                    </a>
                                </li>
                                

                                <li class="dropdown-footer">
                                    <form id="admin_logout-form" action="<?php echo e(url('admin-logout')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
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

            <!-- CONTENT WRAPPER -->
            <?php echo $__env->yieldContent('styles'); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->yieldContent('widgets'); ?>
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
            const RESEND_OTP_URL = '<?php echo e(url('resend-otp')); ?>';
            const CSRF_TOKEN = '<?php echo e(csrf_token()); ?>';
        </script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="<?php echo e(asset('assets/auth/plugins/toaster/toastr.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/auth/plugins/circle-progress/circle-progress.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/auth/plugins/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/auth/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/auth/plugins/simplebar/simplebar.min.js')); ?>"></script>
        <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="<?php echo e(asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/auth/plugins/jvectormap/jquery-jvectormap-world-mill.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/auth/plugins/jvectormap/jquery-jvectormap-us-aea.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/auth/js/mono.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/auth/js/chart.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/auth/js/map.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/auth/js/custom.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/auth/js/custom-new-js/create-delete-active-inactive.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/auth/js/custom-new-js/resend-OTP.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/auth/js/custom-new-js/modal-form-validation.js')); ?>"></script>
        
        <script src="<?php echo e(asset('assets/auth/js/custom-new-js/admin-edit-form.js')); ?>"></script>

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
        <?php echo $__env->yieldContent('scripts'); ?>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var loader = document.getElementById('loader');
            var dashboard = document.getElementById('dashboard');
            loader.style.display = 'none';
            dashboard.style.display = 'block';
        }, 400);
    });
</script>

<?php if(Session::has('success')): ?>
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
        toastr.success("<?php echo e(session('success')); ?>");
    </script>
<?php endif; ?>

<?php if(Session::has('error')): ?>
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
        toastr.error("<?php echo e(session('error')); ?>");
    </script>
<?php endif; ?>

<?php if(Session::has('info')): ?>
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
        toastr.info("<?php echo e(session('info')); ?>");
    </script>
<?php endif; ?>

<?php if(Session::has('warning')): ?>
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
        toastr.warning("<?php echo e(session('warning')); ?>");
    </script>
<?php endif; ?>

</html>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\layouts\auth.blade.php ENDPATH**/ ?>