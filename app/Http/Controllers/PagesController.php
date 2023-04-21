<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $plans = Package::all();
        return view('pages.index', compact('plans'));
    }
}
