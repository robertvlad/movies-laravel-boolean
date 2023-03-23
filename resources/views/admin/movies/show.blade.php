@extends('layouts.admin')

@section('content')
{{-- riga blue --}}
<div class="blue"></div>
<div class="container my-2">
    {{-- sezione superiore --}}
    <div class="card-jumbo my-2">
        <div class="position">
            <div class="view">
                <img class="thumb" src="{{ $movie['cover_path'] }}" alt="{{ $movie['title'] }}">
                <div class="fumetto">{{ $movie['title'] }}</div>
            </div>
        </div>
        <div class="d-flex">
            <div>
                <div class="title">
                    <h4>{{ $movie['title'] }}</h4>
                </div>
                <div class="green">
                    <div class="avaible col-7">
                        <span>Vote: <span class="text-white">{{ $movie['vote'] }}</span></span>
                    </div>
                </div>
                <div class="col-10">
                    <p>Cast: {{$movie['cast']}}</p>
                </div>
            </div>
        </div>
    </div>
    {{-- seizione inferiore --}}
    <div class="section-talent-specs">
        <div class="talent-and-specs">
            <div class="talent col">
                <h2>Other Info</h2>
                <p>Original title: <a href="/">{{ $movie['original_title'] }}</a></p>
                <p>Nationality: <a href="/">{{ $movie['nationality'] }}</a></p>
                <p>Release date: {{ $movie['release_date'] }}</p>
            </div>
        </div>
    </div>
</div>
@endsection