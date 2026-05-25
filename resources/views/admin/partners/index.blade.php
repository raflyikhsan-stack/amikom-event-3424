@extends('layouts.admin')

@section('page_title', 'Manajemen Partner')
@section('page_subtitle', 'Kelola daftar partner dan sponsor acara Anda.')

@section('content')
<div class="space-y-8">
    
    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-8 border-b border-slate-50 bg-slate-50/50">
            <h5 class="font-black text-slate-800">Pendaftaran Partner Baru</h5>
        </div>
        <div class="p-8">
            <form action="{{ route('admin.partners.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6 items-end">
                @csrf
                
                <div class="space-y-2">
                    <label for="name" class="text-xs font-black uppercase tracking-widest text-slate-400">Nama Partner</label>
                    <input type="text" name="name" id="name" 
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none" 
                        placeholder="Masukkan nama pihak partner" required>
                </div>

                <div class="space-y-2">
                    <label for="logo_url" class="text-xs font-black uppercase tracking-widest text-slate-400">URL Logo Partner</label>
                    <select name="logo_url" id="logo_url" 
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none bg-white" required>
                        <option value="https://placehold.co/200x200">Placeholder Standard (200x200)</option>
                        <option value="https://placehold.co/300x300">Placeholder Large (300x300)</option>
                        <option value="https://placehold.co/400x200">Placeholder Wide (400x200)</option>
                    </select>
                </div>

                <div class="md:col-span-2 text-right">
                    <button type="submit" 
                        class="px-8 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 active:scale-95 transition">
                        Simpan Partner
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="flex justify-between items-center bg-white p-4 rounded-3xl border border-slate-100 shadow-sm">
        <div class="flex-1 max-w-md">
            <form action="{{ route('admin.partners.index') }}" method="GET" class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400 group-focus-within:text-indigo-500 transition" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" 
                    class="w-full pl-11 pr-4 py-3 rounded-2xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none text-sm" 
                    placeholder="Cari nama partner..." 
                    value="{{ request('search') }}">
                
                @if(request('search'))
                    <a href="{{ route('admin.partners.index') }}" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-red-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </a>
                @endif
            </form>
        </div>
        
        <div class="hidden md:block text-right">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total: {{ $partners->count() }} Partner</p>
        </div>
    </div>

    <div>
        <h4 class="text-xl font-black text-slate-800 mb-6">Daftar Partner yang Mendukung</h4>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($partners as $partner)
                <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-md transition group text-center">
                    <div class="w-24 h-24 mx-auto mb-4 bg-slate-50 rounded-2xl overflow-hidden flex items-center justify-center border border-slate-50">
                        <img src="{{ $partner->logo_url }}" 
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500" 
                            alt="{{ $partner->name }}">
                    </div>
                    <h5 class="font-bold text-slate-800 truncate">{{ $partner->name }}</h5>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter mt-1">Official Partner</p>
                </div>
            @empty
                <div class="col-span-full bg-white p-10 rounded-[2.5rem] border border-dashed border-slate-200 text-center text-slate-400">
                    Belum ada partner yang ditambahkan.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection