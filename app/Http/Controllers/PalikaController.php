<?php

namespace App\Http\Controllers;

use App\Models\Palika;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PalikaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PalikaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $palikas = Palika::paginate();

        return view('palika.index', compact('palikas'))
            ->with('i', ($request->input('page', 1) - 1) * $palikas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $palika = new Palika();

        return view('palika.create', compact('palika'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PalikaRequest $request): RedirectResponse
    {
        Palika::create($request->validated());

        return Redirect::route('palikas.index')
            ->with('success', 'Palika created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $palika = Palika::find($id);

        return view('palika.show', compact('palika'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $palika = Palika::find($id);

        return view('palika.edit', compact('palika'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PalikaRequest $request, Palika $palika): RedirectResponse
    {
        $palika->update($request->validated());

        return Redirect::route('palikas.index')
            ->with('success', 'Palika updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Palika::find($id)->delete();

        return Redirect::route('palikas.index')
            ->with('success', 'Palika deleted successfully');
    }
}
