<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.package.list', compact('packages'));
    }

    public function create()
    {
        return view('admin.package.create');
    }


    public function store(Request $request)
    {
        $data = $this->getData($request);
        Package::create($data);
        return redirect()->route('admin.package.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.package.edit', compact('package'));
    }


    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);
        $data = $this->getData($request);
        $package->update($data);
        return redirect()->route('admin.package.index');
    }


    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();
        return redirect()->back();
    }

    protected function getData(Request $request)
    {
        $rules = [
            'name' => 'required',
            'min_deposit' => 'required',
            'max_deposit' => 'required',
            'term_days' => 'required',
            'daily_interest' => 'required',
        ];
        return $request->validate($rules);
    }
}
