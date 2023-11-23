<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Post;

class LikedController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->likedPosts;  // отображаем понравившиеся посты для определённого пользователя
        return view('personal.liked.index',compact('posts'));  //ретурним вью, прокидываем свойства
    }

    public function destroy(Post $post)
    {
        $post->delete();  // Удаление конкретной категории из базы данных
        return redirect()->route('posts.index', compact('post'))->with('success', 'Пост успешно удален.')->with('post', $post);  // Перенаправление на страницу отображения постов с информацией о удаленном посте
    }

}
