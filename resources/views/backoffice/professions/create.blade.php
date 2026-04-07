<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">اضافة مهنة</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <div class="my-4">
                {{-- جميع المهن --}}
                <a href="{{ route('professions.index') }}"
                    class="px-4 py-2 bg-black text-primary-foreground rounded-md text-sm font-medium hover:bg-black/80 ">
                    {{ __('All Professions') }}</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('professions.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">اسم المهنة</label>
                            <input type="text" name="name" id="name" required
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                            @error('name')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">اضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
