<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexArticle($id)
    {
        //
        $articles = Article::where('author_id', $id)->orderBy('id', 'desc')->paginate(5);
        // $authors = Author::all();
        return response()->view('cms.article.index', compact('articles', 'id'));
    }


    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        $authors = Author::all();
        $users = User::all();

        return response()->view('cms.article.allindex', compact('articles', 'categories', 'authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createArticle($id)
    {
        $categories = Category::where('status', 'active')->get();
        $authors = Author::all();

        return response()->view('cms.article.create', compact('categories', 'authors', 'id'));
    }
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();

        return response()->view('cms.article.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            // 'name' => 'string|max:50',
            'short_description' => 'string|max:75',
        ], []);
        if (!$validator->fails()) {
            $articles = new Article();
            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image' . $image->getClientOriginalExtension();

                $image->move('storage/images/article', $imageName);

                $articles->image = $imageName;
            }
            $articles->title = $request->get('title');
            $articles->short_description = $request->get('short_description');
            $articles->full_description = $request->get('full_description');
            $articles->category_id = $request->get('category_id');
            $articles->author_id = $request->get('author_id');

            $isSaved = $articles->save();

            return response()->json([
                'icon' => 'success',
                'title' => 'Created is Successfully',
            ]);
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authors = Author::all();
        $categories = Category::all();
        $articles = Article::findOrFail($id);

        return view('cms.article.show', compact('categories', 'authors', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    // {
    //     $authors = Author::all();
    //     $categories = Category::where('status', 'active')->get();
    //     $articles = Article::findOrFail($id);

    //     return view('cms.article.edit', compact('categories', 'authors', 'articles', 'id'));
    // }

    {
        $authors = Author::all();
        $categories = Category::where('status', 'active')->get();
        $articles = Article::findOrFail($id);

        return view('cms.article.edit', compact('authors', 'categories', 'articles', 'id'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(), [
            'short_description' => 'string|max:75',
        ], []);
        if (!$validator->fails()) {
            $articles = Article::findOrFail($id);
            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image' . $image->getClientOriginalExtension();

                $image->move('storage/images/article', $imageName);

                $articles->image = $imageName;
            }
            $articles->title = $request->get('title');
            $articles->short_description = $request->get('short_description');
            $articles->full_description = $request->get('full_description');
            $articles->category_id = $request->get('category_id');
            $articles->author_id = $request->get('author_id');

            $isUpdat = $articles->save();

            return ['redirect' => route('authors.index', $id)];
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = Article::destroy($id);
    }
}
