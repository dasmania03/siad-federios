<!-- Bread crumb is created dynamically -->
<div class="row">
    @include('layouts.bread-crumb-header', ['title' => 'Vacacionales', 'subtitle' => 'Ficha Única'])
</div>

<!-- MODAL PLACE HOLDER -->
<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true"></div>
<!-- END MODAL -->

<section id="widget-grid" class="">
    <!-- row -->
    <div class="row">
        <!-- a blank row to get started -->
        <article class="col-sm-12 col-md-12 col-lg-8">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget"
                 id="wid-id-1"
                 data-widget-editbutton="true"
                 data-widget-custombutton="false"
                 data-widget-colorbutton="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                    <h2>Datos del deportista </h2>
                </header>

                <!-- widget div-->
                <div>
                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        {!! Form::open(['method' => 'POST', 'id' => 'formFicha', 'class' => 'smart-form']) !!}
                            <header>
                                Información Personal
                            </header>
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="input"> <i class="icon-prepend fa fa-address-card"></i>
                                            {!! Form::text('identification', (isset($athlete)) ? $athlete[0]->identification : '', ['id' => 'identification', (isset($athlete)) ? 'readonly' : '', 'autocomplete' => 'off', 'placeholder' => 'Cédula']) !!}
                                            <p class="note">
                                                Documento de Identificación
                                            </p>
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                                            {!! Form::text('birthdate', (isset($athlete)) ? date("d-m-Y", strtotime($athlete[0]->birth_date)) : '', ['id' => 'birthdate','autocomplete' => 'off', 'class' => 'form-control', 'data-mask' => "99/99/9999", 'data-mask-placeholder' => "-"]) !!}
                                            <p class="note">
                                                Fecha de Nacimiento dd/mm/aaaa
                                            </p>
                                        </label>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-6">
                                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                            {!! Form::text('lname', (isset($athlete)) ? $athlete[0]->last_name : '', ['id' => 'lname','autocomplete' => 'off', 'placeholder' => 'Apellidos completos']) !!}
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                            {!! Form::text('fname', (isset($athlete)) ? $athlete[0]->first_name : '', ['id' => 'fname','autocomplete' => 'off', 'placeholder' => 'Nombres completos']) !!}
                                        </label>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-6">
                                        <label class="select">
                                            @if(isset($athlete))
                                                {!! Form::select(
                                                'sex',
                                                 ['M' => 'Hombre',
                                                  'F' => 'Mujer'],
                                                 $athlete[0]->gender,
                                                 ['id' => 'sex'
                                                  ]) !!}  <i></i>
                                            @else
                                                <select name="sex" id="sex">
                                                    <option value="0" selected="" disabled="">Sexo</option>
                                                    <option value="M">Hombre</option>
                                                    <option value="F">Mujer</option>
                                                </select> <i></i>
                                            @endif
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="select">
                                            @if(isset($athlete) && $athlete[0]->type_disability != null)
                                                {!! Form::select(
                                                'type_disability',
                                                 ['F' => 'Física',
                                                  'I' => 'Intelectual',
                                                  'V' => 'Visual',
                                                  'A' => 'Auditiva'],
                                                 $athlete[0]->type_disability,
                                                 ['placeholder' => 'Tiene discapacidad?',
                                                  'id' => 'type_disability'
                                                  ]) !!}  <i></i>
                                            @else
                                                <select name="type_disability" id="type_disability">
                                                    <option value="0" selected="" disabled="">Tiene discapacidad?</option>
                                                    <option value="F">Física</option>
                                                    <option value="I">Intelectual</option>
                                                    <option value="V">Visual</option>
                                                    <option value="A">Auditiva</option>
                                                </select> <i></i>
                                            @endif
                                        </label>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-6">
                                        <label class="select">
                                            @if(isset($athlete))
                                                {!! Form::select(
                                                'size',
                                                 ['30' => '30',
                                                  '32' => '32',
                                                  '34' => '34',
                                                  '36' => '36',
                                                  '38' => '38',
                                                  '40' => '40',
                                                  '42' => '42',
                                                  '44' => '44',
                                                  '46' => '46',
                                                  '48' => '48'],
                                                 $athlete[0]->size,
                                                 ['id' => 'size'
                                                  ]) !!}  <i></i>
                                            @else
                                                <select name="size" id="size">
                                                    <option value="0" selected="" disabled="">Talla</option>
                                                    <option value="24">24</option>
                                                    <option value="26">26</option>
                                                    <option value="28">28</option>
                                                    <option value="30">30</option>
                                                    <option value="32">32</option>
                                                    <option value="34">34</option>
                                                    <option value="36">36</option>
                                                    <option value="38">38</option>
                                                    <option value="40">40</option>
                                                    <option value="42">42</option>
                                                    <option value="44">44</option>
                                                    <option value="46">46</option>
                                                    <option value="48">48</option>
                                                </select> <i></i>
                                            @endif
                                        </label>
                                    </section>
                                </div>
                            </fieldset>

                            <header>
                                Datos de contacto
                            </header>
                            <fieldset>
                                <section>
                                    <label class="input"> <i class="icon-prepend fa fa-map-marker"></i>
                                        {!! Form::text('address', (isset($athlete)) ? $athlete[0]->address : '', ['id' => 'address','autocomplete' => 'off', 'placeholder' => 'Dirección domiciliaria']) !!}
                                    </label>
                                </section>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                                            {!! Form::email('email', (isset($athlete)) ? $athlete[0]->email : '', ['id' => 'email','autocomplete' => 'off', 'placeholder' => 'E-mail']) !!}
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                            @if(isset($athlete))
                                                {!! Form::text('phone', $athlete[0]->telephone, ['id' => 'phone','autocomplete' => 'off', 'placeholder' => 'Teléfono']) !!}
                                            @else
                                                <input type="tel" name="phone" id="phone" autocomplete="off" placeholder="Phone" data-mask="(999) 999-9999">
                                            @endif
                                        </label>
                                    </section>
                                </div>
                            </fieldset>

                            <header>
                                Datos del Representante
                            </header>
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="input"> <i class="icon-prepend fa fa-address-card"></i>
                                            {!! Form::text('agent_identification', (isset($athlete)) ? $athlete[0]->agent->identification : '', ['id' => 'agent_identification', 'autocomplete' => 'off', 'placeholder' => 'Cédula']) !!}
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <a href="javascript:void(0);" id="btnSearchAgent" class="btn btn-primary btn-sm">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-6">
                                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                            {!! Form::text('agent_lname', (isset($athlete)) ? $athlete[0]->agent->last_name : '', ['id' => 'agent_lname', 'readonly', 'autocomplete' => 'off', 'placeholder' => 'Apellidos completos']) !!}
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                            {!! Form::text('agent_fname', (isset($athlete)) ? $athlete[0]->agent->first_name : '', ['id' => 'agent_fname', 'readonly', 'autocomplete' => 'off', 'placeholder' => 'Nombres completos']) !!}
                                        </label>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-6">
                                        <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                                            {!! Form::email('agent_email', (isset($athlete)) ? $athlete[0]->agent->email : '', ['id' => 'agent_email', 'readonly', 'autocomplete' => 'off', 'placeholder' => 'E-mail']) !!}
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                            @if(isset($athlete))
                                                {!! Form::text('agent_phone', (isset($athlete)) ? $athlete[0]->agent->telephone : '', ['id' => 'agent_phone', 'readonly', 'autocomplete' => 'off', 'placeholder' => 'Teléfono']) !!}
                                            @else
                                                <input type="tel" name="agent_phone" id="agent_phone" autocomplete="off" readonly placeholder="Phone" data-mask="(999) 999-9999">
                                            @endif
                                        </label>
                                    </section>
                                </div>
                            </fieldset>

                            {!! Form::hidden('id', (isset($athlete)) ? $athlete[0]->id : '', ['id' => 'id']) !!}
                            {!! Form::hidden('agent_id', (isset($athlete)) ? $athlete[0]->agent_id : '', ['id' => 'agent_id']) !!}

                            <footer>
                                <button type="button" id="btnSaveAthlete" class="btn btn-primary">
                                    Guardar
                                </button>
                            </footer>
                    {!! Form::close() !!}

                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->

        </article>
    </div>
    <!-- end row -->
</section>

<script type="text/javascript">
    pageSetUp();

    function JS_loadFicha(id) {
        $.ajax( {
            url: "/ficha/"+id,
            cache: false,
            async: false,
            type: "GET",
            contentType: "application/json; charset=utf-8",
            success: function(data) {
                $('#id').val(data[0].id);
                $('#birthdate').val(data[0].birth_date.split("-").reverse().join("/"));
                $('#identification').prop('readonly',true);
                $('#identification').val(data[0].identification);
                $('#lname').val(data[0].last_name);
                $('#fname').val(data[0].first_name);
                if (data[0].gender != "") {
                    $('#sex').val(data[0].gender);
                }
                if (data[0].type_disability != "") {
                    $('#type_disability').val(data[0].type_disability);
                }
                if (data[0].size != "") {
                    $('#size').val(data[0].size);
                }
                $('#address').val(data[0].address);
                $('#phone').val(data[0].telephone);
                $('#email').val(data[0].email);
                $('#agent_id').val(data[0].agent.id);
                $('#agent_identification').prop('readonly',true);
                $('#agent_identification').val(data[0].agent.identification);
                $('#agent_lname').val(data[0].agent.last_name);
                $('#agent_fname').val(data[0].agent.first_name);
                $('#agent_email').val(data[0].agent.email);
                $('#agent_phone').val(data[0].agent.telephone);
            },
            error: function(result) {
                alert("ERROR AL CARGAR LA FICHA" + result.status + ' ' + result.statusText);
            }
        });
    }
    function JS_loadAgent(cedula) {
        $.ajax( {
            url: "/agent/"+cedula,
            cache: false,
            async: false,
            type: "GET",
            contentType: "application/json; charset=utf-8",
            success: function(data) {
                if(data.length) {
                    $('#agent_id').val(data[0].id);
                    $('#agent_identification').val(data[0].identification);
                    $('#agent_lname').val(data[0].last_name);
                    $('#agent_fname').val(data[0].first_name);
                    $('#agent_email').val(data[0].email);
                    $('#agent_phone').val(data[0].telephone);
                } else {
                    $.smallBox({
                        title : "Esta cédula no esta registrada como representante, ingrese los siguientes datos para registrarla",
                        content : "",
                        color : "#296191",
                        iconSmall : "fa fa-times",
                        timeout : 3000
                    });

                    $.get('/agent', function(data){
                        $('#remoteModal').html($(data));
                        $('#agent_modal_identification').val(cedula);
                        $('#agent_modal_lname').focus();
                        $('#remoteModal').modal();
                    });
                }
            },
            error: function(jqXHR) {
                $.smallBox({
                    title : jqXHR.statusText,
                    content : "",
                    color : "#A65858",
                    iconSmall : "fa fa-times",
                    timeout : 5000
                });
            }
        });
    }
    function JS_validCedula(value) {
        cedula = value;
        array = cedula.split("");
        num = array.length;
        if(num == 10) {
            total = 0;
            digito = (array[9]*1);
            for(i=0; i < (num-1); i++) {
                mult = 0;
                if((i%2) != 0) {
                    total = total + (array[i] * 1);
                }
                else {
                    mult = array[i] * 2;
                    if(mult > 9)
                        total = total + (mult - 9);
                    else
                        total = total + mult;
                }
            }
            decena = total / 10;
            decena = Math.floor(decena);
            decena = (decena + 1) * 10;
            final = (decena - total);
            if((final == 10 && digito == 0) || (final == digito)) {
                return true;
            }
            else {
                return false;
            }
        } else {
            return false;
        }
    }

    var pagefunction = function() {

        jQuery.validator.addMethod("isValidCI", function(value, element) {
            return JS_validCedula(value);
        }, "Cedula no valida");
        jQuery.validator.addMethod("validDate", function(value, element) {
            return this.optional(element) || moment(value,"DD/MM/YYYY").isValid();
        }, "Please enter a valid date in the format DD/MM/YYYY");

        var errorClass = 'invalid';
        var errorElement = 'em';

        var $formFicha = $('#formFicha').validate({
            errorClass		: errorClass,
            errorElement	: errorElement,
            highlight: function(element) {
                $(element).parent().removeClass('state-success').addClass("state-error");
                $(element).removeClass('valid');
            },
            unhighlight: function(element) {
                $(element).parent().removeClass("state-error").addClass('state-success');
                $(element).addClass('valid');
            },

            // Rules for form validation
            rules : {
                identification: {
                    required : true,
                    digits : true,
                    isValidCI : true
                },
                birthdate: {
                    required : true,
                    validDate : true
                },
                fname : {
                    required : true
                },
                lname : {
                    required : true
                },
                sex: {
                    required : true
                },
                size: {
                    required : true
                },
                address : {
                    required : true
                },
                email : {
                    email : true
                },
                agent_identification : {
                    required : true,
                    digits : true,
                    isValidCI : true
                },
                agent_fname : {
                    required : true
                },
                agent_lname : {
                    required : true
                },
                agent_email : {
                    required : true,
                    email : true
                },
                agent_phone : {
                    required : true
                }
            },

            // Messages for form validation
            messages : {
                identification: {
                    required : 'Identificación requerida',
                    digits : 'Solo números por favor',
                    isValidCI: 'Número de Cédula no Válido'
                },
                birthdate: {
                    required : 'Por favor ingrese la Fecha de Nacimiento',
                    validDate : 'Ingrese la Fecha de Nacimiento correcta'
                },
                fname : {
                    required : 'Por favor ingrese los Nombres completos'
                },
                lname : {
                    required : 'Por favor ingrese los Apellidos completos'
                },
                sex: {
                    required : 'Seleccione el Sexo'
                },
                size: {
                    required : 'Seleccione una Talla'
                },
                address : {
                    required : 'Por favor ingrese su Dirección completa'
                },
                email : {
                    email : 'Por favor ingrese un email VALIDO'
                },
                agent_identification : {
                    required : 'Identificación requerida',
                    digits : 'Solo números por favor',
                    isValidCI: 'Número de Cédula no Válido'
                },
                agent_fname : {
                    required : 'Por favor ingrese los Nombres completos'
                },
                agent_lname : {
                    required : 'Por favor ingrese los Apellidos completos'
                },
                agent_email : {
                    required : 'Por favor ingrese un Email',
                    email : 'Por favor ingrese un email VALIDO'
                },
                agent_phone : {
                    required : 'Por favor ingrese un número de Teléfono'
                }
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });

        // Load form validation dependency
        loadScript("js/plugin/jquery-form/jquery-form.min.js", $formFicha);

        // Search agent one
        $('#btnSearchAgent').click(function () {
            if (JS_validCedula($('#agent_identification').val())) {
                JS_loadAgent($('#agent_identification').val());
            } else {
                $.smallBox({
                    title : "Ingrese el número de cédula correcto",
                    content : "",
                    color : "#A65858",
                    iconSmall : "fa fa-times",
                    timeout : 3000
                });
                $('#agent_identification').focus();
            }
        });

        // Save or update athlete and redirect inscription
        $('#btnSaveAthlete').click(function () {
            event.preventDefault();
            $('#btnSaveAthlete').attr('disabled', true);
            var form = '#formFicha';
            var id = $('#id').val();
            if ($(form).valid()){
                if (id == "") {
                    $.ajax({
                        // Call Save Athlete
                        url:"/athlete",
                        type: 'POST',
                        data: $(form).serialize(),
                        dataType: "json",
                        success:function(result){
                            if(result.success) {
                                $.smallBox({
                                    title : result.message,
                                    content : "",
                                    color : "#659265",
                                    iconSmall : "fa fa-times",
                                    timeout : 3000
                                });
                                window.location.href = "/home#/inscripciones";
                            }
                        },
                        error: function (jqXHR) {
                            $.smallBox({
                                title : jqXHR.statusText,
                                content : "<i class='fa fa-warning'></i> <i>Verifique si la cédula está registrada en Inscripciones</i>",
                                color : "#A65858",
                                iconSmall : "fa fa-times",
                                timeout : 5000
                            });
                        }
                    });
                } else {
                    $.ajax({
                        // Call Update Athlete
                        url:"/athlete/"+id,
                        type: 'PUT',
                        data: $(form).serialize(),
                        dataType: "json",
                        success:function(result){
                            if(result.success) {
                                $.smallBox({
                                    title : result.message,
                                    content : "",
                                    color : "#659265",
                                    iconSmall : "fa fa-times",
                                    timeout : 3000
                                });
                                window.location.href = "/home#/inscripciones";
                            }
                        },
                        error: function (jqXHR) {
                            $.smallBox({
                                title : jqXHR.statusText,
                                content : "<i class='fa fa-warning'></i> <i>Verifique si la cédula está registrada en Inscripciones</i>",
                                color : "#A65858",
                                iconSmall : "fa fa-times",
                                timeout : 5000
                            });
                        }
                    });
                }
            } else {
                $('#btnSaveAthlete').attr('disabled', false);
            }
        });
    };
    // End pagefunction

    pagefunction();

</script>
