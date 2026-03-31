<x-layout>


    @php
        $galleryImages = [
            [
                'id' => 1,
                'src' => 'https://picsum.photos/600?random=1',
                'title' => 'اجتماع العائلة',
            ],
            [
                'id' => 2,
                'src' => 'https://picsum.photos/600?random=2',
                'title' => 'مناسبة سعيدة',
            ],
            [
                'id' => 3,
                'src' => 'https://picsum.photos/600?random=3',
                'title' => 'لقاء الأجيال',
            ],
            [
                'id' => 4,
                'src' => 'https://picsum.photos/600?random=4',
                'title' => 'رحلة عائلية',
            ],
            [
                'id' => 5,
                'src' => 'https://picsum.photos/600?random=4',
                'title' => 'رحلة عائلية',
            ],
            [
                'id' => 6,
                'src' => 'https://picsum.photos/600?random=4',
                'title' => 'رحلة عائلية',
            ],
            [
                'id' => 7,
                'src' => 'https://picsum.photos/600?random=4',
                'title' => 'رحلة عائلية',
            ],
        ];
    @endphp

    <div class="py-12" x-data="igGallery()" @keydown.escape.window="close()" @keydown.arrow-right.window="next()"
        @keydown.arrow-left.window="prev()">

        <div class="section-container">

            {{-- TITLE --}}
            <h1 class="text-3xl font-bold mb-4">معرض الصور</h1>
            <p class="text-muted-foreground mb-8">لحظات من حياة العائلة</p>

            {{-- MASONRY GRID --}}
            <div class="columns-2 md:columns-4 gap-4 space-y-4">

                @foreach ($galleryImages as $index => $img)
                    <div class="break-inside-avoid relative cursor-pointer group rounded-xl overflow-hidden"
                        @click="open({{ $index }})">

                        <img src="{{ $img['src'] }}"
                            class="w-full object-cover rounded-xl transition duration-300 group-hover:scale-105"
                            loading="lazy">

                        {{-- overlay --}}
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition flex items-end p-3">
                            <span class="text-white text-sm opacity-0 group-hover:opacity-100">
                                {{ $img['title'] }}
                            </span>
                        </div>

                    </div>
                @endforeach

            </div>

        </div>

        {{-- LIGHTBOX --}}
        <template x-if="openIndex !== null">
            <div class="fixed inset-0 bg-black/95 z-50 flex items-center justify-center p-4" @click="close()">

                <div class="relative max-w-6xl w-full flex flex-col items-center" @click.stop>

                    {{-- IMAGE --}}
                    <div class="relative">

                        <img :src="images[openIndex].src"
                            class="max-h-[80vh] w-auto rounded-lg shadow-2xl transition duration-300"
                            :class="{ 'scale-110': zoom }" @click="zoom = !zoom">

                        {{-- CLOSE --}}
                        <button class="absolute top-2 left-2 text-white text-2xl" @click="close()">
                            ✕
                        </button>

                        {{-- NAV --}}
                        <button class="absolute right-2 top-1/2 text-white text-4xl" @click="prev()">
                            ‹
                        </button>

                        <button class="absolute left-2 top-1/2 text-white text-4xl" @click="next()">
                            ›
                        </button>

                    </div>

                    {{-- INFO --}}
                    <div class="mt-4 text-center text-white">
                        <p class="text-lg font-medium" x-text="images[openIndex].title"></p>
                        <p class="text-sm text-white/60" x-text="(openIndex + 1) + ' / ' + images.length"></p>
                    </div>

                </div>
            </div>
        </template>

    </div>

    <script>
        function igGallery() {
            return {
                openIndex: null,
                zoom: false,

                images: @json($galleryImages),

                open(i) {
                    this.openIndex = i
                    this.zoom = false
                },

                close() {
                    this.openIndex = null
                    this.zoom = false
                },

                next() {
                    if (this.openIndex === null) return
                    this.openIndex = (this.openIndex + 1) % this.images.length
                },

                prev() {
                    if (this.openIndex === null) return
                    this.openIndex =
                        (this.openIndex - 1 + this.images.length) % this.images.length
                }
            }
        }
    </script>
</x-layout>
