<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        {{ isset($title) ? $title . ' | عائلة أبو عودة' : 'عائلة أبو عودة' }}
    </title>

    <!-- 🧠 وصف الموقع -->
    <meta name="description"
        content="{{ $pageDescription ?? 'الموقع الرسمي لعائلة أبو عودة، يحتوي على أخبار العائلة، شجرة العائلة، الشركات، والمناسبات.' }}">
    <!-- 🔑 كلمات مفتاحية -->
    <meta name="keywords" content="عائلة أبو عودة, شجرة العائلة, أخبار العائلة, فلسطين, غزة">
    <!-- 👤 اسم الكاتب -->
    <meta name="author" content="عائلة أبو عودة">

    <!-- 📱 Open Graph (لما تشارك الرابط) -->
    <meta property="og:title" content="عائلة أبو عودة">
    <meta property="og:description" content="تعرف على أخبار وأنشطة عائلة أبو عودة">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:type" content="website">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        html,
        body {
            font-family: "IBM Plex Sans Arabic", sans-serif;
        }
    </style>
</head>

<body>
    {{-- <header class=""> --}}
    <div class="min-h-screen flex flex-col font-cairo" style="font-family: 'IBM Plex Sans Arabic', sans-serif">
        {{-- <nav class="sticky top-0 z-50 bg-card/95 backdrop-blur-md border-b border-border"> --}}
        <nav x-data="{ open: false }"
            class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-200 shadow-sm">

            <div class="section-container">

                <div class="flex items-center justify-between h-20">

                    {{-- LOGO --}}
                    <a href="/" class="flex items-center gap-3">

                        <img src="{{ asset('assets/images/logo2.png') }}" alt="عائلة أبو عودة"
                            class="h-20 w-20 object-contain">

                        <span class="font-bold text-lg text-foreground hidden sm:block">
                            عائلة أبو عودة
                        </span>

                    </a>

                    {{-- DESKTOP LINKS --}}
                    <div class="hidden lg:flex items-center gap-1">

                        <a href="{{ route('home') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors  {{ request()->routeIs('home') ? 'bg-primary text-primary-foreground' : 'hover:bg-muted' }}">
                            الرئيسية
                        </a>

                        <a href="{{ route('news.index') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors  {{ request()->routeIs('news.index') ? 'bg-primary text-primary-foreground' : 'hover:bg-muted' }}">
                            الأخبار
                        </a>

                        <a href="{{ route('family-tree.index') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors  {{ request()->routeIs('family-tree.index') ? 'bg-primary text-primary-foreground' : 'hover:bg-muted' }}">
                            شجرة العائلة
                        </a>

                        <a href="{{ route('family-history.index') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors  {{ request()->routeIs('family-history.index') ? 'bg-primary text-primary-foreground' : 'hover:bg-muted' }}">
                            تاريخ العائلة
                        </a>

                        <a href="{{ route('family-council.index') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors  {{ request()->routeIs('family-council.index') ? 'bg-primary text-primary-foreground' : 'hover:bg-muted' }}">
                            مجلس العائلة
                        </a>

                        <a href="{{ route('professionals.index') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors  {{ request()->routeIs('professionals.index') ? 'bg-primary text-primary-foreground' : 'hover:bg-muted' }}">
                            دليل المهنيين
                        </a>

                        <a href="{{ route('businesses.index') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors  {{ request()->routeIs('businesses.index') ? 'bg-primary text-primary-foreground' : 'hover:bg-muted' }}">
                            الشركات
                        </a>

                        <a href="{{ route('gallery.index') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors  {{ request()->routeIs('gallery.index') ? 'bg-primary text-primary-foreground' : 'hover:bg-muted' }}">
                            المعرض
                        </a>

                    </div>

                    {{-- RIGHT ACTIONS --}}
                    <div class="flex items-center gap-2">
                        @guest
                            <a href="/login"
                                class="block px-4 py-2 bg-primary text-primary-foreground rounded-md text-sm font-medium hover:bg-primary/80">
                                تسجيل الدخول
                            </a>
                        @endguest
                        @auth

                            <div x-data="{ open: false }" class="relative inline-block mr-10">

                                <button @click="open = !open" class="p-2 rounded-md text-foreground hover:bg-muted">
                                    <x-icons.user />
                                </button>

                                <div x-show="open" @click.away="open = false" x-transition
                                    class="absolute left-0 mt-2 w-48 bg-white border rounded-lg shadow-lg z-50 overflow-hidden">
                                    <a href="/dashboard" class="block px-4 py-2 text-sm hover:bg-gray-100">
                                        لوحة التحكم
                                    </a>

                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="w-full text-right px-4 py-2 border-t border-gray-100 text-sm hover:bg-gray-100 text-red-500">
                                            تسجيل الخروج
                                        </button>
                                    </form>
                                </div>

                            </div>
                        @endauth

                        {{-- DARK MODE (static icon فقط حالياً) --}}
                        <button class="p-2 rounded-md text-foreground hover:bg-muted transition-colors">
                            <x-icons.sun />
                        </button>

                        {{-- MOBILE MENU BUTTON (static الآن) --}}
                        <button @click="open = !open" class="lg:hidden p-2 rounded-md text-foreground hover:bg-muted">
                            ☰
                        </button>

                    </div>

                </div>

                {{-- MOBILE MENU (STATIC VERSION - ALWAYS HIDDEN FOR NOW) --}}

                <div x-show="open" x-transition @click.outside="open = false" class="lg:hidden pb-4 space-y-1">

                    <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-sm hover:bg-muted">
                        الرئيسية
                    </a>

                    <a href="{{ route('news.index') }}" class="block px-3 py-2 rounded-md text-sm hover:bg-muted">
                        الأخبار
                    </a>

                    <a href="{{ route('family-tree.index') }}"
                        class="block px-3 py-2 rounded-md text-sm hover:bg-muted">
                        شجرة العائلة
                    </a>

                    <a href="{{ route('family-history.index') }}"
                        class="block px-3 py-2 rounded-md text-sm hover:bg-muted">
                        تاريخ العائلة
                    </a>

                    <a href="{{ route('family-council.index') }}"
                        class="block px-3 py-2 rounded-md text-sm hover:bg-muted">
                        مجلس العائلة
                    </a>

                    <a href="{{ route('professionals.index') }}"
                        class="block px-3 py-2 rounded-md text-sm hover:bg-muted">
                        دليل المهنيين
                    </a>

                    <a href="{{ route('businesses.index') }}"
                        class="block px-3 py-2 rounded-md text-sm hover:bg-muted">
                        الشركات
                    </a>

                    <a href="{{ route('gallery.index') }}" class="block px-3 py-2 rounded-md text-sm hover:bg-muted">
                        المعرض
                    </a>

                    @guest
                        <a href="/login"
                            class="sm:inline-flex px-4 py-2 rounded-md text-sm font-medium bg-primary text-primary-foreground hover:opacity-90 transition-opacity">
                            تسجيل الدخول
                        </a>
                    @endguest
                    @auth
                        <div class="flex gap-3 items-center">

                            <a href="/dashboard"
                                class="sm:inline-flex px-4 py-2 rounded-md text-sm font-medium bg-primary text-primary-foreground hover:opacity-90 transition-opacity">
                                لوحة التحكم
                            </a>
                            {{-- logout --}}
                            <form action="/logout" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                    class="sm:inline-flex px-4 py-2 rounded-md text-sm font-medium bg-transparent border hover:bg-muted text-primary hover:opacity-90 transition-opacity">
                                    تسجيل الخروج
                                </button>
                            </form>
                        </div>
                    @endauth

                </div>
            </div>

        </nav>
        {{-- </header> --}}

        <main class="flex-1">
            {{ $slot }}
        </main>

        <footer class="bg-secondary text-secondary-foreground mt-16">

            <div class="section-container py-12">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    {{-- LOGO + INFO --}}
                    <div>

                        <div class="flex items-center gap-3 mb-4">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="عائلة أبو عودة"
                                class="h-12 w-12 object-contain">

                            <div>
                                <h3 class="font-bold text-lg">عائلة أبو عودة</h3>
                                <p class="text-sm opacity-80">حمامة - فلسطين</p>
                            </div>
                        </div>

                        <p class="text-sm opacity-70 leading-relaxed">
                            بوابة عائلة أبو عودة الإلكترونية - نحافظ على تراثنا ونبني مستقبلنا معاً
                        </p>

                    </div>

                    {{-- QUICK LINKS --}}
                    <div>

                        <h4 class="font-bold mb-4">روابط سريعة</h4>

                        <div class="space-y-2 text-sm opacity-80">

                            <a href="{{ route('news.index') }}"
                                class="block hover:opacity-100 transition-opacity">الأخبار</a>

                            <a href="{{ route('family-tree.index') }}"
                                class="block hover:opacity-100 transition-opacity">شجرة العائلة</a>

                            <a href="/family-council" class="block hover:opacity-100 transition-opacity">مجلس
                                العائلة</a>

                            <a href="/gallery" class="block hover:opacity-100 transition-opacity">المعرض</a>

                        </div>

                    </div>

                    {{-- CONTACT --}}
                    <div>

                        <h4 class="font-bold mb-4">تواصل معنا</h4>

                        <div class="space-y-2 text-sm opacity-80">

                            <p>البريد: info@abuodeh-family.ps</p>
                            <p>الهاتف: +970-599-000000</p>

                        </div>

                    </div>

                </div>

                {{-- BOTTOM --}}
                <div class="border-t border-secondary-foreground/20 mt-8 pt-6 text-center text-sm opacity-60">
                    جميع الحقوق محفوظة © 2026 عائلة أبو عودة - حمامة
                </div>

            </div>

        </footer>

    </div>
</body>

</html>
