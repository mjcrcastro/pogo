<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-178539858-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-178539858-1');
        </script>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Level Up Pokemon Go Fast" />
        <meta name="author" content="majcro" />
        <meta name="author" content="pokemon go friend codes pokemon go friends pokemon go friend code pokémon go friend code pokemon go friends codes pokemon.go.friend codes active pokemon go friend codes pokemon go friendcodes pogo friend codes friend code pokemon go pokemon go friend code website pokemon go friend pogo friend" />
        <title>LevelUp Pokemon Go Fast</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />

        <link href="/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/css/styles.css" rel="stylesheet" />
        <script src="/js/jquery-3.5.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="/">Welcome @if (Auth::check()) ({{ trim(chunk_split(Auth::user()->user_code, 4, ' '))}}) @endif to LevelUp PoGo</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" @if (Auth::check()) href='/logout'> Logout @else  href='/login'> Login @endif</a></li>
                         <li @if (Auth::check()) @else onclick="alert('You need to Log in first')"  @endif class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href='/users'> Show Codes </a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/how">How to use</a></li>
                    </ul>
                </div>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>

        <header class="masthead bg-primary text-white text-center">
            @if ($errors->any())     
            <div class="alert alert-warning">
                <ul class="error">
                    {{ implode('',$errors->all(':message')) }}
                </ul>
            </div>
            @endif
            @yield('main')
        </header>
        <!-- Footer-->

        <footer class="footer text-center">
            <div class="container text-center">


                <div class="row">
                    <!-- Footer Social Icons-->
                    <!-- Footer About Text-->
                    <div class="col">
                        <h4 class="text-uppercase text-center mb-4">About LevelUp PoGo</h4>
                        <p class="text-center">
                            LevelUp PoGo is free to use.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © LevelUp PoGo</small></div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- Core theme JS-->
    </body>   
</html>
