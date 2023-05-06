<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$article->resume}}">
    <title>{{$article->titre}}</title>
</head>
<body>
    <h1>{{$article->titre}}</h1>
    <h2>{{$article->resume}}</h2>
    <h6>{{$categorie->nomCategorie}}</h6>
    <div id="content">
        {!! $article->contenu !!}
    </div>
</body>
</html>
