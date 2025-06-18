@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $musica->imagem ? asset('storage/' . $musica->imagem) : 'https://placehold.co/600x600/2d3748/ffffff?text=' . urlencode($musica->titulo) }}" class="img-fluid rounded-start" alt="Capa de {{ $musica->titulo }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title">{{ $musica->titulo }}</h1>
                    <h3 class="card-subtitle mb-2 text-muted">{{ $musica->artista }}</h3>
                    <p class="card-text">
                        <strong>Álbum:</strong> {{ $musica->album }}<br>
                        <strong>Gênero:</strong> {{ $musica->genero }}
                    </p>
                    
                    <hr>

                    {{-- Botões de ação apenas para usuários autenticados --}}
                    @auth
                        <div class="d-flex">
                            <a href="{{ route('musicas.edit', $musica->id) }}" class="btn btn-warning me-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            
                            <form action="{{ route('musicas.destroy', $musica->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta música?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Excluir
                                </button>
                            </form>
                        </div>
                    @endauth

                    <div class="mt-3">
                        <a href="{{ route('musicas.index') }}" class="btn btn-outline-secondary">
                           <i class="fas fa-arrow-left"></i> Voltar para a Biblioteca
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Seção futura para exibir o histórico de reproduções --}}
    <div class="card mt-4">
        <div class="card-header">
            <h4>Histórico de Reproduções</h4>
        </div>
        <div class="card-body">
            {{-- Aqui você pode adicionar a lógica para listar as reproduções --}}
            <p>Em breve...</p>
        </div>
    </div>
</div>
@endsection
