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
            @auth// app/Http/Controllers/MusicaController.php

// ... no topo do arquivo
use Illuminate\Support\Facades\Storage; // <-- Importante!


// No método store():
public function store(Request $request)
{
    // ... validação
    $data = $request->all();

    if ($request->hasFile('imagem')) {
        // Salva a imagem na pasta 'musica_capas' dentro de storage/app/public
        $imagePath = $request->file('imagem')->store('musica_capas', 'public');
        $data['imagem'] = $imagePath; // Armazena o caminho relativo no banco de dados
    }

    Musica::create($data);
    // ... redirecionamento
}

// No método update():
public function update(Request $request, Musica $musica)
{
    // ... validação
    $data = $request->all();

    if ($request->hasFile('imagem')) {
        // Deleta a imagem antiga se existir
        if ($musica->imagem) {
            Storage::disk('public')->delete($musica->imagem);
        }
        $imagePath = $request->file('imagem')->store('musica_capas', 'public');
        $data['imagem'] = $imagePath;
    } elseif ($request->input('imagem_existente')) {
        // Se houver um campo oculto para imagem existente e não houve novo upload, mantém a imagem existente
        // (Isso é uma boa prática se você tiver um checkbox "remover imagem" ou algo assim)
    } else {
        // Se o campo de upload estiver vazio e não houver input para manter imagem existente, remove o campo imagem dos dados
        unset($data['imagem']);
    }


    $musica->update($data);
    // ... redirecionamento
}

// No método destroy():
public function destroy(Musica $musica)
{
    // Deleta a imagem associada antes de deletar a música
    if ($musica->imagem) {
        Storage::disk('public')->delete($musica->imagem);
    }
    $musica->delete();
    // ... redirecionamento
}
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