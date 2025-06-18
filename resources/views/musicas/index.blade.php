@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Biblioteca de Músicas</h2>
        @auth
            <a href="{{ route('musicas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Adicionar Nova Música
            </a>
        @endauth
    </div>

    @if ($musicas->isEmpty())
        <div class="alert alert-info" role="alert">
            Nenhuma música encontrada.
            @auth
                Que tal <a href="{{ route('musicas.create') }}">adicionar uma nova agora</a>?
            @endauth
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($musicas as $musica)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        @if ($musica->imagem)
                            <img src="{{ asset('storage/' . $musica->imagem) }}" class="card-img-top" alt="{{ $musica->titulo }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default_music.png') }}" class="card-img-top" alt="Capa Padrão" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $musica->titulo }}</h5>
                            <p class="card-text"><strong>Artista:</strong> {{ $musica->artista }}</p>
                            <p class="card-text"><strong>Álbum:</strong> {{ $musica->album }}</p>
                            <p class="card-text"><strong>Gênero:</strong> {{ $musica->genero }}</p>

                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="{{ route('musicas.show', $musica->id) }}" class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-info-circle"></i> Detalhes
                                </a>
                                @auth
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('musicas.edit', $musica->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('musicas.destroy', $musica->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta música?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm ms-2">
                                                <i class="fas fa-trash-alt"></i> Excluir
                                            </button>
                                        </form>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $musicas->links() }}
        </div>
    @endif
</div>
@endsection