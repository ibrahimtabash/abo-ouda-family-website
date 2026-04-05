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
                <a href="{{ route('news.index') }}"
                    class="px-4 py-2 bg-black text-primary-foreground rounded-md text-sm font-medium hover:bg-black/80 flex items-center gap-2">
                    <x-icons.arrowLeft /> العودة إلى الأخبار
                </a>
            </div>

            {{-- NEWS DETAILS --}}
            <div class="glass-card p-6">
                <div class="h-64 overflow-hidden mb-4">
                    <img src="https://picsum.photos/600/400?random=5" class="w-full h-full object-cover" />
                </div>

                <p class="text-xs text-muted-foreground mb-2">
                    {{ $news->created_at->format('Y/m/d') }}
                </p>

                <h3 class="font-bold text-foreground mb-2 text-2xl">
                    {{ $news->title }}
                </h3>

                <p class="text-sm text-muted-foreground">
                    {{ $news->content }}
                </p>
            </div>





        </div>
</x-layout>
