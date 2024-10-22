@extends('admin.layout')
@section('content')
    <style>
        p {
            width: 400px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Листинг сущности</h3>
            </div>
            @if(session('massage') || session('update') || session('delete'))
                <div class="alert alert-success" role="alert">
                    {{ session('massage') }}
                    {{ session('update') }}
                    {{ session('delete') }}
                </div>
                @endif

            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('category.create') }}" class="btn btn-success">Добавить</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Изображение</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{!! $category->description !!}</td>
                            <td>
                            <img src="{{ asset('/uploads/categories/' . $category->image) }}" alt="" width="100">
                            </td>
                            <td>
                                <a href="{{ route('category.edit',$category->id) }}" class="fa fa-pencil"></a>
                                {{ Form::open(['route' => ['category.destroy',$category->id],'method' => 'delete']) }}
                                <button onclick="return confirm('Вы уверены что хотите удалить категорию ?')" type="submit" class="delete">
                                <i  class="fa fa-remove"></i>
                                </button>
                                {{ Form::close() }}
                            </td>
                        </tr>

                    @endforeach
                </table>
                {{ $categories->links() }}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
    @endsection