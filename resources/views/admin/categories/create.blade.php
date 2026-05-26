@extends('layouts.admin')

@section('page_title', 'Tambah Kategori')
@section('page_subtitle', 'Buat kategori baru untuk mengelompokkan event Anda.')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center text-sm font-bold text-indigo-600 hover:text-indigo-700 mb-6 transition">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali ke Daftar
    </a>

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-8 border-b border-slate-50 bg-slate-50/50">
            <h5 class="font-black text-slate-800">Identitas Kategori Baru</h5>
        </div>

        <div class="p-8">
            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="space-y-2">
                    <label for="name" class="text-xs font-black uppercase tracking-widest text-slate-400">Nama Kategori</label>
                    <input type="text" name="name" id="name" 
                        class="w-full px-5 py-4 rounded-2xl border-2 border-slate-100 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium @error('name') border-red-500 @enderror" 
                        placeholder="Masukkan nama kategori" 
                        value="{{ old('name') }}" 
                        required>
                    
                    @error('name')
                        <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-indigo-50 p-6 rounded-2xl border border-indigo-100">
                    <div class="flex items-start gap-4">
                        <div class="p-2 bg-white rounded-lg shadow-sm text-indigo-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h6 class="text-sm font-bold text-indigo-900">Informasi Sistem</h6>
                            <p class="text-xs text-indigo-700 mt-1 leading-relaxed">
                                Sistem akan secara otomatis membuat <strong>Slug</strong> (URL ramah mesin) berdasarkan nama kategori yang Anda masukkan untuk keperluan SEO.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="submit" 
                        class="px-10 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 active:scale-95 transition">
                        Simpan Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection