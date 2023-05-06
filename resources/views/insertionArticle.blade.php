<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion</title>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <link href="{{ asset('ckeditor/contents.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href={{ asset('style/fonts/icomoon/style.css') }}>

    <link rel="stylesheet" href={{ asset('style/css/owl.carousel.min.css') }}>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{ asset('style/css/bootstrap.min.css') }}>
    <!-- Style -->
    <link rel="stylesheet" href={{ asset('style/css/style.css') }}>


</head>

<body style="background-image: url('{{ asset('style/images/wp.jpg') }}')">

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
            </div>
            <form action="/article" method="post" enctype="multipart/form-data">
                @csrf
                <div style="width: 50%; margin: 1% auto; padding: 1%" class="card text-white bg-primary">
                    <h2>Insertion Article</h2>
                    <div class="mb-3">
                        <label for="" class="form-label">Titre</label>
                        <input type="text" class="form-control" name="titre" id=""
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Resume</label>
                        <input type="text" class="form-control" name="resume" id=""
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Categorie</label>
                        <select class="form-control" name="cat" id="">
                            @foreach ($cat as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->nomcategorie }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Choose file</label>
                      <input type="file" class="form-control" name="image" id="" placeholder="" aria-describedby="fileHelpId">
                      @if($errors->has('image'))
                      <span class="text-danger text-left">{{$errors->first('image')}}</span>
                      @endif
                    </div>
                    <div class="mb-3">
                        <textarea name="contenu" id="editor"></textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-secondary">Continuer</button>
                    </div>
                </div>
            </form>
        </div>
    </header>

    <script>
        CKEDITOR.replace('contenu');
    </script>

    <script src={{ asset('style/bootstrap/js/bootstrap.min.js') }}></script>
</body>

</html>
