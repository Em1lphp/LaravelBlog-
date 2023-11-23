<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;


class TagController extends Controller
{

    // Отображение списка всех тегов
    public function index()
    {
        $tags = Tag::all();  // Получение всех тегов из базы данных

        return view('admin.tag.index', compact('tags'));  // Возврат view с передачей данных о тегах
    }


    // Отображение формы для создания нового тега
    public function create()
    {
        return view('admin.tag.create');  // Возврат view для создания нового тега
    }


    // Сохранение нового тега
    public function store(StoreRequest $request)
    {
        $data = $request->validated();   // Проверка и получение валидированных данных из запроса
        Tag::firstOrCreate($data);  // Создание нового тега в базе данных

        return redirect()->route('tags.index')->with(
            'success',
            'Тег успешно создан.'
        );  // Перенаправление на страницу отображения тегов
    }


    // Отображение информации о конкретном теге
    public function show(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));  // Возврат view с информацией о конкретном теге
    }


    // Отображение формы для редактирования конкретного тега
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));  // Возврат view для редактирования конкретного тега
    }


    // Обновление данных тега
    public function update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();  // Проверка и получение валидированных данных из запроса
        $tag->update($data);  // Обновление данных конкретного тега в базе данных

        return redirect()->route('tags.index')->with('success', 'Тег успешно обновлен.')->with(
            'tag',
            $tag
        );  // Перенаправление на страницу отображения тегов с информацией о редактируемом теге
    }


    // Удаление тега
    public function destroy(Tag $tag)
    {
        $tag->delete();  // Удаление конкретного тега из базы данных

        return redirect()->route('tags.index')->with('success', 'Тег успешно удален.')->with(
            'tag',
            $tag
        );  // Перенаправление на страницу отображения тегов с информацией о удаленном теге
    }
}

