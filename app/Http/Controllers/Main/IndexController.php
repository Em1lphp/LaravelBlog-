<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;


class IndexController extends Controller
{
    public function index()
    {
        $posts       = Post::paginate(6);  //получаем посты с пагинацией
        $randomPosts = Post::get()->random(4);  // Получаем 4 случайных поста
        $likedPosts  = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(
            4
        );  // Получаем 4 поста с наибольшим количеством лайков

        return view(
            'main.index',
            compact('posts', 'randomPosts', 'likedPosts')
        );  // ретурним вью и прокидываем свойства
    }

    public function show(Post $post)
    {
        $date         = Carbon::parse($post->created_at);  // Получаем дату создания поста в формате Carbon
        $relatedPosts = Post::where(
            'category_id',
            $post->category_id
        )  // Получаем 3 связанных поста из той же категории, исключая текущий пост, чейним
        ->where('id', '!=', $post->id)
            ->get()
            ->take(3);

        return view('main.show', compact('post', 'date', 'relatedPosts'));  // ретурним вью и прокидываем свойства
    }
}
