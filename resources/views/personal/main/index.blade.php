@extends('personal.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Личный кабинет</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal')}}"> Главная </a></li>
                            <li class="breadcrumb-item active"> страница </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- main content -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <h3 class="profile-username text-center"></h3>

                <p class="text-muted text-center welcome-message">
                    Добро пожаловать, {{ $user->name }}!
                </p>


                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Ваша почта</b> <a class="float-right">{{$user->email}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Ваш статус</b>
                        <a class="float-right">
                            {{ optional($user->getRoles())[$user->role] ?? 'Пользователь' }}
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Понравившиеся посты</b>
                        <a href="{{ route('likes.index') }}" class="float-right">{{ $data['likedPosts'] }} </a>
                    </li>
                    <li class="list-group-item">
                        <b>Ваши комменатрии</b> <a href="{{route('comment.index')}}" class="float-right">{{$data['commentPosts']}}</a>
                    </li>
                </ul>
                <div class="w-50 mx-auto">
                <a href="{{route('main.index')}}" class="btn btn-primary btn-block"><b>Вернуться на главную страницу</b></a>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
