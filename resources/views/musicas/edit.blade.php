@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Editar Música: {{ $musica->titulo }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('musicas.update', $musica->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- ESSENCIAL para métodos PUT/PATCH --}}
                {{-- AQUI ESTÁ A MUDANÇA: Passando $submitButtonText --}}
                @include('musicas.form', ['musica' => $musica, 'submitButtonText' => 'Atualizar Música'])
            </form>
        </div>
    </div>
</div>
@endsection