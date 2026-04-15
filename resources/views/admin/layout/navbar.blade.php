<nav class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center space-x-2">
                <div class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold">
                    A
                </div>
                <span class="text-lg font-bold text-gray-800">
                    Admin Panel
                </span>
            </div>
            <div class="hidden md:flex items-center space-x-8 text-sm font-medium">
                <a href="{{ url('/admin/pengaduan') }}"
                   class="text-gray-600 hover:text-blue-600 transition duration-200">
                    Daftar Aduan
                </a>
                <a href="{{ url('/admin/kategori') }}"
                   class="text-gray-600 hover:text-blue-600 transition duration-200">
                    Kategori
                </a>
                <a href="{{ url('/admin/siswa') }}"
                   class="text-gray-600 hover:text-blue-600 transition duration-200">
                    Siswa
                </a>
                <a href="{{ url('/admin/admin') }}"
                   class="text-gray-600 hover:text-blue-600 transition duration-200">
                    Admin
                </a>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-sm text-gray-500 hidden sm:block">
                    Halo, 
                    @auth
                        <span>{{ Auth::guard('admin')->user()->username }}</span>
                    @endauth
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="px-4 py-2 text-sm bg-red-500 hover:bg-red-600 text-white rounded-lg transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>