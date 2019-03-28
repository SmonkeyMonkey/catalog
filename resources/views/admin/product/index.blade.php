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
                    <h3 class="box-title">Продукты</h3>
                    @include('admin._status')
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('product.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Производитель</th>
                            <th>Коллекция</th>
                            <th>Характеристики</th>
                            <th>Стоимость</th>
                            <th>Изображение</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->brand->title }}</td>
                                <td> {{ $product->collection->title }}</td>
                                <td>{!!   $product->specifications !!}</td>
                                <td>{{ $product->price ?? "договорная" }}</td>
                                <td>

                                    <img src="{{ asset('uploads/products/'.$product->image) }}" alt="" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}" class="fa fa-pencil"></a>

                                    {{ Form::open(['route'=>['product.destroy', $product->id], 'method'=>'delete']) }}
                                    <button onclick="return confirm('Вы уверены что хотите удалить данный продукт ?')" type="submit" class="delete">
                                        <i class="fa fa-remove"></i>
                                    </button>

                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $products->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection