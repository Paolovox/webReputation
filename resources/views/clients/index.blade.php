@extends('layouts.main')

@section('main-content')

    <div class="card">
        <div class="action-header palette-Blue-Grey-400 bg clearfix">
            <div class="ah-label hidden-xs palette-White text">Elenco Clienti</div>
            <ul class="ah-actions actions a-alt">
                <li>
                    <a class="ah-search-trigger" data-ma-action="ah-search-open" onclick="return $('.addClient').toggle();">
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
        <div class="card addClient"  style="display: none">
            <div class="card-header">
                <h2>Aggiungi un nuovo Cliente </h2>
            </div>

            <div class="card-body card-padding">
                {!! Form::open(array('route' => 'clients.store', 'class'=>'row')) !!}
                <div class="col-sm-3">
                    <div class="form-group fg-line">
                        {{ Form::label('name', NULL, ['class' => 'sr-only']) }}
                        {{ Form::text('name', NULL, ['class' => 'form-control input-sm', 'id'=>'inputName', 'placeholder'=> 'Nome', 'required']) }}
                    </div>
                </div>
                <div class="col-sm-3" style="display: none">
                    <div class="form-group fg-line">
                        {{ Form::label('email', NULL, ['class' => 'sr-only']) }}
                        {{ Form::email('email', NULL, ['class' => 'form-control input-sm','placeholder'=> 'Email']) }}
                    </div>
                </div>
                @if( \Auth::user()->hasRole('admin') )
                <div class="col-sm-3">
                    <div class="form-group fg-line">
                        {{ Form::label('lawyer', NULL, ['class' => 'sr-only']) }}
                        {{ Form::select('lawyer',$lawyers->pluck('name','id'), NULL, ['class' => 'form-control input-sm', 'placeholder'=> 'Avvocato', 'required']) }}
                    </div>
                </div>
                @endif

                <div class="col-sm-2">
                    {!! Form::button('Aggiungi', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm m-t-5 waves-effect']); !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="card-header">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Data</th>
                        @if(\Auth::user()->isAdmin())
                        <th>Avvocato</th>
                        @endif
                        <th>Numero Dossier</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dossiers as $counter=>$dossier)
                        @php
                            $client = $dossier->client;
                        @endphp
                        <tr>
                            <td>{{++$counter}}</td>
                            <td> <a href="{{ route('clients.show',$client->id) }}">{{$client->name}}</a></td>
                            <td>{{Carbon\Carbon::parse($client->created_at)->format('d-m-Y') }}</td>
                            @if(\Auth::user()->isAdmin())
                            <td>{{$dossier->lawyer->name}}</td>
                            @endif
                            <td>{{$dossier->number}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
