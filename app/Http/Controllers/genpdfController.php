<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Temperatura;
use genepdf;
use PDF;

class genpdfController extends Controller
{
    public function genepdf(){
       
        $pdf = PDF::loadView('auth.generatepdf');
        return $pdf->stream();
}
}
