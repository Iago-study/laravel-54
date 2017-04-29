<?php

namespace App\Policies;

use App\User;
use App\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function show(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }

}
