<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // $categories = Category::all();
        // $categories = Category::where('status', 'active')->get();
        $categories = Category::where('status', 'active')->take(3)->get();
        $sliders = Slider::take(3)->get();
        $articles = Article::orderBy('updated_at', 'desc')->take(3)->get();
        return view('front.index', compact('categories', 'sliders', 'articles'));
    }

    public function all($id)
    {
        $categories = Category::findOrFail($id);
        $articles = Article::where('category_id', $id)->orderBy('updated_at', 'desc')->paginate(4);
        return view('front.all-news', compact('categories', 'articles'));
    }

    public function det($id)
    {
        $articles = Article::findOrFail($id);
        return view('front.newsdetailes', compact('articles'));
    }
}
