<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">جميع الأخبار</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-3 bg-green-50 text-green-700 rounded-lg border border-green-200 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="my-4">
                @if (request()->input('is_published') == 'true')
                    <a href="{{ route('backoffice.news.index', ['is_published' => 'false']) }}"
                        class="px-4 py-2 bg-black text-white rounded-md text-sm font-medium hover:bg-black/80 transition">
                        {{ __('Pending News') }}
                    </a>
                @else
                    <a href="{{ route('backoffice.news.index', ['is_published' => 'true']) }}"
                        class="px-4 py-2 bg-black text-white rounded-md text-sm font-medium hover:bg-black/80 transition">
                        {{ __('All News') }}
                    </a>
                @endif

            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 text-gray-900">
                    @if ($news->isEmpty())
                        <p class="text-gray-500 text-center py-8">{{ __('No news.') }}</p>
                    @else
                        {{-- ===== موبايل: بطاقات ===== --}}
                        <div class="flex flex-col gap-4 sm:hidden">
                            @foreach ($news as $item)
                                <div class="border border-gray-200 rounded-xl p-4 flex flex-col gap-3">


                                    {{-- العنوان والحالة --}}
                                    <div class="flex items-start justify-between gap-2">
                                        <a href="{{ route('backoffice.news.show', $item->id) }}"
                                            class="font-semibold text-blue-600 text-base leading-snug line-clamp-2">
                                            {{ $item->title }}
                                        </a>
                                        @if ($item->is_published)
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded shrink-0">Published</span>
                                        @else
                                            <span
                                                class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded shrink-0">Pending</span>
                                        @endif
                                    </div>

                                    {{-- المؤلف والتاريخ --}}
                                    <div class="text-sm text-gray-500 flex items-center gap-3">
                                        <span>{{ optional($item->user)->name ?? '—' }}</span>
                                        <span class="text-gray-300">•</span>
                                        <span>{{ $item->created_at->diffForHumans() }}</span>
                                    </div>

                                    {{-- الأزرار --}}
                                    <div class="flex gap-2 pt-1">
                                        @if (request()->input('is_published') == 'true')
                                            <a href="{{ route('backoffice.news.show', $item->id) }}"
                                                class="flex-1 text-center bg-blue-700 hover:bg-blue-900 text-white text-sm font-medium px-3 py-2 rounded-lg transition">
                                                ✎ عرض / تعديل
                                            </a>
                                            <form action="{{ route('backoffice.news.destroy', $item->id) }}"
                                                method="POST" class="flex-1"
                                                onsubmit="return confirm('Are you sure you want to delete this news?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-full bg-red-700 hover:bg-red-900 text-white text-sm font-medium px-3 py-2 rounded-lg transition">
                                                    ✕ حذف
                                                </button>
                                            </form>
                                        @else
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
                                        @endif
                                    </div>

                                </div>
                            @endforeach
                        </div>

                        {{-- ===== ديسكتوب: جدول ===== --}}
                        <div class="hidden sm:block overflow-x-auto">
                            <table class="w-full table-auto text-right">
                                <thead>
                                    <tr class="border-b border-gray-200 text-gray-600 text-sm">
                                        <th class="px-3 py-3 font-medium">العنوان</th>
                                        <th class="px-3 py-3 font-medium">المؤلف</th>
                                        <th class="px-3 py-3 font-medium">تم الإرسال</th>
                                        <th class="px-3 py-3 font-medium">الحالة</th>
                                        <th class="px-3 py-3 font-medium">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $item)
                                        <tr class="border-t border-gray-100 hover:bg-gray-50 transition">
                                            <td class="px-3 py-3 max-w-xs">
                                                <a href="{{ route('backoffice.news.show', $item->id) }}"
                                                    class="text-blue-600 hover:underline font-medium line-clamp-1">
                                                    {{ $item->title }}
                                                </a>
                                            </td>
                                            <td class="px-3 py-3 text-gray-600 text-sm whitespace-nowrap">
                                                {{ optional($item->user)->name ?? '—' }}
                                            </td>
                                            <td class="px-3 py-3 text-gray-500 text-sm whitespace-nowrap">
                                                {{ $item->created_at->diffForHumans() }}
                                            </td>
                                            <td class="px-3 py-3 whitespace-nowrap">
                                                @if ($item->is_published)
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Published</span>
                                                @else
                                                    <span
                                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Pending</span>
                                                @endif
                                            </td>
                                            <td class="px-3 py-3 whitespace-nowrap">
                                                @if (request()->input('is_published') == 'true')
                                                    <div class="flex items-center gap-2">
                                                        <a href="{{ route('backoffice.news.show', $item->id) }}"
                                                            class="inline-flex items-center gap-1 bg-blue-700 hover:bg-blue-900 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                                                            ✎ عرض / تعديل
                                                        </a>
                                                        <form
                                                            action="{{ route('backoffice.news.destroy', $item->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this news?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="inline-flex items-center gap-1 bg-red-700 hover:bg-red-900 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-sm transition">
                                                                ✕ حذف
                                                            </button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <div class="flex items-center gap-2">

                                                        <form
                                                            action="{{ route('backoffice.news.publish', $item->id) }}"
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
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- ===== Pagination ===== --}}
                        @if ($news->hasPages())
                            <div class="mt-6 border-t border-gray-100 pt-4">
                                {{ $news->links() }}
                            </div>
                        @endif

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
