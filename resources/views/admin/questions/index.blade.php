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
                    <h3 class="box-title">Вопросы</h3>
                    @include('admin._status')
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Вопрос</th>
                            <th>Ответ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{ $question->id }}</td>
                                <td>{{ $question->name }}</td>
                                <td> <p>{{ $question->message }}</p></td>
                                <td> <p>{!!  $question->getAnswer() !!}</p></td>
                                <td>
                                    <a href="{{ route('question.edit', $question->id) }}" class="fa fa-comment"></a>
                                    {{ Form::open(['route'=>['question.destroy', $question->id], 'method'=>'delete']) }}
                                    <button onclick="return confirm('Вы уверены что хотите удалить данный вопрос ?')" type="submit" class="delete">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    {{ Form::close() }}
                                </td>
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
    <!-- /.content-wrapper -->

@endsection