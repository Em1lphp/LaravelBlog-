@extends('personal.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Понравившиеся посты </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal')}}"> Главная </a></li>
                            <li class="breadcrumb-item"> Посты</li>
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
                                <h3 class="card-title">Список лайкнутых постов</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название поста</th>
                                        <th class="text-center"> Просмотреть</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr class="col-3">
                                            <td> {{$post->id}} </td>
                                            <td> {{$post->title}} </td>
                                            <td class="text-center"><a
                                                    href="{{route('main.show',$post->id)}}"> <i
                                                        class="fas fa-eye"> </i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-2 mt-3">
                        <a type="button" class="btn btn-block btn-info" href="{{ route('personal') }}">
                            Назад </a>
                    </div>
            </div>

        </section>

    </div>

@endsection
