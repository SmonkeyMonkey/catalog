@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Привет! Это админка
            <small>приятные слова..</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Главная страница</h3>
            </div>
            <div class="box-body">
                1.Добавляете категорию
                2.Добавляете производителя
                3.Добавляете коллекцию
                4.Добавляете продукты
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Новые вопросы отображаются в зеленой иконке возле раздела "Вопросы"
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
    @endsection