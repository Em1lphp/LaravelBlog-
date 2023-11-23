<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;  //Мягкое удаление


    protected $fillable = ['message', 'post_id', 'user_id'];  // Массив атрибутов модели, которые могут быть обновлены.

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');  // отношения между комментариями и пользователями
    }

    public function post()
    {
        return $this->belongsTo(
            Post::class,
            'post_id',
            'id'
        );  // создаю отношения комментария и поста, для возможности отображения лайкнутого поста
    }
}
