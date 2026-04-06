<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @php $pending = \App\Models\News::where('is_published', false)->count(); @endphp
                    <p class="mb-4">Welcome to the backoffice. Use the links below to manage content.</p>
                    <a href="{{ route('backoffice.news.pending') }}"
                        class="inline-block bg-blue-600 text-white px-4 py-2 rounded">Pending News
                        ({{ $pending }})</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
