{{-- Sidebar Overlay (Mobile) --}}
<div x-data="{ open: false }" class="relative">

    {{-- Mobile Toggle Button --}}
    <button @click="open = true"
            class="md:hidden fixed top-4 left-4 z-50 p-2.5 bg-white rounded-xl shadow-lg border border-gray-100 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    {{-- Backdrop (Mobile) --}}
    <div x-show="open"
         x-transition:enter="transition-opacity ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="open = false"
         class="md:hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-40"
         x-cloak>
    </div>

    {{-- Sidebar --}}
    <aside :class="open ? 'translate-x-0' : '-translate-x-full'"
           class="fixed top-0 left-0 h-screen w-64 z-50 flex flex-col
                  bg-white border-r border-gray-100 shadow-xl
                  transition-transform duration-300 ease-in-out
                  md:translate-x-0">

        {{-- Logo --}}
        <div class="flex items-center space-x-3 px-6 py-5 border-b border-gray-100">
            <div class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center shadow-md shadow-blue-200 flex-shrink-0">
                <span class="text-white font-extrabold text-base tracking-tight">L</span>
            </div>
            <span class="text-lg font-extrabold text-gray-800 tracking-tight">Laporin!</span>

            {{-- Close button (Mobile only) --}}
            <button @click="open = false"
                    class="md:hidden ml-auto p-1.5 rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- User Greeting --}}
        <div class="px-5 py-4 mx-4 mt-4 rounded-xl bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-100">
            <p class="text-xs text-gray-400 font-medium uppercase tracking-widest mb-0.5">Halo,</p>
            @auth('admin')
                <p class="text-sm font-bold text-blue-700 truncate">{{ Auth::guard('admin')->user()->username }}👋</p>
            @endauth
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-4 mt-5 space-y-1 overflow-y-auto">

            <p class="text-[10px] font-semibold uppercase tracking-widest text-gray-400 px-3 mb-2">Menu Utama</p>

            <a href="{{ route('show.home.admin') }}"
               class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-600
                      hover:bg-blue-50 hover:text-blue-700 transition-all duration-150 group">
                <span class="w-8 h-8 rounded-lg bg-gray-100 group-hover:bg-blue-100 flex items-center justify-center transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h13M9 3H5a2 2 0 00-2 2v14a2 2 0 002 2h4M13 7l5 5-5 5"/>
                    </svg>
                </span>
                <span>Daftar Laporan</span>
            </a>

            <a href="{{ route('show.kategori') }}"
               class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-600
                      hover:bg-blue-50 hover:text-blue-700 transition-all duration-150 group">
                <span class="w-8 h-8 rounded-lg bg-gray-100 group-hover:bg-blue-100 flex items-center justify-center transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a2 2 0 014-4z"/>
                    </svg>
                </span>
                <span>Kategori</span>
            </a>

            <a href="{{ route('show.siswa') }}"
               class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-600
                      hover:bg-blue-50 hover:text-blue-700 transition-all duration-150 group">
                <span class="w-8 h-8 rounded-lg bg-gray-100 group-hover:bg-blue-100 flex items-center justify-center transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </span>
                <span>Siswa</span>
            </a>

            <a href="{{ route('show.admin') }}"
               class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-600
                      hover:bg-blue-50 hover:text-blue-700 transition-all duration-150 group">
                <span class="w-8 h-8 rounded-lg bg-gray-100 group-hover:bg-blue-100 flex items-center justify-center transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                    </svg>
                </span>
                <span>Admin</span>
            </a>

        </nav>

        {{-- Logout --}}
        <div class="px-4 pb-5 pt-3 border-t border-gray-100 mt-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium
                               text-red-500 hover:bg-red-50 hover:text-red-600 transition-all duration-150 group">
                    <span class="w-8 h-8 rounded-lg bg-red-50 group-hover:bg-red-100 flex items-center justify-center transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </span>
                    <span>Logout</span>
                </button>
            </form>
        </div>

    </aside>

</div>