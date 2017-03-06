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
    <form action="{{ url('/password/email') }}" role="form" method="POST" id="login-form" class="smart-form client-form">
        {{ csrf_field() }}
        <header>
            Restablecer contraseña
        </header>

        <fieldset>
            <section>
                <label class="label">Ingrese su correo electronico</label>
                <label class="input"> <i class="icon-append fa fa-envelope"></i>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                    <b class="tooltip tooltip-top-right"><i class="fa fa-envelope txt-color-teal"></i> Introduzca la dirección de correo electrónico para restablecer la contraseña</b></label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </section>
            <section>
                <span class="timeline-seperator text-center text-primary"> <span class="font-sm">O</span>
            </section>
            <section>
                <label class="label">Su usuario</label>
                <label class="input"> <i class="icon-append fa fa-user"></i>
                    <input type="text" name="name" value="{{ old('name') }}">
                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Ingrese su nombre de usuario</b> </label>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                <div class="note">
                    <a href="{{ url('/') }}">Recordé mi contraseña!</a>
                </div>
            </section>

        </fieldset>
        <footer>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-refresh"></i> Restablecer la contraseña
            </button>
        </footer>
    </form>
@endsection
