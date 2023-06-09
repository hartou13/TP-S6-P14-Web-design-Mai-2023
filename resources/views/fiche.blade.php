<!doctype html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1ZXQH0MB4M"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-1ZXQH0MB4M');
    </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $article->resume }}">
    <title>{{ $article->titre }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href={{ secure_url('/styles/fonts/icomoon/style.css') }}>

    <link rel="stylesheet" href={{ secure_url('/styles/css/owl.carousel.min.css') }}>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{ secure_url('/styles/css/bootstrap.min.css') }}>
    <!-- Style -->
    <link rel="stylesheet" href={{ secure_url('/styles/css/style.css') }}>

    <title>Website Menu #3</title>
</head>

<body style="background-image: url('{{ secure_url('/styles/images/wp.jpg') }}')">


    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar" role="banner">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-11 col-xl-2">
                    <h1 class="mb-0 site-logo"><a href="index.html" class="text-white mb-0">AInformation</a></h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><a href="/"><span>Accueil</span></a></li>
                            @if (session()->get('id') != null)
                                <li><a href="/article/create"><span>Creer article</span></a></li>

                                <li><a href="/deconnexion"><span>Deconnexion</span></a></li>
                            @endif

                        </ul>
                    </nav>
                </div>


                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3 row" style="position: relative; top: 3px;"><a
                        href="#" class="site-menu-toggle js-menu-toggle text-white"><span
                            class="icon-menu h3"></span></a></div>
                <div style="width: 50%; margin: 5% auto">
                    <div class="card text-white">
                        <img class="card-img-top" src={{ 'data:image/jpeg;base64,' . $article->img }} alt="Title">
                        <div class="card-body bg-dark">
                            <h3 class="card-title">{{ $article->titre }}</h3>
                            <h4>{{ $article->resume }}</h4>
                            <h6>{{ $categorie->nomcategorie }}</h6>
                            <div style="font-color: white " id="content" class="text-white">
                                <h6 style="color: red">{!! $article->contenu !!}</h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        </div>

    </header>

    <div class="hero"></div>



    <script src={{ secure_url('/styles/js/jquery-3.3.1.min.js') }}></script>
    <script src={{ secure_url('/styles/js/popper.min.js') }}></script>
    <script src={{ secure_url('/styles/js/bootstrap.min.js') }}></script>
    <script src={{ secure_url('/styles/js/jquery.sticky.js') }}></script>
    <script src={{ secure_url('/styles/js/main.js') }}></script>
</body>

</html>
