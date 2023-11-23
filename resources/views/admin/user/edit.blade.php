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
                    <form action="{{ route('users.update',$user->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="card-body w-50">
                            <p class="login-box-msg">Редактирование пользователя</p>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Имя Пользователя" name="name"
                                       value="{{$user->name}}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Почта" name="email"
                                       value="{{$user->email}}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group w-50">
                                <label>Выберите роль:</label>
                                <select class="form-control" name="role">
                                    @foreach($roles as $id => $role)
                                        <option value="{{ $id }}"
                                            {{ $id == $user->role ? 'selected' : '' }}
                                        > {{ $role }} </option>

                                    @endforeach
                                </select>
                                @error('role')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <input type="submit" class="col-2 ml-3  btn btn-block btn-primary" value="Обновить">
                        <a href="{{ route('users.index') }}" type="button"
                           class="col-2 ml-3 mt-3 btn btn-block btn-info">Назад</a>
                        <div class="form-group">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                        </div>
                    </form>
                </div>
            </div>

        </section>

    </div>

@endsection
