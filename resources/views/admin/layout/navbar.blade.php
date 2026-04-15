<nav class="bg-white border-b border-gray-200 shadow-sm fixed top-0 left-0 w-full z-50" 
     x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center h-16">
            
            <!-- Logo & Title -->
            <div class="flex items-center space-x-2">
                <div class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold">
                    A
                </div>
                <span class="text-base sm:text-lg font-bold text-gray-800">
                    Aplikasi Pengaduan
                </span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8 text-sm font-medium">
                <a href="{{ route('show.home.admin') }}"
                   class="text-gray-600 hover:text-blue-600 transition duration-200">
                    Daftar Aduan
                </a>
                <a href="{{ route('show.kategori') }}"
                   class="text-gray-600 hover:text-blue-600 transition duration-200">
                    Kategori
                </a>
                <a href="{{ route('show.siswa') }}"
                   class="text-gray-600 hover:text-blue-600 transition duration-200">
                    Siswa
                </a>
                <a href="{{ route('show.admin') }}"
                   class="text-gray-600 hover:text-blue-600 transition duration-200">
                    Admin
                </a>
            </div>

            <!-- Right Section -->
            <div class="flex items-center space-x-2 sm:space-x-4">
                <!-- Username (Hidden on small screens) -->
                <div class="text-sm text-gray-500 hidden md:block">
                    Halo,
                    @auth('admin')
                        <span class="font-medium">{{ Auth::guard('admin')->user()->username }}</span>
                    @endauth
                </div>

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}" class="hidden md:block">
                    @csrf
                    <button class="px-4 py-2 text-sm bg-red-500 hover:bg-red-600 text-white rounded-lg transition">
                        Logout
                    </button>
                </form>

                <!-- Hamburger Button (Mobile) -->
                <button @click="open = !open"
                        class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100 focus:outline-none">
                    <!-- Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="h-6 w-6" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open"
         x-transition
         @click.away="open = false"
         class="md:hidden bg-white border-t border-gray-200 shadow-sm"
         x-cloak>
        <div class="px-4 py-4 space-y-3 text-sm font-medium">
            <a href="{{ route('show.home.admin') }}"
               class="block text-gray-600 hover:text-blue-600 transition">
                Daftar Aduan
            </a>
            <a href="{{ route('show.kategori') }}"
               class="block text-gray-600 hover:text-blue-600 transition">
                Kategori
            </a>
            <a href="{{ route('show.siswa') }}"
               class="block text-gray-600 hover:text-blue-600 transition">
                Siswa
            </a>
            <a href="{{ route('show.admin') }}"
               class="block text-gray-600 hover:text-blue-600 transition">
                Admin
            </a>

            <!-- Username -->
            <div class="pt-3 border-t text-gray-500">
                Halo,
                @auth('admin')
                    <span class="font-medium">{{ Auth::guard('admin')->user()->username }}</span>
                @endauth
            </div>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="pt-2">
                @csrf
                <button class="w-full px-4 py-2 text-sm bg-red-500 hover:bg-red-600 text-white rounded-lg transition">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>