<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description',
    ];

    public function scopeOwner($query)
    {
        return $query->where('user_id', '=', Auth::id());
    }

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }

}
