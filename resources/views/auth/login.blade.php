<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 flex min-h-screen items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl shadow-slate-100 border border-slate-100 overflow-hidden">
        
        <div class="bg-indigo-900 p-8 text-center flex flex-col items-center justify-center gap-3">
            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-2xl shadow-md">
                AeH
            </div>
            <div>
                <h2 class="text-2xl font-black text-white tracking-tight">AmikomEventHub</h2>
                <p class="text-indigo-200 text-xs font-medium mt-1">Selamat datang kembali! Silakan masuk ke akun Anda.</p>
            </div>
        </div>

        <div class="p-8">
            @if ($errors->any())
                <div class="bg-red-50 text-red-600 p-4 rounded-xl mb-6 text-sm font-semibold border border-red-100">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">
                        Alamat E-mail
                    </label>
                    <div class="relative">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl font-medium placeholder:text-slate-400 focus:outline-none focus:border-indigo-600 focus:bg-white transition text-sm"
                            placeholder="nama@contoh.com">
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-xs font-bold uppercase tracking-widest text-slate-500">
                            Kata Sandi
                        </label>
                    </div>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl font-medium placeholder:text-slate-400 focus:outline-none focus:border-indigo-600 focus:bg-white transition text-sm"
                        placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded text-indigo-600 border-slate-300 focus:ring-indigo-500">
                        <span class="text-xs text-slate-600 font-semibold">Ingat saya di perangkat ini</span>
                    </label>
                </div>

                <button type="submit" 
                    class="w-full py-3.5 px-4 bg-indigo-900 hover:bg-indigo-800 active:bg-indigo-950 text-white font-bold rounded-xl transition shadow-lg shadow-indigo-100 flex items-center justify-center gap-2 group text-sm mt-2">
                    <span>Masuk ke Dashboard</span>
                    <svg class="w-4 h-4 text-indigo-300 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </button>
            </form>
        </div>

        <div class="px-8 py-4 bg-slate-50 border-t border-slate-100 text-center">
            <p class="text-xs text-slate-400 font-medium">
                &copy; 2026 AmikomEventHub. All rights reserved.
            </p>
        </div>
    </div>

</body>

</html>