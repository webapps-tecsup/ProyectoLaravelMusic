@extends('layouts.app')

@section('content')
<main>
    <style>
        .container {
            background: black;
            color: black;
            width: 100rem;
            height: 29rem;
            border: 5px;
            font-size: x-large;
            font-size: 250%;
        }

        h1 {
            font-size: 200%;
            text-align: center;
        }

        h4 {
            color: #90caf9;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        body {
            background-image: url(https://img.freepik.com/foto-gratis/mundo-escuchando-musica_1048-5308.jpg?size=626&ext=jpg);
            background-size: cover;
            background-repeat: repeat;
        }

        #tamaño {
            font-size: 1.125rem;
        }
    </style>
    <div class="album py-4">
        <div class="container">
            <form action="{{ route('subirMusica') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <h1><label for="staticEmail2" class="text-info"><b>Subir Musica</b></label></h1>
                <div class="mb-3">
                    <label id="color" for="exampleFormControlInput1" class="form-label" style="color:#90caf9"><b>Nombre de la canción</b></label>
                    <input type="text" class="form-control" name="nombre_musica" placeholder="Agregue nombre de la canción">
                </div>
                <h4>Sube un audio</h4>
                <div class="col-auto">

                    <input class="form-control" type="file" name="musica">

                </div>
                <h4>Sube una imagen</h4>
                <div class="col-auto">

                    <input class="form-control" type="file" name="imagen" accept="image/jpeg">
                </div>
                <br>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Subir</button>
                </div>
            </form>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($musicas as $musica)
                <div class="col">
                    <div class="card shadow-sm">
                        <img height="300" style="border-radius: 5px 5px 0 0;" src="mostrarImagen/{{$musica->ruta}}" alt="Imagen">
                        <div class="card-body">
                            <p class="card-text">
                                <b id="tamaño">
                                    <center>{{$musica->nombre_musica}}</center>
                                </b>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <form method="POST" action="{{ route('eliminarMusica') }}">
                                    @csrf
                                    <div class="btn-group">
                                        <audio controls="" style="vertical-align: middle" src="mostrarCancion/{{$musica->ruta_mp3}}" type="audio/mp3" controlslist="nodownload"></audio>
                                        <div>
                                            <input type="hidden" name="id_musica" value="{{$musica->id}}">
                                            <button type="submit" class="btn text-danger my-2">
                                                <x-bi-trash />
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>

    </script>
</main>
@endsection