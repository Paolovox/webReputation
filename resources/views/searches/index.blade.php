@extends('layouts.main')

@section('main-content')

    <div class="card">
        <div class="action-header palette-Blue-Grey-400 bg clearfix">
            <div class="ah-label hidden-xs palette-White text">Elenco Ricerche</div>
            <ul class="ah-actions actions a-alt">
                <li>
                    <a title="Aggiungi Ricerca" style="cursor:pointer" class="ah-search-trigger" data-ma-action="ah-search-open" onclick="return $('.addSearch').toggle();">
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
        <div class="card addSearch"  style="display: none">
            <div class="card-header">
                <h2>Aggiungi una nuova ricerca </h2>
            </div>

            <div class="card-body card-padding">
                {{ Form::open(array('route' => 'searches.store', 'class'=>'row')) }}
                <div class="col-sm-3">
                    <div class="form-group fg-line">
                        {{ Form::hidden('keyword_id') }}
                        {{ Form::label('platform_id', NULL, ['class' => 'sr-only']) }}
                        {{ Form::select('platform_id', $platforms, null, ['class' => 'form-control input-sm', 'required']) }}
                        {{ Form::label('keyword', NULL, ['class' => 'sr-only']) }}
                        {{ Form::text('keyword', NULL, ['class' => 'form-control input-sm',  'placeholder'=> 'Google, Facebook, ...', 'required']) }}
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
                    @foreach($searches as $counter=>$search)
                        <tr>
                            <td><a href="{{ route('searches.show',['search' => $search->id]) }}"></a>{{++$counter}}</td>
                            <td><a href="{{ route('searches.show',['search' => $search->id]) }}"></a>{{$search->platform->platform}}</td>
                            <td><a href="{{ route('searches.show',['search' => $search->id]) }}"></a>{{$search->keyword->keyword}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection