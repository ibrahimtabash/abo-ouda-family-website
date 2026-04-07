<x-layout>
    <div class="py-12" x-data="{ cat: 'all' }">
        <div class="section-container">
            <div class="flex justify-between items-center mb-8 flex-wrap gap-4">
                <div>

                    {{-- TITLE --}}
                    <h1 class="text-3xl font-bold text-foreground mb-4">
                        دليل المهنيين
                    </h1>

                    <p class="text-muted-foreground mb-8">
                        تواصل مع أبناء العائلة من أصحاب المهن والتخصصات
                    </p>
                </div>
                <div>
                    {{-- Responsive CREATE BUTTON --}}
                    <a href="{{ route('professional-request.create') }}"
                        class="px-4 py-2 bg-primary text-primary-foreground rounded-md text-sm font-medium hover:bg-primary/80 ">
                        طلب إضافة مهني
                    </a>
                </div>
            </div>

            @php
                $categories = [
                    ['key' => 'all', 'label' => 'الكل'],
                    ['key' => 'doctor', 'label' => 'أطباء'],
                    ['key' => 'engineer', 'label' => 'مهندسين'],
                    ['key' => 'lawyer', 'label' => 'محامين'],
                ];
            @endphp

            {{-- FILTERS --}}
            <div class="flex gap-2 mb-8 flex-wrap">

                @foreach ($categories as $c)
                    <button @click="cat = '{{ $c['key'] }}'"
                        :class="cat === '{{ $c['key'] }}'
                            ?
                            'bg-primary text-primary-foreground' :
                            'bg-muted text-muted-foreground hover:bg-muted/80'"
                        class="px-4 py-2 rounded-full text-sm font-medium transition-colors">
                        {{ $c['label'] }}
                    </button>
                @endforeach

            </div>

            {{-- GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($professionals as $professional)
                    <div class="glass-card p-5">

                        <h3 class="font-bold text-foreground text-lg">
                            {{ $professional->user->name ?? 'بدون اسم' }}
                        </h3>

                        <p class="text-primary font-medium text-sm mt-1">
                            {{ $professional->profession->name ?? '' }}
                        </p>

                        <div class="mt-4 space-y-2 text-sm text-muted-foreground">

                            <p class="flex items-center gap-2">
                                {{ $professional->address ?? '-' }}
                            </p>

                            <p class="flex items-center gap-2">
                                {{ $professional->phone_number ?? '-' }}
                            </p>

                        </div>

                    </div>
                @empty
                    <div class="col-span-full text-center text-muted-foreground">
                        لا يوجد مهنيين معتمدين حالياً
                    </div>
                @endforelse

            </div>

        </div>
    </div>
</x-layout>
