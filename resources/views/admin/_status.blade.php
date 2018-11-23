
@if(session('update'))
                <div class="alert alert-primary" role="alert">
                    {{ session('update') }}
                </div>
    @endif
@if(session('create'))
                <div class="alert alert-success" role="alert">
                    {{ session('create') }}
                </div>
            @endif
@if(session('delete'))
                <div class="alert alert-warning" role="alert">
                    {{ session('delete') }}
                </div>
    @endif