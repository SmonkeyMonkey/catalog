@extends('admin.layout')
@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('users.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>E-mail</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><a href="{{ route('users.edit',$user->id) }}" class="fa fa-pencil"></a>
                                    {{ Form::open(['route' => ['users.destroy',$user->id],'method' => 'delete']) }}
                                    <button onclick="return confirm('Вы уверены что хотите удалить пользователя?')" type="submit" class="delete">
                                        <i  class="fa fa-remove"></i>
                                    </button>
                                {{ Form::close() }}

                            </tr>
                        @endforeach

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection