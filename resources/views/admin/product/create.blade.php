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

                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Заговок страницы(meta title)</label>
                            <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title') }}" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ключевые слова(meta keywords)</label>
                            <textarea name="meta_keywords" id="" cols="30" rows="10" class="form-control">{{ old('meta_keywords') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Краткое описание(meta description)</label>
                            <textarea name="meta_description" id="" cols="30" rows="10" class="form-control">{{ old('meta_description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Картинка</label>
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
                            <select name="brand_id" id="brand_id" class="form-control select2" required>
                                @foreach ($brands as $item)
                                    <option value="{{ $item->id }}">{{ $item->id_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Коллекция</label>
                            <select name="collection_id" id="collection_id" class="form-control select2" required>
                                @foreach ($collections as $item)
                                    <option value="{{ $item->id }}">{{ $item->id_title }}</option>
                                @endforeach
                            </select>
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
