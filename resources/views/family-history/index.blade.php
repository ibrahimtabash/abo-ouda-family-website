<x-layout>
    <div class="py-12">
        <div class="section-container">

            {{-- TITLE --}}
            <h1 class="text-3xl font-bold text-foreground mb-4">
                تاريخ العائلة
            </h1>

            <p class="text-muted-foreground mb-12">
                رحلة عائلة أبو عودة من حمامة إلى العالم
            </p>

            {{-- TIMELINE --}}
            <div class="relative">

                {{-- LINE --}}
                <div class="absolute right-4 top-0 bottom-0 w-0.5 bg-primary/20"></div>

                <div class="space-y-12">

                    @php
                        $timeline = [
                            [
                                'year' => '1900',
                                'title' => 'بداية العائلة',
                                'description' => 'استقرار العائلة في قرية حمامة وبداية التوسع.',
                            ],
                            [
                                'year' => '1948',
                                'title' => 'النكبة',
                                'description' => 'تهجير العائلة من حمامة إلى مناطق مختلفة داخل فلسطين وخارجها.',
                            ],
                            [
                                'year' => '1980',
                                'title' => 'مرحلة التعليم',
                                'description' => 'بروز جيل متعلم من أبناء العائلة في مختلف التخصصات.',
                            ],
                            [
                                'year' => '2000',
                                'title' => 'الانتشار العالمي',
                                'description' => 'انتشار أبناء العائلة في دول متعددة حول العالم.',
                            ],
                            [
                                'year' => '2024',
                                'title' => 'التحول الرقمي',
                                'description' => 'إطلاق الموقع الإلكتروني لتوثيق تاريخ العائلة.',
                            ],
                        ];
                    @endphp

                    @foreach ($timeline as $item)
                        <div class="relative pr-12">

                            {{-- CIRCLE --}}
                            <div
                                class="absolute right-0 w-9 h-9 rounded-full bg-primary text-primary-foreground flex items-center justify-center text-xs font-bold z-10">
                                {{ substr($item['year'], -2) }}
                            </div>

                            {{-- CARD --}}
                            <div class="glass-card p-6">

                                <span class="text-sm text-primary font-bold">
                                    {{ $item['year'] }}
                                </span>

                                <h3 class="text-lg font-bold text-foreground mt-1 mb-2">
                                    {{ $item['title'] }}
                                </h3>

                                <p class="text-muted-foreground leading-relaxed">
                                    {{ $item['description'] }}
                                </p>

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </div>
    </div>
</x-layout>
