<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        {{-- <link rel="shortcut icon" href="{{URL::asset('assets')}}/icon_abd.png"> --}}

        <title>Admin</title>

        <!-- Base Css Files -->
        <link href="{{URL::asset('assets/admin')}}/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{URL::asset('assets/admin')}}/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="{{URL::asset('assets/admin')}}/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="{{URL::asset('assets/admin')}}/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="{{URL::asset('assets/admin')}}/css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{URL::asset('assets/admin')}}/css/waves-effect.css" rel="stylesheet">

        <!-- DataTables -->
        <link href="{{URL::asset('assets/admin')}}/assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        <!-- sweet alerts -->
        <link href="{{URL::asset('assets/admin')}}/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!--venobox lightbox-->
        <link rel="stylesheet" href="{{URL::asset('assets/admin')}}/assets/magnific-popup/magnific-popup.css"/>
        
        <!-- Dropzone css -->
        <link href="{{URL::asset('assets/admin')}}/assets/dropzone/dropzone.css" rel="stylesheet" type="text/css" />

        <!-- Plugins css-->
        <link href="{{URL::asset('assets/admin')}}/assets/tagsinput/jquery.tagsinput.css" rel="stylesheet" />
        <link href="{{URL::asset('assets/admin')}}/assets/toggles/toggles.css" rel="stylesheet" />
        <link href="{{URL::asset('assets/admin')}}/assets/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" />
        <link href="{{URL::asset('assets/admin')}}/assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
        <link href="{{URL::asset('assets/admin')}}/assets/colorpicker/colorpicker.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/admin')}}/assets/jquery-multi-select/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/admin')}}/assets/select2/select2.css" rel="stylesheet" type="text/css" />

        <!-- Custom Files -->
        <link href="{{URL::asset('assets/admin')}}/css/helper.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/admin')}}/css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{URL::asset('assets/admin')}}/js/modernizr.min.js"></script>
        <script src="{{URL::asset('assets/admin')}}/js/modernizr.min.js"></script>
        
    </head>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        {{-- <a href="{{url('admin')}}" class="logo"><span><img src="{{URL::asset('assets')}}/logo_abd2.png" style="height: 55px; width: 130px;"> </span></a> --}}
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{URL::asset('images/users/default.png')}}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" data-toggle="modal" data-target="#ubah-pw"><i class="fa fa-lock"></i> Ubah Password</a></li>
                                        <li><a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->
         


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{URL::asset('images/users/default.png')}}" alt="" class="thumb-md img-circle">
                        </a>
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle">Admin</a>                                
                            </div>

                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ Route('cabang') }}" class="waves-effect  {{{ (Request::is('cabang') ? 'active' : '') }}}"><i class="fa fa-home"></i> Cabang</a>
                            </li>

                            <li>
                                <a href="{{ Route('layanan') }}" class="waves-effect  {{{ (Request::is('layanan') ? 'active' : '') }}}"><i class="fa fa-th-list"></i> Layanan</a>
                            </li>

                            <li>
                                <a href="{{ Route('pengharum') }}" class="waves-effect  {{{ (Request::is('pengharum') ? 'active' : '') }}}"><i class="md md-battery-std"></i> Pengharum</a>
                            </li>

                            <li>
                                <a href="{{ Route('pegawai') }}" class="waves-effect  {{{ (Request::is('pegawai') ? 'active' : '') }}}"><i class="fa fa-users"></i> Pegawai</a>
                            </li>

                            <li>
                                <a href="{{ Route('pelanggan') }}" class="waves-effect  {{{ (Request::is('pelanggan') ? 'active' : '') }}}"><i class="fa fa-user"></i> Pelanggan</a>
                            </li>

                            <li>
                                <a href="{{ Route('transaksi') }}" class="waves-effect  {{{ ((Request::segment(1) == 'transaksi') ? 'active' : '') }}}"><i class="fa fa-cart-plus"></i> Transaksi</a>
                            </li> 
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->

            @yield('content')
            
            </div>
        </div>
        <!-- END wrapper -->
    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  --> 
        <script src="{{URL::asset('assets/admin')}}/js/jquery.min.js"></script>
        <script src="{{URL::asset('assets/admin')}}/js/bootstrap.min.js"></script>
        <script src="{{URL::asset('assets/admin')}}/js/waves.js"></script>
        <script src="{{URL::asset('assets/admin')}}/js/wow.min.js"></script>
        <script src="{{URL::asset('assets/admin')}}/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="{{URL::asset('assets/admin')}}/js/jquery.scrollTo.min.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/chat/moment-2.2.1.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/jquery-detectmobile/detect.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/fastclick/fastclick.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/jquery-blockui/jquery.blockUI.js"></script>

        <!-- sweet alerts -->
        <script src="{{URL::asset('assets/admin')}}/assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/sweet-alert/sweet-alert.init.js"></script>
        
        <!-- Page Specific JS Libraries -->
        <script src="{{URL::asset('assets/admin')}}/assets/dropzone/dropzone.min.js"></script>

        <!-- Examples -->
        <script src="{{URL::asset('assets/admin')}}/assets/magnific-popup/magnific-popup.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/jquery-datatables-editable/jquery.dataTables.js"></script> 
        <script src="{{URL::asset('assets/admin')}}/assets/datatables/dataTables.bootstrap.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/jquery-datatables-editable/datatables.editable.init.js"></script>

        <!-- flot Chart -->
        <script src="{{URL::asset('assets/admin')}}/assets/flot-chart/jquery.flot.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/flot-chart/jquery.flot.time.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/flot-chart/jquery.flot.resize.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/flot-chart/jquery.flot.pie.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/flot-chart/jquery.flot.selection.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/flot-chart/jquery.flot.stack.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/flot-chart/jquery.flot.crosshair.js"></script>

        <!-- Counter-up -->
        <script src="{{URL::asset('assets/admin')}}/assets/counterup/waypoints.min.js" type="text/javascript"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="{{URL::asset('assets/admin')}}/js/jquery.app.js"></script>

        <!-- Dashboard -->
        <script src="{{URL::asset('assets/admin')}}/js/jquery.dashboard.js"></script>

        <!-- Chat -->
        <script src="{{URL::asset('assets/admin')}}/js/jquery.chat.js"></script>

        <!-- Todo -->
        <script src="{{URL::asset('assets/admin')}}/js/jquery.todo.js"></script>

         <!--Data Table -->
        <script src="{{URL::asset('assets/admin')}}/assets/datatables/jquery.dataTables.min.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>

        <script src="{{URL::asset('assets/admin')}}/assets/tagsinput/jquery.tagsinput.min.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/toggles/toggles.min.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/timepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="{{URL::asset('assets/admin')}}/assets/colorpicker/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="{{URL::asset('assets/admin')}}/assets/jquery-multi-select/jquery.multi-select.js"></script>
        <script type="text/javascript" src="{{URL::asset('assets/admin')}}/assets/jquery-multi-select/jquery.quicksearch.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="{{URL::asset('assets/admin')}}/assets/spinner/spinner.min.js"></script>
        <script src="{{URL::asset('assets/admin')}}/assets/select2/select2.min.js" type="text/javascript"></script>


        <script>
            jQuery(document).ready(function() {
                    
                // Tags Input
                jQuery('.tags').tagsInput({width:'auto'});

                // Form Toggles
                jQuery('.toggle').toggles({on: true});

                // Time Picker
                jQuery('#timepicker').timepicker({defaultTIme: false});
                jQuery('#timepicker2').timepicker({showMeridian: false});
                jQuery('#timepicker3').timepicker({minuteStep: 15});

                // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple').datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
                });
                //colorpicker start

                $('.colorpicker-default').colorpicker({
                    format: 'hex'
                });
                $('.colorpicker-rgba').colorpicker();


                //multiselect start

                $('#my_multi_select1').multiSelect();
                $('#my_multi_select2').multiSelect({
                    selectableOptgroup: true
                });

                $('#my_multi_select3').multiSelect({
                    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    afterInit: function (ms) {
                        var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function (e) {
                                if (e.which === 40) {
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function (e) {
                                if (e.which == 40) {
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                    },
                    afterSelect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });

                //spinner start
                $('#spinner1').spinner();
                $('#spinner2').spinner({disabled: true});
                $('#spinner3').spinner({value:0, min: 0, max: 10});
                $('#spinner4').spinner({value:0, step: 5, min: 0, max: 200});
                //spinner end

                // Select2
                jQuery(".select2").select2({
                    width: '100%'
                });
            });
        </script>

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>

         <script type="text/javascript" src="{{URL::asset('assets/admin')}}/assets/gallery/isotope.js"></script>
        <script type="text/javascript" src="{{URL::asset('assets/admin')}}/assets/magnific-popup/magnific-popup.js"></script> 
          
        <script type="text/javascript">
            $(window).load(function(){
                var $container = $('.portfolioContainer');
                $container.isotope({
                    filter: '*',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });

                $('.portfolioFilter a').click(function(){
                    $('.portfolioFilter .current').removeClass('current');
                    $(this).addClass('current');

                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                    return false;
                }); 
            });
            $(document).ready(function() {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });
        </script>

        @if(Session::has('alert_swal'))
            <script type="text/javascript">{!! session('alert_swal') !!}</script>
        @endif
    

    </body>
</html>