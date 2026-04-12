<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">إدارة شجرة العائلة</h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-6">تعديل فرد</h1>

            <form action="{{ route('family-members.update', $member->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- الاسم --}}
                <div class="mb-4">
                    <label class="block mb-1">الاسم</label>
                    <input type="text" name="name" value="{{ $member->name }}" class="w-full border rounded-lg p-2"
                        required>
                </div>

                {{-- الأب --}}
                <div class="mb-4">
                    <label class="block mb-1">الأب</label>
                    <select name="parent_id" class="w-full border rounded-lg p-2">
                        <option value="">-- بدون (الجد الأعلى) --</option>

                        @foreach ($members as $m)
                            <option value="{{ $m->id }}" {{ $member->parent_id == $m->id ? 'selected' : '' }}>
                                {{ $m->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="bg-primary text-white px-4 py-2 rounded-lg">
                    تحديث
                </button>

            </form>

        </div>
    </div>
</x-app-layout>
