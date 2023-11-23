@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Категории </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin')}}"> Главная </a></li>
                            <li class="breadcrumb-item"> Категории</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- main content -->
        <section class="content">
            <div class="container-fluid">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                @endif

                <div class="mt-1">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список всех категорий на сайте</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название категории</th>
                                        <th class="text-center"> Просмотреть</th>
                                        <th class="text-center"> Редактировать</th>
                                        <th class="text-center"> Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr class="col-3">
                                            <td> {{$category->id}} </td>
                                            <td> {{$category->title}} </td>
                                            <td class="text-center"><a
                                                    href="{{route('categories.show',$category->id)}}"> <i
                                                        class="fas fa-eye"> </i> </a>
                                            </td>
                                            <td class="text-center"><a
                                                    href="{{route('categories.edit',$category->id)}}">
                                                    <i class="fas fa-pencil-alt text-warning"></i></i> </a>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{route('categories.destroy', $category->id)}}"
                                                      method="POST">
                                                    @csrf @method('delete')
                                                    <button class="border-0 bg-transparent">
                                                        <i class="text-danger fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2 mt-4">
                    <a type="button" class="btn btn-block btn-primary" href="{{ route('categories.create') }}">
                        Создать </a>
                </div>
                <div class="col-2 mt-3">
                    <a type="button" class="btn btn-block btn-info" href="{{ route('admin') }}">
                        Назад </a>
                </div>
            </div>

        </section>

    </div>

@endsection
