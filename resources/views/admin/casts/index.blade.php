@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="d-flex justify-content-between">
                <div>
                    <h2>Elenco Cast</h2>
                </div>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>name_surname</th>
                    <th>Slug</th>
                </thead>
                @forelse($casts as $cast)
                    <tbody>
                        <tr>
                            <td>{{$cast->id}}</td>
                            <td>{{$cast->name_surname}}</td>
                            <td>{{$cast->slug}}</td>
                            <td>
                                <a href="{{ route('admin.casts.show', $cast->slug) }}" title="Visualizza cast" class="btn btn-square btn-primary btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.casts.edit', ['cast' => $cast['slug']]) }}" title="Modifica cast" class="btn btn-square btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form class="d-inline-block" action="{{ route('admin.casts.destroy', $cast->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-square btn-danger" title="Elimina Post">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @empty
                <div>
                    <h1>Non ci sono cast presenti</h1>
                </div>
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection