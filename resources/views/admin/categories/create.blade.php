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
        @if(session('massage'))
                <div class="alert alert-success" role="alert">
                    {{ session('massage') }}
                </div>
            @endif
            <!-- Default box -->
            <div class="box">
                {{ Form::open([
        'route' => 'category.store',
        'files' => true,
        ]) }}
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем категорию</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Изображение</label>
                    <input type="file" id="exampleInputFile" name="image">
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Описание</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
{{--                {{ Form::hidden('created_by',$userID) }}--}}
                <!-- /.box-footer-->
                {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->

    </div>
    @endsection
