@extends('layouts.main')

@section('main-content')

    <div class="card">
        <div class="action-header palette-Blue-Grey-400 bg clearfix">
            <div class="ah-label hidden-xs palette-White text">Elenco Platforms</div>
            <ul class="ah-actions actions a-alt">
                <li>
                    <a class="ah-search-trigger" data-ma-action="ah-search-open" onclick="return $('.addClient').toggle();">
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
        <div class="card addClient"  style="display: none">
            <div class="card-header">
                <h2>Aggiungi una nuova Piattaforma </h2>
            </div>

            <div class="card-body card-padding">
              {{ Form::open(array('route' => 'platforms.store', 'class'=>'row')) }}
                  <div class="col-sm-3">
                      <div class="form-group fg-line">
                          {{ Form::label('platform', NULL, ['class' => 'sr-only']) }}
                          {{ Form::text('platform', NULL, ['class' => 'form-control input-sm',  'placeholder'=> 'Platform', 'required']) }}
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
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($platforms as $counter=>$platform)
                          <tr>
                              <td>{{++$counter}}</td>
                              <td><a href="{{ route('platforms.index',['lawyer' => $lawyer->id]) }}">{{$platform->platform}}</a></td>
                          </tr>
                      @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
