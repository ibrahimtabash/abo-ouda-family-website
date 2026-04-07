<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('عرض المهارات') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif


            <div class="my-4">
                {{-- جميع المهن --}}
                <a href="{{ route('professions.create') }}"
                    class="px-4 py-2 bg-black text-primary-foreground rounded-md text-sm font-medium hover:bg-black/80 ">
                    {{ __('إضافة مهنة جديدة') }}</a>
            </div>


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($professions->isEmpty())
                        <p>{{ __('No professions found.') }}</p>
                    @else
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="text-right px-2 py-1">
                                    <th class="px-2 py-1">اسم المهنة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($professions as $profession)
                                    <tr class="border-t">
                                        <td class="px-2 py-2">
                                            <a href="{{ route('professions.index', $profession->id) }}"
                                                class="text-blue-600">{{ $profession->name }}</a>
                                        </td>

                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center gap-2">

                                                {{-- edit --}}
                                                <a href="{{ route('professions.edit', $profession->id) }}"
                                                    class="inline-flex items-center gap-1 bg-blue-700 hover:bg-blue-900 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-sm transition">
                                                    ✎ تعديل
                                                </a>

                                                {{-- delete --}}
                                                <form action="{{ route('professions.destroy', $profession->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this profession?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="inline-flex items-center gap-1 bg-red-700 hover:bg-red-900 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-sm transition">
                                                        ✕ حذف
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
