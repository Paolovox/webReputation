@extends('layouts.app')

@section('content')

    <div class="login" data-lbg="bluegrey">
        <div class="l-block toggled">
            <div class="lb-header palette-Blue-Grey bg">
                <i class="zmdi zmdi-account-circle"></i>Bentornato! Fai il login per accedere al sistema
            </div>

            <div class="lb-body">
                <form class="" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group fg-float {{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="fg-line">
                            <input id="email" type="email" class="input-sm form-control fg-input" name="email"
                                   value="{{ old('email') }}" required autofocus autocomplete="off">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <label for="email" class="fg-label">Indirizzo e-Mail</label>
                        </div>
                    </div>

                    <div class="form-group fg-float {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="fg-label">Password</label>
                        <input id="password" type="password" class="input-sm form-control fg-input" name="password"
                               required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group fg-float">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <i
                                        class="input-helper"></i> Ricordami
                            </label>
                        </div>
                    </div>

                    <div class="form-group fg-float">
                        <div class="">
                            <button type="submit" class="btn btn-primary btn-block waves-effect">Accedi al sistema
                            </button>
                            <a class="btn btn-default btn-block waves-effect" href="{{ route('password.request') }}">Cambio
                                password?</a>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

@endsection
