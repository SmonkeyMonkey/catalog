@extends('layout')
@section('content')
    <style>

    </style>
    <div class="container pt-3">
        <div class="row justify-content-sm-center">
            <div class="col-sm-10 col-md-6">
                <div class="card border-info">
                    {{--<div class="card-header">Sign in to continue</div>--}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="https://placeimg.com/128/128/tech/sepia">
                                <h4 class="text-center">Вход в систему</h4>

                            </div>
                            <div class="col-md-8">
                                @if ($errors->any())
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(session('status'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                    {{ Form::open(['route' => 'login'])}}
                                    <input type="text" name="name" class="form-control mb-2" placeholder="Имя пользователя"  autofocus>
                                    <input type="password" name="password" class="form-control mb-2" placeholder="Password" >
                                    <button class="btn btn-lg btn-primary btn-block mb-1" type="submit">Войти</button>
                                    {{ Form::close() }}

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection