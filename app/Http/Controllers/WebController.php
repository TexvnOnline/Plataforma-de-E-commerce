<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
use App\Product;
use App\Post;
use App\Carousel;
use App\Tag;
use App\Social;

class WebController extends Controller
{
    public function index()
    {

        $category = Category::where('front','YES')->with('subcategories')->firstOrFail();
        
        $productsCategory = Product::where('status','PUBLISHED')->whereHas('subcategory.category',function($query) use ($category){
            $query->where('id',$category->id);
        })->with('images')->get()->take(6);
       
        $productsFeatured =Product::where('status','PUBLISHED')->where('state',4)->with('images')->get()->take(6);

        $productsNew =Product::where('status','PUBLISHED')->orderBy('id','DESC')->with('images')->get()->take(6);
        $latestBlogs =Post::where('status','PUBLISHED')->orderBy('id','DESC')->with('image','user')->get()->take(5);
        
        $hotDeals =Product::where('status','PUBLISHED')->orderBy('previousPrice','DESC')->with('images')->get()->take(3);
       
        $specialOffers=Product::where('status','PUBLISHED')->where('state',5)->with('images')->get()->take(9);
        
        $specialDeals=Product::where('status','PUBLISHED')->where('state',6)->with('images')->get()->take(9);

        $tags=Tag::get();

        $carousels=Carousel::orderBy('id','DESC')->get()->take(3);
        $socials=Social::orderBy('id','DESC')->get();

        return view('web.index', compact('socials','carousels','tags','specialDeals','specialOffers','hotDeals','latestBlogs','category','productsCategory','productsFeatured','productsNew'));
    }
    public function category($slug)
    {
        $tags=Tag::get();
        $subcategory = Subcategory::where('slug',$slug)->firstOrFail();
        $products = Product::where('subcategory_id',$subcategory->id)->paginate(48);
        $socials=Social::orderBy('id','DESC')->get();
        return view('web.category', compact('socials','products','tags'));
    }
    public function tags($tag)
    {
        $tags=Tag::get();
        $socials=Social::orderBy('id','DESC')->get();
        
        $products = Product::whereHas('tags', function($query) use ($tag){
            $query->where('slug', $tag);
        })->orderBy('id','DESC')->paginate(48);
        
        return view('web.category', compact('socials','products','tags'));
    }
    public function notFound()
    {
        return view('web.404');
    }
    public function blogDetails($slug)
    {
        $socials=Social::orderBy('id','DESC')->get();
        $post = Post::where('slug',$slug)->with('category','user','image','comments','comments.user')->firstOrFail();
        return view('web.blog-details',compact('post','socials'));
    }
    public function blog()
    {
        $tags=Tag::get();
        $socials=Social::orderBy('id','DESC')->get();
        $posts = Post::orderBy('id','DESC')->with('category','user','image','comments','comments.user')->withCount('comments')->get();
        
        return view('web.blog', compact('posts','tags','socials'));
    }
  
    public function checkout()
    {
        return view('web.checkout');
    }
    public function contact()
    {
        return view('web.contact');
    }
    public function detail()
    {
        return view('web.detail');
    }
    public function faq()
    {
        return view('web.faq');
    }
    public function myWishlist()
    {
        return view('web.my-wishlist');
    }
    public function productComparison()
    {
        return view('web.product-comparison');
    }
    public function shoppingCart()
    {
        return view('web.shopping-cart');
    }
    public function signIn()
    {
        return view('web.sign-in');
    }
    public function termsConditions()
    {
        return view('web.terms-conditions');
    }
    public function trackOrders()
    {
        return view('web.track-orders');
    }
}
