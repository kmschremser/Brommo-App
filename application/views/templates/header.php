<!DOCTYPE html>
<html>
<head lang="<?php echo $LANGUAGE_SETTINGS; ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $this->lang->line('Brommo APP'); ?></title>

    <meta name="Description" content="<?php echo $METADESCRIPTION; ?>" />
    <meta name="robots" content="index, nofollow" />


    <link href="/brommo/public/assets/common/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="/brommo/public/assets/common/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="/brommo/public/assets/common/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="/brommo/public/assets/common/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="/brommo/public/assets/common/img/favicon.png" rel="icon" type="image/png">
    <link href="favicon.ico" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for < IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Vendors Styles -->
    <!-- v1.0.0 -->
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/jscrollpane/style/jquery.jscrollpane.css">
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/ladda/dist/ladda-themeless.min.css">
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <!--link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/fullcalendar/dist/fullcalendar.min.css"-->
    <!--link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/cleanhtmlaudioplayer/src/player.css"-->
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/cleanhtmlvideoplayer/src/player.css">
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/bootstrap-sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/summernote/dist/summernote.css">
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/ionrangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/datatables/media/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/c3/c3.min.css">
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/chartist/dist/chartist.min.css">
    <!-- v.1.4.0 -->
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/nprogress/nprogress.css">
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/jquery-steps/demo/css/jquery.steps.css">
    <!-- v.1.4.2 -->
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css">

    <!-- Clean UI Styles -->
    <link rel="stylesheet" type="text/css" href="/brommo/public/assets/common/css/source/main.css">

    <!-- Vendors Scripts -->
    <!-- v1.0.0 -->
    <script src="/brommo/public/assets/vendors/jquery/jquery.min.js"></script>
    <script src="/brommo/public/assets/vendors/tether/dist/js/tether.min.js"></script>
    <script src="/brommo/public/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/brommo/public/assets/vendors/jquery-mousewheel/jquery.mousewheel.min.js"></script>
    <script src="/brommo/public/assets/vendors/jscrollpane/script/jquery.jscrollpane.min.js"></script>
    <script src="/brommo/public/assets/vendors/spin.js/spin.js"></script>
    <script src="/brommo/public/assets/vendors/ladda/dist/ladda.min.js"></script>
    <script src="/brommo/public/assets/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="/brommo/public/assets/vendors/html5-form-validation/dist/jquery.validation.min.js"></script>
    <script src="/brommo/public/assets/vendors/jquery-typeahead/dist/jquery.typeahead.min.js"></script>
    <script src="/brommo/public/assets/vendors/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="/brommo/public/assets/vendors/autosize/dist/autosize.min.js"></script>
    <script src="/brommo/public/assets/vendors/bootstrap-show-password/bootstrap-show-password.min.js"></script>
    <script src="/brommo/public/assets/vendors/moment/min/moment.min.js"></script>
    <script src="/brommo/public/assets/vendors/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!--script src="/brommo/public/assets/vendors/fullcalendar/dist/fullcalendar.min.js"></script-->
    <!--script src="/brommo/public/assets/vendors/cleanhtmlaudioplayer/src/jquery.cleanaudioplayer.js"></script-->
    <!--script src="/brommo/public/assets/vendors/cleanhtmlvideoplayer/src/jquery.cleanvideoplayer.js"></script-->
    <script src="/brommo/public/assets/vendors/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
    <script src="/brommo/public/assets/vendors/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>
    <script src="/brommo/public/assets/vendors/summernote/dist/summernote.min.js"></script>
    <script src="/brommo/public/assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/brommo/public/assets/vendors/ionrangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="/brommo/public/assets/vendors/nestable/jquery.nestable.js"></script>
    <script src="/brommo/public/assets/vendors/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/brommo/public/assets/vendors/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script src="/brommo/public/assets/vendors/datatables-fixedcolumns/js/dataTables.fixedColumns.js"></script>
    <script src="/brommo/public/assets/vendors/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="/brommo/public/assets/vendors/editable-table/mindmup-editabletable.js"></script>
    <script src="/brommo/public/assets/vendors/d3/d3.min.js"></script>
    <script src="/brommo/public/assets/vendors/c3/c3.min.js"></script>
    <script src="/brommo/public/assets/vendors/chartist/dist/chartist.min.js"></script>
    <script src="/brommo/public/assets/vendors/peity/jquery.peity.min.js"></script>
    <!-- v1.0.1 -->
    <script src="/brommo/public/assets/vendors/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- v1.1.1 -->
    <script src="/brommo/public/assets/vendors/gsap/src/minified/TweenMax.min.js"></script>
    <script src="/brommo/public/assets/vendors/hackertyper/hackertyper.js"></script>
    <script src="/brommo/public/assets/vendors/jquery-countTo/jquery.countTo.js"></script>
    <!-- v1.4.0 -->
    <script src="/brommo/public/assets/vendors/nprogress/nprogress.js"></script>
    <script src="/brommo/public/assets/vendors/jquery-steps/build/jquery.steps.min.js"></script>
    <!-- v1.4.2 -->
    <script src="/brommo/public/assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/brommo/public/assets/vendors/chart.js/src/Chart.bundle.min.js"></script>

    <!-- Clean UI Scripts -->
    <script src="/brommo/public/assets/common/js/common.js"></script>
    <script src="/brommo/public/assets/common/js/demo.temp.js"></script>
</head>

<body class="theme-default">
<nav class="left-menu" left-menu>
    <div class="logo-container">
        <a href="javascript: void(0);" class="logo">
            <img src="/brommo/public/assets/images/brommoapp_logo.png" alt="Brommo APP Logo" />
        </a>
    </div>
    <div class="left-menu-inner scroll-pane">

        <ul class="left-menu-list left-menu-list-root list-unstyled">
            <li class="left-menu-list-submenu">
                <a class="left-menu-link" href="/brommo/?/realestate/list_reobjects">
                    <i class="left-menu-link-icon icmn-star-full"></i>
                    <?php echo $this->lang->line('List real estate objects'); ?>
                </a>

            </li>
            <li class="left-menu-list-submenu">

                <a class="left-menu-link" href="/brommo/?/realestate/create_reobjects">
                    <i class="left-menu-link-icon icmn-star-full"></i>
                    <?php echo $this->lang->line('Add a real estate'); ?>
                </a>
            </li>

            <li class="left-menu-list-separator"></li>

<!--
            <li class="left-menu-list-submenu">

                <a class="left-menu-link" href="javascript: void(0);">
                    <i class="left-menu-link-icon icmn-star-full"></i>
                    SHARES
                </a>

            </li>
            <li class="left-menu-list-submenu">

                <a class="left-menu-link" href="javascript: void(0);">
                    <i class="left-menu-link-icon icmn-star-full"></i>
                    Add - Share
                </a>

            </li>
-->

    </div>
</nav>

<nav class="top-menu">
    <div class="menu-icon-container hidden-md-up">
        <div class="animate-menu-button left-menu-toggle">
            <div></div>
        </div>
    </div>
    <div class="menu">
        <div class="menu-user-block">
            <div class="dropdown dropdown-avatar">
                <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="avatar" href="javascript:void(0);">
                        <?php $email = $this->session->email; $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( 'http://kms.ninja' ) . "&s=" . 40; ?>

                        <img src="<?php echo $grav_url; ?>" alt="<?php echo $this->lang->line('Your image'); ?>">
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="" role="menu">
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-user"></i> <?php echo $this->session->firstname; //$this->lang->line('Profile'); ?></a>
                    <div class="dropdown-divider"></div>
<!--
                    <div class="dropdown-header">Home</div>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> System Dashboard</a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> User Boards</a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> Issue Navigator (35 New)</a>
                    <div class="dropdown-divider"></div>
-->                    
                    <a class="dropdown-item" href="/brommo/index.php?auth/logout"><i class="dropdown-icon icmn-exit"></i> <?php echo $this->lang->line('Logout'); ?></a>
                </ul>
            </div>
        </div>
        <div class="menu-info-block">
            <div class="left">
                <div class="header-buttons">
<!--                    
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle dropdown-inline-button" data-toggle="dropdown" aria-expanded="false">
                            <i class="dropdown-inline-button-icon icmn-folder-open"></i>
                            <span class="hidden-lg-down">Issues History</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="" role="menu">
                            <a class="dropdown-item" href="javascript:void(0)">Current search</a>
                            <a class="dropdown-item" href="javascript:void(0)">Search for issues</a>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-header">Opened</div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-checkmark"></i> CLNUI-253 Project implemen...</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-checkmark"></i> CLNUI-234 Active history iss...</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-clock"></i> CLNUI-424 Ionicons intergrat...</a>
                            <a class="dropdown-item" href="javascript:void(0)">More...</a>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-header">Filters</div>
                            <a class="dropdown-item" href="javascript:void(0)">My open issues</a>
                            <a class="dropdown-item" href="javascript:void(0)">Reported by me</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)">Import issues from CSV</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-cog"></i> Settings</a>
                        </ul>
                    </div>
-->                    
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle dropdown-inline-button" data-toggle="dropdown" aria-expanded="false">
                            <!--<i class="dropdown-inline-button-icon icmn-database"></i>-->
                            <i class="dropdown-icon icmn-cog"></i> 
                            <span class="hidden-lg-down"><?php echo $this->lang->line('Settings'); ?></span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="" role="menu">
                            <!--<div class="dropdown-header"><?php echo $this->lang->line('Active'); ?></div>-->
                            <a class="dropdown-item" href="/brommo/?realestate/list_reobjects/en"><?php echo $this->lang->line('English'); ?></a>
                        <!--
                        </ul>
                        <ul class="dropdown-menu" aria-labelledby="" role="menu">
                        -->
                            <!--<div class="dropdown-header"><?php echo $this->lang->line('Active'); ?></div>-->
                            <a class="dropdown-item" href="/brommo/?realestate/list_reobjects/de"><?php echo $this->lang->line('Deutsch'); ?></a>
                        </ul>                        
                    </div>
                </div>
            </div>
            <div class="left hidden-md-down">
                <div class="example-top-menu-chart">

                    <span class="title"><?php echo $this->lang->line('Income'); ?>:</span>
                    <span class="chart" id="topMenuChart">1,3,2,0,3,1,2,3,5,2</span>
<!--
                    <span class="count">425.00 USD</span>
-->                    

                    <!-- Top Menu Chart Script -->
                    <script>
                        $(function () {

                            var topMenuChart = $("#topMenuChart").peity("bar", {
                                fill: ['#01a8fe'],
                                height: 22,
                                width: 44
                            });

                            setInterval(function() {
                                var random = Math.round(Math.random() * 10);
                                var values = topMenuChart.text().split(",");
                                values.shift();
                                values.push(random);
                                topMenuChart.text(values.join(",")).change()
                            }, 1000);

                        });
                    </script>
                    <!-- Top Menu Chart Script -->
                </div>
            </div>
            <div class="right hidden-md-down margin-left-20">
<!--
                <div class="search-block">
                    <div class="form-input-icon form-input-icon-right">
                        <i class="icmn-search"></i>
                        <input type="text" class="form-control form-control-sm form-control-rounded" placeholder="Search...">
                        <button type="submit" class="search-block-submit "></button>
                    </div>
                </div>
-->                
            </div>
            <div class="right example-buy-btn hidden-xs-down">

                <a href="https://www.paypal.me/KlausMSchremser" target="_blank" class="btn btn-success-outline btn-rounded">
                    <?php echo $this->lang->line('Donate Now'); ?>
                </a>

            </div>
        </div>
    </div>
</nav>

