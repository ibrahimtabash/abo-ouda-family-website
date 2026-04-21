<x-layout>
    <div class="py-12">
        <div class="section-container">

            {{-- TITLE --}}
            <div class="flex items-center justify-between mb-8">

                <div>
                    <h1 class="text-3xl font-bold text-foreground mb-2">
                        شركات العائلة
                    </h1>

                    <p class="text-muted-foreground">
                        المشاريع والأعمال التجارية لأبناء عائلة أبو عودة
                    </p>
                </div>

                {{-- زر إضافة شركة --}}
                @auth
                    <button onclick="document.getElementById('companyModal').classList.remove('hidden')"
                        class="px-5 py-3 rounded-xl bg-primary text-white font-medium hover:opacity-90 transition">
                        إضافة شركة
                    </button>
                @endauth

            </div>

            {{-- رسائل النجاح / الخطأ --}}
            @if (session('success'))
                <div class="mb-6 rounded-xl bg-green-50 border border-green-200 px-4 py-3 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            {{-- GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                @forelse ($companies as $company)
                    <div class="glass-card p-6 transition-all duration-300 hover:-translate-y-1">

                        {{-- NAME --}}
                        <h3 class="font-bold text-foreground text-xl mb-2">
                            {{ $company->name }}
                        </h3>

                        {{-- DESCRIPTION --}}
                        <p class="text-muted-foreground text-sm mb-4">
                            {{ $company->description ?: 'لا يوجد وصف' }}
                        </p>

                        {{-- ADDRESS --}}
                        <p class="text-sm text-muted-foreground mb-3">
                            {{ $company->address ?: 'لا يوجد عنوان' }}
                        </p>

                        {{-- CONTACT --}}
                        <p class="text-sm text-primary flex items-center gap-2">
                            <x-icons.phone />
                            {{ $company->phone ?: 'لا يوجد رقم تواصل' }}
                        </p>

                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="glass-card p-8 text-center">
                            <p class="text-muted-foreground text-lg">
                                لا توجد شركات مضافة حالياً
                            </p>
                        </div>
                    </div>
                @endforelse

            </div>

        </div>
    </div>

    {{-- Modal إضافة شركة --}}
    <div id="companyModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-2xl p-8 w-full max-w-xl">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">
                    إضافة شركة جديدة
                </h2>

                <button onclick="document.getElementById('companyModal').classList.add('hidden')"
                    class="text-gray-500 hover:text-black">
                    ✕
                </button>
            </div>

            <form method="POST" action="{{ route('company-requests.store') }}">
                @csrf

                <div class="space-y-4">

                    <input type="text" name="name" placeholder="اسم الشركة"
                        class="w-full rounded-xl border px-4 py-3" required>

                    <textarea name="description" placeholder="وصف الشركة" class="w-full rounded-xl border px-4 py-3" rows="4"></textarea>

                    <input type="text" name="address" placeholder="العنوان"
                        class="w-full rounded-xl border px-4 py-3">

                    <input type="text" name="phone" placeholder="رقم التواصل"
                        class="w-full rounded-xl border px-4 py-3">

                    <button type="submit" class="w-full rounded-xl bg-primary text-white py-3 font-medium">
                        إرسال الطلب
                    </button>

                </div>
            </form>

        </div>
    </div>
</x-layout>
