<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('عرض المهنيين') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <div class="my-4">

                <a href="{{ route('professional-request.create') }}"
                    class="px-4 py-2 bg-black text-primary-foreground rounded-md text-sm font-medium hover:bg-black/80 ">
                    {{ __('اضافة مهني جديد') }}</a>
            </div>

            {{-- GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($professionalRequests as $request)
                    <div class="glass-card p-5 relative">
                        @if (auth()->check() && (auth()->user()->role ?? '') === 'admin')
                            <div class="absolute top-0 left-0 flex gap-2 p-3">
                                <form action="{{ route('professional-request.approve', $request->id) }}" method="POST">
                                    @csrf
                                    <button
                                        class="inline-flex items-center gap-1 bg-green-700 hover:bg-green-900 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-sm transition">
                                        ✓ قبول
                                    </button>
                                </form>

                                <form action="{{ route('professional-request.reject', $request->id) }}" method="POST">
                                    @csrf
                                    <button
                                        class="inline-flex items-center gap-1 bg-red-600 hover:bg-red-800 text-white text-sm font-medium px-3 py-2 rounded-lg shadow-sm transition">
                                        رفض
                                    </button>
                                </form>
                            </div>
                        @endif
                        {{-- <a href=""
                            class="bg-green-600 rounded px-3 py-1 text-white absolute top-0 left-0">الموافقة</a> --}}


                        <h3 class="font-bold text-lg">
                            {{ $request->user->name ?? 'بدون اسم' }}
                        </h3>

                        <p>
                            {{ $request->profession->name ?? '' }}
                        </p>

                        <p>
                            {{ $request->phone_number }}
                        </p>

                        <p>
                            {{ $request->address }}
                        </p>


                        <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded">
                            {{ $request->status }}</span>


                    </div>
                @endforeach

            </div>

        </div>
    </div>
</x-app-layout>
