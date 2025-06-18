@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Painel de Controle') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4 class="mb-3">{{ __('Você está logado!') }}</h4>
                    
                    <p>Seja bem-vindo à sua Biblioteca de Músicas.</p>

                    <div class="mt-4">
                        <a href="{{ route('musicas.index') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-music"></i> Acessar a Biblioteca
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
