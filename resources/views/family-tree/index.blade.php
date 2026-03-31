@php
    $tree = [
        'id' => 1,
        'name' => 'أبو عودة',
        'children' => [
            [
                'id' => 2,
                'name' => 'فرع أحمد',
                'children' => [
                    ['id' => 5, 'name' => 'محمد', 'children' => []],
                    ['id' => 6, 'name' => 'علي', 'children' => []],
                ],
            ],
            [
                'id' => 3,
                'name' => 'فرع خالد',
                'children' => [['id' => 7, 'name' => 'يوسف', 'children' => []]],
            ],
            [
                'id' => 4,
                'name' => 'فرع خالد',
                'children' => [
                    ['id' => 7, 'name' => 'يوسف', 'children' => []],
                    ['id' => 9, 'name' => 'جمال', 'children' => []],
                    ['id' => 9, 'name' => 'بلال', 'children' => []],
                ],
            ],
        ],
    ];
@endphp

<x-layout>
    <div x-data="{ search: '' }" class="py-12">

        <div class="section-container">

            <h1 class="text-3xl font-bold text-foreground mb-4">
                شجرة العائلة
            </h1>

            <p class="text-muted-foreground mb-8">
                استكشف أفرع وأجيال عائلة أبو عودة
            </p>

            {{-- SEARCH --}}
            <div class="relative mb-8 max-w-md">
                <input type="text" x-model="search" placeholder="ابحث عن اسم..."
                    class="w-full px-4 py-3 rounded-lg bg-card border border-border text-foreground" />
            </div>

            {{-- TREE --}}
            <div class="glass-card p-6">

                @include('family-tree.node', [
                    'node' => $tree,
                    'level' => 0,
                ])

            </div>

        </div>

    </div>
    {{-- {{ view()->exists('components.family-tree.node') ? 'YES' : 'NO' }} --}}
</x-layout>
