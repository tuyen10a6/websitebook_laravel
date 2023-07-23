<?php

namespace App\Http\Controllers\product;
use App\Http\Controllers\Controller;
use App\Models\bookcover\Bookcover;
use App\Models\category\category;
use App\Models\product\Product;
use App\Models\provider\Provider;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
   public function index()
   {

        $products = Product::with('category','provider','bookcover')->where("status", Product::PRODUCT_STATUS_IS_ACTIVE)->paginate(5);

        return view('admin.product.index', compact('products'));
     }
     public function create()
     {

     $categories = category::all();

     $providers = Provider::all();

     $bookcovers = Bookcover::all();

      return view('admin.product.create', compact('categories', 'providers', 'bookcovers'));

   }

   public function show($slug)
   {

      $categories = category::all();

      $providers = Provider::all();
 
      $bookcovers = Bookcover::all();

      $product = Product::where('slug', $slug)->first();

       return view('admin.product.update', compact('product','categories', 'providers', 'bookcovers'));
   }
   
   public function store(Request $request)
   {
       $validated = $request->validate([
           'name' => 'required|unique:products|max:255',
        'imgdefault' => 'required',
           'price' => 'required',
           'category_id' => 'required',
           'bookcover_id' => 'required',
           'quantity' => 'required',
           'page' => 'required',
           'publishingyear' => 'required',
           'size' => 'required',
           'weight' => 'required',
           'provider_id' => 'required',
           'priceone' => 'required',
           'status' => 'required'
          
       ]);

    $slug = Str::slug($request->input('name'));

    // Thêm 'slug' vào mảng $product
    $product = $request->all();
    
    $product['slug'] = $slug;

    $fileName = time().$request->file('imgdefault')->getClientOriginalName();

    $path = $request->file('imgdefault')->storeAs('images', $fileName, 'public');

    $product["imgdefault"] = '/storage/'.$path;

    Product::create($product);
       
       if($product)
       {
        return redirect('/admin/product');
       }
    
   }
   public function update(Request $request, $id)
   {

       $product = Product::find($id);
   
       $product->name = $request->input('name');
     
       $product->price = $request->input('price');
       
       $product->category_id = $request->input('category_id');

       $product->bookcover_id = $request->input('bookcover_id');

       $product->quantity = $request->input('quantity');

       $product->describe = $request->input('describe');

       $product->page = $request->input('page');
 
       $product->publishingyear = $request->input('publishingyear');
      
       $product->size = $request->input('size');

       $product->weight = $request->input('weight');

       $product->provider_id = $request->input('provider_id');

       $product->status = $request->input('status');

       $product->priceone = $request->input('priceone');
  
       $product->slug =  Str::slug($request->input('name'), '-');
   
         // Check if a new image file was uploaded
        if ($request->hasFile('imgdefault')) {
            $fileName = time() . $request->file('imgdefault')->getClientOriginalName();
            $path = $request->file('imgdefault')->storeAs('images', $fileName, 'public');
            $product->imgdefault = '/storage/' . $path;
        }
   
        if ($product->save()) {
            return redirect('/admin/product')->with('success', 'Sản phẩm đã được cập nhật thành công');
        }
        else
        {
         return redirect('/admin/product')->with('error', 'Có lỗi xảy ra trong quá trình cập nhật Danh mục');
        } 
   }
   
   // public function update(Request $request, $id)
   // {
      
   //    $slug = Str::slug($request->input('name'));

   //   $product = Product::find($id);

  
   //  $product = $request->all();
    
   //  $product['slug'] = $slug;

   //  $fileName = time().$request->file('imgdefault')->getClientOriginalName();

   //  $path = $request->file('imgdefault')->storeAs('images', $fileName, 'public');

   //  $product["imgdefault"] = '/storage/'.$path;

  
       
   //  if ($product->save())
   //     {
   //      return redirect('/admin/product')->with('success', 'Sản phẩm đã được cập nhật thành công');
   //     }
   // }
}