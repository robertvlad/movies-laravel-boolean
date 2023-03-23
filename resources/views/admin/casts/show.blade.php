@extends('layouts.admin');

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="py-3">CAST: {{ $cast->name_surname }}</h2>
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}    
                </div>            
            @endif
            <div class="d-flex gap-3 pb-3">
                <a href="{{ route('admin.generes.index') }}" class="btn btn-square btn-primary">Torna all'elenco</a>
                <a href="{{ route('admin.generes.edit', $cast->slug) }}" title="Modifica tipologia" class="btn btn-square btn-warning">
                    Modifica
                </a>
                <form class="d-inline-block" action="{{ route('admin.generes.destroy', $cast->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button genere="submit" class="btn btn-square btn-danger">
                        Elimina
                    </button>
                </form>
            </div>
            <div>
                <p>Slug: {{ $cast->slug }}</p>
            </div>
        </div>
    </div>
</div>

@endsection