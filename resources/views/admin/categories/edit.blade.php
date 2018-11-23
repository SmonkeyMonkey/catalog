@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить категорию
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменяем название категории</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    {{ Form::open(['route' => ['category.update',$category->id],'method' => 'put']) }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="" value="{{ $category->title }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Изображение</label>
                        <img src="{{ $category->getImage() }}" alt="" class="img-responsive" width="200">
                        <hr>
                        <input type="file" id="exampleInputFile" name="image">
                    </div></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{ $category->description }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default">Назад</button>
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
                {{ Form::close() }}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    @endsection