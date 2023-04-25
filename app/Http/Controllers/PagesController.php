<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $plans = Package::paginate(2);
        return view('pages.index', compact('plans'));
    }
}
