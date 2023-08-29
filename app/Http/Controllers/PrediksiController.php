<?php

namespace App\Http\Controllers;

use App\Models\Prediksi;
use App\Models\Training;
use Illuminate\Http\Request;
use Phpml\Regression\LeastSquares;
use App\Http\Requests\StorePrediksiRequest;
use App\Http\Requests\UpdatePrediksiRequest;

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
                'Harga' => 5000,
                'HasilTotal' => 5000*($regression->predict([$tes->penjualan])*1000),
                'tanggal' => $tes->tanggal,
            ];
        }
        if (count(Prediksi::all()) == 0) {
            $data1 = [];
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

    public function laporan(Request $request)  {
        // dd($request->all());
        // dd(Panen::all());
        if (count(Prediksi::all()) == 0) {
            $data1 = [];
        }
        
        foreach (Training::all() as $data) {
            $samples[] = [$data->penjualan];
            $targets[] = $data->prediksi;
        }
    
        $regression = new LeastSquares();
        // dd($regression->getIntercept($samples));
        $regression->train($samples, $targets);

        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $prediksis = Prediksi::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->get();
            // dd($prediksis);
        } else {
            $prediksis = Prediksi::all();
        }
        

        foreach ($prediksis as $tes ) {
            $data1[] = (object) [
                'id' => $tes->id,
                'Penjualan' => $tes->penjualan,
                'Prediksi' => $regression->predict([$tes->penjualan]),
                'Harga' => 5000,
                'HasilTotal' => 5000*($regression->predict([$tes->penjualan])*1000),
                'tanggal' => $tes->tanggal,
            ];
        }
        // dd($data1);
        return view('laporan.index', [
        'prediksis' => $data1,
        'tanggal_awal' => $request->tanggal_awal,
        'tanggal_akhir' => $request->tanggal_akhir,
        ]);

    }
    public function cetak_laporan(Request $request)  {
        if (count(Prediksi::all()) == 0) {
            $data1 = [];
        }
        // dd($request->all());
        foreach (Training::all() as $data) {
            $samples[] = [$data->penjualan];
            $targets[] = $data->prediksi;
        }
    
        $regression = new LeastSquares();
        // dd($regression->getIntercept($samples));
        $regression->train($samples, $targets);

        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $prediksis = Prediksi::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->get();
            // dd($prediksis);
        } else {
            $prediksis = Prediksi::all();
        }
        

        foreach ($prediksis as $tes ) {
            $data1[] = (object) [
                'id' => $tes->id,
                'Penjualan' => $tes->penjualan,
                'Prediksi' => $regression->predict([$tes->penjualan]),
                'Harga' => 5000,
                'HasilTotal' => 5000*($regression->predict([$tes->penjualan])*1000),
                'tanggal' => $tes->tanggal,
            ];
        }
        // dd($data1);
        return view('laporan.cetak', [
        'prediksis' => $data1,
        'tanggal_awal' => $request->tanggal_awal,
        'tanggal_akhir' => $request->tanggal_akhir,
        'semua' => 'Semua Data'
        ]);

    }
}
