<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genere;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGenereRequest;
use App\Http\Requests\UpdateGenereRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generes = Genere::all();
        return view('admin.generes.index', compact('generes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.generes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGenereRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGenereRequest $request)
    {
        $form_data = $request->validated();

        $newGenere = new Genere();

        $slug = Genere::generateSlug($form_data['genere']);

        $form_data['slug'] = $slug;

        $newGenere->fill($form_data);

        $newGenere->save();

        return redirect()->route('admin.generes.index')->with('message', $newGenere->title.' aggiunto con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genere  $genere
     * @return \Illuminate\Http\Response
     */
    public function show(Genere $genere)
    {
        return view('admin.generes.show', compact('genere'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genere  $genere
     * @return \Illuminate\Http\Response
     */
    public function edit(Genere $genere)
    {
        return view('admin.generes.edit', compact('genere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGenereRequest  $request
     * @param  \App\Models\Genere  $genere
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGenereRequest $request, Genere $genere)
    {
        $form_data = $request->validated();
        $slug = Genere::generateSlug($request->genere);
        $form_data['slug']= $slug;
        $genere->update($form_data);

        return redirect()->route('admin.generes.index')->with('message', 'Progetto modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genere  $genere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genere $genere)
    {
        $genere->delete();

        return redirect()->route('admin.generes.index')->with('message', 'La tipologia è stata cancellata con successo');
    }
}
