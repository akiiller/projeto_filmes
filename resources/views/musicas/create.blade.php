@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3">Adicionar Nova Música</h1>
                </div>
                <div class="card-body">
                    {{-- Formulário com suporte para upload de arquivos --}}
                    <form action="{{ route('musicas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Inclui o formulário padrão --}}
                        @include('musicas.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
