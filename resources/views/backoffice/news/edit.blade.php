<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $news->title }}</h2>
    </x-slot>

    {{-- NEWS FORM --}}
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('news.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">عنوان الخبر</label>
                <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-primary focus:border-primary">
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">محتوى الخبر</label>
                <textarea name="content" id="content" rows="4" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-primary focus:border-primary">{{ old('title', $news->content) }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">صورة الخبر</label>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-primary focus:border-primary">
            </div>


            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-dark">تعديل
                    الخبر</button>
            </div>
        </form>

    </div>

</x-app-layout>
