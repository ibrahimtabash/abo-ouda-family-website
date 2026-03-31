<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-200 shadow-sm">

            <div class="section-container">

                <div class="flex items-center justify-between h-20">

                    {{-- LOGO --}}
                    <a href="/" class="flex items-center gap-3">

                        <img src="{{ asset('assets/images/logo.png') }}" alt="عائلة أبو عودة"
                            class="h-20 w-20 object-contain">

                        <span class="font-bold text-lg text-foreground hidden sm:block">
                            عائلة أبو عودة
                        </span>

                    </a>

                    {{-- DESKTOP LINKS --}}
                    <div class="hidden lg:flex items-center gap-1">

                        <a href="/"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors hover:bg-muted">
                            الرئيسية
                        </a>

                        <a href="/news"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors hover:bg-muted">
                            الأخبار
                        </a>

                        <a href="/family-tree"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors hover:bg-muted">
                            شجرة العائلة
                        </a>

                        <a href="/family-history"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors hover:bg-muted">
                            تاريخ العائلة
                        </a>

                        <a href="/family-council"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors hover:bg-muted">
                            مجلس العائلة
                        </a>

                        <a href="/professionals-directory"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors hover:bg-muted">
                            دليل المهنيين
                        </a>

                        <a href="/businesses"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors hover:bg-muted">
                            الشركات
                        </a>

                        <a href="/gallery"
                            class="px-3 py-2 rounded-md text-sm font-medium transition-colors hover:bg-muted">
                            المعرض
                        </a>

                    </div>

                    {{-- RIGHT ACTIONS --}}
                    <div class="flex items-center gap-2">

                        {{-- DARK MODE (static icon فقط حالياً) --}}
                        <button class="p-2 rounded-md text-foreground hover:bg-muted transition-colors">
                            <x-icons.sun />
                        </button>

                        <a href="/login"
                            class="hidden sm:inline-flex px-4 py-2 rounded-md text-sm font-medium bg-primary text-primary-foreground hover:opacity-90 transition-opacity">
                            تسجيل الدخول
                        </a>

                        {{-- MOBILE MENU BUTTON (static الآن) --}}
                        <button class="lg:hidden p-2 rounded-md text-foreground hover:bg-muted">
                            ☰
                        </button>

                    </div>

                </div>

                {{-- MOBILE MENU (STATIC VERSION - ALWAYS HIDDEN FOR NOW) --}}
                <div class="lg:hidden pb-4 space-y-1 hidden">

                    <a href="/" class="block px-3 py-2 rounded-md text-sm font-medium hover:bg-muted">
                        الرئيسية
                    </a>

                    <a href="/news" class="block px-3 py-2 rounded-md text-sm font-medium hover:bg-muted">
                        الأخبار
                    </a>

                    <a href="/family-tree" class="block px-3 py-2 rounded-md text-sm font-medium hover:bg-muted">
                        شجرة العائلة
                    </a>

                    <a href="/family-history" class="block px-3 py-2 rounded-md text-sm font-medium hover:bg-muted">
                        تاريخ العائلة
                    </a>

                    <a href="/family-council" class="block px-3 py-2 rounded-md text-sm font-medium hover:bg-muted">
                        مجلس العائلة
                    </a>

                    <a href="/professionals-directory"
                        class="block px-3 py-2 rounded-md text-sm font-medium hover:bg-muted">
                        دليل المهنيين
                    </a>

                    <a href="/businesses" class="block px-3 py-2 rounded-md text-sm font-medium hover:bg-muted">
                        الشركات
                    </a>

                    <a href="/gallery" class="block px-3 py-2 rounded-md text-sm font-medium hover:bg-muted">
                        المعرض
                    </a>

                    <a href="/login"
                        class="block px-3 py-2 rounded-md text-sm font-medium bg-primary text-primary-foreground text-center mt-2">
                        تسجيل الدخول
                    </a>

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

                            <a href="/news" class="block hover:opacity-100 transition-opacity">الأخبار</a>

                            <a href="/family-tree" class="block hover:opacity-100 transition-opacity">شجرة العائلة</a>

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
