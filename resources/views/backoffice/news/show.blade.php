<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $news->title }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-sm text-gray-500">By {{ optional($news->user)->name ?? '—' }} •
                        {{ $news->created_at->toDayDateTimeString() }}</p>
                    <div class="mt-4 flex flex-col gap-4">
                        <h1 class=" font-bold text-xl">{{ $news->title }}</h1>
                        <div class="">
                            {!! nl2br(e($news->content)) !!}
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('backoffice.news.edit', $news->id) }}"
                            class="text-blue-500 hover:text-blue-700">تعديل</a>
                        <form action="{{ route('backoffice.news.publish', $news->id) }}" method="POST"
                            style="display:inline">
                            @csrf
                            <button class="bg-green-600 text-white px-3 py-1 rounded">قبول</button>
                        </form>

                        <form action="{{ route('backoffice.news.reject', $news->id) }}" method="POST"
                            style="display:inline" class="ml-2">
                            @csrf
                            <button class="bg-red-600 text-white px-3 py-1 rounded">رفض</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
