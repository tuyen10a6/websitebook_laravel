<?php

namespace App\Http\Controllers\category;
use App\Http\Controllers\Controller;

use App\Models\category\category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

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
            $validated = $request->validate([
                'name' => 'required|unique:categories|max:255',
                'priority' => 'required|unique:categories',
            ]);
        
            $category =  Category::create([
                'name' => (string) $request->input('name'),
                'slug' => Str::slug($request->input('name'), '-'),
                'priority' => (integer) $request->input('priority'),
            ]);
           
            if($category)
            {
                return redirect('/admin/category')->with('success', 'Thêm danh mục thành công');
            }
        }

        public function show($slug)
        {
            $category = category::where('slug', $slug)->first();
            
            return view('admin.category.update', compact('category'));
        }

    public function update(Request $request, $id)
    {

    $validated = $request->validate([
        'name' => 'required|max:255|unique:categories,name,' . $id,
        'priority' => 'required|unique:categories,priority,' . $id,
    ]);

      $category = category::find($id);

    $category->name = $request->input('name');

    $category->priority = $request->input('priority');

    $category->slug = $request->input('slug');

        if ($category->save()) 
        {
        return redirect('/admin/category')->with('success', 'Danh mục đã được cập nhật thành công');
        }

        else 
        {
        return redirect('/admin/category')->with('error', 'Có lỗi xảy ra trong quá trình cập nhật Danh mục');
         }
    }

    public function delete($slug)
    {
        
       category::where('slug',$slug)->delete();
        
       return redirect(route('admin.category.index'));

    }

        
} 