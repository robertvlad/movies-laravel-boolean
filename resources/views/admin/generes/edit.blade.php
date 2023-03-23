@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row p-5">
            <div class="col-12">
                <form action="{{route('admin.generes.update' , $genere->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group ">
                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error )
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="col-8">
                                        @error('name_surname')
                                            <p class="text-danger fw-bold">{{$message}}</p>
                                        @enderror
                                        <label class="control-label mb-2 fw-bold ">Genere</label>
                                        <input type="text" name="genere" class="form-control" placeholder="Inserisci il titolo" value="{{old('name') ?? $genere->genere}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-5">
                            <div class="col-3">
                                <button type="submit" class="form-control btn btn-primary">
                                    Modifica Tipo
                                </button>
                            </div>
                        </div>
        
                </form>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
