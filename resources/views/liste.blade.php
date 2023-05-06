<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste</title>
</head>
<body>
    @if(session()->get('id')!=null)
    <a href="/deconnexion"><button>Deconnexion</button></a>
    @else
    <a href="/admin"><button>admin</button></a>
    @endif
    <h2>Liste</h2>
    {{-- {{ session()->get('id')==null }} --}}
    @if(session()->get('id')!=null)
    <a href="/article/create"><button>Creer article</button></a>
    @endif
    <table>
        <tr>
            <th>Numero</th>
            <th>Titre</th>
            <th>resume</th>
            <th></th>
        </tr>
        @foreach($article as $art)
        <tr>
            <td>{{$art->id}}</td>
            <td>{{$art->titre}}</td>
            <td>{{$art->resume}}</td>
            <td><a name="" id="" class="btn btn-primary" href="/article/{{$art->id}}-{{$art['slug']}}" role="button">Lire</a></td>
            @if(session()->get('id')!=null)
            <td><a name="" id="" class="btn btn-primary" href="/article/update/{{$art->id}}" role="button">Modifier</a></td>
            <td><a name="" id="" class="btn btn-primary" href="/article/delete/{{$art->id}}" role="button">Effacer</a></td>
            @endif
        </tr>
        @endforeach

    </table>
</body>

</html>
