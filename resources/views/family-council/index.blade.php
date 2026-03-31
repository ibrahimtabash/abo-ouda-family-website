<x-layout>
    <div class="py-12">
        <div class="section-container">

            {{-- TITLE --}}
            <h1 class="text-3xl font-bold text-foreground mb-4">
                مجلس العائلة
            </h1>

            <p class="text-muted-foreground mb-8">
                أعضاء مجلس عائلة أبو عودة المنتخبين
            </p>

            @php
                $councilMembers = [
                    [
                        'id' => 1,
                        'name' => 'أحمد أبو عودة',
                        'role' => 'رئيس المجلس',
                        'description' => 'مسؤول عن إدارة شؤون العائلة واتخاذ القرارات الرئيسية.',
                        'image' => 'https://picsum.photos/400/300?random=1',
                    ],
                    [
                        'id' => 2,
                        'name' => 'محمد أبو عودة',
                        'role' => 'نائب الرئيس',
                        'description' => 'يساعد في تنسيق الأنشطة والمبادرات.',
                        'image' => 'https://picsum.photos/400/300?random=2',
                    ],
                    [
                        'id' => 3,
                        'name' => 'خالد أبو عودة',
                        'role' => 'مسؤول العلاقات',
                        'description' => 'يتولى التواصل مع أبناء العائلة في الخارج.',
                        'image' => 'https://picsum.photos/400/300?random=3',
                    ],
                ];
            @endphp

            {{-- GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($councilMembers as $i => $member)
                    <div x-data="{ show: false }" x-intersect="show = true" x-transition
                        class="glass-card overflow-hidden text-center transition-all duration-500 hover:-translate-y-1">

                        {{-- IMAGE --}}
                        <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-full h-52 object-cover">

                        {{-- CONTENT --}}
                        <div class="p-5">

                            <h3 class="font-bold text-foreground text-lg">
                                {{ $member['name'] }}
                            </h3>

                            <p class="text-sm text-primary font-medium mt-1">
                                {{ $member['role'] }}
                            </p>

                            <p class="text-sm text-muted-foreground mt-3">
                                {{ $member['description'] }}
                            </p>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </div>
</x-layout>
