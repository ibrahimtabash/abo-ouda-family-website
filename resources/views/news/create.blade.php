<x-layout>
    <div x-data="{ open: false, selected: {} }" class="py-12">

        <div class="section-container">

            <div class="flex items-center justify-between  mb-8">
                {{-- TITLE --}}
                <h1 class="text-3xl font-bold text-foreground">
                    أخبار العائلة
                </h1>
                <a href="{{ route('news.index') }}"
                    class="px-4 py-2 bg-black text-primary-foreground rounded-md text-sm font-medium hover:bg-black/80 flex items-center gap-2">
                    <x-icons.arrowLeft /> العودة إلى الأخبار
                </a>
            </div>

            {{-- NEWS FORM --}}
            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('news.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">عنوان الخبر</label>
                        <input type="text" name="title" id="title" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-primary focus:border-primary">
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">محتوى الخبر</label>
                        <textarea name="content" id="content" rows="4" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-primary focus:border-primary"></textarea>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">صورة الخبر</label>
                        <input type="file" name="image" id="image"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-primary focus:border-primary">
                    </div>

                    <div>
                        <button type="submit"
                            class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-dark">إضافة
                            الخبر</button>
                    </div>
                </form>

            </div>



        </div>
</x-layout>
