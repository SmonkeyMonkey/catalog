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
                    <h3 class="box-title">Производители(бренды)</h3>
                    @include('admin._status')
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('brand.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Краткое описание</th>
                            <th>Полное описание</th>
                            <th>Категория</th>
                            <th>Картинка</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->title }}</td>
                                <td>{!! $brand->description !!}</td>
                                <td>{!! $brand->about !!}</td>
                                <td>{{ $brand->category->title }}</td>
                                <td>
                                    <img src="{{ $brand->getImage() }}" alt="" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('brand.edit', $brand->id) }}" class="fa fa-pencil"></a>

                                    {{ Form::open(['route'=>['brand.destroy', $brand->id], 'method'=>'delete']) }}
                                    <button onclick="return confirm('Вы уверены что хотите удалить данный бренд ?')" type="submit" class="delete">
                                        <i class="fa fa-remove"></i>
                                    </button>

                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    {{ $brands->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection