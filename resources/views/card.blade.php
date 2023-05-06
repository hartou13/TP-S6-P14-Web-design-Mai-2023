<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <!-- Google Tag Manager -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1ZXQH0MB4M"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1ZXQH0MB4M');
</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href={{ secure_url('style/fonts/icomoon/style.css') }}>

    <link rel="stylesheet" href={{ secure_url('style/css/owl.carousel.min.css') }}>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{ secure_url('style/css/bootstrap.min.css') }}>
    <!-- Style -->
    <link rel="stylesheet" href={{ secure_url('style/css/style.css') }}>

    <title>Accueil</title>
</head>

<body style="background-image: url('{{ secure_url('style/images/wp.jpg') }}')">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-576BVBS"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


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

                @foreach ($article as $art)
                    <div class="col-xl-4" style="margin-top: 10px;"  style="height: 300px;">
                        <div class="card text-white bg-primary">
                            <img style="height: 50%;" class="card-img-top" src={{"data:image/jpeg;base64,".$art->img}} alt="Title">
                            <div class="card-body">
                                <h4 class="card-title">{{ $art->titre }}</h4>
                                <p class="card-text">
                                    {{ $art->resume }}</p>
                                <a name="" id="" class="btn btn-primary"
                                    href="/article/{{ $art->id }}-{{ $art['slug'] }}" role="button">Lire</a>
                                @if (session()->get('id') != null)
                                    <a name="" id="" class="btn btn-primary"
                                        href="/article/update/{{ $art->id }}" role="button">Modifier</a>
                                    <a name="" id="" class="btn btn-primary"
                                        href="/article/delete/{{ $art->id }}" role="button">Effacer</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        </div>

    </header>

    <div class="hero"></div>



    <script src={{ secure_url('style/js/jquery-3.3.1.min.js') }}></script>
    <script src={{ secure_url('style/js/popper.min.js') }}></script>
    <script src={{ secure_url('style/js/bootstrap.min.js') }}></script>
    <script src={{ secure_url('style/js/jquery.sticky.js') }}></script>
    <script src={{ secure_url('style/js/main.js') }}></script>
</body>

</html>
