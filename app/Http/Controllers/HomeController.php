<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get(); //Old For printing  categories
        $categories = Category::all();
        // dd("Categories By DB:- ",$categories);
        $posts = Post::orderBy('id', 'desc')->get();
        $posts = Post::latest()->get();
        $posts = Post::where('category_id', request('category_id'))->latest()->get(); // ye sab post categories wise dega agar click karnege tab
        $posts = Post::when(request('category_id'), function ($query) {
            $query->where('category_id', request('category_id'));
        })->latest()->get();
        // dd($posts);
        return view('home', ['categories' => $categories,'posts'=>$posts]);
        return view('home',compact('categories','posts'));
    }
}
