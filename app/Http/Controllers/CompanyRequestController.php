<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyRequest;
use Illuminate\Http\Request;

class CompanyRequestController extends Controller
{
    public function index()
    {
        $companyRequests = CompanyRequest::where('status', 'pending')
            ->latest()
            ->get();

        return view('backoffice.company-requests.index', compact('companyRequests'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
        ]);

        $existing = CompanyRequest::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->exists();

        if ($existing) {
            return back()->with('error', 'لديك طلب قيد المراجعة');
        }

        CompanyRequest::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'description' => $validated['description'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
        ]);

        return back()->with('success', 'تم إرسال الطلب بنجاح');
    }

    public function approve($id)
    {
        $request = CompanyRequest::findOrFail($id);

        Company::create([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        $request->update([
            'status' => 'approved'
        ]);

        return back()->with('success', 'تمت الموافقة على الشركة');
    }

    public function reject($id)
    {
        $request = CompanyRequest::findOrFail($id);

        $request->update([
            'status' => 'rejected'
        ]);

        return back()->with('success', 'تم رفض الطلب');
    }
}
