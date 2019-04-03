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
                            <label for="title">Категория</label>
                            <select name="category_id" id="category_id" class="form-control select2" required>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" @if($brand->category_id == $item->id) selected @endif >{{ $item->id_title }}</option>
                                @endforeach
                                </select>

                        </div>

                        <div class="form-group">
                            <label>
                                <input name="is_published" type="hidden" value="0" >
                                <input type="checkbox" name="is_published" class="form-check-input"
                                @if($brand->is_published)
                                    checked="checked"
                                @endif>
{{--                                {{ Form::checkbox('is_published', 1, $brand->is_published,['class' => 'minimal']) }}--}}
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
