@extends('layouts.main')

@section('main-content')

    <div class="card">
        <div class="action-header palette-Blue-Grey-400 bg clearfix">
            <div class="ah-label hidden-xs palette-White text">Elenco Platforms</div>
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
                <h2>Aggiungi una nuova Piattaforma </h2>
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
                        <th>Platform</th>
                    </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
