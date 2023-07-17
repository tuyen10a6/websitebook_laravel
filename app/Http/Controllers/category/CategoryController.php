<?php

namespace App\Http\Controllers\category;
use App\Http\Controllers\Controller;

use App\Models\category\category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
      public function index()
        {  
            $categories = category::all();

            return view('admin.category.category', compact('categories'));
        }

        public function create()
        {
            return view('admin.category.create');
        }
        
        public function add(Request $request)
        {
        
            Category::create([
                'name' => (string)$request->input('name'),
                'slug' => Str::slug($request->input('name'), '-'),
                'priority' => (integer)$request->input('priority'),
            ]);
            return redirect('/admin/category');
        }
} 