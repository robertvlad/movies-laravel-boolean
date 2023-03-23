@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="d-flex justify-content-between">
                <div>
                    <h2>Elenco Genere</h2>
                </div>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Genere</th>
                    <th>Slug</th>
                </thead>
                @forelse($generes as $genere)
                    <tbody>
                        <tr>
                            <td>{{$genere->id}}</td>
                            <td>{{$genere->genere}}</td>
                            <td>{{$genere->slug}}</td>
                            <td>
                                <a href="{{ route('admin.generes.show', $genere->slug) }}" title="Visualizza genere" class="btn btn-square btn-primary btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.generes.edit', ['genere' => $genere['slug']]) }}" title="Modifica genere" class="btn btn-square btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form class="d-inline-block" action="{{ route('admin.generes.destroy', $genere->slug) }}" method="POST">
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
                    <h1>Non ci sono generi presenti</h1>
                </div>
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection