<x-layout>
    <div class="py-12">
        <div class="section-container">

            {{-- TITLE --}}
            <h1 class="text-3xl font-bold text-foreground mb-4">
                شركات العائلة
            </h1>

            <p class="text-muted-foreground mb-8">
                المشاريع والأعمال التجارية لأبناء عائلة أبو عودة
            </p>

            @php
                $businesses = [
                    [
                        'id' => 1,
                        'name' => 'شركة أبو عودة للتجارة',
                        'description' => 'شركة متخصصة في الاستيراد والتصدير والتجارة العامة.',
                        'contact' => '0599123456',
                        'services' => ['استيراد', 'تصدير', 'تجارة عامة'],
                    ],
                    [
                        'id' => 2,
                        'name' => 'مؤسسة أبو عودة للإنشاءات',
                        'description' => 'تنفيذ مشاريع البناء والمقاولات العامة.',
                        'contact' => '0599876543',
                        'services' => ['بناء', 'تشطيبات', 'مقاولات'],
                    ],
                    [
                        'id' => 3,
                        'name' => 'شركة تقنيات أبو عودة',
                        'description' => 'حلول برمجية ومواقع إلكترونية وتطبيقات.',
                        'contact' => '0599001122',
                        'services' => ['Web Development', 'Apps', 'SaaS'],
                    ],
                ];
            @endphp

            {{-- GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                @foreach ($businesses as $biz)
                    <div class="glass-card p-6 transition-all duration-300 hover:-translate-y-1">

                        {{-- NAME --}}
                        <h3 class="font-bold text-foreground text-xl mb-2">
                            {{ $biz['name'] }}
                        </h3>

                        {{-- DESCRIPTION --}}
                        <p class="text-muted-foreground text-sm mb-4">
                            {{ $biz['description'] }}
                        </p>

                        {{-- SERVICES --}}
                        <div class="flex flex-wrap gap-2 mb-4">

                            @foreach ($biz['services'] as $service)
                                <span class="px-3 py-1 bg-muted text-muted-foreground rounded-full text-xs">
                                    {{ $service }}
                                </span>
                            @endforeach

                        </div>

                        {{-- CONTACT --}}
                        <p class="text-sm text-primary flex items-center gap-2">
                            <x-icons.phone /> {{ $biz['contact'] }}
                        </p>

                    </div>
                @endforeach

            </div>

        </div>
    </div>
</x-layout>
