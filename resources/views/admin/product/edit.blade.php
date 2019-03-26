@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Редактирование товара
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['product.update',$product->id],
                'files' => true,
                'method' => 'put'
                ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="col-12 col-md-8">
                        @include('admin.errors')
                        <label for="name">Created by:</label>{{ $product->getUserName() }}<br>
                        <label for="date">Date:</label>{{ $product->getCreatedDate() }}
                        </div>

                        <div class="col-6 col-md-4">
                            <label for="name">Updated by:</label>{{ $product->getUpdatedUserName() }}<br>
                            <label for="date">Date:</label>{{ $product->getUpdatedDate() }}
                        </div>


                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" name="title" value="{{ $product->title }}" id="exampleInputEmail1" placeholder="">
                            <label for="disabledInput" class="col-sm-2 control-label">Slug</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="disabledInput" type="text" value="{{ $product->slug }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Заговок страницы(meta title)</label>
                            <input type="text" class="form-control" name="meta_title" value="{{ $product->meta_title }}" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ключевые слова(meta keywords)</label>
                            <textarea name="meta_keywords" id="" cols="30" rows="10" class="form-control">{{ $product->meta_keywords }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Краткое описание(meta description)</label>
                            <textarea name="meta_description" id="" cols="30" rows="10" class="form-control">{{ $product->meta_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <img src="{{ $product->getImage() }}" alt="" class="img-responsive" width="200">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" id="exampleInputFile" name="image">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Стоимость</span>
                            </div>
                            <input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="price" value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label>Производитель</label>
                            {{ Form::select('brand_id',
                            $brands,
                              $product->getBrandID(),
                              ['class' => 'form-control select2']) }}
                        </div>
                        <div class="form-group">
                            <label>Коллекция</label>
                            {{ Form::select('collection_id',
                            $collections,
                              $product->getCollectionID(),
                              ['class' => 'form-control select2']) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание(с сохранение форматирования)</label>
                            <textarea name="specifications" id="" cols="30" rows="10" class="form-control">{{ $product->specifications }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-success pull-right">Редактировать</button>
                </div>
                <!-- /.box-footer-->
                {{ Form::hidden('updated_by',$userID) }}
            </div>

            <!-- /.box -->
            {{ Form::close() }}
        </section>
        <!-- /.content -->
    </div>
@endsection