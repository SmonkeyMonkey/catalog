@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Редактирование производителя(бренда)
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['brand.update',$brand->id],
        'files' => true,
        'method' => 'put'
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название бренда</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $brand->title }}" name="title">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Текущая картинка</label>
                            <img src="{{ $brand->getImage() }}" alt="" class="img-responsive" width="200">
                            <hr>
                            <input type="file" id="exampleInputFile" name="image">
                        </div>
                        <div class="form-group">
                            <label>Категория</label>
                            {{ Form::select('category_id',
                             $categories,
                           $brand->getCategoryID(),
                           ['class' => 'form-control select2']) }}
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label>Теги</label>--}}
                            {{--{{ Form::select('tags[]',--}}
                            {{--$tags,--}}
                              {{--$selectedTags,--}}
                              {{--['class' => 'form-control select2','multiple'=>'multiple','data-placeholder'=>'Выберите теги']) }}--}}
                        {{--</div>--}}
                        <!-- Date -->
                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                {{ Form::checkbox('is_published', 1, $brand->is_published,['class' => 'minimal']) }}
                            </label>
                            <label>
                                Опубликовать
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Краткое описание</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $brand->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полное описание</label>
                            <textarea name="about" id="" cols="30" rows="10" class="form-control">{{ $brand->about }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{ Form::close() }}
        </section>
        <!-- /.content -->
    </div>
@endsection