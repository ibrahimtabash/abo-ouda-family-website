<?php

namespace App\Http\Controllers;

use App\Models\ProfessionalRequest;
use App\Models\Professional;
use Illuminate\Http\Request;

class ProfessionalRequestController extends Controller
{

    public function index() {
        $professionalRequests = ProfessionalRequest::where('status', 'pending')->latest()->get();
        return view('professional-request.index', compact('professionalRequests'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'profession_id' => 'required|exists:professions,id',
            'phone_number' => 'required|string',
            'address' => 'nullable|string',
        ]);

        // ❗ منع طلب مكرر
        $existing = ProfessionalRequest::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->exists();

        if ($existing) {
            return back()->with('error', 'لديك طلب قيد المراجعة');
        }

        // ✅ حفظ الطلب
        ProfessionalRequest::create([
            'user_id' => auth()->id(),
            'profession_id' => $validated['profession_id'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
        ]);

        // ✅ تحديث user إذا ما عنده رقم
        if (!auth()->user()->phone_number) {
            auth()->user()->update([
                'phone_number' => $validated['phone_number'],
            ]);
        }

        return back()->with('success', 'تم إرسال الطلب بنجاح');
    }

    public function approve(Request $request, $id)
    {
        $professionalRequest = ProfessionalRequest::findOrFail($id);
        // create or activate professional record
        $professional = Professional::firstOrCreate(
            [
                'user_id' => $professionalRequest->user_id,
                'profession_id' => $professionalRequest->profession_id,
            ],
            [
                'phone_number' => $professionalRequest->phone_number,
                'address' => $professionalRequest->address,
                'is_active' => true,
            ]
        );

        $professional->update(['is_active' => true]);

        $professionalRequest->status = 'approved';
        $professionalRequest->save();

        return redirect()->route('professional-request.index')->with('success', 'Professional request approved.');
    }

    public function reject(Request $request, $id)
    {
        $professionalRequest = ProfessionalRequest::findOrFail($id);
        $professionalRequest->status = 'rejected';
        $professionalRequest->save();

        return redirect()->route('professional-request.index')->with('success', 'Professional request rejected.');
    }
}