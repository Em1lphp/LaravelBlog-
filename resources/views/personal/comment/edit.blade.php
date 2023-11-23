@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Комменатрий </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin')}}"> Главная </a></li>
                            <li class="breadcrumb-item"> Комменатрий</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="card-body">
                    <form action="{{ route('comment.update',$comment->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label><h5 class="mb-2">Ваш Комментарйи</h5></label>
                            <input type="text" class="col-4 form-control" name="message" value="{{$comment->message}}" placeholder="введите категорию">
                            @error('message')
                            <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <input type="submit" class="col-2 mt-3 btn btn-block btn-primary" value="Редактировать">
                        <a href="{{ route('comment.index') }}" type="button"
                           class="col-2 mt-3 btn btn-block btn-info">Назад</a>
                    </form>
                </div>
            </div>

        </section>

    </div>

@endsection
