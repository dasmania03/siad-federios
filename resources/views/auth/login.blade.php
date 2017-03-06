@extends("auth.layout.front")

@section("header")
    <span id="extr-page-header-space"> <span class="hidden-mobile hidden-xs">Olvidó su contraseña?</span> <a href="{{ url('/password/reset') }}" class="btn btn-danger">Reestablecer</a> </span>
@endsection

@section("content")
    <form method="POST" action="{{ url('/login') }}" id="login-form" class="smart-form client-form">
        {{ csrf_field() }}
        <header>
            Iniciar Sesión
        </header>

        <fieldset>
            <section>
                <label class="label">Usuario</label>
                <label class="input"> <i class="icon-append fa fa-user"></i>
                    <input type="text" name="username" value="{{ old('username') }}" required>
                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Por favor ingrese su usuario</b></label>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </section>

            <section>
                <label class="label">Contraseña</label>
                <label class="input"> <i class="icon-append fa fa-lock"></i>
                    <input type="password" name="password">
                    <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Ingrese su contraseña</b> </label>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </section>

            <section>
                <label class="checkbox">
                    <input type="checkbox" name="remember">
                    <i></i>Mantente conectado</label>
            </section>
        </fieldset>
        <footer>
            <button type="submit" class="btn btn-primary">
                Ingresar
            </button>
        </footer>
    </form>
@endsection