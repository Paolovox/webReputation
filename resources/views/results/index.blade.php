@extends('layouts.main')

@section('main-content')

    <div class="card">
        <div class="action-header palette-Blue-Grey-400 bg clearfix">
            <div class="ah-label hidden-xs palette-White text">Elenco Risultati</div>
            <ul class="ah-actions actions a-alt">
                <li>
                    <a title="Aggiungi Ricerca" style="cursor:pointer" class="ah-search-trigger" data-ma-action="ah-search-open" onclick="return $('.addResult').toggle();">
                        <i class="zmdi zmdi-collection-plus zmdi-hc-fw"></i>
                    </a>
                </li>
            </ul>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card addResult"  style="display: none">
            <div class="card-header">
                <h2>Aggiungi una nuovo risultato </h2>
            </div>

            <div class="card-body card-padding">
                {{ Form::open(array('route' => 'results.store', 'class'=>'row')) }}
                <div class="col-sm-10">
                    {{-- AGGIUNGERE GLI ALTRI PARAMETRI (link, status, position, description) --}}
                    <div class="col-sm-6 form-group">
                        {{ Form::label('search_id', 'Search:', []) }}
                        {{ Form::select('search_id', $searches, NULL, ['class' => 'form-control input-sm', 'required']) }}
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
                        <th>Platform</th>
                        <th>Keyword</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $counter=>$result)
                        <tr class="selection" href="{{ route('results.show',['search' => $result->id]) }}">
                            <td>{{++$counter}}</td>
                            <td>{{$result->search->platform->platform}}</td>
                            <td>{{$result->search->keyword->keyword}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
