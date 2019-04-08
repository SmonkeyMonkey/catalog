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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Коллекции</h3>
                    @include('admin._status')
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('collection.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Производитель</th>
                            <th>Описание</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($collections as $collection)
                            <tr>
                                <td>{{ $collection->id }}</td>
                                <td>{{ $collection->title }}</td>
                                <td>{{ $collection->brands->title }}</td>
                                <td>{{ $collection->description }}</td>
                                <td>
                                    <a href="{{ route('collection.edit', $collection->id) }}" class="fa fa-pencil"></a>

                                    {{ Form::open(['route'=>['collection.destroy', $collection->id], 'method'=>'delete']) }}
                                    <button onclick="return confirm('Вы уверены что хотите удалить данную коллекцию ?')" type="submit" class="delete">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $collections->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
