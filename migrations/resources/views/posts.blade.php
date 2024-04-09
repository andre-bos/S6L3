<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Posts</h1>
        <a type="button" class="btn btn-outline-dark" href="/posts/create">Aggiungi post</a>
        <div class="card">
            <ul class="list-group">
                @if($posts)
                    @foreach($posts as $key => $value)
                    <li class="list-group-item">
                        <img style="width: 50px" src={{$value->post_thumbnail}} alt={{$value->description}}>{{$value->title}}
                        <span class="float-end">
                            <a type="button" class="btn btn-outline-info" href="/posts/{{$value->id}}">Info</a>
                            {{-- OPPURE, UN ALTRO MODO DI PASSARE L'ID COME PARAMETRO DELL'URL --}}
                            <a type="button" class="btn btn-outline-info" href="/posts/?id={{$value->id}}">Info</a>
                            <a type="button" class="btn btn-outline-warning" href="/posts/{{$value->id}}/edit">Modifica</a>
                            <a type="button" class="btn btn-outline-danger" href="/posts/{{$value->id}}/destroy">Elimina</a>
                        </span>
                    </li>
                    @endforeach
                @endif
            </ul>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>