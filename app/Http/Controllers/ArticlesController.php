<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ArticlesController
 * @package App\Http\Controllers
 */
class ArticlesController extends Controller
{

    /**
     * @param Article $articles
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(Article $articles)
    {
        return $articles->owner()->active()->get();
    }

    /**
     * @param Request $request
     * @param Article $article
     *
     * @return mixed
     */
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

    /**
     * @param $articleId
     * @param \App\Article $article
     * @return mixed
     */
    public function show($articleId, Article $article)
    {
        $article = $article->find($articleId);
        $this->authorize('show', $article);

        return $article;
    }
}