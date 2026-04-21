<x-layout>
    @php
        $familyStats = [
            [
                'label' => 'أفراد العائلة',
                'value' => 1240,
                'icon' => 'users',
            ],
            [
                'label' => 'المدن',
                'value' => 18,
                'icon' => 'buildengs',
            ],
            [
                'label' => 'المهنيين',
                'value' => 500,
                'icon' => 'globe',
            ],
            [
                'label' => 'الخريجين',
                'value' => 430,
                'icon' => 'graduationCap',
            ],
        ];

        $familyNews = [
            [
                'id' => 1,
                'title' => 'اجتماع العائلة السنوي',
                'excerpt' => 'تم عقد الاجتماع السنوي في أجواء مميزة وحضور واسع من أبناء العائلة.',
                'date' => '2026-03-20',
                'image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac',
            ],
            [
                'id' => 2,
                'title' => 'إطلاق موقع العائلة الجديد',
                'excerpt' => 'تم إطلاق المنصة الرقمية الجديدة لتوثيق تاريخ العائلة.',
                'date' => '2026-03-10',
                'image' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d',
            ],
            [
                'id' => 3,
                'title' => 'تكريم الطلبة المتفوقين',
                'excerpt' => 'احتفال لتكريم أبناء العائلة المتفوقين في الجامعات والمدارس.',
                'date' => '2026-02-28',
                'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644',
            ],
        ];

        $upcomingEvents = [
            [
                'id' => 1,
                'title' => 'لقاء العائلة في الصيف',
                'date' => '2026-07-15',
                'location' => 'حمامة - فلسطين',
            ],
            [
                'id' => 2,
                'title' => 'اجتماع مجلس العائلة',
                'date' => '2026-05-02',
                'location' => 'غزة - فلسطين',
            ],
            [
                'id' => 3,
                'title' => 'حفل تكريم الخريجين',
                'date' => '2026-06-10',
                'location' => 'نابلس - فلسطين',
            ],
        ];
    @endphp


    {{-- HERO --}}
    <section class="relative overflow-hidden min-h-[90vh] flex items-center"
        style="background: linear-gradient(160deg, hsl(210,11%,6%) 0%, hsl(153,28%,12%) 50%, hsl(210,11%,8%) 100%)">
        <div class="absolute inset-0 opacity-[0.06]"
            style="background-image: linear-gradient(rgb(109, 176, 146) 1px, transparent 1px), linear-gradient(90deg, rgb(109, 176, 146) 1px, transparent 1px); background-size: 60px 60px;">
        </div>
        <div class="section-container relative z-10 w-full">
            <div class="grid lg:grid-cols-2 gap-16 items-center">


                <!-- Glassmorphism visual -->
                <div class="lg:order-2 flex justify-center">
                    <div class="relative">

                        <!-- Glow behind card -->
                        <div class="absolute inset-0 rounded-full blur-[80px] scale-110"
                            style="background: hsla(153,30%,40%,0.25);"></div>

                        <!-- Glass card -->
                        <div class="relative flex items-center justify-center rounded-2xl p-10 md:p-14"
                            style="background: hsla(153,28%,33%,0.08); backdrop-filter: blur(20px); border: 1px solid hsla(153,30%,56%,0.15); box-shadow: 0 8px 40px hsla(153,30%,30%,0.15),
                                    inset 0 1px 0 hsla(153,30%,80%,0.05);">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="عائلة أبو عودة"
                                class="relative h-44 w-44 md:h-56 md:w-56 lg:h-64 lg:w-64"
                                style="filter: drop-shadow(0 0 40px hsla(153,30%,45%,0.3));" />

                        </div>
                    </div>
                </div>


                {{-- TEXT --}}
                <div>

                    <span class="inline-block px-4 py-1.5 rounded-full text-sm font-medium mb-8 border"
                        style="background: hsla(153,28%,33%,0.15); border-color: hsla(153,30%,56%,0.25); color: hsl(153,30%,65%)">
                        حمامة — فلسطين
                    </span>

                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-white">
                        عائلة <span class="text-accent">أبو عودة</span>
                    </h1>

                    <p class="text-lg max-w-lg mb-10 text-white/60 leading-relaxed">
                        نحافظ على إرثنا، ونوثّق تاريخنا، ونبني جسور التواصل بين أبناء العائلة.
                    </p>

                    <div class="flex gap-4 flex-wrap">

                        <a href="/family-tree"
                            class="flex gap-2 px-7 py-3.5 rounded-2xl bg-primary text-white font-semibold hover:scale-105 transition">
                            شجرة العائلة
                        </a>

                        <a href="/family-history"
                            class="px-7 py-3.5 rounded-2xl border text-white/90 hover:scale-105 transition"
                            style="border-color: hsla(153,30%,56%,0.3); background: hsla(153,30%,56%,0.05)">
                            تاريخ العائلة
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- STATS --}}
    <section class="py-16 bg-background">
        <div class="section-container">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5">

                @foreach ($familyStats as $stat)
                    <div class="glass-card p-6 text-center">
                        <div
                            class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-primary/10 mb-3 text-primary">
                            @if ($stat['icon'] === 'users')
                                <x-icons.users class="w-6 h-6 text-accent" />
                            @elseif ($stat['icon'] === 'buildengs')
                                <x-icons.buildengs class="w-6 h-6 text-accent" />
                            @elseif ($stat['icon'] === 'globe')
                                <x-icons.globe class="w-6 h-6 text-accent" />
                            @elseif ($stat['icon'] === 'graduationCap')
                                <x-icons.graduationCap class="w-6 h-6 text-accent" />
                            @endif
                        </div>
                        <div class="text-3xl font-bold">
                            {{ number_format($stat['value']) }}
                        </div>
                        <div class="text-sm text-muted-foreground mt-1">
                            {{ $stat['label'] }}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    {{-- NEWS --}}
    <section class="py-16">
        <div class="section-container">

            <div class="flex justify-between mb-10">
                <h2 class="text-2xl font-bold">آخر الأخبار</h2>
                <a href="/news" class="text-primary flex items-center gap-1">
                    عرض الكل
                    <x-icons.arrowLeft class="text-accent" />
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($newsData as $post)
                    <div class="glass-card overflow-hidden">

                        <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('assets/images/default-news.png') }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">

                        <div class="p-5">
                            <p class="text-xs text-muted-foreground mb-2">
                                {{ $post->created_at->format('Y/m/d') }}
                            </p>

                            <h3 class="font-bold text-foreground mb-2 line-clamp-2 min-h-[2.5rem]">
                                {{ $post->title }}
                            </h3>

                            <p class="text-sm text-muted-foreground line-clamp-3 min-h-[3.5rem]">
                                {{ Str::words($post->content, 15, '...') }} <a href="{{ route('news.show', $post) }}"
                                    class="text-primary text-sm font-medium hover:underline">
                                    قراءة المزيد
                                </a>
                            </p>

                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>


    {{-- EVENTS --}}
    <section class="py-16 bg-muted/50">
        <div class="section-container">

            <h2 class="text-2xl font-bold mb-10">الفعاليات القادمة</h2>

            @foreach ($upcomingEvents as $event)
                <div class="glass-card p-5 flex items-center gap-4 mb-4">

                    <div class="bg-primary text-white p-3 rounded-xl text-center min-w-[60px]">
                        <div class="font-bold">
                            {{ \Carbon\Carbon::parse($event['date'])->format('d') }}
                        </div>
                        <div class="text-xs">
                            {{ \Carbon\Carbon::parse($event['date'])->format('M') }}
                        </div>
                    </div>

                    <div class="flex-1">
                        <h3 class="font-bold">{{ $event['title'] }}</h3>
                        <p class="text-sm text-muted-foreground">
                            {{ $event['location'] }}
                        </p>
                    </div>


                    <x-icons.calender class="text-muted-foreground w-5 h-5" />



                </div>
            @endforeach

        </div>
    </section>

</x-layout>
