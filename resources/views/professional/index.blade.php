<x-layout>
    <div class="py-12" x-data="{ cat: 'all' }">
        <div class="section-container">

            {{-- TITLE --}}
            <h1 class="text-3xl font-bold text-foreground mb-4">
                دليل المهنيين
            </h1>

            <p class="text-muted-foreground mb-8">
                تواصل مع أبناء العائلة من أصحاب المهن والتخصصات
            </p>

            @php
                $categories = [
                    ['key' => 'all', 'label' => 'الكل'],
                    ['key' => 'doctor', 'label' => 'أطباء'],
                    ['key' => 'engineer', 'label' => 'مهندسين'],
                    ['key' => 'lawyer', 'label' => 'محامين'],
                ];

                $professionals = [
                    [
                        'id' => 1,
                        'name' => 'أحمد أبو عودة',
                        'profession' => 'طبيب أسنان',
                        'category' => 'doctor',
                        'location' => 'نابلس',
                        'contact' => '0599123456',
                    ],
                    [
                        'id' => 2,
                        'name' => 'محمد أبو عودة',
                        'profession' => 'مهندس برمجيات',
                        'category' => 'engineer',
                        'location' => 'رام الله',
                        'contact' => '0599876543',
                    ],
                    [
                        'id' => 3,
                        'name' => 'خالد أبو عودة',
                        'profession' => 'محامي',
                        'category' => 'lawyer',
                        'location' => 'غزة',
                        'contact' => '0599001122',
                    ],
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

                @foreach ($professionals as $i => $p)
                    <div x-data x-show="cat === 'all' || cat === '{{ $p['category'] }}'" x-transition
                        class="glass-card p-5">

                        <h3 class="font-bold text-foreground text-lg">
                            {{ $p['name'] }}
                        </h3>

                        <p class="text-primary font-medium text-sm mt-1">
                            {{ $p['profession'] }}
                        </p>

                        <div class="mt-4 space-y-2 text-sm text-muted-foreground">

                            <p class="flex items-center gap-2">
                                <x-icons.map-pin /> {{ $p['location'] }}
                            </p>

                            <p class="flex items-center gap-2">
                                <x-icons.phone /> {{ $p['contact'] }}
                            </p>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </div>
</x-layout>
