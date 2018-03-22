<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
            }

            .wrapper {
                width:100%;
            }

            .content-link {
                max-width:960px;
                margin-left:auto;
                margin-right:auto;

            }

            .top-right {
                float:right;
                margin-right:2%;
            }

            .top-left {
                float:left;
                margin-left:2%;

            }

            .content-footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                height: 100px; /* Set the fixed height of the footer here */
                line-height: 60px; /* Vertically center the text there */
                background-color: #f5f5f5;
            }

            .content-header {
                position: absolute;
                top: 0;
                width: 100%;
                height: 100px; /* Set the fixed height of the footer here */
                line-height: 60px; /* Vertically center the text there */
                background-color: #f5f5f5;
            }

        </style>
    </head>
    <body>
        <div class="wrapper">

            <div class="container">

                <header class="content-header">
                    <div class="row content-link">

                        <div class="top-left header col">
                            <p>Hej</p>
                        </div>

                        @if (Route::has('login'))
                            <div class="top-right col-md-2">
                                @auth
                                    <a href="{{ url('/home') }}">Home</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>
                                    <a href="{{ route('register') }}">Register</a>
                                @endauth
                            </div>
                        @endif

                    </div>
                </header>

                <section id="content-body">
                    <div class="row">
                        <div class="col">

                        </div>
                    </div>
                </section>

                <footer class="content-footer">
                    <div class="row">
                        <div class="col">

                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>