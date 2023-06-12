<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Phpml\Regression\LeastSquares;

class HasilController extends Controller
{
    //
    public function index()
    {
        foreach (Training::all() as $data) {
            $samples[] = [$data->penjualan];
            $targets[] = $data->prediksi;
        }
    
        $regression = new LeastSquares();
        // dd($regression->getIntercept($samples));
        $regression->train($samples, $targets);
        $intercept = $regression->getIntercept();
        $coefficients = $regression->getCoefficients();
        return view('hasil.index', [
            'intercept' => $intercept,
            'coefficients' => $coefficients,
        ]);
    }
    
}
