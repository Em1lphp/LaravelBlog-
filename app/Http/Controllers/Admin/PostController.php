<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends BaseController  // Наследуюемся от BaseController, для возможности использовать сервис
{

    public function index()
    {
        $posts = Post::all();  // Получение всех постов из базы данных
        return view('admin.post.index', compact('posts'));  // Возврат view с передачей данных о постах
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));  // Возврат view для создания нового поста
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();   // Проверка и получение валидированных данных из запроса
        $this->service->store($data);  // Использование сервиса
        return redirect()->route('posts.index')->with('success', 'Пост успешно создан.');  // Перенаправление на страницу отображения постов
    }


    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));  // Возврат view с информацией о конкретном плсье
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));  // Возврат view для редактирования конкретного поста
    }


    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();  // Проверка и получение валидированных данных из запроса
        $this->service->update($data, $post);  // Использование сервиса
        return redirect()->route('posts.index', compact('post'))->with('success', 'Пост успешно обновлен.')->with('post', $post);  // Перенаправление на страницу отображения постов с информацией о редактируемом посте
    }


    public function destroy(Post $post)
    {
        $post->delete();  // Удаление конкретной категории из базы данных

        return redirect()->route('posts.index', compact('post'))->with('success', 'Пост успешно удален.')->with(
            'post',
            $post
        );  // Перенаправление на страницу отображения постов с информацией о удаленном посте
    }
}
