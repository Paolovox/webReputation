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
                <div class="col-sm-10">
                    <div class="col-sm-6 form-group">
                        {{ Form::label('platform_id', 'Platform:', []) }}
                        {{ Form::select('platform_id', $platforms, NULL, ['class' => 'form-control input-sm', 'required']) }}
                    </div>
                    <div class="col-sm-6 form-group">
                        {{ Form::hidden('keyword_id', NULL, ["required"]) }}
                        {{ Form::label('keyword', "Keyword:", ['class' => '']) }}
                        {{ Form::text('keyword', NULL, ['class' => 'form-control input-sm',  'placeholder'=> 'Type text...', 'required']) }}
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

@section('scripts')
    <script type="text/javascript">
        $(function() {
            $keyword = $('input[name="keyword"]');
            $keyword.autocomplete({
                source: "autocomplete/keywords",
                minLength: 1,
                select: function(event, ui) {
                    $('input[name="keyword_id"]').val(ui.item.id);
                    $('input[name="keyword"]').val(ui.item.value);
                }
            });
            $keyword[0].addEventListener("input", function (ev) {
                $('input[name="keyword_id"]').val(null);
            });
        });
    </script>
@endsection