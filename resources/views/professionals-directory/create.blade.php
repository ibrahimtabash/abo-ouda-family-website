<x-layout>
    <div class="py-12" x-data="{ cat: 'all' }">
        <div class="section-container">
            @if (session('error'))
                <div class="bg-red-400 text-white p-2 rounded">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="bg-green-400 text-white p-2 rounded">
                    {{ session('error') }}
                </div>
            @endif
            {{-- TITLE --}}
            <h1 class="text-3xl font-bold text-foreground mb-4">
                دليل المهنيين
            </h1>

            <p class="text-muted-foreground mb-8">
                الانضمام الى دليل المهنيين
            </p>



            <form action="{{ route('professional.request.store') }}" method="POST" class="space-y-4">
                @csrf

                {{-- المهنة --}}
                <div>
                    <label class="block text-sm font-medium">المهنة</label>
                    <select name="profession_id" required class="w-full border rounded p-2">
                        @foreach ($professions as $profession)
                            <option value="{{ $profession->id }}">
                                {{ $profession->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- رقم الجوال --}}
                <div>
                    <label class="block text-sm font-medium">رقم الجوال</label>
                    <input type="text" name="phone_number"
                        value="{{ old('phone_number', auth()->user()->phone_number ?? null) }}" required
                        class="w-full border rounded p-2">
                </div>

                {{-- العنوان --}}
                <div>
                    <label class="block text-sm font-medium">العنوان</label>
                    <input type="text" name="address" value="{{ old('address', auth()->user()->address ?? null) }}"
                        class="w-full border rounded p-2">
                </div>

                <button class="px-4 py-2 bg-primary text-white rounded">
                    إرسال الطلب
                </button>
            </form>
        </div>
    </div>
</x-layout>
