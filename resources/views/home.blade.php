@extends('layouts.app')

@section('content')

<div class="main-cont">
    <h1>sezione home</h1>
    <div>
        <nav>
            <ul>
                <li class="active {{ Route::currentRouteName() == 'homepage' ? 'active' : ''}}">
                    <a href="{{ route('homepage')}}">Home</a>
                </li>
                <li class="active {{ Route::currentRouteName() == 'comics.index' ? 'active' : ''}}">
                    <a href="{{ route('movies.index')}}">Comics</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection('content')