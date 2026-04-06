<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Pending News') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <div class="my-4">
                {{-- pending news link --}}
                <a href="{{ route('backoffice.news.index') }}"
                    class="px-4 py-2 bg-black text-primary-foreground rounded-md text-sm font-medium hover:bg-black/80 ">
                    {{ __('All News') }}
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($news->isEmpty())
                        <p>{{ __('No pending news.') }}</p>
                    @else
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="text-right px-2 py-1">
                                    <th class="px-2 py-1">العنوان</th>
                                    <th class="px-2 py-1">المؤلف</th>
                                    <th class="px-2 py-1">تم الإرسال</th>
                                    <th class="px-2 py-1">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $item)
                                    <tr class="border-t">
                                        <td class="px-2 py-2">
                                            <a href="{{ route('backoffice.news.show', $item->id) }}"
                                                class="text-blue-600">{{ $item->title }}</a>
                                        </td>
                                        <td class="px-2 py-2">{{ optional($item->user)->name ?? '—' }}</td>
                                        <td class="px-2 py-2">{{ $item->created_at->diffForHumans() }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center gap-2">

                                                <form action="{{ route('backoffice.news.publish', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button
                                                        class="inline-flex items-center gap-1 bg-green-700 hover:bg-green-900 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-sm transition">
                                                        ✓ قبول
                                                    </button>
                                                </form>

                                                <form action="{{ route('backoffice.news.reject', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button
                                                        class="inline-flex items-center gap-1 bg-red-700 hover:bg-red-900 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-sm transition">
                                                        ✕ رفض
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
