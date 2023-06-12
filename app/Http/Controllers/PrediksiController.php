<?php

namespace App\Http\Controllers;

use App\Models\Prediksi;
use Phpml\Regression\LeastSquares;
use App\Http\Requests\StorePrediksiRequest;
use App\Http\Requests\UpdatePrediksiRequest;
use App\Models\Training;

class PrediksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Panen::all());
        foreach (Training::all() as $data) {
            $samples[] = [$data->penjualan];
            $targets[] = $data->prediksi;
        }
    
        $regression = new LeastSquares();
        // dd($regression->getIntercept($samples));
        $regression->train($samples, $targets);
        // dd($regression->predict([17000000]));
        foreach (Prediksi::all() as $tes ) {
            $data1[] = (object) [
                'id' => $tes->id,
                'Penjualan' => $tes->penjualan,
                'Prediksi' => $regression->predict([$tes->penjualan]),
                'Kuadrat' => pow($regression->predict([$tes->penjualan]),2),
                'HasilKali' => $tes->penjualan*$regression->predict([$tes->penjualan]), 
            ];
        }
        // dd($data1);
        return view('prediksi.index', [
        'prediksis' => $data1,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('prediksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrediksiRequest $request)
    {
        //
        Prediksi::create($request->validated());
        return redirect()->route('prediksi.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prediksi $prediksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prediksi $prediksi)
    {
        //
        return view('prediksi.edit', compact('prediksi'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrediksiRequest $request, Prediksi $prediksi)
    {
        //
        $prediksi->update($request->validated());
        return redirect()->route('prediksi.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prediksi $prediksi)
    {
        //
        $prediksi->delete();
        return redirect()->route('prediksi.index')->with('success', 'Data berhasil dihapus');
    }
}
