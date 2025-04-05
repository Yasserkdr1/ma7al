<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    public function index()
    {
        $products = Product::orderBy('id')->limit(6)->get();
        $featureds = Product::where('featured', true)->get();

        $categories = Category::all();
        return view('indexx',compact('categories','products','featureds'));
    }

    public function about()

    {  
        $categories = Category::all();
        
        return view('about',compact('categories'));
    }
    public function shop()

    {  
        $categories = Category::all();
        
        return view('about',compact('categories'));
    }

}
