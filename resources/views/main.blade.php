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
            
            a{
                transition: ease-in 250ms;
                color: #303030;
            }
            a:hover,a:active{
                color: #606060;
            }
            #view-header{
                background-color: #445588;
                color: #fafafa;
                height: 80px;
            }
            #view-header a,#view-footer a{
                color: #fafafa;
            }
            #view-header ol,#view-footer ol,
            #view-header ul,#view-footer ul{
                list-style-type: none;
                padding: 20px 0;
                margin: 0;
            }
            #view-header a:hover,#view-footer a:hover,
            #view-header a:active,#view-footer a:active{
                color: #ffffff;
            }
            #view-footer{
                background-color: #303030;
                color: #fafafa;
            }
            #main-menu{
                background-color: #f5f5f5;
                border-right: 1px solid #d5d5d5;
            }
            .button, button,input[type="button"]{
                text-transform: uppercase;
                text-decoration: none;
                text-align: center;
                font-weight: 300;
                font-size: 13px;
                line-height: 13px;
                color:  #fafafa;
                
                display: inline-block;
                min-width: 120px;
                background-color: #445588;
            }
        </style>
    </head>
    <body>
        <div class="bg-primary navbar-collapse fullWidth" id="view-header">
            <div class="col-lg-4">
                @yield('instance')
                Fresc i Bo
            </div>
            <div class="col-lg-8">
                @include('layouts.public.common.topmenu')
            </div>
        </div>
        <div class="row fullWidth" id="view-content">
            <div class="side-menu-container col-sm-3" id="main-menu">
                @include('layouts.provider.common.menu')
            </div>
            <div class="fullWidth col-lg-9" id="content">
                @yield('content')
            </div>
        </div>
        <div class="row fullWidth bg-info" id="view-footer">
            <ul class="col-lg-4 system-credits">
                <li>TAO Visual&cop&copy;2017</li>
            </ul>
            <div class="footer-menu col-lg-8">
            @include('layouts.public.common.footer')
            </div>
        </div>
    {{HTML::script('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js')}}
    {{HTML::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js')}}
    @show
    </body>
</html>

