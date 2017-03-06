@extends("auth/layout/front")

@section("header")
    <span id="extr-page-header-space"> <span class="hidden-mobile hidden-xs">Ya está registrado?</span> <a href="{{ url('/') }}" class="btn btn-danger">Iniciar Sesión</a> </span>
@endsection

@section("content")
    <form method="POST" action="{{ url('/register') }}" id="smart-form-register" class="smart-form client-form">
        {{ csrf_field() }}
        <header>
            Nuevo Usuario
        </header>

        <fieldset>
            <section>
                <label class="input"> <i class="icon-append fa fa-user"></i>
                    <input type="text" id="name" name="name" placeholder="Usuario" value="{{ old('name') }}">
                    <b class="tooltip tooltip-bottom-right">Necesario para ingresar</b> </label>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
            </section>

            <section>
                <label class="input"> <i class="icon-append fa fa-user"></i>
                    <input type="text" id="fname" name="fname" placeholder="Nombres" value="{{ old('fname') }}">
                    <b class="tooltip tooltip-bottom-right">Necesario para ingresar</b> </label>
                @if ($errors->has('fname'))
                    <span class="help-block">
                            <strong>{{ $errors->first('fname') }}</strong>
                        </span>
                @endif
            </section>

            <section>
                <label class="input"> <i class="icon-append fa fa-user"></i>
                    <input type="text" id="lname" name="lname" placeholder="Apellidos" value="{{ old('lname') }}">
                    <b class="tooltip tooltip-bottom-right">Necesario para ingresar</b> </label>
                @if ($errors->has('lname'))
                    <span class="help-block">
                            <strong>{{ $errors->first('lname') }}</strong>
                        </span>
                @endif
            </section>

            <section>
                <label class="input"> <i class="icon-append fa fa-envelope"></i>
                    <input type="email" name="email" placeholder="Correo electronico">
                    <b class="tooltip tooltip-bottom-right">Necesario para verificar su cuenta</b> </label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
            </section>

            <section>
                <label class="input"> <i class="icon-append fa fa-envelope"></i>
                    <input type="text" name="role" placeholder="Rol del usuario">
                    <b class="tooltip tooltip-bottom-right">Necesario para determinar el rol dentro del sistema</b> </label>
                @if ($errors->has('role'))
                    <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                @endif
            </section>

            <section>
                <label class="input"> <i class="icon-append fa fa-lock"></i>
                    <input type="password" name="password" placeholder="Contraseña" id="password">
                    <b class="tooltip tooltip-bottom-right">No olvide su contraseña</b> </label>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif
            </section>

            <section>
                <label class="input"> <i class="icon-append fa fa-lock"></i>
                    <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña">
                    <b class="tooltip tooltip-bottom-right">Repita su contraseña</b> </label>
            </section>
        </fieldset>

        <footer>
            <button type="submit" class="btn btn-primary">
                Registrar
            </button>
        </footer>
    </form>
@endsection
