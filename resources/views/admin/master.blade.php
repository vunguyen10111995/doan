<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <head>
        <title>@yield('title')</title>
        {!! Html::style('bowers/bootstrap/dist/css/bootstrap.min.css') !!}
        {!! Html::style('bowers/font-awesome/css/font-awesome.min.css') !!}
        {!! Html::style('bowers/toastr/toastr.min.css') !!}
        {!! Html::style('bowers/jquery.gritter/css/jquery.gritter.css') !!}
        {!! Html::style('css/animate.css') !!}
        {!! Html::style('bowers/bootstrap-select/dist/css/bootstrap-select.min.css') !!}
        {!! Html::style('css/style_backend.css') !!}
        @yield('style')
    </head>
    <body>
        <div id="wrapper">
            @include('admin._section.menu')    
            <div id="page-wrapper" class="gray-bg">
                @include('admin._section.head')
                    @yield('content')
                @include('admin._section.footer')
            </div>
        </div>
        {!! Html::script('bowers/jquery/dist/jquery.min.js') !!}
        {!! Html::script('js/setting.js') !!}
        {!! Html::script('bowers/bootstrap/dist/js/bootstrap.min.js') !!}
        {!! Html::script('bowers/metisMenu/dist/metisMenu.js') !!}
        {!! Html::script('bowers/jquery-slimscroll/jquery.slimscroll.min.js') !!}
        {!! Html::script('bowers/Flot/jquery.flot.js') !!}
        {!! Html::script('bowers/flot.tooltip/js/jquery.flot.tooltip.min.js') !!}
        {!! Html::script('bowers/flot-spline/js/jquery.flot.spline.js') !!}
        {!! Html::script('bowers/Flot/jquery.flot.resize.js') !!}
        {!! Html::script('bowers/Flot/jquery.flot.pie.js') !!}
        {!! Html::script('bowers/peity/jquery.peity.min.js') !!}
        {!! Html::script('js/peity-demo.js') !!}
        {!! Html::script('js/inspinia.js') !!}
        {!! Html::script('bowers/PACE/pace.min.js') !!}
        {!! Html::script('bowers/jquery-ui/jquery-ui.min.js') !!}
        {!! Html::script('bowers/jquery.gritter/js/jquery.gritter.min.js') !!}
        {!! Html::script('bowers/jquery.sparkline.bower/dist/jquery.sparkline.min.js') !!}
        {!! Html::script('bowers/chart.js/dist/Chart.min.js') !!}
        {!! Html::script('bowers/toastr/toastr.min.js') !!}
        {!! Html::script('js/toastr.js') !!}
        {!! Html::script('bowers/bootstrap-select/dist/js/bootstrap-select.min.js') !!}
        @yield('script')
    </body>

</html>
