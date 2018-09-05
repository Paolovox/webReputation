@extends('layouts.main')

@section('main-content')

    <div class="card">
        <div class="action-header palette-Blue-Grey-400 bg clearfix">
            <div class="ah-label hidden-xs palette-White text">
              Elenco Risultati per <strong>"{{$search->keyword->keyword}}"</strong> su <strong>{{$search->platform->platform}}</strong>
            </div>
            <ul class="ah-actions actions a-alt">
                <li>
                    <a title="Aggiungi Ricerca" style="cursor:pointer" class="ah-search-trigger" data-ma-action="ah-search-open" onclick="return $('.addResults').toggle();">
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
        <div class="card addResults"  style="display: none">
            <div class="card-header">
                <h2>Aggiungi un risultato </h2>
            </div>

            <div class="card-body card-padding">

            </div>
        </div>

        <div class="card-header">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Position</th>
                        <th>Description</th>
                        <th>Data</th>
                    </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
