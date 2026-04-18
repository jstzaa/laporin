<!DOCTYPE html>
<html lang="id" class="scroll-smooth overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporin! — Sistem Pengaduan Siswa</title>
    @vite('resources/css/app.css')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        html, body { overflow-x: hidden; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }

        .load-reveal {
            animation: revealUp 0.9s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            opacity: 0;
        }
        @keyframes revealUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .delay-1 { animation-delay: 0.15s; }
        .delay-2 { animation-delay: 0.30s; }
        .delay-3 { animation-delay: 0.45s; }
        .delay-4 { animation-delay: 0.60s; }

        /* Dot grid background */
        .dot-grid {
            background-image: radial-gradient(circle, #dbeafe 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Animated gradient blob */
        @keyframes blobFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33%       { transform: translate(20px, -20px) scale(1.05); }
            66%       { transform: translate(-15px, 10px) scale(0.97); }
        }
        .blob { animation: blobFloat 10s ease-in-out infinite; }
        .blob-2 { animation: blobFloat 13s ease-in-out infinite reverse; }

        /* Accent bar left border */
        .section-label::before {
            content: '';
            display: inline-block;
            width: 4px;
            height: 18px;
            background: #2563eb;
            border-radius: 9999px;
            margin-right: 10px;
            vertical-align: middle;
        }

        /* Step connector line */
        .step-connector {
            position: absolute;
            top: 28px;
            left: calc(50% + 36px);
            width: calc(100% - 72px);
            height: 2px;
            background: linear-gradient(to right, #2563eb44, #2563eb22);
        }
    </style>
</head>
<body x-data="sectionSpy()" class="bg-slate-50 text-slate-900">

    {{-- ======================================================== --}}
    {{-- NAVBAR                                                    --}}
    {{-- ======================================================== --}}
    <nav class="fixed inset-x-0 top-0 z-50 bg-white/90 backdrop-blur-xl border-b border-gray-100 shadow-sm load-reveal"
         @keydown.escape.window="mobileMenu = false">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">

            {{-- Logo --}}
            <div class="flex items-center space-x-2.5">
                <div class="w-9 h-9 bg-primary rounded-xl flex items-center justify-center shadow-md shadow-primary/25 flex-shrink-0">
                    <svg class="w-5 h-5 text-white group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01"/>
                    </svg>
                </div>
                <span class="text-lg font-extrabold text-gray-800 tracking-tight">Laporin!</span>
            </div>

            {{-- Desktop Links --}}
            <div class="hidden md:flex items-center space-x-1 text-sm font-semibold">
                <a href="#home"   @click="setActive('home')"   :class="navClass('home')"   class="px-3 py-2 rounded-lg transition duration-150">Home</a>
                <a href="#fitur"  @click="setActive('fitur')"  :class="navClass('fitur')"  class="px-3 py-2 rounded-lg transition duration-150">Fitur</a>
                <a href="#alur"   @click="setActive('alur')"   :class="navClass('alur')"   class="px-3 py-2 rounded-lg transition duration-150">Alur</a>
                <a href="#tentang" @click="setActive('tentang')" :class="navClass('tentang')" class="px-3 py-2 rounded-lg transition duration-150">Tentang</a>
            </div>

            {{-- CTA + Hamburger --}}
            <div class="flex items-center gap-2 sm:gap-3">
                <a href="{{ route('show.login') }}"
                   class="hidden sm:inline-flex items-center space-x-2 bg-primary hover:bg-primary/90 text-white
                          px-4 py-2 rounded-xl text-sm font-semibold shadow-md shadow-primary/25 transition-all duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                    <span>Login</span>
                </a>
                <button type="button"
                        @click="mobileMenu = !mobileMenu"
                        class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-xl border border-gray-200
                               text-gray-600 hover:text-primary hover:border-primary transition"
                        aria-label="Toggle navigation menu">
                    <svg x-show="!mobileMenu" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16"/>
                    </svg>
                    <svg x-show="mobileMenu" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-cloak x-show="mobileMenu" x-transition @click.away="mobileMenu = false"
             class="md:hidden border-t border-gray-100 bg-white/95 backdrop-blur-xl">
            <div class="px-4 py-4 space-y-1 text-sm font-semibold">
                <a href="#home"    @click="setActive('home');    mobileMenu = false" :class="navClass('home')"    class="block px-3 py-2.5 rounded-xl transition">Home</a>
                <a href="#fitur"   @click="setActive('fitur');   mobileMenu = false" :class="navClass('fitur')"   class="block px-3 py-2.5 rounded-xl transition">Fitur</a>
                <a href="#alur"    @click="setActive('alur');    mobileMenu = false" :class="navClass('alur')"    class="block px-3 py-2.5 rounded-xl transition">Alur</a>
                <a href="#tentang" @click="setActive('tentang'); mobileMenu = false" :class="navClass('tentang')" class="block px-3 py-2.5 rounded-xl transition">Tentang</a>
                <div class="pt-3 border-t border-gray-100">
                    <a href="{{ route('show.login') }}"
                       class="flex items-center justify-center space-x-2 w-full bg-primary hover:bg-primary/90
                              text-white px-4 py-2.5 rounded-xl font-semibold shadow-md shadow-primary/25 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        <span>Login</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- ======================================================== --}}
    {{-- HERO                                                      --}}
    {{-- ======================================================== --}}
    <header id="home" class="relative pt-28 sm:pt-36 pb-20 sm:pb-28 px-4 sm:px-6 overflow-hidden dot-grid">

        {{-- Decorative blobs --}}
        <div class="blob absolute -top-32 -left-32 w-[500px] h-[500px] bg-primary/50 rounded-full opacity-40 blur-3xl pointer-events-none"></div>
        <div class="blob-2 absolute -bottom-32 -right-32 w-[400px] h-[400px] bg-secondary/50 rounded-full opacity-40 blur-3xl pointer-events-none"></div>

        <div class="relative max-w-4xl mx-auto text-center">

            {{-- Badge --}}
            <div class="inline-flex items-center space-x-2 bg-white border border-primary/25 shadow-sm
                        px-4 py-1.5 rounded-full mb-7 load-reveal delay-1">
                <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                <span class="text-xs font-semibold text-primary tracking-wide uppercase">#SuaraSiswaMembangunSekolah</span>
            </div>

            {{-- Headline --}}
            <h1 class="text-4xl sm:text-5xl lg:text-[68px] font-extrabold tracking-tight leading-[1.1] mb-6 load-reveal delay-2">
                Lapor Masalah Sekolah<br>
                <span class="relative inline-block">
                    <span class="relative z-10 text-primary">Tanpa Ribet.</span>
                    <span class="absolute bottom-1 left-0 w-full h-3 bg-primary/50 rounded-full -z-0 opacity-70"></span>
                </span>
            </h1>

            {{-- Subtext --}}
            <p class="text-base sm:text-lg text-gray-500 mb-10 max-w-xl mx-auto leading-relaxed load-reveal delay-3">
                Sampaikan aspirasi, keluhan, atau saran kamu secara transparan. Setiap laporan didengar dan ditindaklanjuti dengan cepat.
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row justify-center gap-3 load-reveal delay-4">
                <a href="{{ route('show.login') }}"
                   class="inline-flex items-center justify-center space-x-2 bg-primary hover:bg-primary/90
                          text-white px-7 py-3.5 rounded-2xl font-bold shadow-xl shadow-primary/25
                          hover:scale-105 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span>Mulai Lapor Sekarang</span>
                </a>
                <a href="#fitur"
                   class="inline-flex items-center justify-center space-x-2 bg-white border border-gray-200
                          text-gray-600 px-7 py-3.5 rounded-2xl font-bold hover:bg-gray-50
                          hover:border-primary hover:text-primary transition-all duration-200 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                    </svg>
                    <span>Lihat Fitur</span>
                </a>
            </div>
        </div>
    </header>

    {{-- ======================================================== --}}
    {{-- FITUR                                                     --}}
    {{-- ======================================================== --}}
    <section id="fitur" class="py-20 sm:py-24 bg-white border-y border-gray-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            {{-- Section Header --}}
            <div class="mb-14" data-aos="fade-up">
                <p class="section-label text-xs font-bold text-primary uppercase tracking-widest mb-2">Fitur Platform</p>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-800 tracking-tight">Semua yang Kamu Butuhkan</h2>
                <p class="text-sm text-gray-400 mt-1 max-w-md">Dirancang agar proses pengaduan terasa ringan, transparan, dan terkelola dengan baik.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">

                {{-- Fitur 1 --}}
                <div data-aos="fade-up" data-aos-delay="100"
                     class="group bg-white border border-gray-100 rounded-2xl p-6 shadow-sm
                            hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
                    <div class="w-11 h-11 bg-primary/10 border border-primary/20 rounded-xl flex items-center justify-center mb-5
                                group-hover:bg-primary group-hover:border-primary transition-colors duration-200">
                        <svg class="w-5 h-5 text-primary group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-gray-800 mb-2">Input Pengaduan</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">Kirim laporan dengan mudah. Identitas kamu dijaga kerahasiaannya oleh sistem kami.</p>
                </div>

                {{-- Fitur 2 --}}
                <div data-aos="fade-up" data-aos-delay="200"
                     class="group bg-white border border-gray-100 rounded-2xl p-6 shadow-sm
                            hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
                    <div class="w-11 h-11 bg-secondary/10 border border-secondary/20 rounded-xl flex items-center justify-center mb-5
                                group-hover:bg-secondary group-hover:border-secondary transition-colors duration-200">
                        <svg class="w-5 h-5 text-secondary group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-gray-800 mb-2">Histori Real-Time</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">Pantau status laporan dari <em>Menunggu</em>, <em>Proses</em>, hingga <em>Selesai</em> secara transparan.</p>
                </div>

                {{-- Fitur 3 --}}
                <div data-aos="fade-up" data-aos-delay="300"
                     class="group bg-white border border-gray-100 rounded-2xl p-6 shadow-sm
                            hover:shadow-lg hover:-translate-y-1 transition-all duration-200 sm:col-span-2 lg:col-span-1">
                    <div class="w-11 h-11 bg-emerald-50 border border-emerald-100 rounded-xl flex items-center justify-center mb-5
                                group-hover:bg-emerald-600 group-hover:border-emerald-600 transition-colors duration-200">
                        <svg class="w-5 h-5 text-emerald-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-gray-800 mb-2">Manajemen Admin</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">Panel kendali modern untuk mengelola kategori, menanggapi aduan, dan mengontrol data siswa.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- ALUR                                                      --}}
    {{-- ======================================================== --}}
    <section id="alur" class="py-20 sm:py-24 bg-slate-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            <div class="mb-14" data-aos="fade-up">
                <p class="section-label text-xs font-bold text-primary uppercase tracking-widest mb-2">Cara Kerja</p>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-800 tracking-tight">Proses Simpel, Hasil Nyata</h2>
                <p class="text-sm text-gray-400 mt-1">Dari pengiriman laporan hingga penyelesaian, semuanya transparan.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">

                @php
                    $steps = [
                        ['num' => '1', 'title' => 'Tulis Laporan',   'desc' => 'Login dan sampaikan keluhanmu dengan data yang valid.',         'color' => 'blue'],
                        ['num' => '2', 'title' => 'Verifikasi',      'desc' => 'Admin akan mengecek kebenaran dan relevansi laporan yang masuk.', 'color' => 'indigo'],
                        ['num' => '3', 'title' => 'Tindak Lanjut',   'desc' => 'Laporan diteruskan ke pihak terkait untuk segera diselesaikan.', 'color' => 'violet'],
                        ['num' => '✓', 'title' => 'Selesai',         'desc' => 'Masalah teratasi dan kamu bisa memantau perkembangannya.',        'color' => 'emerald'],
                    ];
                @endphp

                @foreach($steps as $i => $step)
                <div data-aos="fade-up" data-aos-delay="{{ ($i + 1) * 100 }}"
                     class="relative bg-white border border-gray-100 rounded-2xl p-6 shadow-sm
                            hover:shadow-md hover:-translate-y-1 transition-all duration-200">

                    {{-- Step number badge --}}
                    <div class="w-10 h-10 rounded-xl
                                @if($step['color'] === 'blue')    bg-primary shadow-md shadow-primary/25
                                @elseif($step['color'] === 'indigo') bg-secondary shadow-md shadow-secondary/25
                                @elseif($step['color'] === 'violet') bg-violet-600 shadow-md shadow-violet-200
                                @else bg-emerald-600 shadow-md shadow-emerald-200 @endif
                                flex items-center justify-center text-white font-extrabold text-sm mb-4">
                        {{ $step['num'] }}
                    </div>

                    <h4 class="font-bold text-gray-800 text-sm mb-1.5">{{ $step['title'] }}</h4>
                    <p class="text-xs text-gray-400 leading-relaxed">{{ $step['desc'] }}</p>

                    {{-- Connector dot on right (desktop) --}}
                    @if($i < 3)
                    <div class="hidden lg:block absolute top-9 -right-3 w-5 h-5 bg-white border-2 border-gray-200 rounded-full z-10"></div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- TENTANG                                                   --}}
    {{-- ======================================================== --}}
    <section id="tentang" class="py-20 sm:py-24 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            <div class="mb-14" data-aos="fade-up">
                <p class="section-label text-xs font-bold text-primary uppercase tracking-widest mb-2">Tentang</p>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-800 tracking-tight">Kenapa Laporin!?</h2>
                <p class="text-sm text-gray-400 mt-1">Platform yang lahir dari kebutuhan nyata siswa sekolah.</p>
            </div>

            <div class="grid lg:grid-cols-5 gap-6 items-stretch" data-aos="fade-up" data-aos-delay="100">

                {{-- Left: About text --}}
                <div class="lg:col-span-3 bg-gradient-to-br from-primary to-secondary rounded-2xl p-8 text-white relative overflow-hidden shadow-xl shadow-primary/10">
                    <div class="absolute -top-16 -right-16 w-48 h-48 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="absolute -bottom-16 -left-16 w-48 h-48 bg-primary/20 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="relative z-10">
                        <div class="w-10 h-10 bg-white/20 border border-white/30 rounded-xl flex items-center justify-center mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-extrabold mb-4">Tentang Laporin!</h3>
                        <p class="text-light text-sm leading-relaxed mb-4">
                            Laporin! adalah platform digital yang dirancang untuk menjembatani komunikasi antara siswa dan pihak sekolah. Kami percaya bahwa setiap perubahan besar dimulai dari satu suara yang berani.
                        </p>
                        <p class="text-light text-sm leading-relaxed">
                            Dibangun dengan teknologi modern untuk menjamin keamanan data dan kecepatan respon dari pihak sekolah.
                        </p>
                        <div class="mt-6 pt-5 border-t border-white/20">
                            <a href="{{ route('show.login') }}"
                               class="inline-flex items-center space-x-2 bg-white text-primary font-bold text-sm
                                      px-5 py-2.5 rounded-xl hover:text-primary/90 transition shadow-md">
                                <span>Mulai Sekarang</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Right: Stats grid --}}
                <div class="lg:col-span-2 grid grid-cols-2 gap-4">
                    @foreach([
                        ['Safe',  'Data Terenkripsi',  'blue',    'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                        ['Fast',  'Respon Cepat',      'amber',   'M13 10V3L4 14h7v7l9-11h-7z'],
                        ['Clean', 'UI Minimalis',      'indigo',  'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm0 8a1 1 0 011-1h6a1 1 0 110 2H5a1 1 0 01-1-1zm0 4a1 1 0 011-1h6a1 1 0 110 2H5a1 1 0 01-1-1z'],
                        ['Easy',  'Mudah Digunakan',   'emerald', 'M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ] as [$title, $sub, $color, $path])
                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm
                                hover:shadow-md hover:-translate-y-0.5 transition-all duration-200 flex flex-col justify-between">
                        <div class="w-9 h-9 rounded-xl mb-3
                                    @if($color === 'blue')    bg-primary/5 border border-primary/20
                                    @elseif($color === 'amber') bg-amber-50 border border-amber-100
                                    @elseif($color === 'indigo') bg-secondary/5 border border-secondary/20
                                    @else bg-emerald-50 border border-emerald-100 @endif
                                    flex items-center justify-center">
                            <svg class="w-4 h-4
                                        @if($color === 'blue')    text-primary
                                        @elseif($color === 'amber') text-amber-500
                                        @elseif($color === 'indigo') text-secondary
                                        @else text-emerald-600 @endif"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-lg font-extrabold text-gray-800">{{ $title }}</div>
                            <div class="text-xs text-gray-400 font-medium">{{ $sub }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- FOOTER                                                    --}}
    {{-- ======================================================== --}}
    <footer class="bg-white border-t border-gray-100" data-aos="fade-in">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 pt-14 pb-8">

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10 mb-12">

                {{-- Brand --}}
                <div>
                    <div class="flex items-center space-x-2.5 mb-4">
                        <div class="w-9 h-9 bg-primary rounded-xl flex items-center justify-center shadow-md shadow-primary/25">
                            <svg class="w-5 h-5 text-white group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01"/>
                            </svg>
                        </div>
                        <span class="text-lg font-extrabold text-gray-800 tracking-tight">Laporin!</span>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        Platform pengaduan siswa modern yang mengutamakan transparansi, keamanan, dan kecepatan menanggapi aspirasi.
                    </p>
                </div>

                {{-- Navigasi --}}
                <div>
                    <div class="flex items-center space-x-2 mb-5">
                        <div class="w-1 h-4 bg-primary rounded-full"></div>
                        <h4 class="text-sm font-bold text-gray-700">Navigasi</h4>
                    </div>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="#home"    class="hover:text-primary transition font-medium">Beranda</a></li>
                        <li><a href="#fitur"   class="hover:text-primary transition font-medium">Fitur Utama</a></li>
                        <li><a href="#alur"    class="hover:text-primary transition font-medium">Alur Laporan</a></li>
                        <li><a href="#tentang" class="hover:text-primary transition font-medium">Tentang Kami</a></li>
                    </ul>
                </div>

                {{-- Kontak --}}
                <div>
                    <div class="flex items-center space-x-2 mb-5">
                        <div class="w-1 h-4 bg-primary rounded-full"></div>
                        <h4 class="text-sm font-bold text-gray-700">Hubungi Kami</h4>
                    </div>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li class="flex items-center space-x-2.5">
                            <span class="w-6 h-6 rounded-lg bg-primary/5 border border-primary/20 flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <span class="font-medium">admin@laporin.sch.id</span>
                        </li>
                        <li class="flex items-center space-x-2.5">
                            <span class="w-6 h-6 rounded-lg bg-primary/5 border border-primary/20 flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </span>
                            <span class="font-medium">SMK Al-Khoeriyah, Tasikmalaya</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Bottom bar --}}
            <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-3">
                <p class="text-xs text-gray-400">&copy; 2026 Laporin! App. All rights reserved.</p>
                <div class="text-xs text-gray-400">
                    Programmed by <span class="text-gray-700 font-bold">Fahriza Kurniawan</span>
                </div>
            </div>
        </div>
    </footer>

    {{-- ======================================================== --}}
    {{-- SCRIPTS (tidak diubah sama sekali)                        --}}
    {{-- ======================================================== --}}
    <script>
        window.sectionSpy = function () {
            return {
                activeSection: 'home',
                mobileMenu: false,
                sectionIds: ['home', 'fitur', 'alur', 'tentang'],
                visibleRatios: {},
                init() {
                    const sections = this.sectionIds.map((id) => document.getElementById(id)).filter(Boolean);
                    if (!sections.length) return;
                    if (window.location.hash) {
                        const hashId = window.location.hash.replace('#', '');
                        if (this.sectionIds.includes(hashId)) this.activeSection = hashId;
                    }
                    this.sectionIds.forEach((id) => { this.visibleRatios[id] = 0; });
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach((entry) => {
                            this.visibleRatios[entry.target.id] = entry.isIntersecting ? entry.intersectionRatio : 0;
                        });
                        this.updateActiveSection();
                    }, { rootMargin: '-35% 0px -45% 0px', threshold: [0.2, 0.4, 0.6] });
                    sections.forEach((section) => observer.observe(section));
                    window.addEventListener('scroll', () => this.updateActiveSection(), { passive: true });
                    window.addEventListener('resize', () => { if (window.innerWidth >= 768) this.mobileMenu = false; });
                },
                updateActiveSection() {
                    if (window.scrollY < 120) { this.activeSection = 'home'; return; }
                    const nextActive = this.sectionIds.reduce((bestId, currentId) => {
                        return (this.visibleRatios[currentId] ?? 0) > (this.visibleRatios[bestId] ?? 0) ? currentId : bestId;
                    }, this.sectionIds[0]);
                    if ((this.visibleRatios[nextActive] ?? 0) > 0) this.activeSection = nextActive;
                },
                setActive(sectionId) { this.activeSection = sectionId; this.mobileMenu = false; },
                navClass(sectionId) {
                    return this.activeSection === sectionId
                        ? 'bg-primary/5 text-primary'
                        : 'text-gray-600 hover:text-primary hover:bg-gray-50';
                },
                linkClass(sectionId) {
                    return this.activeSection === sectionId ? 'text-primary font-semibold' : 'text-gray-600 hover:text-primary';
                }
            };
        };
    </script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, easing: 'ease-out', mirror: false, offset: 80 });
    </script>
</body>
</html>