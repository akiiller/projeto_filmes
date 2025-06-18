<div class="mb-3">
    <label for="titulo" class="form-label">Título:</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $musica->titulo ?? '') }}" required>
    @error('titulo')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="artista" class="form-label">Artista:</label>
    <input type="text" class="form-control" id="artista" name="artista" value="{{ old('artista', $musica->artista ?? '') }}" required>
    @error('artista')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="album" class="form-label">Álbum:</label>
    <input type="text" class="form-control" id="album" name="album" value="{{ old('album', $musica->album ?? '') }}" required>
    @error('album')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="genero" class="form-label">Gênero:</label>
    <input type="text" class="form-control" id="genero" name="genero" value="{{ old('genero', $musica->genero ?? '') }}" required>
    @error('genero')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="imagem" class="form-label">Capa da Música (Opcional):</label>
    <input type="file" class="form-control" id="imagem" name="imagem">
    @error('imagem')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    @if(isset($musica) && $musica->imagem)
        <div class="mt-2">
            <p>Capa atual:</p>
            <img src="{{ asset('storage/' . $musica->imagem) }}" alt="Capa da música" style="max-width: 150px; height: auto;">
        </div>
    @endif
</div>

<button type="submit" class="btn btn-success">{{ $submitButtonText }}</button>
<a href="{{ route('musicas.index') }}" class="btn btn-secondary">Cancelar</a>