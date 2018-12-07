@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавление товара
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
        'route' => 'product.store',
        'files' => true,
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем товар</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="exampleInputEmail1" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" id="exampleInputFile" name="image">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Стоимость(указывать через точку,без запятой)</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="price">
                        </div>
                        <div class="form-group">
                            <label>Производитель</label>
                            {{ Form::select('brand_id',
                            $brands,
                              null,
                              ['class' => 'form-control select2']) }}
                        </div>
                        <div class="form-group">
                            <label>Коллекция</label>
                            {{ Form::select('collection_id',
                            $collections,
                              null,
                              ['class' => 'form-control select2']) }}
                        </div>
                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal" name="is_published">
                            </label>
                            <label>
                                Опубликовать
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание(с сохранение форматирования)</label>
                            <textarea name="specifications" id="" cols="30" rows="10" class="form-control">{{ old('specifications') }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{ Form::close() }}
        </section>
        <!-- /.content -->
    </div>
@endsection