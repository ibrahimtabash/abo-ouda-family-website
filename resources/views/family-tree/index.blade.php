<x-layout>
    <div x-data="{ search: '' }" class="py-12">

        <div class="section-container">

            <h1 class="text-3xl font-bold text-foreground mb-4">
                شجرة العائلة
            </h1>

            <p class="text-muted-foreground mb-8">
                استكشف أفرع وأجيال العائلة
            </p>

            {{-- SEARCH --}}
            <div class="relative mb-8 max-w-md">
                <input type="text" x-model="search" placeholder="ابحث عن اسم..."
                    class="w-full px-4 py-3 rounded-lg bg-card border border-border text-foreground" />
            </div>

            {{-- TREE --}}
            <div class="glass-card p-6">

                @if ($tree)
                    @include('family-tree.node', [
                        'node' => $tree,
                        'level' => 0,
                    ])
                @else
                    <p class="text-muted-foreground">
                        لا يوجد بيانات حتى الآن
                    </p>
                @endif

            </div>

        </div>

    </div>
</x-layout>
