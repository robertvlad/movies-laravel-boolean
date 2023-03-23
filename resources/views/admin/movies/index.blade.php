@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <div class='container'>
        <div class='row'>
            <div class='col-12 py-5'>
                @if (session()->has('message'))
                <div class="bg-success p-4">
                    {{session()->get('message')}}
                </div>
                @endif
                @if (session()->has('deleteMessage'))
                <div class="bg-danger p-4">
                    {{session()->get('deleteMessage')}}
                </div>
                @endif
                <div class="row">
                    @forelse ($movies as  $item)
                    <div class="card m-3" style="width: 18rem;">
                        <img src="{{$item['cover_path']}}" class="card-img-top" alt="{{$item['title']}}">
                        <div class="card-body">
                            <h5 class="card-title text-danger">{{$item['original_title']}}</h5>
                            <p class="card-text"><span class="fw-bold">Cast:</span>  {{$item['cast']}}</p>
                            <p class="card-text"><span class="fw-bold"Vote:</span> {{$item['vote']}}</p>
                            <p class="card-text"><span class="fw-bold">Uscito il:</span>{{$item['release_date']}}</p>
                            <p class="card-text"><span class="fw-bold">Nazionalità:</span> {{$item['nationality']}}</p>
                            
                            <div class="mt-3 d-flex ">
                                <a class=" btn-link " href="{{route('admin.movies.show', $item['id'])}}"><i class="fa-solid fa-magnifying-glass text-success"></i></a>
                                <a class="mx-2 btn-link " href="{{route('admin.movies.edit', $item['id'])}}"><i class="fa-solid fa-pencil text-warning"></i></a>
                                <form action="{{route('admin.movies.destroy', $item['id'])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class=" btn-link confirm-delete-movie" data-title="{{ $item->title }}"><i class="fa-solid fa-trash-can text-danger"></i></button>
                                </form>
                            </div>
                          
                        </div>
                    </div>
                    @empty
                    <div>
                        <h1>Non ci sono film presenti</h1>
                    </div>
                    @endforelse
                    
                </div>
                   
            </div>
            <div class="row d-flex justify-content-center mb-5 ">
                <div class="col-5">
                </div>
                <div class="col-5">
                    <a class="text-light btn btn-primary"  href="{{route('admin.movies.create')}}">AGGIUNGI NUOVO FILM</a>
                </div>
            </div>
        </div>
    </div>

</div>
@include ('partials.model_delete')
@endsection

