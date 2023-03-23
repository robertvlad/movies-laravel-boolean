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
    <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title" class="fw-bold">Inserisci il titolo:</label><br>
    <input type="text" name="title" id="title" value="{{ old('title')  ?? $movie->title}}"><br>
    <div class="error">
    @error('title')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>
    
    <label for="original_title" class="fw-bold">Inserisci il titolo originale:</label><br>
    <input type="text" name="original_title" id="original_title"  value="{{ old('original_title')  ?? $movie->original_title}}"><br>
    <div class="error">
    @error('original_title')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>

    <label for="nationality" class="fw-bold">Inserisci la nazionalità:</label><br>
    <input type="text" name="nationality" id="nationality"  value="{{ old('nationality')  ?? $movie->nationality}}"><br>
    <div class="error">
    @error('nationality')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>
    
    <label for="release_date" class="fw-bold">Inserisci la data di pubblicazione:</label><br>
    <input type="date" name="release_date" id="release_date"  value="{{ old('date')  ?? $movie->date}}"><br>
    <div class="error">
    @error('release_date')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>

        <label for="vote" class="fw-bold">Inserisci il voto:</label><br>
    <input type="text" name="vote" id="vote"  value="{{ old('vote')  ?? $movie->vote}}"><br>
    <div class="error">
    @error('vote')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>
    <div class="col-5">
        <label class="control-label my-2 fw-bold">Genere</label>
        <select class="form-control" name="genere_id" id="genere_id">
            @foreach ($generes as $item )
                <option value="{{$item->id}}" {{$item->id == old('genere_id', $movie->genere_id) ? 'selected' : ""}}>{{$item->genere}}</option>  
            @endforeach
        </select>

    </div>
    <div class="f d-flex flex-column my-3">
        <label class="control-label my-2 fw-bold">Casts</label>
        <div class="d-flex flex-column">

        </div>
        @foreach ($casts as $item )
        <div>

            <input type="checkbox" value="{{$item->id}}" name="casts[]" value="on" 
            {{ old('casts') == 'on' ? 'checked' : '' }}>
            <label class="form-check-label">{{$item->name_surname}}</label>
        </div>
            
        @endforeach
    </div>

    <label for="title" class="fw-bold">Inserisci l'immagine:</label><br>
    <input type="text" name="cover_path" id="cover_path" value="{{ old('cover_path')  ?? $movie->cover_path}}"><br>



    <button type="submit">Invia</button>
    
    
    
    </form>
</div>


@endsection('content')