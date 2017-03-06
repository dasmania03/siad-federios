<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
            </button>
            <h4 class="modal-title">Nuevo Producto</h4>
        </div>
        <div class="modal-body no-padding">

            {!! Form::open(['method' => 'POST', 'id' => 'formNewAgent','class' => 'smart-form']) !!}
            <header>
                Datos del Representante > Contacto y Facturación
            </header>
            <fieldset>
                <div class="row">
                    <section class="col col-6">
                        <label class="input"> <i class="icon-prepend fa fa-address-card"></i>
                            <input type="text" name="agent_modal_identification" id="agent_modal_identification" placeholder="Cédula" readonly>
                        </label>
                    </section>
                </div>

                <div class="row">
                    <section class="col col-6">
                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                            <input type="text" name="agent_modal_lname" id="agent_modal_lname" autocomplete="off" required placeholder="Apellidos completos">
                        </label>
                    </section>
                    <section class="col col-6">
                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                            <input type="text" name="agent_modal_fname" id="agent_modal_fname" autocomplete="off" required placeholder="Nombres completos">
                        </label>
                    </section>
                </div>

                <div class="row">
                    <section class="col col-6">
                        <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                            <input type="email" name="agent_modal_email" id="agent_modal_email" autocomplete="off" required placeholder="E-mail">
                        </label>
                    </section>
                    <section class="col col-6">
                        <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                            <input type="tel" id="agent_modal_phone" name="agent_modal_phone" autocomplete="off" required placeholder="Teléfono">
                        </label>
                    </section>
                </div>
            </fieldset>

            <footer>
                <button type="button" id="btnSaveAgent" class="btn btn-primary">
                    Guardar
                </button>
                <button type="button" id="btnCancelar" class="btn btn-default">
                    Cancelar
                </button>
            </footer>
            {!! Form::close() !!}

            <script type="text/javascript">

                var errorClass = 'invalid';
                var errorElement = 'em';

                // Validaciones del formulario
                var $formAgent = $("#formNewAgent").validate({
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
                        agent_modal_fname : {
                            required : true
                        },
                        agent_modal_lname : {
                            required : true
                        },
                        agent_agent_email : {
                            required : true,
                            email : true
                        },
                        agent_modal_phone : {
                            required : true
                        }
                    },

                    // Messages for form validation
                    messages : {
                        agent_modal_fname : {
                            required : 'Por favor ingrese los Nombres completos'
                        },
                        agent_modal_lname : {
                            required : 'Por favor ingrese los Apellidos completos'
                        },
                        agent_modal_email : {
                            required : 'Por favor ingrese un Email',
                            email : 'Por favor ingrese un email VALIDO'
                        },
                        agent_modal_phone : {
                            required : 'Por favor ingrese un número de Teléfono'
                        }
                    },
                    // Do not change code below
                    errorPlacement : function(error, element) {
                        error.insertAfter(element.parent());
                    }
                });

                // Load form validation dependency
                loadScript("js/plugin/jquery-form/jquery-form.min.js", $formAgent);

                // Enmascaramiento de inputs
                $("#agent_modal_phone").mask("(999) 999-9999");

                // Save Agent
                $('#btnSaveAgent').click(function () {
                    event.preventDefault();
                    var form = '#formNewAgent';
                    if ($(form).valid()){
                        $.ajax({
                            url:"/agent",
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
                                    $('#agent_id').val(result.agent.id);
                                    $('#agent_identification').val(result.agent.identification);
                                    $('#agent_lname').val(result.agent.last_name);
                                    $('#agent_fname').val(result.agent.first_name);
                                    $('#agent_email').val(result.agent.email);
                                    $('#agent_phone').val(result.agent.telephone);

                                    JS_cerrarModal("#remoteModal");
                                }
                            },
                            error: function (jqXHR) {
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
                });

                // Cerrar Ventana Modal
                $("#btnCancelar").click(function () {
                    JS_cerrarModal("#remoteModal");
                });

                function JS_cerrarModal(j){
                    $(""+j+"").modal('hide');
                    $(""+j+"").html("&nbsp;");
                }
            </script>
        </div>
    </div>
</div>
