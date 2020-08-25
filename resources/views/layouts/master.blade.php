<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@lang('label.SWAPNOLOKE_TITLE')</title>
        <meta name="description" content="Sufee Admin - HTML5 Admin Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('layouts.assets_master')
    </head>

    <body>
        <!-- Left Panel -->
        @include('layouts.aside_master')
        <!-- /#left-panel -->
        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            <!-- Header-->
            @include('layouts.header_master')<!-- /header -->
            <!-- Header-->
            @include('layouts.bread_crumbs_master')
            <!-- page content-->
            @yield('content')
        </div><!-- /#right-panel -->
        <!-- Right Panel -->
        <!-- footer-->
        @include('layouts.footer_master')
        
        @yield('customJs')
<script>
    $(document).ready(function(){
        

	$('.selectpicker').selectpicker;


	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
	});

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});
    });
    </script>
    
    </body>
</html>
