<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>TITLE HERE</title>
        <meta name="description" content="">

        {{-- Viewport meta, remove if site is not responsive --> --}}
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        {{-- Place favicon.ico and apple-touch-icon.png in the root directory --}}

        {{-- Use less.js to get live refresh of .less files without compiling, only on localhost --}}
        @if ('local' == App::environment())
            <link rel="stylesheet/less" type="text/css" href="{{ Request::root() }}/less/styles.less" />
            <script src="{{ Request::root() }}/components/less.js/dist/less-1.3.3.min.js"></script>
            <script type="text/javascript">
                less.env = "development";
                less.watch();
            </script>
        @else
            {{-- Serve minified/combined css --}}
            {{ stylesheet() }}
        @endif
    </head>
    <body>
        @include('application.header')
        <div id="content" class="container">
            {{ $content }}
        </div>
        @include('application.footer')

        <script src="{{ Request::root() }}/components/jquery/jquery.min.js"></script>
        <script src="{{ Request::root() }}/js/bootstrap/bootstrap.min.js"></script>

        {{-- Serve minified/combined js --}}
        {{ script() }}

        {{-- Google Analytics: change UA-XXXXX-X to be your site's ID. --}}
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>