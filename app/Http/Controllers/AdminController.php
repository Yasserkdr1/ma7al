<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.indexx');
    }


    public function categories(){
       $categories= Category::OrderBy('id','DESC')->paginate(10);
       return view('admin.categories',compact('categories'));
    }
    public function category_add(){
        return view('admin.category-add');

    }

    public function category_edit($id){
        $category= Category::find($id);
        return view('admin.category-edit',compact('category'));

    }

    public function category_update(Request $request){
        $request->validate ([
            'name'=> 'required',
            'slug'=> 'required|unique:categories,slug'.$request->id,
            'image'=> 'mimes:png,jpg,jpeg'
        ]);

        $category = Category::find($request->id);
        $category =new Category();
        $category->name=$request->name;
        $category->slug=str::slug($request->name);
        if($request->hasFile('image')){
            if(File::exists(public_path('uploads/categories').'/'.$category->image)){
                File::delete(public_path('uploads/categories').'/'.$category->image);
                $image =$request->file('image');
                $file_extension =$request->file('image')->extension();
                $file_name = Carbon::now()->timestamp.'.'.$file_extension;
                $this->GenerateCategryImage($image,$file_name);
                $category->image =$file_name;
            }
        }

        $category->save();
        return redirect()->route('admin.categories')->with('status','Category has been edited sucesfully');

    }

    public function delete_category($id)
{
    $category = Category::find($id);
    if (File::exists(public_path('uploads/categories').'/'.$category->image)) {
        File::delete(public_path('uploads/categories').'/'.$category->image);
    }
    $category->delete();
    return redirect()->route('admin.categories')->with('status','Record has been deleted successfully !');
}

    public function GenerateCategryImage($image ,$imageName){
        $destinationPath = public_path('uploads/categories');
        $img= Image::read($image->path());
        $img->cover(124,124,"top");
        $img->resize(124,124,function($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);


    }


    public function category_store(Request $request){
        $request->validate ([
            'name'=> 'required',
            'slug'=> 'required|unique:categories,slug',
            'image'=> 'mimes:png,jpg,jpeg'
        ]);

        $category =new Category();
        $category->name=$request->name;
        $category->slug=str::slug($request->name);
        $image =$request->file('image');
        $file_extension =$request->file('image')->extension();
        $file_name = Carbon::now()->timestamp.'.'.$file_extension;
        $this->GenerateCategryImage($image,$file_name);
        $category->image =$file_name;
        $category->save();
        return redirect()->route('admin.categories')->with('status','Category has been added sucesfully');

    }

    public function products(){

        $products= Product::orderBy('created_at','DESC')->paginate(10);
        return view('admin.products',compact('products'));
    }


    public function product_add()
{
    $categories = Category::Select('id','name')->orderBy('name')->get();
    return view("admin.product-add",compact('categories'));
}

    public function product_store(Request $request){
        $request->validate([
            'name'=>'required',
             'slug'=>'required',
             'short_description'=>'required',
             'sale_price'=>'required',
             'stock_status'=>'required',
             'image'=>'required|mimes:png,jpg,jpeg|max:2048',
             'quantity'=>'required',
             'featured'=>'required',
             'category_id'=>'required',

        ]);
        $product =new Product();
        $product->name=$request->name;
        $product->slug=Str::slug($request->name);
        $product->short_description=$request->short_description;
        $product->sale_price=$request->sale_price;
        $product->stock_status=$request->stock_status;
        $product->quantity=$request->quantity;
        $product->featured=$request->featured;
        $product->category_id=$request->category_id;

        $current_timestamp=Carbon::now()->timestamp;

        if($request->hasFile('image')){
            $image =$request->file('image');
            $imageName=$current_timestamp.'.'.$image->extension();
            $this->GenerateProductThumbnailImage($image,$imageName);
            $product->image =$imageName;

        }

        $product->save();
        return redirect()->route('admin.products')->with('status','Product has been aded succesfully');
    }


    public function GenerateProductThumbnailImage($image,$imageName){
        $destinationPathThumbnail = public_path('uploads/products/thumbnails');
        $destinationPath = public_path('uploads/products');
        $img= Image::read($image->path());
        $img->cover(540,689,"top");
        $img->resize(540,689,function($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);


        $img->resize(104,104,function($constraint){
            $constraint->aspectRatio();
        })->save($destinationPathThumbnail.'/'.$imageName);



    }

    public function product_delete($id){
        $product=Product::find($id);
        if(FILE::exists(public_path('/uploads/products').'/'.$product->image)){
            File::delete(public_path('uploads/product').'/'.$product->image);
        }
        if(FILE::exists(public_path('/uploads/products/thumbmails').'/'.$product->image)){
            File::delete(public_path('uploads/product/thumbmails').'/'.$product->image);
        }
        $product->delete();
        return redirect()->route('admin.products')->with('status','Product has been deleted successfully !');
    }


    public function orders(){
        $orders=Order::orderBy('created_at','DESC')->paginate(12);
        return view('admin.orders',compact('orders')); 
    }





}


