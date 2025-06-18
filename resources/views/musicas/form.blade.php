{{-- Este formulário será incluído nas views de 'create' e 'edit' --}}

<div class="form-group mb-3">
    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $musica->titulo ?? '') }}" required>
</div>

<div class="form-group mb-3">
    <label for="artista">Artista</label>
    <input type="text" name="artista" id="artista" class="form-control" value="{{ old('artista', $musica->artista ?? '') }}" required>
</div>

<div class="form-group mb-3">
    <label for="album">Álbum</label>
    <input type="text" name="album" id="album" class="form-control" value="{{ old('album', $musica->album ?? '') }}" required>
</div>

<div class="form-group mb-3">
    <label for="genero">Gênero</label>
    <input type="text" name="genero" id="genero" class="form-control" value="{{ old('genero', $musica->genero ?? '') }}" required>
</div>

<div class="form-group mb-3">
    <label for="imagem">Imagem da Capa</label>
    <input type="file" name="imagem" id="imagem" class="form-control">
    @isset($musica)
        <small class="form-text text-muted">Deixe em branco para manter a imagem atual.</small>
    @endisset
</div>

<div class="d-flex justify-content-end">
    <a href="{{ route('musicas.index') }}" class="btn btn-secondary me-2">
        <i class="fas fa-times"></i> Cancelar
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Salvar
    </button>
</div>
