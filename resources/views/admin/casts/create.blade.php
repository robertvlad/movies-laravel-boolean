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
    <form action="{{ route('admin.casts.store') }}" method="POST">
    @csrf


    <label for="title">Inserisci il nome del membro del Cast:</label><br>
    <input type="text" name="name_surname" id="name_surname"><br>
    <div class="error">
    @error('name_surname')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>

    
    <input type="submit" value="Invia" class="sub">
    
    
    </form>
</div>


@endsection('content')