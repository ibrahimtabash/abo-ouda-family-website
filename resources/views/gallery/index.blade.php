<x-layout>

    <div class="py-12" x-data="galleryApp()" @keydown.escape.window="closeAll()"
        @keydown.arrow-right.window="nextImage()" @keydown.arrow-left.window="prevImage()">

        <div class="section-container">

            {{-- HEADER --}}
            <div class="flex justify-between items-center mb-6">

                <div>
                    <h1 class="text-3xl font-bold">معرض الصور</h1>
                    <p class="text-muted-foreground">لحظات من حياة العائلة</p>
                </div>

                @auth
                    @if (auth()->user()->role === 'admin')
                        <button @click="openModal = true" class="px-4 py-2 bg-primary text-white rounded-lg">
                            + إضافة ألبوم
                        </button>
                    @endif
                @endauth

            </div>

            {{-- ALBUMS GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($albums as $album)

                    <div class="glass-card p-4 rounded-2xl cursor-pointer hover:shadow-lg transition h-full flex flex-col"
                        @click="openAlbum(@js($album))">

                        {{-- TITLE --}}
                        <div class="flex justify-between items-center mb-3">
                            <h2 class="font-bold text-lg">
                                {{ $album->title }}
                            </h2>

                            <span class="text-xs bg-muted px-2 py-1 rounded-full">
                                {{ $album->images->count() }} صور
                            </span>
                        </div>

                        {{-- PREVIEW --}}
                        <div class="grid grid-cols-2 gap-2">

                            @foreach ($album->images->take(4) as $img)
                                <div class="aspect-square rounded-lg overflow-hidden">
                                    <img src="{{ asset('storage/' . $img->image) }}" class="w-full h-full object-cover">
                                </div>
                            @endforeach

                        </div>

                        {{-- STATIC DESCRIPTION --}}
                        <p class="text-sm text-muted-foreground mt-auto pt-3">
                            ألبوم عائلي يحتوي على لحظات جميلة ومناسبات مميزة
                        </p>

                    </div>

                @empty

                    <div class="col-span-full text-center text-muted-foreground">
                        لا يوجد ألبومات حالياً
                    </div>

                @endforelse

            </div>

        </div>


        {{-- ================= ALBUM MODAL ================= --}}
        <template x-if="selectedAlbum">

            <div class="fixed inset-0 bg-black/90 z-50 flex items-center justify-center p-4" @click="closeAll()">

                <div class="bg-white w-full max-w-4xl rounded-xl p-6" @click.stop>

                    {{-- HEADER --}}
                    <div class="flex justify-between mb-4">
                        <div>
                            <h2 class="text-xl font-bold" x-text="selectedAlbum.title"></h2>
                            <p class="text-sm text-gray-500">
                                ألبوم يحتوي على لحظات عائلية جميلة
                            </p>
                        </div>

                        <button @click="closeAll()">✕</button>
                    </div>
                    {{-- ADMIN BUTTON (INSIDE MODAL) --}}
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <div class="mb-4 flex gap-2">

                                <button class="px-3 py-1 bg-green-600 text-white text-sm rounded"
                                    @click="document.getElementById('uploadInput').click()">
                                    + إضافة صورة
                                </button>

                                <button class="text-xs bg-blue-600 text-white px-2 py-1 rounded"
                                    @click.stop="editAlbum(selectedAlbum)">
                                    تعديل
                                </button>

                                <form method="POST" :action="'/gallery/albums/' + selectedAlbum.id + '/images'"
                                    enctype="multipart/form-data" class="hidden">

                                    @csrf

                                    <input id="uploadInput" type="file" name="image" @change="$el.form.submit()">

                                </form>

                            </div>
                        @endif
                    @endauth
                    {{-- IMAGES GRID --}}
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">

                        <template x-for="(img, index) in selectedAlbum.images" :key="img.id">

                            <div class="relative aspect-square overflow-hidden rounded-lg group cursor-pointer">

                                <img :src="'/storage/' + img.image"
                                    class="w-full h-full object-cover group-hover:scale-105 transition"
                                    @click="openImage(index)">

                                {{-- DELETE (admin only) --}}
                                @auth
                                    @if (auth()->user()->role === 'admin')
                                        <form method="POST" :action="'/gallery/images/' + img.id"
                                            class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition">

                                            @csrf
                                            @method('DELETE')

                                            <button class="bg-red-600 text-white text-xs px-2 py-1 rounded">
                                                حذف
                                            </button>

                                        </form>
                                    @endif
                                @endauth

                            </div>

                        </template>

                    </div>
                </div>


            </div>

            @auth
                @if (auth()->user()->role === 'admin')
                    <div class="flex gap-2 mb-4">

                        <button class="px-3 py-1 bg-green-600 text-white text-sm rounded"
                            @click="document.getElementById('uploadInput').click()">
                            + إضافة صورة
                        </button>

                        <form method="POST" :action="'/gallery/albums/' + selectedAlbum.id + '/images'"
                            enctype="multipart/form-data" class="hidden">

                            @csrf

                            <input id="uploadInput" type="file" name="image" @change="$el.form.submit()">

                        </form>

                    </div>
                @endif
            @endauth
        </template>

        <template x-if="editModal">
            <div class="fixed inset-0 bg-black/60 z-50 flex items-center justify-center p-4" @click="editModal = false">

                <div class="bg-white w-full max-w-lg rounded-xl p-6" @click.stop>

                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold">تعديل الألبوم</h2>
                        <button @click="editModal = false">✕</button>
                    </div>

                    <form :action="'/gallery/albums/' + editAlbumData.id" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- TITLE --}}
                        <label class="block text-sm mb-1">عنوان الألبوم</label>
                        <input type="text" name="title" class="w-full border rounded p-2 mb-4"
                            x-model="editAlbumData.title" required>

                        <button class="w-full bg-blue-600 text-white py-2 rounded">
                            حفظ التعديل
                        </button>

                    </form>

                </div>
            </div>
        </template>
        {{-- ================= IMAGE LIGHTBOX ================= --}}
        <template x-if="activeImage !== null">
            <div class="fixed inset-0 bg-black/95 z-[60] flex items-center justify-center" @click="closeImage()">

                <div class="relative max-w-5xl w-full flex justify-center" @click.stop>

                    <img :src="'/storage/' + selectedAlbum.images[activeImage].image" class="max-h-[85vh] rounded-lg">

                    {{-- close --}}
                    <button class="absolute top-3 left-3 text-white text-2xl" @click="closeImage()">✕</button>

                    {{-- prev --}}
                    <button class="absolute left-3 top-1/2 text-white text-4xl" @click="prevImage()">‹</button>

                    {{-- next --}}
                    <button class="absolute right-3 top-1/2 text-white text-4xl" @click="nextImage()">›</button>

                </div>

            </div>
        </template>

        {{-- ================= ADD ALBUM MODAL ================= --}}
        <template x-if="openModal">
            <div class="fixed inset-0 bg-black/60 z-50 flex items-center justify-center p-4" @click="openModal = false">

                <div class="bg-white w-full max-w-lg rounded-xl p-6" @click.stop>

                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold">إضافة ألبوم</h2>

                        <button @click="openModal = false">✕</button>
                    </div>

                    <form method="POST" action="{{ route('gallery.albums.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="block text-sm mb-1">عنوان الألبوم</label>
                            <input type="text" name="title" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-3">
                            <label class="block text-sm mb-1">الصور</label>
                            <input type="file" name="images[]" multiple class="w-full border rounded p-2">
                        </div>

                        <button class="w-full bg-primary text-white py-2 rounded">
                            حفظ
                        </button>

                    </form>

                </div>
            </div>
        </template>
        {{-- ================= ALPINE ================= --}}
        <script>
            function galleryApp() {
                return {
                    openModal: false,

                    selectedAlbum: null,
                    activeImage: null,

                    editModal: false,
                    editAlbumData: null,

                    editAlbum(album) {
                        this.editAlbumData = album
                        this.editModal = true
                    },

                    openAlbum(album) {
                        this.selectedAlbum = album
                    },

                    closeAll() {
                        this.selectedAlbum = null
                        this.activeImage = null
                    },

                    openImage(i) {
                        this.activeImage = i
                    },

                    closeImage() {
                        this.activeImage = null
                    },

                    nextImage() {
                        if (this.activeImage === null) return
                        this.activeImage =
                            (this.activeImage + 1) % this.selectedAlbum.images.length
                    },

                    prevImage() {
                        if (this.activeImage === null) return
                        this.activeImage =
                            (this.activeImage - 1 + this.selectedAlbum.images.length) %
                            this.selectedAlbum.images.length
                    }
                }
            }
        </script>

    </div>

</x-layout>
