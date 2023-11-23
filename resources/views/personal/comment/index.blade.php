@extends('personal.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Ваши комменатрии </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal')}}"> Главная </a></li>
                            <li class="breadcrumb-item"> Комментарии</li>
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
                                <h3 class="card-title">Список ваших комменатриев</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ваш комментарий</th>
                                        <th class="text-center"> Редактировать</th>
                                        <th class="text-center"> Просмотреть пост</th>
                                        <th class="text-center"> Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr class="col-3">
                                            <td> {{$comment->id}} </td>
                                            <td> {{$comment->message}} </td>
                                            <td class="text-center">
                                                <a href="{{route('comment.edit', $comment->id)}}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                @if ($comment->post)
                                                    <a href="{{route('main.show', $comment->post->id)}}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                @else
                                                    Не найден пост
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <form action="{{route('comment.destroy', $comment->id)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
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
                    <div class="col-2 mt-3">
                        <a type="button" class="btn btn-block btn-info" href="{{ route('personal') }}">
                            Назад </a>
                    </div>
            </div>

        </section>

    </div>

@endsection
