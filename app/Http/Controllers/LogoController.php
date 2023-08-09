<?php

namespace App\Http\Controllers;

use App\Models\logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index()
    {
        $logo = logo::latest()->paginate(15);
        return view('layouts.ext_user', [
            'logo' => $logo,
        ]);
    }
}
