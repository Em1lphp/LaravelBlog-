<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index()
    {
        $users = User::all();  // Получение всех пользователей из базы данных

        return view('admin.user.index', compact('users'));  // Возврат view с передачей данных о категориях
    }


    public function create()
    {
        $roles = User::getRoles();  // обращаюсь к статическому методу созданому, для выхватывания ролей

        return view('admin.user.create', compact('roles'));  // Возврат view для создания нового пользователя
    }


    public function store(StoreRequest $request)
    {
        $data             = $request->validated();   // Проверка и получение валидированных данных из запроса
        $data['password'] = Hash::make(
            $data['password']
        );  // Хеширование пароля с использованием функции Hash::make(). Теперь $data['password'] содержит хешированный пароль
        User::firstOrCreate(['email' => $data['email']],
            $data
        );  // Создание нового пользователя в базе данных Если пользователь с указанным email уже существует, он не будет создан заново

        return redirect()->route('users.index')->with(
            'success',
            'Пользователь успешно зарегистрирован.'
        );  // Перенаправление на страницу отображения списка пользователей с сообщением об успешной регистрации
    }


    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));  // Возврат view с информацией о конкретном пользователе
    }


    public function edit(User $user)
    {
        $roles = User::getRoles();

        return view(
            'admin.user.edit',
            compact('user', 'roles')
        );  // Возврат view для редактирования конкретного пользователя
    }


    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();  // Проверка и получение валидированных данных из запроса
        $user->update($data);  // Редактирование  пользователя в базе данных

        return redirect()->route('users.index', compact('user'))->with(
            'success',
            'Пользователь успешно обновлен.'
        );  // Перенаправление на страницу отображения списка пользователей с сообщением об успешной регистрации
    }


    public function destroy(User $user)
    {
        $user->delete();  // Удаление конкретной категории из базы данных

        return redirect()->route('users.index', compact('user'))->with('success', 'Пользователь успешно удален.')->with(
            'user',
            $user
        );  // Перенаправление на страницу отображения пользователей с информацией о удаленном пользователе
    }
}
