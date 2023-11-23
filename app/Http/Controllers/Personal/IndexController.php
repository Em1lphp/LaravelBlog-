<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {

        $data = [
            'likedPosts' => auth()->user()->likedPosts->count(), // считаю количество понравившихся постов у конкретного пользователя
            'commentPosts' => auth()->user()->comments->count(), // считаю количество комменатриев
        ];
        // Проверяем, аутентифицирован ли пользователь
        if (auth()->check()) {
            // Если да, получаем данные пользователя и передаем их в представление
            $user = auth()->user();
            $roles = User::getRoles();  // обращаемся к статическому методу для отображения ролей в личном кабинете
            return view('personal.main.index', compact('user', 'roles', 'data'));
        }

        // Если пользователь не аутентифицирован, перенаправляем его на страницу входа
        return redirect('/login');
    }

}
