<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="icon" href="./img/favicon.ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Brimol</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-repeat:repeat-y;
                background-image: url("https://i2.wp.com/www.nustm.org/wp-content/uploads/2017/06/background-image-html.jpg?zoom=1.25&fit=1920%2C1200");
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .footer {
              position: fixed;
              width: 100%;
              left: 0;
              bottom: 0;
              background-color: grey;
              color: white;
            }

            .invalid-feedback{
                display: block;
            }

        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('welcome') }}">Brimol</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('guest.products') }}">Produtos <span class="sr-only">(current)</span>
                        </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}" tabindex="-1">Contacte-nos</a>
                  </li>
                </ul>
                <li class="form-inline my-2 my-lg-0">
                @if (Route::has('login'))
                    <div class="nav-link links">
                        @auth
                            <a href="{{ url('/home') }}">Profile</a>
                            <a href="{{ route('guest.shoppingCart') }}" class="fas fa-shopping-cart">Carrinho
                                <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                            <a href="{{ route('guest.shoppingCart') }}">Carrinho
                                <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                            </a>
                        @endif
                    @endauth
                </div>
                @endif
                </li>
              </div>
            </nav> 
        <div class="flex-center position-ref full-height">
            <div class="content">
                @yield('content')
            </div>
        </div>
        <footer class="footer">
            <div class="footer_menu">
                <div class="footer_menu_item" align="left">Copyright &copy; 2018-2019</div>
                <div class="footer_menu_item" align="center">Website developed by: João Vicente and Luís Azevedo</div>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>
