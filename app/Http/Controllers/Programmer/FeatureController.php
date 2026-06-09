<?php

namespace App\Http\Controllers\Programmer;

use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    public function index()
    {
        return view('programmer.features.index');
    }
}
