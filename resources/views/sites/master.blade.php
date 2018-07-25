<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
        <title>@yield('title')</title>
        <!-- Styles -->
        <link href="{{ asset('bowers/jquery-ui/themes/base/jquery-ui.css') }}" type="text/css" rel="stylesheet">
        {{-- {{ Html::style('bowers/bootstrap/dpist/css/bootstrap.min.css')}} --}}
        {!! HTML::style('bowers/bootstrap/dist/css/bootstrap.min.css') !!}
        {{ Html::style('bowers/font-awesome/css/font-awesome.min.css')}}
        {{ Html::style('plugins/rs-plugin/css/settings.css')}}   
        {{ Html::style('plugins/selectbox/select_option1.css')}}   
        {{ Html::style('bowers/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}
        {{ Html::style('plugins/isotope/jquery.fancybox.css')}}  
        {{ Html::style('plugins/isotope/isotope.css')}} 
        {{ Html::style('css/style.css')}} 
        {{ Html::style('css/colors/default.css')}} 
        @yield('style')
    </head>
    <body class="body-wrapper changeHeader">
        <div class="main-wrapper">
            @include('sites._section.header')
            @yield('content');
            @include('sites._section.footer')
        </div>
        <script src="js/app.js"></script>
        <!-- Scripts -->
        {{ Html::script('bowers/jquery/dist/jquery.min.js')}}
        {{ Html::script('bowers/jquery-ui/jquery-ui.js')}}
        {{ Html::script('bowers/bootstrap/dist/js/bootstrap.min.js')}}
        {{ Html::script('plugins/rs-plugin/js/jquery.themepunch.tools.min.js')}}
        {{ Html::script('plugins/rs-plugin/js/jquery.themepunch.revolution.min.js')}}
        {{ Html::script('plugins/selectbox/jquery.selectbox-0.1.3.min.js')}}
        {{ Html::script('bowers/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}
        {{ Html::script('js/waypoints.min.js')}}
        {{ Html::script('bowers/counter-up/jquery.counterup.min.js')}}
        {{ Html::script('plugins/isotope/isotope.min.js')}}
        {{ Html::script('plugins/isotope/jquery.fancybox.pack.js')}}
        {{ Html::script('plugins/isotope/isotope-triger.js')}}
        {{ Html::script('js/jquery.syotimer.js')}}
        {{ Html::script('js/custom.js')}}
        {{ Html::style('options/optionswitch.css')}}
        {{ Html::script('options/optionswitcher.js')}}
        @yield('script')
    </body>
</html>
