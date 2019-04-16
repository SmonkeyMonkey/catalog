@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    @include('admin.errors')
                    <label for="name">Ответил(а):</label>{{ $question->replied->name ?? '' }}<br>
                    <label for="date">Дата ответа:</label>{{ $question->getRepliedDate() ?? 'Вопрос пока не получил ответ' }}
                </div>
                </div>
                <div class="box-body">
                    {{ Form::open(['route' => ['question.update',$question->id],'method' => 'put']) }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя</label>
                            <input type="text" class="form-control " name="title" id="exampleInputEmail1"  value="{{ $question->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Вопрос</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" disabled>{{ $question->message }}</textarea>

                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ответ</label>
                            <textarea name="answer" id="" cols="30" rows="10" class="form-control" >{{ $question->answer }}</textarea>
                        </div>
                    </div>

{{--                {{ Form::hidden('replied_id',$userID) }}--}}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Ответить/Изменить ответ</button>
                </div>
                <!-- /.box-footer-->
                {{ Form::close() }}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
