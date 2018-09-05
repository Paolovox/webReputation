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


                <div class="row">

                  <div class="col-sm-4 form-group">
                    {{ Form::hidden('keyword_id', NULL, ["required"]) }}
                    {{ Form::label('keyword', "Keyword:", ['class' => '']) }}
                    {{ Form::text('keyword', NULL, ['class' => 'form-control input-sm',  'placeholder'=> 'Type text...', 'required']) }}
                  </div>

                  <div class="col-sm-4 form-group">
                    {{ Form::label('platform_id', 'Platform:', []) }}
                    {{ Form::select('platform_id', $platforms, NULL, ['class' => 'form-control input-sm', 'required']) }}
                  </div>

                  <div class="col-sm-4 form-group">
                    {{ Form::label('status', 'Status:', []) }}
                    {{ Form::text('status', NULL, ['class' => 'form-control input-sm',  'placeholder'=> 'Type status...', 'required']) }}
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-1 form-group">
                    {{ Form::label('position', 'Position:', []) }}
                    {{ Form::text('position', NULL, ['class' => 'form-control input-sm',  'placeholder'=> 'Type position...', 'required']) }}
                  </div>


                  <div class="col-sm-11 form-group">
                    {{ Form::label('description', 'Description:', []) }}
                    {{ Form::text('description', NULL, ['class' => 'form-control input-sm',  'placeholder'=> 'Type description...', 'required']) }}
                  </div>

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
                        <th>Platform</th>
                        <th>Status</th>
                        <th>Position</th>
                        <th>Description</th>
                        <th>Data</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $counter=>$result)
                        <tr class="selection" href="{{ route('results.show',['search' => $result->id]) }}">
                            <td>{{++$counter}}</td>
                            <td>{{$result->search->keyword->keyword}}</td>
                            <td>{{$result->search->platform->platform}}</td>
                            <td>{{$result->search->platform->status}}</td>
                            <td>{{$result->search->platform->position}}</td>
                            <td>{{$result->search->platform->description}}</td>
                            <td>{{$result->search->platform->created_at}}</td>
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
