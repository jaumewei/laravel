<!DOCTYPE html>
<html>
    <head>
        <title>EasyOrders Prototype</title>
        {{HTML::style('https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i')}}
        {{HTML::style('http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css')}}
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Roboto Condensed';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="row fullWidth container">
            <div class="collapse navbar-collapse" id="main-menu">
                @include('layouts.public.common.topmenu')
            </div>
            <div class="fullWidth row" id="content">
                @yield('content')
            </div>
            <div class="collapse footer" id="footer-bar">
                @include('layouts.public.common.footer')
            </div>
        </div>
    {{HTML::script('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js')}}
    {{HTML::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js')}}
    @show
    </body>
</html>

