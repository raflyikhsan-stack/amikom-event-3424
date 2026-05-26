@extends('layouts.admin')

@section('page_title', 'Edit Partner')
@section('page_subtitle', 'Perbarui informasi partner atau sponsor.')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.partners.index') }}" class="inline-flex items-center text-sm font-bold text-indigo-600 hover:text-indigo-700 mb-6 transition">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali
    </a>

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-8 border-b border-slate-50 bg-slate-50/50 text-center">
            <div class="w-20 h-20 mx-auto mb-4 bg-white rounded-2xl shadow-sm border p-2 flex items-center justify-center">
                <img src="{{ $partner->logo_url }}" class="max-h-full max-w-full rounded-lg" id="preview-logo">
            </div>
            <h5 class="font-black text-slate-800 uppercase tracking-widest text-xs">Ubah Data: {{ $partner->name }}</h5>
        </div>

        <div class="p-8">
            <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-slate-400">Nama Partner</label>
                    <input type="text" name="name" value="{{ old('name', $partner->name) }}" 
                        class="w-full px-5 py-4 rounded-2xl border-2 border-slate-100 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium" required>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-slate-400">URL Logo</label>
                    <select name="logo_url" class="w-full px-5 py-4 rounded-2xl border-2 border-slate-100 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium bg-white">
                        <option value="https://placehold.co/200x200" {{ $partner->logo_url == 'https://placehold.co/200x200' ? 'selected' : '' }}>Standard (200x200)</option>
                        <option value="https://placehold.co/300x300" {{ $partner->logo_url == 'https://placehold.co/300x300' ? 'selected' : '' }}>Large (300x300)</option>
                        <option value="https://placehold.co/400x200" {{ $partner->logo_url == 'https://placehold.co/400x200' ? 'selected' : '' }}>Wide (400x200)</option>
                    </select>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection