@extends('layouts.admin')

@section('content')

@if($errors->any())
<ul class="text-danger bg-black mb-0">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<div class="form-cont">
    <form action="{{ route('admin.generes.store') }}" method="POST">
    @csrf


    <label for="title">Inserisci il nome del Genere:</label><br>
    <input type="text" name="genere" id="genere"><br>
    <div class="error">
    @error('genere')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>

    
    <input type="submit" value="Invia" class="sub">
    
    
    </form>
</div>


@endsection('content')