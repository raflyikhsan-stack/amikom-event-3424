<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil semua kategori untuk menu tab
        $categories = Category::all();

        // 2. Buat query dasar (hanya event mendatang & diurutkan paling dekat)
        $events = Event::with('category')
            ->where('date', '>=', now())
            ->orderBy('date', 'asc')
            
            // 3. Logika filter: Hanya jalan jika parameter 'category' ada di URL
            ->when($request->category, function ($query, $categorySlug) {
                return $query->whereHas('category', function ($q) use ($categorySlug) {
                    $q->where('slug', $categorySlug);
                });
            })
            
            // 4. Eksekusi query untuk ambil datanya
            ->get();

        // 5. Kembalikan satu view untuk semua kondisi
        return view('welcome', compact('categories', 'events'));
    }
}