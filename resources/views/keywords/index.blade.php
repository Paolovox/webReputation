  @extends('layouts.main')

@section('main-content')
    <div class="card">
        <div class="action-header palette-Blue-Grey-400 bg clearfix">
            <div class="ah-label hidden-xs palette-White text">Elenco Keywords</div>
            <ul class="ah-actions actions a-alt">
                <li>
                    <a class="ah-search-trigger" data-ma-action="ah-search-open" onclick="return $('.addLawyer').toggle();">
                        <i class="zmdi zmdi-account-add zmdi-hc-fw"></i>
                    </a>
                </li>
            </ul>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card addLawyer"  style="display: none">
            <div class="card-header">
                <h2>Aggiungi un nuovo avvocato </h2>
            </div>

            <div class="card-body card-padding">
                {{ Form::open(array('route' => 'keywords.store', 'class'=>'row')) }}
                    <div class="col-sm-3">
                        <div class="form-group fg-line">
                            {{ Form::label('name', NULL, ['class' => 'sr-only']) }}
                            {{ Form::text('name', NULL, ['class' => 'form-control input-sm',  'placeholder'=> 'Nome', 'required']) }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group fg-line">
                            {{ Form::label('email', NULL, ['class' => 'sr-only']) }}
                            {{ Form::email('email', NULL, ['class' => 'form-control input-sm', 'placeholder'=> 'Email', 'required']) }}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        {{ Form::button('Aggiungi', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm m-t-5 waves-effect']) }}
                    </div>
                    {{ Form::close() }}
            </div>
        </div>

        <div class="card-header">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Keyword</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($keywords as $counter=>$keyword)
                        <tr>
                            <td>{{++$counter}}</td>
                            <td><a href="{{ route('clients.index',['lawyer' => $lawyer->id]) }}">{{$keyword->keyword}}</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
