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
    <form action="{{ route('admin.movies.store') }}" method="POST">
    @csrf
    <label for="title">Inserisci il titolo:</label><br>
    <input type="text" name="title" id="title"><br>
    <div class="error">
    @error('title')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>
    
    <label for="original_title">Inserisci il titolo originale:</label><br>
    <input type="text" name="original_title" id="original_title"><br>
    <div class="error">
    @error('original_title')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>

    <label for="nationality">Inserisci la nazionalità:</label><br>
    <input type="text" name="nationality" id="nationality"><br>
    <div class="error">
    @error('nationality')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>
    
    <label for="release_date">Inserisci la data di pubblicazione:</label><br>
    <input type="date" name="release_date" id="release_date"><br>
    <div class="error">
    @error('release_date')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>

        <label for="vote">Inserisci il voto:</label><br>
    <input type="text" name="vote" id="vote"><br>
    <div class="error">
    @error('vote')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>

    <label for="cast">Inserisci il cast:</label><br>
    <input type="text" name="cast" id="cast"><br>
    <div class="error">
    @error('cast')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>

    <label for="title">Inserisci l'immagine:</label><br>
    <input type="text" name="thumb" id="thumb" value="https://picsum.photos/200/300"><br>



    
    <input type="submit" value="Invia" class="sub">
    
    
    </form>
</div>


@endsection('content')