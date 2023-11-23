<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;   // использование "мягкого удаления"




    protected $fillable = [
        'title',
        'content',
        'main_image',
        'preview_image',
        'category_id',
    ];  // Массив атрибутов модели, которые могут быть обновлены.


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    // многие ко многим, связываем посты с тэгами, через пивот таблицу

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // связываем пост с его категорией
    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    // связываем посты с пользователями, которые их лайкнули

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
    // связываем пост с его комментарием
}
