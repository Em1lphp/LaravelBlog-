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
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label><h5 class="mb-2">Название поста</h5></label>
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <input type="text" class="col-4 form-control" name="title"
                                   placeholder="Введите название поста">
                        </div>
                        <div class=" mt-4 form-group ">
                            <label for="exampleInputFile">Описание поста</label>
                            @error('content')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <textarea id="summernote" name="content"></textarea>
                        </div>
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Превью</label>
                            @error('preview_image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile"
                                           name="preview_image">
                                    <label class="custom-file-label" for="exampleInputFile">Добавить jpeg/png</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузка</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Главное изображение</label>
                            @error('main_image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile"
                                           name="main_image">
                                    <label class="custom-file-label" for="exampleInputFile">Добавить jpeg/png</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузка</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group w-50">
                            <label>Выбор категории</label>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == old('category_id') ? 'selected' : '' }}
                                    >{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-50" data-select2-id="76">
                            <label>Выбор тэгов</label>
                            @error('tag_ids')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <select class="select2 select2-hidden-accessible" multiple="" name="tag_ids[]"
                                    data-placeholder="Выберите тэги" style="width: 100%;" data-select2-id="7"
                                    tabindex="-1" aria-hidden="true">
                                @foreach($tags as $tag)
                                    <option
                                        {{is_array(old('tag_ids')) && in_array($tag->id,old('tag_ids')) ? 'selected' : ''}} value="{{$tag->id}}"
                                    >{{$tag->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" class="col-2 mt-3 btn btn-block btn-primary" value="Добавить">
                        <a href="{{ route('posts.index') }}" type="button"
                           class="col-2 mt-3 btn btn-block btn-info">Назад</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
