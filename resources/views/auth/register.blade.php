@extends('layouts.app')

@section('content')
    <div class="login" data-lbg="bluegrey">
        <div class="l-block toggled">
            <div class="lb-header palette-Blue-Grey bg">
                <i class="zmdi zmdi-account-circle"></i>Registrati al sistema
            </div>
                <div class="lb-body">
                    <form class="" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group fg-float {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="fg-label">Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group fg-float {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="fg-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group fg-float {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="fg-label">Password</label>

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group fg-float">
                            <label for="password-confirm" class="fg-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group fg-float">
                                <button type="submit" class="btn btn-primary btn-block waves-effect">Registrati</button>
                            <a class="btn btn-default btn-block waves-effect" href="{{ route('login') }}">Accedi al sistema</a>
                        </div>
                    </form>
                </div>
    </div>
</div>
@endsection
