<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index(Article $articles)
    {
        return $articles->all();
    }

    public function store(Request $request, Article $article)
    {
        $this->validate($request, [
            'title' => 'required|max:10',
            'description' => 'required',
        ]);

        $data = $request->only(['title', 'description']);

        $article->fill($data);
        if ($article->save()) {
            return response(
                ['message' => 'Article created with success!', 'data' => $article->toArray()]
            )->setStatusCode(202);
        }

        return response(['message' => 'Error in create a article!'])->setStatusCode(500);
    }

}