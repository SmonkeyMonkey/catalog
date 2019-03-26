@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Редактирование категории
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <label for="name">Created by:</label>{{ $category->getUserName() }}<br>
                        <label for="date">Date:</label>{{ $category->getCreatedDate() }}
                        </div>
                    <div class="col-6 col-md-4">
                        <label for="name">Updated by:</label>{{ $category->getUpdatedUserName() }}<br>
                        <label for="date">Date:</label>{{ $category->getUpdatedDate() }}
                    </div>

                </div>
                <div class="box-header with-border">


                    @include('admin.errors')
                </div>
                <div class="box-body">
                    {{ Form::open(['route' => ['category.update',$category->id],'method' => 'put','files' => true]) }}

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="" value="{{ $category->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Изображение(jpeg, png, bmp, gif, or svg)</label>
                        <img src="{{ $category->getImage() }}" alt="" class="img-responsive" width="200">
                        <input type="file" id="exampleInputFile" name="image">
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация" value="{{ $category->slug ?? ""}}" readonly="">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{ $category->description }}</textarea>
                        </div>
                    </div>
                </div>
                    {{ Form::hidden('updated_by',$userID) }}
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default">Назад</button>
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
                {{ Form::close() }}
            </div>
            <!-- /.box -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    @endsection