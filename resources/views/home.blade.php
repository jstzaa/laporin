<!DOCTYPE html>
<html lang="id" class="scroll-smooth overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporin! — Sistem Pengaduan Siswa</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style> 
        html, body { overflow-x: hidden; }
        body { font-family: 'Inter', sans-serif; } 
        [x-cloak] { display: none !important; }
        
        /* Animasi khusus saat halaman pertama kali dibuka (Initial Load) */
        .load-reveal {
            animation: revealUp 1.5s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            opacity: 0;
        }
        @keyframes revealUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .delay-1 { animation-delay: 0.5s; }
        .delay-2 { animation-delay: 0.4s; }
        .delay-3 { animation-delay: 0.6s; }
    </style>
</head>
<body x-data="sectionSpy()" class="bg-slate-50 text-slate-900">

    <nav class="fixed inset-x-0 top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200 load-reveal"
         @keydown.escape.window="mobileMenu = false">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="text-xl sm:text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                Laporin!
            </div>
            <div class="hidden md:flex space-x-8 text-sm font-medium">
                <a href="#home"
                   @click="setActive('home')"
                   :class="linkClass('home')"
                   class="transition duration-200">
                    Home
                </a>
                <a href="#fitur"
                   @click="setActive('fitur')"
                   :class="linkClass('fitur')"
                   class="transition duration-200">
                    Fitur
                </a>
                <a href="#alur"
                   @click="setActive('alur')"
                   :class="linkClass('alur')"
                   class="transition duration-200">
                    Alur
                </a>
                <a href="#tentang"
                   @click="setActive('tentang')"
                   :class="linkClass('tentang')"
                   class="transition duration-200">
                    Tentang
                </a>
            </div>

            <div class="flex items-center gap-2 sm:gap-3">
                <a href="{{ route('show.login') }}"
                   class="hidden sm:inline-flex bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition shadow-sm">
                    Login
                </a>
                <button type="button"
                        @click="mobileMenu = !mobileMenu"
                        class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg border border-slate-200 text-slate-600 hover:text-blue-600 hover:border-blue-200 hover:bg-blue-50 transition"
                        aria-label="Toggle navigation menu">
                    <svg x-show="!mobileMenu" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16"></path>
                    </svg>
                    <svg x-show="mobileMenu" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div x-cloak
             x-show="mobileMenu"
             x-transition
             @click.away="mobileMenu = false"
             class="md:hidden border-t border-slate-200 bg-white/95 backdrop-blur-md">
            <div class="px-4 py-4 space-y-2 text-sm font-medium">
                <a href="#home"
                   @click="setActive('home'); mobileMenu = false"
                   :class="linkClass('home')"
                   class="block px-3 py-2 rounded-lg transition duration-200 hover:bg-slate-100">
                    Home
                </a>
                <a href="#fitur"
                   @click="setActive('fitur'); mobileMenu = false"
                   :class="linkClass('fitur')"
                   class="block px-3 py-2 rounded-lg transition duration-200 hover:bg-slate-100">
                    Fitur
                </a>
                <a href="#alur"
                   @click="setActive('alur'); mobileMenu = false"
                   :class="linkClass('alur')"
                   class="block px-3 py-2 rounded-lg transition duration-200 hover:bg-slate-100">
                    Alur
                </a>
                <a href="#tentang"
                   @click="setActive('tentang'); mobileMenu = false"
                   :class="linkClass('tentang')"
                   class="block px-3 py-2 rounded-lg transition duration-200 hover:bg-slate-100">
                    Tentang
                </a>
                <a href="{{ route('show.login') }}"
                   class="mt-3 inline-flex w-full justify-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold transition shadow-sm">
                    Login
                </a>
            </div>
        </div>
    </nav>

    <header id="home" class="pt-28 sm:pt-32 lg:pt-40 pb-14 sm:pb-16 lg:pb-20 px-4 sm:px-6">
        <div class="max-w-5xl mx-auto text-center">
            <span class="inline-block px-3 sm:px-4 py-1.5 mb-5 sm:mb-6 text-[11px] sm:text-xs font-semibold tracking-wider text-blue-700 uppercase bg-blue-50 rounded-full italic load-reveal delay-1">
                #SuaraSiswaMembangunSekolah
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-bold tracking-tight mb-5 sm:mb-6 leading-tight load-reveal delay-2">
                Lapor Masalah Sekolah <br> <span class="text-blue-600">Tanpa Ribet.</span>
            </h1>
            <p class="text-base sm:text-lg lg:text-xl text-slate-500 mb-8 sm:mb-10 max-w-2xl mx-auto leading-relaxed load-reveal delay-3">
                Sampaikan aspirasi, keluhan, atau saran kamu secara transparan. Kami memastikan setiap laporan didengar dan ditindaklanjuti dengan cepat.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-4 load-reveal" style="animation-delay: 0.8s; opacity: 0;">
                <a href="{{ route('show.login') }}" class="w-full sm:w-auto px-6 sm:px-8 py-3.5 sm:py-4 bg-blue-600 text-white rounded-2xl font-bold shadow-lg shadow-blue-200 hover:scale-105 transition-transform">
                    Mulai Lapor Sekarang
                </a>
                <a href="#fitur" class="w-full sm:w-auto px-6 sm:px-8 py-3.5 sm:py-4 bg-white border border-slate-200 text-slate-600 rounded-2xl font-bold hover:bg-slate-50 transition">
                    Lihat Fitur
                </a>
            </div>
        </div>
    </header>

    <section id="fitur" class="py-16 sm:py-20 lg:py-24 bg-white border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-10 sm:mb-16" data-aos="fade-up">
                <h2 class="text-2xl sm:text-3xl font-bold mb-4">Fitur Utama</h2>
                <div class="w-16 h-1 bg-blue-600 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-8">
                <div data-aos="fade-right" data-aos-delay="100" class="group p-6 sm:p-8 rounded-3xl border border-slate-100 bg-slate-50/50 hover:shadow-xl hover:bg-white transition-all duration-300 hover:-translate-y-2">
                    <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg shadow-blue-100 group-hover:rotate-12 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Input Pengaduan</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Kirim laporan kamu dengan mudah. Sistem kami akan menjaga kerahasiaan identitas kamu.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" class="group p-6 sm:p-8 rounded-3xl border border-slate-100 bg-slate-50/50 hover:shadow-xl hover:bg-white transition-all duration-300 hover:-translate-y-2">
                    <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg shadow-indigo-100 group-hover:rotate-12 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01m-.01 4h.01"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Histori Real-Time</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Pantau status laporanmu mulai dari 'Menunggu', 'Proses', hingga 'Selesai' secara transparan.</p>
                </div>

                <div data-aos="fade-left" data-aos-delay="300" class="group p-6 sm:p-8 rounded-3xl border border-slate-100 bg-slate-50/50 hover:shadow-xl hover:bg-white transition-all duration-300 hover:-translate-y-2 sm:col-span-2 lg:col-span-1">
                    <div class="w-12 h-12 bg-emerald-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg shadow-emerald-100 group-hover:rotate-12 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6M9 12h6M9 16h3"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15.5l1.5 1.5 2.5-2.5"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Manajemen Admin</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Admin dapat mengelola kategori, menanggapi aduan, dan mengontrol data siswa dengan panel kendali modern.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="alur" class="py-16 sm:py-20 lg:py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-10 sm:mb-16" data-aos="fade-up">
                <h2 class="text-2xl sm:text-3xl font-bold mb-4">Bagaimana Cara Kerjanya?</h2>
                <p class="text-sm sm:text-base text-slate-500">Proses pelaporan hingga tindak lanjut dibuat sesederhana mungkin.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                <div class="text-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-white border-2 border-blue-600 text-blue-600 rounded-full flex items-center justify-center text-lg sm:text-xl font-bold mx-auto mb-5 sm:mb-6 shadow-sm">1</div>
                    <h4 class="font-bold mb-2">Tulis Laporan</h4>
                    <p class="text-sm text-slate-500">Login dan sampaikan keluhanmu dengan data yang valid.</p>
                </div>
                <div class="text-center" data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-white border-2 border-blue-600 text-blue-600 rounded-full flex items-center justify-center text-lg sm:text-xl font-bold mx-auto mb-5 sm:mb-6 shadow-sm">2</div>
                    <h4 class="font-bold mb-2">Verifikasi</h4>
                    <p class="text-sm text-slate-500">Admin akan mengecek kebenaran laporan yang masuk.</p>
                </div>
                <div class="text-center" data-aos="zoom-in" data-aos-delay="300">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-white border-2 border-blue-600 text-blue-600 rounded-full flex items-center justify-center text-lg sm:text-xl font-bold mx-auto mb-5 sm:mb-6 shadow-sm">3</div>
                    <h4 class="font-bold mb-2">Tindak Lanjut</h4>
                    <p class="text-sm text-slate-500">Laporan diteruskan ke pihak terkait untuk diselesaikan.</p>
                </div>
                <div class="text-center" data-aos="zoom-in" data-aos-delay="400">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-blue-600 text-white rounded-full flex items-center justify-center text-lg sm:text-xl font-bold mx-auto mb-5 sm:mb-6 shadow-lg shadow-blue-200">&#10003;</div>
                    <h4 class="font-bold mb-2">Selesai</h4>
                    <p class="text-sm text-slate-500">Masalah teratasi dan kamu bisa melihat perkembangannya.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang" class="py-16 sm:py-20 lg:py-24 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6">
            <div data-aos="fade-up" class="bg-gradient-to-br from-blue-600 to-indigo-800 rounded-3xl sm:rounded-4xl p-6 sm:p-10 md:p-12 lg:p-16 text-white overflow-hidden relative shadow-2xl">
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-blue-400/20 rounded-full blur-3xl"></div>

                <div class="relative z-10 grid md:grid-cols-2 gap-8 sm:gap-10 lg:gap-12 items-center">
                    <div data-aos="fade-right" data-aos-delay="200">
                        <h2 class="text-2xl sm:text-3xl font-bold mb-5 sm:mb-6">Tentang Laporin!</h2>
                        <p class="text-blue-100 leading-relaxed mb-6">
                            Laporin! adalah platform digital yang dirancang untuk menjembatani komunikasi antara siswa dan pihak sekolah. Kami percaya bahwa setiap perubahan besar dimulai dari satu suara yang berani.
                        </p>
                        <p class="text-blue-100 leading-relaxed">
                            Dibangun dengan teknologi modern untuk menjamin keamanan data dan kecepatan respon dari pihak sekolah.
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-3 sm:gap-4" data-aos="fade-left" data-aos-delay="400">
                        <div class="bg-white/10 backdrop-blur-md p-4 sm:p-6 rounded-2xl border border-white/20 hover:bg-white/20 transition-colors">
                            <div class="text-xl sm:text-2xl font-bold">Safe</div>
                            <div class="text-xs text-blue-200">Data Terenkripsi</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-md p-4 sm:p-6 rounded-2xl border border-white/20 hover:bg-white/20 transition-colors">
                            <div class="text-xl sm:text-2xl font-bold">Fast</div>
                            <div class="text-xs text-blue-200">Respon Cepat</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-md p-4 sm:p-6 rounded-2xl border border-white/20 hover:bg-white/20 transition-colors">
                            <div class="text-xl sm:text-2xl font-bold">Clean</div>
                            <div class="text-xs text-blue-200">UI Minimalis</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-md p-4 sm:p-6 rounded-2xl border border-white/20 hover:bg-white/20 transition-colors">
                            <div class="text-xl sm:text-2xl font-bold">Easy</div>
                            <div class="text-xs text-blue-200">Mudah Digunakan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-slate-200 pt-14 sm:pt-16 lg:pt-20 pb-8 sm:pb-10" data-aos="fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10 sm:gap-12 mb-12 sm:mb-16">
                <div>
                    <div class="text-2xl font-black tracking-tighter text-blue-600 mb-6">Laporin!</div>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6">
                        Platform pengaduan siswa modern yang mengutamakan transparansi, keamanan, dan kecepatan dalam menanggapi aspirasi.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 mb-6">Navigasi</h4>
                    <ul class="space-y-4 text-sm text-slate-500">
                        <li><a href="#home" class="hover:text-blue-600 transition">Beranda</a></li>
                        <li><a href="#fitur" class="hover:text-blue-600 transition">Fitur Utama</a></li>
                        <li><a href="#alur" class="hover:text-blue-600 transition">Alur Laporan</a></li>
                        <li><a href="#tentang" class="hover:text-blue-600 transition">Tentang Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 mb-6">Hubungi Kami</h4>
                    <ul class="space-y-4 text-sm text-slate-500">
                        <li class="flex items-center gap-3"><span class="text-blue-600 font-bold italic">@</span> admin@laporin.sch.id</li>
                        <li class="flex items-center gap-3"><span class="text-blue-600 font-bold italic">#</span> SMK Al-Khoeriyah, Tasikmalaya</li>
                    </ul>
                </div>
            </div>

            <div class="pt-6 sm:pt-8 border-t border-slate-100 flex flex-col sm:flex-row justify-between items-center text-center sm:text-left gap-3 sm:gap-4">
                <p class="text-slate-400 text-xs">&copy; 2026 Laporin! App. All rights reserved.</p>
                <div class="text-slate-400 text-xs">
                    Programmed by <span class="text-slate-900 font-bold">Fahriza Kurniawan</span> 
                </div>
            </div>
        </div>
    </footer>

    <script>
        window.sectionSpy = function () {
            return {
                activeSection: 'home',
                mobileMenu: false,
                sectionIds: ['home', 'fitur', 'alur', 'tentang'],
                visibleRatios: {},
                init() {
                    const sections = this.sectionIds
                        .map((id) => document.getElementById(id))
                        .filter(Boolean);

                    if (!sections.length) {
                        return;
                    }

                    if (window.location.hash) {
                        const hashId = window.location.hash.replace('#', '');
                        if (this.sectionIds.includes(hashId)) {
                            this.activeSection = hashId;
                        }
                    }

                    this.sectionIds.forEach((id) => {
                        this.visibleRatios[id] = 0;
                    });

                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach((entry) => {
                            this.visibleRatios[entry.target.id] = entry.isIntersecting
                                ? entry.intersectionRatio
                                : 0;
                        });

                        this.updateActiveSection();
                    }, {
                        rootMargin: '-35% 0px -45% 0px',
                        threshold: [0.2, 0.4, 0.6]
                    });

                    sections.forEach((section) => observer.observe(section));

                    window.addEventListener('scroll', () => this.updateActiveSection(), { passive: true });
                    window.addEventListener('resize', () => {
                        if (window.innerWidth >= 768) {
                            this.mobileMenu = false;
                        }
                    });
                },
                updateActiveSection() {
                    if (window.scrollY < 120) {
                        this.activeSection = 'home';
                        return;
                    }

                    const nextActive = this.sectionIds.reduce((bestId, currentId) => {
                        return (this.visibleRatios[currentId] ?? 0) > (this.visibleRatios[bestId] ?? 0)
                            ? currentId
                            : bestId;
                    }, this.sectionIds[0]);

                    if ((this.visibleRatios[nextActive] ?? 0) > 0) {
                        this.activeSection = nextActive;
                    }
                },
                setActive(sectionId) {
                    this.activeSection = sectionId;
                    this.mobileMenu = false;
                },
                linkClass(sectionId) {
                    return this.activeSection === sectionId
                        ? 'text-blue-600 font-semibold'
                        : 'text-slate-600 hover:text-blue-600';
                }
            };
        };
    </script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,      // Durasi animasi (ms)
            easing: 'ease-in-out',
            mirror: false,       // Tidak mengulang saat scroll ke atas
            offset: 80,          // Jarak sebelum animasi dipicu
        });
    </script>
</body>
</html>
