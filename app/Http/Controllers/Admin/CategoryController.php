<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;


class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();  // Получение всех категорий из базы данных

        return view('admin.category.index', compact('categories'));  // Возврат view с передачей данных о категориях
    }


    public function create()
    {
        return view('admin.category.create');  // Возврат view для создания новой категории
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();   // Проверка и получение валидированных данных из запроса
        Category::firstOrCreate($data);  // Создание новой категории в базе данных

        return redirect()->route('categories.index')->with(
            'success',
            'Категория успешно создана.'
        );  // Перенаправление на страницу отображения категорий
    }


    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));  // Возврат view с информацией о конкретной категории
    }


    public function edit(Category $category)
    {
        return view(
            'admin.category.edit',
            compact('category')
        );  // Возврат view для редактирования конкретной категории
    }


    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();  // Проверка и получение валидированных данных из запроса
        $category->update($data);  // Обновление данных конкретной категории в базе данных

        return redirect()->route('categories.index', compact('category'))->with(
            'success',
            'Категория успешно обновлена.'
        )->with(
            'category',
            $category
        );  // Перенаправление на страницу отображения категорий с информацией о редактируемой категории
    }


    public function destroy(Category $category)
    {
        $category->delete();  // Удаление конкретной категории из базы данных

        return redirect()->route('categories.index', compact('category'))->with(
            'success',
            'Категория успешно удалена.'
        )->with(
            'category',
            $category
        );  // Перенаправление на страницу отображения категорий с информацией о удаленной категории
    }
}
