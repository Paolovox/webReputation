@extends('layouts.main')

@section('main-content')

    <div class="card">
        <div class="card-header">
            <h2>Impostazioni account
                <small>Ciao {{\Auth::user()->name}}. In questa schemata e possibile modificare le informazioni riguardante il propio account.</small>
            </h2>

            <div class="card-body card-padding">
                {{ Form::open(array('route' => ['settings.edit', \Auth::user()->id], 'class'=>'row')) }}
                <div class="col-sm-4">
                    <div class="form-group fg-line">
                        {{ Form::label('old_password', 'Password attuale') }}
                        <br><small>Per poter combiare la password e neccessario inserire la password attuale</small><br><br>
                        {{ Form::password('old_password', [ 'class' => 'form-control input-sm', 'required']) }}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group fg-line">
                        {{ Form::label('password', 'Password') }}
                        <br><small>La password deve contenere almeno 6 caratteri fra lettere maiuscole, minuscole ed numeri</small>
                        {{ Form::password('password', [ 'class' => 'form-control input-sm', 'required']) }}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group fg-line">
                        {{ Form::label('password_confirmation', 'Conferma Password') }}<br><br><br><br>
                        {{ Form::password('password_confirmation', ['class' => 'form-control input-sm', 'required']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                {{ Form::button('Aggiorna informazioni', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm m-t-5 waves-effect pull-right']) }}
            </div>
                {{ Form::close() }}
            </div>


        </div>
    </div>

@endsection
