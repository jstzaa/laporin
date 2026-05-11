<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Laporin!</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .dot-grid {
            background-image: radial-gradient(circle, #dbeafe 1px, transparent 1px);
            background-size: 24px 24px;
        }
        .fade-in {
            animation: fadeUp 0.7s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            opacity: 0;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="min-h-screen bg-slate-50 dot-grid flex items-center justify-center px-4 sm:px-6">

    {{-- Decorative blobs --}}
    <div class="fixed -top-32 -left-32 w-96 h-96 bg-primary/50 rounded-full opacity-40 blur-3xl pointer-events-none"></div>
    <div class="fixed -bottom-32 -right-32 w-96 h-96 bg-secondary/50 rounded-full opacity-40 blur-3xl pointer-events-none"></div>

    <div class="relative w-full max-w-sm fade-in">

        {{-- Logo --}}
        <div class="flex flex-col items-center mb-8">
            <div class="w-12 h-12 bg-primary rounded-2xl flex items-center justify-center shadow-lg shadow-primary/25 mb-3">
                <svg class="w-5 h-5 text-white group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01"/>
                </svg>
            </div>
            <h1 class="text-xl font-extrabold text-gray-800 tracking-tight">Laporin!</h1>
            <p class="text-xs text-gray-400 font-medium mt-0.5">Sistem Pengaduan Siswa</p>
        </div>

        {{-- Card --}}
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

            {{-- Top accent --}}
            <div class="h-1 w-full bg-gradient-to-r from-primary via-secondary/50 to-primary"></div>

            <div class="p-6 sm:p-8">
                <div class="mb-6">
                    <h2 class="text-lg font-extrabold text-gray-800 tracking-tight">Selamat Datang</h2>
                    <p class="text-xs text-gray-400 font-medium mt-0.5">Login untuk akses fitur Laporin!</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    {{-- Username --}}
                    <div class="space-y-1.5">
                        <label class="flex items-center space-x-1.5 text-xs font-bold text-gray-500 uppercase tracking-widest">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>Username</span>
                        </label>
                        <div class="relative">
                            <input
                                type="text"
                                name="username"
                                value="{{ old('username') }}"
                                placeholder="Masukkan username"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 pl-10
                                       text-sm text-gray-700 placeholder-gray-400 font-medium
                                       focus:outline-none focus:ring-2 focus:ring-primary
                                       focus:border-transparent transition-all duration-150
                                       @error('login') border-red-300 bg-red-50 focus:ring-red-400 @enderror">
                            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        </div>
                        @error('username')
                            <div class="flex items-center space-x-1.5 text-xs text-red-500 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                                </svg>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="space-y-1.5">
                        <label class="flex items-center space-x-1.5 text-xs font-bold text-gray-500 uppercase tracking-widest">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <span>Password</span>
                        </label>
                        <div class="relative">
                            <input
                                type="password"
                                name="password"
                                placeholder="Masukkan password"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 pl-10
                                       text-sm text-gray-700 placeholder-gray-400 font-medium
                                       focus:outline-none focus:ring-2 focus:ring-primary
                                       focus:border-transparent transition-all duration-150">
                            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                        </div>
                        @error('password')
                            <div class="flex items-center space-x-1.5 text-xs text-red-500 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                                </svg>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                        @error('login')
                            <div class="flex items-center space-x-1.5 text-xs text-red-500 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                                </svg>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full flex items-center justify-center space-x-2
                               bg-primary hover:bg-primary/90 text-white
                               text-sm font-bold px-5 py-3 rounded-xl mt-2
                               shadow-lg shadow-primary/25 transition-all duration-150 hover:scale-[1.02]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        <span>Login</span>
                    </button>
                </form>
            </div>
        </div>

        {{-- Footer note --}}
        <p class="text-center text-[11px] text-gray-400 mt-5 font-medium">
            &copy; 2026 Laporin! — SMK Al-Khoeriyah, Tasikmalaya
        </p>
    </div>

</body>
</html>