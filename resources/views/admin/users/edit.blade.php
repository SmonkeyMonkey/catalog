@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['users.update',$user->id],'method' => 'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактируем данные пользователя</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пароль</label>
                            <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="">
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