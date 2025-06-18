@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Adicionar Nova Música</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('musicas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('musicas.form', ['submitButtonText' => 'Adicionar Música'])
            </form>
        </div>
    </div>
</div>
@endsection