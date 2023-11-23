<?php

namespace App\Http\Controllers\Admin;

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
            'usersCount'      => User::count(),
            'postsCount'      => Post::count(),
            // считаем количество юзеров,постов,категорий и тегов, для отображения в карточках, в админке
            'categoriesCount' => Category::count(),
            'tagsCount'       => Tag::count(),
        ];

        return view('admin.main.index', compact('data'));
    }
}
