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

class ProductController extends Controller
{
     public function index()
     {
        
        $products = Product::with('category','provider','bookcover')->where("status", Product::PRODUCT_STATUS_IS_ACTIVE)->paginate(10);

        return view('admin.product.index', compact('products'));
     }

     public function create()
     {
      
     $categories = category::all();

     $providers = Provider::all();
    
     $bookcovers = Bookcover::all();

      return view('admin.product.create', compact('categories', 'providers', 'bookcovers'));
   
   }

   public function store(Request $request): RedirectResponse
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
        'price_one' => 'required',
        'status' => 'required',
        'slug' => 'required'

     ]);
 
    // The blog post is valid...
 
   
}

} 