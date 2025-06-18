@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3">Editar Música: {{ $musica->titulo }}</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('musicas.update', $musica->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- Método HTTP para atualização --}}
                        
                        {{-- Inclui o formulário padrão, passando a variável $musica --}}
                        @include('musicas.form', ['musica' => $musica])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
