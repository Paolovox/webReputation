@extends('layouts.main')

@section('main-content')

    <div class="card">
        <div class="action-header palette-Blue-Grey-400 bg clearfix">
            <div class="ah-label hidden-xs palette-White text">Elenco Keywords</div>
            <ul class="ah-actions actions a-alt">
                <li>
                    <a title="Aggiungi Keyword" style="cursor:pointer" class="ah-search-trigger" data-ma-action="ah-search-open" onclick="return $('.addKeyword').toggle();">
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
        <div class="card addKeyword"  style="display: none">
            <div class="card-header">
                <h2>Aggiungi una nuova keyword </h2>
            </div>

            <div class="card-body card-padding">
                {{ Form::open(array('route' => 'keywords.store', 'class'=>'row')) }}
                <div class="col-sm-10">
                    <div class="form-group fg-line">
                        {{ Form::label('name', NULL, ['class' => 'sr-only']) }}
                        {{ Form::text('name', NULL, ['class' => 'form-control input-sm',  'placeholder'=> 'Keyword', 'required']) }}
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
                        <tr class="selection" href="{{ route('keywords.show',['keyword' => $keyword->id]) }}">
                            <td>{{++$counter}}</td>
                            <td>{{$keyword->keyword}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
