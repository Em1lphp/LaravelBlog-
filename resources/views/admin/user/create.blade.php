@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Пользователи </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin')}}"> Главная </a></li>
                            <li class="breadcrumb-item"> Пользователи</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="card-body w-50">
                            <p class="login-box-msg">Добавление пользоваетля</p>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Имя Пользователя" name="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Почта" name="email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Введите новый пароль"
                                       name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group ">
                                <input type="password" class="form-control" placeholder="Подтвердите пароль"
                                       name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group w-50 mt-1">
                                <label>Выбор роли</label>
                                @error('role')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <select class="form-control" name="role">
                                    @foreach($roles as $id => $role)
                                        <option value="{{ $id }}"
                                            {{ $id ? 'selected' : '' }}
                                        >{{ $role }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <input type="submit" class="col-2 ml-3 btn btn-block btn-primary" value="Добавить">
                        <a href="{{ route('users.index') }}" type="button"
                           class="col-2 ml-3 mt-3 btn btn-block btn-info">Назад</a>
                    </form>
                </div>
            </div>

        </section>

    </div>

@endsection
