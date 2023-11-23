<?php

namespace App\Http\Controllers\Main\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;


class StoreController extends Controller
{
    public function store(Post $post)
    {
        auth()->user()->likedPosts()->toggle(
            $post->id
        );  // Используем метод toggle для добавления/удаления лайка текущим пользователем для указанного поста

        return redirect()->back();  // Перенаправляем пользователя назад (на предыдущую страницу)
    }
}
