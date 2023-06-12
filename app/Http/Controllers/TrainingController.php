<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd(Training::all());
        return view('training.index', [
            'trainings' => Training::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('training.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingRequest $request)
    {
        //
        // dd($request->validated());
        Training::create($request->validated());
        return redirect()->route('training.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        //
        return view('training.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingRequest $request, Training $training)
    {
        //
        $training->update($request->validated());
        return redirect()->route('training.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        //
        $training->delete();
        return redirect()->route('training.index')->with('success', 'Data berhasil dihapus');
    }
}
