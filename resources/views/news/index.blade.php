<x-layout>
    <div x-data="{ open: false, selected: {} }" class="py-12">

        <div class="section-container">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            <div class="flex items-center justify-between  mb-8">
                {{-- TITLE --}}
                <h1 class="text-3xl font-bold text-foreground">
                    أخبار العائلة
                </h1>
                <a href="{{ route('news.create') }}"
                    class="px-4 py-2 bg-black text-primary-foreground rounded-md text-sm font-medium hover:bg-black/80 flex items-center gap-2">
                    <x-icons.pencil /> إضافة خبر
                </a>
            </div>

            {{-- FILTERS --}}
            <div class="flex gap-2 mb-8 flex-wrap">
                <button class="px-4 py-2 rounded-full text-sm font-medium bg-primary text-primary-foreground">
                    الكل
                </button>
                <button
                    class="px-4 py-2 rounded-full text-sm font-medium bg-muted text-muted-foreground hover:bg-muted/80">
                    مناسبات
                </button>
                <button
                    class="px-4 py-2 rounded-full text-sm font-medium bg-muted text-muted-foreground hover:bg-muted/80">
                    إنجازات
                </button>
                <button
                    class="px-4 py-2 rounded-full text-sm font-medium bg-muted text-muted-foreground hover:bg-muted/80">
                    وفيات
                </button>
            </div>

            {{-- NEWS GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-4">
                @foreach ($news as $post)
                    <div class="glass-card overflow-hidden cursor-pointer group flex flex-col h-full">

                        <div class="h-48 overflow-hidden">
                            <img src="https://picsum.photos/400/300?random=5"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                        </div>

                        <div class="p-5 flex flex-col flex-1">

                            <p class="text-xs text-muted-foreground mb-2">
                                {{ $post->created_at->format('Y/m/d') }}
                            </p>

                            <h3 class="font-bold text-foreground mb-2 line-clamp-2 min-h-[2.5rem]">
                                {{ $post->title }}
                            </h3>

                            <p class="text-sm text-muted-foreground line-clamp-3 min-h-[3.5rem]">
                                {{ Str::words($post->content, 15, '...') }}
                            </p>

                            <div class="flex items-center justify-between mt-auto pt-2">
                                <a href="{{ route('news.show', $post) }}"
                                    class="text-primary text-sm font-medium hover:underline">
                                    قراءة المزيد
                                </a>

                                <a href="{{ route('news.edit', $post->id) }}">
                                    <x-icons.edit />
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

            {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @for ($i = 0; $i < 6; $i++)
                    <div @click="
                        open = true;
                        selected = {
                            title: 'عنوان خبر {{ $i }}',
                            date: '{{ now()->format('Y/m/d') }}',
                            image: 'https://picsum.photos/600/400?random={{ $i }}',
                            excerpt: 'هذا نص كامل للخبر يمكن استبداله لاحقاً.'
                        }
                    "
                        class="glass-card overflow-hidden cursor-pointer group">

                        <div class="h-48 overflow-hidden">
                            <img src="https://picsum.photos/400/300?random={{ $i }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                        </div>

                        <div class="p-5">
                            <p class="text-xs text-muted-foreground mb-2">
                                {{ now()->format('Y/m/d') }}
                            </p>

                            <h3 class="font-bold text-foreground mb-2">
                                عنوان خبر تجريبي {{ $i }}
                            </h3>

                            <p class="text-sm text-muted-foreground line-clamp-2">
                                هذا نص تجريبي لخبر من أخبار العائلة يمكن تعديله لاحقاً.
                            </p>
                        </div>

                    </div>
                @endfor

            </div> --}}
        </div>

        {{-- MODAL --}}
        <div x-show="open" x-transition
            class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4"
            @click="open = false">

            <div class="bg-card rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto" @click.stop>

                <img :src="selected.image" class="w-full h-64 object-cover rounded-t-xl" />

                <div class="p-6">

                    <div class="flex justify-between items-start mb-4">
                        <h2 class="text-xl font-bold text-foreground" x-text="selected.title"></h2>

                        <button @click="open = false" class="text-muted-foreground hover:text-foreground text-xl">
                            ✕
                        </button>
                    </div>

                    <p class="text-sm text-muted-foreground mb-4" x-text="selected.date"></p>

                    <p class="text-foreground leading-relaxed" x-text="selected.excerpt"></p>

                </div>

            </div>

        </div>

    </div>
</x-layout>
