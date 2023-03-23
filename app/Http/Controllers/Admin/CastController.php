<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cast;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCastRequest;
use App\Http\Requests\UpdateCastRequest;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casts = Cast::all();
        return view('admin.casts.index', compact('casts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.casts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCastRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCastRequest $request)
    {
        $form_data = $request->validated();

        $newCast = new Cast();
        
        $slug = Cast::generateSlug($form_data['name_surname']);

        $form_data['slug'] = $slug;

        $newCast->fill($form_data);

        $newCast->save();

        return redirect()->route('admin.casts.index')->with('message', $newCast->title.' aggiunto con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function show(Cast $cast)
    {
        return view('admin.casts.show', compact('cast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function edit(Cast $cast)
    {
        return view('admin.casts.edit', compact('cast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCastRequest  $request
     * @param  \App\Models\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCastRequest $request, Cast $cast)
    {
        $form_data = $request->validated();
        $slug = Cast::generateSlug($request->name_surname);
        $form_data['slug']= $slug;
        $cast->update($form_data);

        return redirect()->route('admin.casts.index')->with('message', 'Progetto modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cast $cast)
    {
        $cast = Cast::findOrFail($cast);
        $cast->delete();

        return redirect()->route('admin.casts.index')->with('deleteMessage', $cast->name_surname.' Eliminato correttamente');
    }
}
