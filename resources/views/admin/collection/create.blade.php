@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавление коллекции
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
        'route' => 'collection.store',
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
                            <label>Производитель</label>
                            {{ Form::select('brand_id',
                            $brands,
                              null,
                              ['class' => 'form-control select2']) }}
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