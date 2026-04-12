<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use App\Models\FamilyMember;
use Illuminate\Http\Request;

class FamilyMemberController extends Controller
{
    // 📄 عرض كل الأعضاء
    public function index()
    {
        $members = FamilyMember::with('parent')->latest()->get();

        return view('backoffice.family-members.index', compact('members'));
    }

    // ➕ صفحة الإضافة
    public function create()
    {
        $members = FamilyMember::all();

        return view('backoffice.family-members.create', compact('members'));
    }

    // 💾 تخزين
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:family_members,id',
        ]);

        FamilyMember::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()
            ->route('family-members.index')
            ->with('success', 'تم إضافة الفرد بنجاح');
    }

    // ✏️ صفحة التعديل
    public function edit($id)
    {
        $member = FamilyMember::findOrFail($id);
        $members = FamilyMember::where('id', '!=', $id)->get(); // منع اختيار نفسه كأب

        return view('backoffice.family-members.edit', compact('member', 'members'));
    }

    // 🔄 تحديث
    public function update(Request $request, $id)
    {
        $member = FamilyMember::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:family_members,id',
        ]);

        // منع ربط الشخص بنفسه
        if ($request->parent_id == $member->id) {
            return back()->withErrors(['parent_id' => 'لا يمكن اختيار نفس الشخص كأب']);
        }

        $member->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()
            ->route('family-members.index')
            ->with('success', 'تم تحديث البيانات');
    }

    // 🗑️ حذف
    public function destroy($id)
    {
        $member = FamilyMember::findOrFail($id);

        $member->delete(); // cascade يحذف الأبناء إذا مفعل في migration

        return redirect()
            ->route('family-members.index')
            ->with('success', 'تم حذف الفرد');
    }
}
