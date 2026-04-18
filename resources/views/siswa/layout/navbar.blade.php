<nav x-data="{ open: false, active: 'input' }"
     class="fixed inset-x-0 top-0 z-50 bg-white/90 backdrop-blur-xl border-b border-gray-100 shadow-sm">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">

        {{-- Logo --}}
        <div class="flex items-center space-x-2.5">
            <div class="w-9 h-9 bg-primary rounded-xl flex items-center justify-center shadow-md shadow-primary/25 flex-shrink-0">
                <svg class="w-5 h-5 text-white group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01"/>
                </svg>
            </div>
            <span class="text-lg font-extrabold text-gray-800 tracking-tight">Laporin!</span>
        </div>

        {{-- Desktop Nav Links --}}
        <div class="hidden md:flex items-center space-x-1">

            {{-- Input Laporan --}}
            <a href="{{ route('show.home.siswa') }}" class="flex items-center space-x-2 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                <span>Input Laporan</span>
            </a>

            {{-- Riwayat Laporan --}}
            <a href="{{ route('show.history.siswa') }}" class="flex items-center space-x-2 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <span>Riwayat Laporan</span>
            </a>
        </div>

        {{-- Right: User + Logout --}}
        <div class="flex items-center gap-2 sm:gap-3">

            {{-- User greeting (desktop) --}}
            <div class="hidden sm:flex items-center space-x-2 bg-gray-50 border border-gray-200 px-3 py-1.5 rounded-xl">
                <div class="w-6 h-6 rounded-lg bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-gray-600">Halo, 
                    @auth('siswa')
                        <span class="text-primary">{{ Auth::guard('siswa')->user()->nama_siswa }}👋</span>  
                    @endauth
                </span>
            </div>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="hidden sm:flex items-center space-x-1.5 px-3 py-2 bg-red-50 hover:bg-red-100
                               text-red-500 hover:text-red-600 text-xs font-semibold rounded-xl
                               border border-red-200 transition-all duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span>Logout</span>
                </button>
            </form>

            {{-- Hamburger (mobile) --}}
            <button @click="open = !open"
                    class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-xl border border-gray-200
                           text-gray-600 hover:text-primary hover:border-primary hover:bg-primary/10 transition">
                <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16"/>
                </svg>
                <svg x-show="open" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open"
         x-transition
         x-cloak
         @click.away="open = false"
         class="md:hidden border-t border-gray-100 bg-white/95 backdrop-blur-xl">
        <div class="px-4 py-4 space-y-1.5 text-sm font-semibold">

            <a href="{{ route('show.home.siswa') }}" class="flex items-center space-x-2.5 px-3 py-2.5 rounded-xl transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                <span>Input Laporan</span>
            </a>

            <a href="{{ route('show.history.siswa') }}" class="flex items-center space-x-2.5 px-3 py-2.5 rounded-xl transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <span>Riwayat Laporan</span>
            </a>

            {{-- Mobile User & Logout --}}
            <div class="pt-3 border-t border-gray-100 space-y-2">
                <div class="flex items-center space-x-2 px-3 py-2 bg-gray-50 rounded-xl">
                    <div class="w-6 h-6 rounded-lg bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-gray-600">Halo, 
                        @auth('siswa')
                            <span class="text-primary">{{ Auth::guard('siswa')->user()->nama_siswa }}</span>  
                        @endauth
                    </span>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center space-x-2 px-3 py-2.5 bg-red-50
                                   text-red-500 text-sm font-semibold rounded-xl border border-red-200 transition hover:bg-red-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>