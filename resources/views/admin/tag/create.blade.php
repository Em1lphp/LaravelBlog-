@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Тэги </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin')}}"> Главная </a></li>
                            <li class="breadcrumb-item"> Тэги</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="card-body">
                    <form action="{{ route('tags.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label><h5 class="mb-2">Название тэга</h5></label>
                            <input type="text" class="col-4 form-control" name="title" placeholder="введите тэг">
                            @error('title')
                            <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <input type="submit" class="col-2 mt-3 btn btn-block btn-primary" value="Добавить">
                        <a href="{{ route('tags.index') }}" type="button"
                           class="col-2 mt-3 btn btn-block btn-info">Назад</a>
                    </form>
                </div>
            </div>

        </section>

    </div>

@endsection
