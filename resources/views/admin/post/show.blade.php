@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Посты </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin')}}"> Главная </a></li>
                            <li class="breadcrumb-item"> Посты</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="mt-1">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ПОСТ {{$post->title}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название поста</th>
                                        <th class="text-center"> Редактировать</th>
                                        <th class="text-center"> Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="col-3">
                                        <td> {{$post->id}} </td>
                                        <td> {{$post->title}} </td>
                                        <td class="text-center"><a
                                                href="{{route('posts.edit',$post->id)}}">
                                                <i class="fas fa-pencil-alt text-warning"></i></i> </a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{route('posts.destroy', $post->id)}}"
                                                  method="POST">
                                                @csrf @method('delete')
                                                <button class="border-0 bg-transparent">
                                                    <i class="text-danger fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2 mt-4">
                    <a type="button" class="btn btn-block btn-primary" href="{{ route('posts.index') }}">
                        Назад </a>
                </div>
            </div>

        </section>

    </div>

@endsection
