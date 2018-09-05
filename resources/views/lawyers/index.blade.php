@extends('layouts.main')

@section('main-content')
    <div class="card">
        <div class="action-header palette-Blue-Grey-400 bg clearfix">
            <div class="ah-label hidden-xs palette-White text">Elenco Avvocati</div>
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
                {{ Form::open(array('route' => 'lawyers.store', 'class'=>'row')) }}
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
                        <th>Avvocato</th>
                        <th>Email</th>
                        <th>Numero Clienti</th>
                        <th>Data Iscrizione</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lawyers as $counter=>$lawyer)
                        <tr>
                            <td>{{++$counter}}</td>
                            <td><a href="{{ route('clients.index',['lawyer' => $lawyer->id]) }}">{{$lawyer->name}}</a></td>
                            <td>{{$lawyer->email}}</td>
                            <td>{{count($lawyer->dossier)}}</td>
                            <td>{{Carbon\Carbon::parse($lawyer->created_at)->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
