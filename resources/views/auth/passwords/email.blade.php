@extends('layouts.app')

@section('content')
    <div class="login" data-lbg="bluegrey">
        <div class="l-block toggled">
            <div class="lb-header palette-Blue-Grey bg">
                <i class="zmdi zmdi-account-circle"></i>Reimposta password
            </div>

            <div class="lb-body">

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group fg-float {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="fg-label">E-Mail Address</label>
                                <input id="email" type="email" class="input-sm form-control fg-input" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group fg-float">
                            <div class="">
                                <button type="submit" class="btn btn-primary btn-block waves-effect">Invia link per il cambio password
                                </button>
                                <a class="btn btn-default btn-block waves-effect" href="{{ route('login') }}">Accedi al sistema</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
