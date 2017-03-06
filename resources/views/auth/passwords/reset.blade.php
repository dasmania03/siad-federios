@extends("auth/layout/front")

@section("header")
    <span id="extr-page-header-space"> <span class="hidden-mobile hidden-xs">Ya está registrado?</span> <a href="{{ url('/') }}" class="btn btn-danger">Iniciar Sesión</a> </span>
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ url('/password/reset') }}" role="form" method="POST" id="login-form" class="smart-form client-form">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <header>
            Restablecer contraseña
        </header>

        <fieldset>
            <section>
                <label class="label">Ingrese su correo electrónico</label>
                <label class="input"> <i class="icon-append fa fa-envelope"></i>
                    <input type="email" name="email" value="{{ $email or old('email') }}" required autofocus>
                    <b class="tooltip tooltip-top-right"><i class="fa fa-envelope txt-color-teal"></i> Introduzca la dirección de correo electrónico</b></label>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </section>

            <section>
                <label class="label">Contraseña</label>
                <label class="input"> <i class="icon-append fa fa-user"></i>
                    <input id="password" type="password" name="password" required>
                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Ingrese la nueva contraseña</b> </label>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </section>

            <section>
                <label class="label">Confirmar Contraseña</label>
                <label class="input"> <i class="icon-append fa fa-user"></i>
                    <input id="password-confirm" type="password" name="password_confirmation" required>
                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Repita la contraseña</b> </label>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                @endif
            </section>

        </fieldset>
        <footer>
            <button type="submit" class="btn btn-primary">
                Resetear contraseña
            </button>
        </footer>
    </form>
@endsection
