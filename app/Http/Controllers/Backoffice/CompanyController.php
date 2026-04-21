<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->get();
        return view('backoffice.businesses.index', compact('companies'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('backoffice.businesses.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $company->update($request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
        ]));

        return redirect()->route('backoffice.businesses.index')
            ->with('success', 'تم التحديث');
    }

    public function destroy($id)
    {
        Company::findOrFail($id)->delete();

        return back()->with('success', 'تم الحذف');
    }
}
