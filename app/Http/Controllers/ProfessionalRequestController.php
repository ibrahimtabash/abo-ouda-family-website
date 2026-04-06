<?php

namespace App\Http\Controllers;

use App\Models\ProfessionalRequest;
use Illuminate\Http\Request;

class ProfessionalRequestController extends Controller
{
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
}
