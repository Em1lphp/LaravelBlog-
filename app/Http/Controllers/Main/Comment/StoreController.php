<?php

namespace App\Http\Controllers\Main\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\StoreRequest;
use App\Models\Comment;
use App\Models\Post;


class StoreController extends Controller
{
    public function store(Post $post, StoreRequest $request)
    {
        $data            = $request->validated();  // Получаем валидированные данные из запроса
        $data['user_id'] = auth()->user()->id;  // Устанавливаем user_id для комментария, пользуемся хелпером auth
        $data['post_id'] = $post->id;  // Устанавливаем post_id для комментария
        Comment::create($data);  // Создаем новый комментарий в базе данных

        return redirect()->route(
            'main.show',
            $post->id
        );  // Перенаправляем пользователя на страницу просмотра указанного поста
    }
}
