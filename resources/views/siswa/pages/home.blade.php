@extends('siswa.layout.app')

@section('content')
<div class="max-w-5xl md:w-xl lg:w-5xl mx-auto px-4 sm:px-6">
    <div class="space-y-6">

        {{-- PAGE HEADER --}}
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-xl bg-primary shadow-md shadow-primary/25 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-extrabold text-gray-800 tracking-tight">Input Laporan</h1>
                <p class="text-xs text-gray-400 font-medium">Sampaikan keluhanmu dengan jelas dan lengkap</p>
            </div>
        </div>

        {{-- SUCCESS ALERT --}}
        @if (session('success'))
            <div id="alert-success"
                class="flex items-center space-x-3 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span><strong class="font-semibold">Berhasil!</strong> {{ session('success') }}</span>
            </div>
            <script>
                setTimeout(() => { document.getElementById('alert-success')?.remove(); }, 3000);
            </script>
        @endif

        {{-- FORM CARD --}}
        <form method="POST" action="{{ route('laporan.siswa.add') }}">
            @csrf
            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
    
                {{-- Card header accent --}}
                <div class="h-1 w-full bg-gradient-to-r from-primary via-secondary/50 to-primary rounded-t-2xl"></div>
    
                <div class="p-6 sm:p-8 space-y-6">
    
                    {{-- ── KATEGORI ── --}}
                    <div class="space-y-1.5">
                        <label class="flex items-center space-x-1.5 text-xs font-bold text-gray-500 uppercase tracking-widest">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a2 2 0 014-4z"/>
                            </svg>
                            <span>Kategori Laporan</span>
                            <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <select name="kategori" required class="w-full appearance-none rounded-xl border border-gray-200 bg-gray-50 px-4 py-3
                                           text-sm text-gray-700 font-medium focus:outline-none focus:ring-2
                                           focus:ring-primary focus:border-transparent transition-all duration-150 pr-10">
                                <option value="" disabled selected class="text-gray-400">Pilih kategori laporan...</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id_kategori }}" class="text-black">{{ $item->ket_kategori }}</option>
                                @endforeach
                            </select>
                            {{-- Custom dropdown arrow --}}
                            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-[11px] text-gray-400">Pilih kategori yang paling sesuai dengan laporanmu.</p>
                    </div>
    
                    {{-- Divider --}}
                    <div class="border-t border-dashed border-gray-100"></div>
    
                    {{-- ── LOKASI ── --}}
                    <div class="space-y-1.5">
                        <label class="flex items-center space-x-1.5 text-xs font-bold text-gray-500 uppercase tracking-widest">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Lokasi Kejadian</span>
                            <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="lokasi" required
                                   placeholder="Contoh: Kelas XII-A, Kantin, Lapangan..."
                                   class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 pl-10
                                          text-sm text-gray-700 placeholder-gray-400 font-medium
                                          focus:outline-none focus:ring-2 focus:ring-primary
                                          focus:border-transparent transition-all duration-150">
                            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-[11px] text-gray-400">Sebutkan lokasi spesifik agar laporan mudah ditindaklanjuti.</p>
                    </div>
    
                    {{-- Divider --}}
                    <div class="border-t border-dashed border-gray-100"></div>
    
                    {{-- ── ISI LAPORAN ── --}}
                    <div class="space-y-1.5">
                        <label class="flex items-center space-x-1.5 text-xs font-bold text-gray-500 uppercase tracking-widest">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6h16M4 10h16M4 14h8"/>
                            </svg>
                            <span>Isi Laporan</span>
                            <span class="text-red-400">*</span>
                        </label>
                        <textarea rows="5" name="keterangan" required
                                  placeholder="Deskripsikan masalah yang ingin kamu laporkan secara detail. Semakin jelas laporanmu, semakin cepat bisa ditindaklanjuti..."
                                  class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3
                                         text-sm text-gray-700 placeholder-gray-400 font-medium
                                         focus:outline-none focus:ring-2 focus:ring-primary
                                         focus:border-transparent transition-all duration-150 resize-none leading-relaxed"></textarea>
                        <div class="flex items-center justify-between">
                            <p class="text-[11px] text-gray-400">Minimal 20 karakter. Jelaskan kejadian dengan sejelas mungkin.</p>
                        </div>
                    </div>
    
                    {{-- ── ACTION BUTTONS ── --}}
                    <div class="flex flex-col sm:flex-row gap-3 pt-2">
                        <button type="reset"
                                class="flex-1 flex items-center justify-center space-x-2
                                       bg-gray-100 hover:bg-gray-200 text-gray-500
                                       text-sm font-semibold px-5 py-3 rounded-xl transition-all duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            <span>Reset Form</span>
                        </button>
                        <button type="submit"
                                class="flex-1 sm:flex-[2] flex items-center justify-center space-x-2
                                       bg-primary hover:bg-primary/90 text-white
                                       text-sm font-bold px-5 py-3 rounded-xl
                                       shadow-lg shadow-primary/25 transition-all duration-150 hover:scale-[1.02]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            <span>Kirim Laporan</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>

        {{-- TIPS CARD --}}
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-5">
            <div class="flex items-center space-x-2 mb-4">
                <div class="w-1 h-5 bg-amber-400 rounded-full"></div>
                <h3 class="text-xs font-bold text-gray-600 uppercase tracking-wider">Tips Laporan yang Baik</h3>
            </div>
            <ul class="space-y-2.5">
                @foreach([
                    'Gunakan bahasa yang sopan dan jelas.',
                    'Sertakan detail waktu kejadian jika memungkinkan.',
                    'Pastikan lokasi yang kamu tulis akurat dan spesifik.',
                    'Hindari informasi yang bersifat asumsi tanpa bukti.',
                ] as $tip)
                <li class="flex items-start space-x-2.5">
                    <span class="w-5 h-5 rounded-full bg-amber-50 border border-amber-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </span>
                    <span class="text-xs text-gray-500 leading-relaxed">{{ $tip }}</span>
                </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
@endsection