@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blank page
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

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
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->getBrandTitle() }}</td>
                                <td> {{ $product->getCollectionTitle() }}</td>
                                <td>{!!   $product->specifications !!}</td>
                                <td>{{ $product->getPrice()}}</td>
                                <td>
                                    <img src="{{ $product->getImage() }}" alt="" width="100">
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
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection