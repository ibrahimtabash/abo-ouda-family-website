{{-- resources/views/backoffice/businesses/index.blade.php --}}
<x-app-layout>
    <div class="py-10">
        <div class="section-container">

            {{-- Title --}}
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-foreground">
                        طلبات إضافة الشركات
                    </h1>

                    <p class="text-muted-foreground mt-2">
                        مراجعة طلبات الشركات والموافقة عليها أو رفضها
                    </p>

                </div>
                <a href="{{ route('backoffice.businesses.index') }}"
                    class="bg-primary flex items-center gap-1.5 text-white px-4 py-2 rounded-lg">
                    جميع الشركات
                </a>
            </div>

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error Message --}}
            @if (session('error'))
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Empty State --}}
            @if ($companyRequests->isEmpty())
                <div class="glass-card p-8 text-center">
                    <p class="text-muted-foreground text-lg">
                        لا توجد طلبات شركات حالياً
                    </p>
                </div>
            @else
                {{-- Requests Table --}}
                <div class="glass-card overflow-hidden">
                    <div class="overflow-x-auto">

                        <table class="w-full text-sm">
                            <thead class="border-b bg-muted/30">
                                <tr>
                                    <th class="px-6 py-4 text-right font-semibold">
                                        اسم الشركة
                                    </th>

                                    <th class="px-6 py-4 text-right font-semibold">
                                        الوصف
                                    </th>

                                    <th class="px-6 py-4 text-right font-semibold">
                                        العنوان
                                    </th>

                                    <th class="px-6 py-4 text-right font-semibold">
                                        رقم التواصل
                                    </th>

                                    <th class="px-6 py-4 text-right font-semibold">
                                        مقدم الطلب
                                    </th>

                                    <th class="px-6 py-4 text-center font-semibold">
                                        الإجراءات
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($companyRequests as $request)
                                    <tr class="border-b last:border-0">

                                        {{-- Name --}}
                                        <td class="px-6 py-4 font-medium">
                                            {{ $request->name }}
                                        </td>

                                        {{-- Description --}}
                                        <td class="px-6 py-4 text-muted-foreground">
                                            {{ $request->description ?: '-' }}
                                        </td>

                                        {{-- Address --}}
                                        <td class="px-6 py-4">
                                            {{ $request->address ?: '-' }}
                                        </td>

                                        {{-- Phone --}}
                                        <td class="px-6 py-4">
                                            {{ $request->phone ?: '-' }}
                                        </td>

                                        {{-- User --}}
                                        <td class="px-6 py-4">
                                            {{ $request->user->name ?? '-' }}
                                        </td>

                                        {{-- Actions --}}
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-3">

                                                {{-- Approve --}}
                                                <form method="POST"
                                                    action="{{ route('company-requests.approve', $request->id) }}">
                                                    @csrf

                                                    <button type="submit"
                                                        class="rounded-xl bg-green-600 px-4 py-2 text-white text-sm font-medium hover:bg-green-700 transition">
                                                        موافقة
                                                    </button>
                                                </form>

                                                {{-- Reject --}}
                                                <form method="POST"
                                                    action="{{ route('company-requests.reject', $request->id) }}">
                                                    @csrf

                                                    <button type="submit"
                                                        class="rounded-xl bg-red-600 px-4 py-2 text-white text-sm font-medium hover:bg-red-700 transition">
                                                        رفض
                                                    </button>
                                                </form>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            @endif

        </div>
    </div>
</x-app-layout>
