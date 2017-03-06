<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
            </button>
            <h4 class="modal-title">Inscripciones</h4>
        </div>
        <div class="modal-body no-padding">
            <!-- ui-dialog -->
            <div id="paid_dialog" title="Formulario de Pago de Inscripción">
                {!! Form::open(['method' => 'POST', 'id' => 'formPaidInscription','class' => 'smart-form']) !!}
                <fieldset>

                    <section>
                        <label class="label">Fecha de pago</label>
                        <label class="input state-disabled">
                            {!! Form::text('fecha-comp', date('d/m/Y'), ['id' => 'fecha-comp', "class" => "input-xs font-lg", "disabled" =>"disabled"]) !!}
                        </label>
                    </section>

                    <section>
                        <label class="label">Concepto de la venta</label>
                        <label class="input state-disabled">
                            {!! Form::text('concepto', 'Vacacional de Futbol', ['id' => 'concepto', "class" => "input-xs font-lg", "disabled" =>"disabled"]) !!}
                        </label>
                    </section>

                    <div id="aditional_info" style="display:none;">
                    <div class="row">
                        <section class="col col-6">
                            <label class="label">Costo del curso</label>
                            <label class="input state-disabled">
                                {!! Form::text('cost', 'U$D 20.00', ['id' => 'cost', "class" => "", "disabled" =>"disabled"]) !!}
                            </label>
                        </section>

                        <section class="col col-6">
                            <label class="label">Descuento</label>
                            <label class="input state-disabled">
                                {!! Form::text('discount', 'Descuento 50%', ['id' => 'discount', "class" => "", "disabled" =>"disabled"]) !!}
                            </label>
                        </section>
                    </div>

                    <section>
                        <label class="label">Observaciones</label>
                        <label class="textarea textarea-expandable state-disabled">
                            <textarea rows="2" name="observation" id="observation" disabled="disabled"></textarea>
                        </label>
                    </section>
                    </div>
                    <section>
                        <label class="label">Total a pagar</label>
                        <label class="input state-disabled">
                            {!! Form::text('total', 'U$D 10.00', ['id' => 'total', "class" => "text-center font-xl txt-color-blueDark", "disabled" =>"disabled"]) !!}
                        </label>
                    </section>
                </fieldset>
                    {!! Form::hidden('inscription_id', '',['id' => 'inscription_id']) !!}
                    {!! Form::hidden('paidtotal', '',['id' => 'paidtotal']) !!}

                {!! Form::close() !!}
                <!-- Dialog Content -->
            </div>

            {!! Form::open(['method' => 'POST', 'id' => 'formNewInscription','class' => 'smart-form']) !!}
            <header style="margin: 0; background: #4c4f53; color:  #fff; padding: 6px 14px; ">
                <i class="fa fa-address-book-o"></i> Datos de la Ficha No. {{ (isset($data)) ? $data[0]->id : '-' }}
            </header>
            <fieldset> // Informacion de la ficha
                <div class="row">
                    <section class="col col-6">
                        <label class="input">
                            <p class="note">Cédula Deportista</p>
                            {!! Form::text('identification', (isset($data)) ? $data[0]->identification : '', ['id' => 'identification', 'class' => 'input-xs', 'disabled' => 'disabled']) !!}
                        </label>
                    </section>
                    <section class="col col-6">
                        <label class="input">
                            <p class="note">Nombre Deportista</p>
                            {!! Form::text('full_name', (isset($data)) ? $data[0]->full_name : '', ['id' => 'full_name', 'class' => 'input-xs', 'disabled' => 'disabled']) !!}
                        </label>
                    </section>
                </div>
                <div class="row">
                    <section class="col col-6">
                        <label class="input">
                            <p class="note">Cédula Representante</p>
                            {!! Form::text('agent_identification', (isset($data)) ? $data[0]->agent->identification : '', ['id' => 'agent_identification', 'class' => 'input-xs', 'disabled' => 'disabled']) !!}
                        </label>
                    </section>
                    <section class="col col-6">
                        <label class="input">
                            <p class="note">Nombre Representante</p>
                            {!! Form::text('agent_full_name', (isset($data)) ? $data[0]->agent->full_name : '', ['id' => 'agent_full_name', 'class' => 'input-xs', 'disabled' => 'disabled']) !!}
                        </label>
                    </section>
                </div>

                <div class="row">
                    <section class="col col-2">
                        <label class="input">
                            <p class="note">Edad</p>
                            {!! Form::text('age', (isset($data)) ? $data[0]->age : '', ['id' => 'age', 'class' => 'input-xs', 'disabled' => 'disabled']) !!}
                        </label>
                    </section>
                    <section class="col col-2">
                        <label class="input">
                            <p class="note">Teléfono</p>
                            {!! Form::text('agent_phone', (isset($data)) ? $data[0]->agent->telephone : '', ['id' => 'agent_phone', 'class' => 'input-xs', 'disabled' => 'disabled']) !!}
                        </label>
                    </section>
                    <section class="col col-4">
                        <label class="input">
                            <p class="note">Email</p>
                            {!! Form::text('agent_email', (isset($data)) ? $data[0]->agent->email : '', ['id' => 'agent_email', 'class' => 'input-xs', 'disabled' => 'disabled']) !!}
                        </label>
                    </section>
                    <section class="col col-4">
                        <label class="input">
                            <p class="note">Responsable de Registro</p>
                            {!! Form::text('agent_email', (isset($data)) ? $data[0]->user->username : '', ['id' => 'agent_email', 'class' => 'input-xs', 'disabled' => 'disabled']) !!}
                        </label>
                    </section>
                </div>
            </fieldset>

            <header style="margin: 0; background: #4c4f53; color:  #fff; padding: 6px 14px; ">
                <i class="fa fa-edit"></i> Agregar Inscripción a la Ficha
            </header>
            <fieldset>
                <div class="row">
                    <section class="col col-4">
                        <label class="select">
                            {!! Form::select('disciplina', $prod, null, ['id' => 'disciplina', 'placeholder' => 'Seleccione el deporte...']) !!}
                             <i></i>
                        </label>
                    </section>
                    <section class="col col-4">
                        <label class="select">
                            <select name="horario" id="horario">
                                <option value="0" selected="true" disabled="">Horarios</option>
                            </select> <i></i>
                        </label>
                    </section>
                    <section class="col col-4">
                        <label class="select">
                            <select name="days" id="days">
                                <option value="0" selected="true" disabled="">Dias</option>
                            </select> <i></i>
                        </label>
                    </section>
                </div>
                <div class="row" id="paid-detail" style="padding: 12px;display:none">
                    <div class="col-sm-6" style="margin-bottom: 10px;">
                        <div class="well well-sm bg-color-teal txt-color-white text-center">
                            <p>Precio Normal</p>
                            <h2 id="price_normal"></h2>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="well well-sm bg-color-darken txt-color-white text-center">
                            <p>Total a Pagar</p>
                            <h2 id="price_discount"></h2>
                        </div>
                    </div>

                </div>
                <div class="row" id="option_discount" style="display:none">
                    <section class="col col-3">
                        <label class="select">
                            <select name="type_discount" id="type_discount">
                                <!-- Empty -->
                            </select> <i></i>
                        </label>
                    </section>

                    <section class="col col-3" id="discount_description">
                        <!-- empty -->
                    </section>

                    <section class="col col-3" id="discount_observation">
                        <!-- empty -->
                    </section>

                    <section class="col col-3" id="discount_code_exo">
                        <!-- empty -->
                    </section>
                </div>

                <footer>
                    <button type="button" id="btnAddInscription" class="btn btn-primary btn-xs" disabled="disabled">
                        <span class="glyphicon glyphicon-plus-sign"></span> Agregar Inscripción
                    </button>
                </footer>
            </fieldset>

            <header style="margin: 0; background: #4c4f53; color:  #fff; padding: 6px 14px; ">
                <i class="fa fa-table"></i> Listado de Inscripciones
            </header>
            <fieldset>
                <div class="table-responsive">
                    <table id="datatable_inscription" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Cod</th>
                            <th>Deporte</th>
                            <th>Horario</th>
                            <th>Dias</th>
                            <th>Estado</th>
                            <th>Responsable</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($data[0]->inscriptions) > 0)
                            @foreach($data[0]->inscriptions as $inscription)
                                <tr data-id="{{ $inscription->id }}">
                                    <td>{{ $inscription->id }}</td>
                                    <td>{{ $inscription->product->sport->name }}</td>
                                    <td>{{ $inscription->horario }}</td>
                                    <td>{{ $inscription->dias }}</td>

                                    @if ($inscription->status == 1)
                                        <td>Gratis</td>
                                    @elseif($inscription->status == 2)
                                        <td>Pendiente de Pago U$D {{ $inscription->paid_total }}</td>
                                    @elseif($inscription->status == 3)
                                        <td>Pagada</td>
                                    @elseif($inscription->status == 4)
                                        <td>Exonerada</td>
                                    @elseif($inscription->status == 5)
                                        <td>Eliminada</td>
                                    @endif

                                    <td>{{ $inscription->user->username }}</td>
                                    <td>
                                        @if ($inscription->status != 5)
                                            <a href="/inscripciones/print/{{ $inscription->id }}" target="_blank" class="btn btn-primary btn-labeled btn-xs">
                                                <i class="fa fa-print"></i>
                                                Imprimir
                                            </a>
                                        @endif

                                        @if ($inscription->status == 2)
                                            <a href="javascript:void(0);" class="btn btn-danger btn-labeled btn-xs btnActionDelete">
                                                <i class="fa fa-trash-o"></i>
                                                Eliminar
                                            </a>
                                        @endif

                                        @if ($inscription->status == 2)
                                            @if (Auth::user()->role == 'cashier')
                                                <a href="javascript:void(0);" id="btnActionPaid" class="btn btn-success btn-labeled btn-xs">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Cobrar
                                                </a>
                                            @endif
                                        @endif

                                        <!-- <a href="#" class="action-menu icon-pencil-square-o" title="Editar Producto"></a>
                                        <a href="#" class="action-menu delete-product icon-trash-o" title="Eliminar Producto"></a> -->
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">
                                    No hay inscripciones que mostrar
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </fieldset>

            <footer>
                <button type="button" id="btnCancelar" class="btn bg-color-purple txt-color-white ">
                    <span class="glyphicon glyphicon-ok-circle"></span> Cerrar Ventana
                </button>
            </footer>

            {!! Form::hidden('athlete_id', (isset($data)) ? $data[0]->id : '',['id' => 'athlete_id']) !!}

            {!! Form::close() !!}

            {!! Form::open(['route' => ['inscripciones.update', ':INSCRIPTION_ID'], 'method' => 'PUT', 'id' => 'frmUpdateInscription'])!!}
            {!! Form::close() !!}

            <script type="text/javascript">

                var errorClass = 'invalid';
                var errorElement = 'em';

                var discount_description = "";
                var discount_reference = '';
                var discount_observation = "";
                var discount_code_exo = "";

                discount_description += '<label class="note"><strong>';
                discount_reference += '<label class="label">Cédula de referencia</label><label class="input"><input type="text" name="txtReference" id="txtReference"></label>';
                discount_observation += '<label class="textarea"><textarea id="txtObservation" rows="3" name="info" placeholder="Observaciones"></textarea></label>';
                discount_code_exo += '<label class="label">Código</label><label class="input"><input type="text" name="code_exo" id="code_exo"></label>';

                function deleteInscription(id) {
                    var form = $('#frmUpdateInscription');
                    var url = form.attr('action').replace(':INSCRIPTION_ID', id);
                    var data = form.serialize();

                    data += '&type=5';

                    $.post(url, data, function (result) {
                        if(result.success) {
                            $.smallBox({
                                title : result.message,
                                content : "",
                                color : "#659265",
                                iconSmall : "fa fa-times",
                                timeout : 3000
                            });
                            JS_cerrarModal("#remoteModal");
                        }
                    });
                }

                function saveInscription(data) {
                    $.ajax({
                        url:"/inscripciones",
                        type: 'POST',
                        data: data,
                        dataType: "json",
                        success:function(result){
                            if(result.success) {
                                window.location.href = "home#/inscripciones";
                                $.smallBox({
                                    title : result.message,
                                    content : "Desea imprimir la ficha de inscripción? <p class='text-align-right'><a href='javascript:void(0);' class='btn btn-primary btn-sm'>No</a> <a href='/inscripciones/print/"+result.inscription.id+"' target='_blank' class='btn btn-danger btn-sm'>Imprimir Ficha</a></p>",
                                    color : "#739E73",
                                    //timeout: 10000,
                                    icon : "fa fa-bell swing animated"
                                });
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

                function JS_savePaid() {
                    $('#btnActionDialogPaid').attr('disabled', true);
                    var form = '#formPaidInscription';
                    $.ajax({
                        url:"/ventas",
                        type: 'POST',
                        data: $(form).serialize(),
                        dataType: "json",
                        success:function(result){
                            if(result.success) {
                                $.smallBox({
                                    title : result.message,
                                    content : "Imprimir el Recibo de Caja? <p class='text-align-right'><a href='javascript:void(0);' class='btn btn-primary btn-sm'>No</a> <a href='/ventas/print/"+result.venta.id+"' target='_blank' class='btn btn-danger btn-sm'>Imprimir Recibo</a></p>",
                                    color : "#739E73",
                                    //timeout: 10000,
                                    icon : "fa fa-bell swing animated"
                                });
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

                function JS_cerrarModal(j){
                    $(""+j+"").modal('hide');
                    $(""+j+"").html("&nbsp;");
                }

                // Cerrar Ventana Modal
                $("#btnCancelar").click(function () {
                    JS_cerrarModal("#remoteModal");
                });

                // Load dinamic horarios
                $("#disciplina").change(function(event){
                    $("#horario").empty();
                    $("#days").empty();
                    $("#type_discount").empty();
                    $("#discount_description").empty();
                    $("#discount_observation").empty();
                    $("#discount_code_exo").empty();

                    if (event.target.value != "") {
                        $.get("/products/loadInfo/"+event.target.value+"",function(resp){
                            var horarios = resp[0].horarys.split(', ');
                            var days = resp[0].days.split(', ');
                            var price = resp[0].price;

                            for(i=0; i<horarios.length;i++){
                                $("#horario").append("<option value='"+horarios[i]+"'> "+horarios[i]+"</option>");
                            }

                            for(i=0; i<days.length;i++){
                                $("#days").append("<option value='"+days[i]+"'> "+days[i]+"</option>");
                            }

                            if (price != "0.00") {
                                $("#price_normal").text("U$D "+price);
                                $("#price_discount").text("U$D "+price);
                                $("#option_discount").css("display", "block");

                                var d3 = price-(price*0.3);
                                var d5 = price-(price*0.5);
                                var exo = price-(price*1);

                                // Llenar combo con decuentos
                                $('#type_discount').append("<option value='0' data-price='"+price+"'>Precio Normal</option>");
                                $('#type_discount').append("<option value='1' data-price='"+d3+"'>Descuento 30%</option>");
                                $('#type_discount').append("<option value='2' data-price='"+d5+"'>Descuento 50%</option>");
                                $('#type_discount').append("<option value='3' data-price='"+exo+"'>Exonerado</option>");

                            } else {
                                $("#price_normal").text("GRATIS");
                                $("#price_discount").text("GRATIS");
                                $("#option_discount").css("display", "none");
                            }

                            $('#btnAddInscription').attr('disabled', false);
                            $("#paid-detail").css("display", "block");

                        });
                    } else {
                        $("#horario").append("<option value='0' selected='true' disabled=''>Horarios</option>");
                        $("#days").append("<option value='0' selected='true' disabled=''>Dias</option>");
                        $("#paid-detail").css("display", "none");
                        $("#option_discount").css("display", "none");
                        $('#btnAddInscription').attr('disabled', true);
                    }
                });

                // Change Discount
                $("#type_discount").change(function (event) {

                    $("#discount_description").empty();
                    $("#discount_observation").empty();
                    $("#discount_code_exo").empty();

                    if ($("#type_discount").val() == "0") {

                        $("#price_discount").text($("#price_normal").text());

                    } else if($("#type_discount").val() == "1") {
                        $("#discount_description").html(discount_description);
                        $("#discount_observation").html(discount_reference);
                        // Enmascaramiento de inputs
                        $("#txtReference").mask("9999999999");

                        $("#price_discount").text("U$D "+$("#type_discount option[value='1']").data("price"));

                        $("#discount_description").html(discount_description+"Se aplica el descuento a partir de la segunda inscripción, debe registrar el número de cédula del deportista al cual hace referencia.</strong></label>");

                    } else if ($("#type_discount").val() == "2") {
                        $("#discount_description").html(discount_description);
                        $("#discount_observation").html(discount_observation);

                        $("#price_discount").text("U$D "+$("#type_discount option[value='2']").data("price"));

                        $("#discount_description").html(discount_description+"Se aplica el descuento a deportista que presenten problemas de discapacidad.</strong></label>");

                    } else if ($("#type_discount").val() == "3") {
                        $("#discount_description").html(discount_description);
                        $("#discount_observation").html(discount_observation);
                        $("#discount_code_exo").html(discount_code_exo);
                        // Enmascaramiento de inputs
                        $("#code_exo").mask("99999999");

                        $("#price_discount").text("U$D "+$("#type_discount option[value='3']").data("price"));

                        $("#discount_description").html(discount_description+"Se aplica unicamente con codigo válido de autización de la autoridad superior.</strong></label>");

                    }
                });

                // Add Inscription
                $('#btnAddInscription').click(function () {
                    $('#btnAddInscription').attr('disabled', true);
                    var form = $('#formNewInscription'),
                            data = form.serialize(),
                            athlete_id = $('#athlete_id').val(),
                            product_id = $("#disciplina").val(),
                            count = getAjaxRequest("/inscripciones/athlete/"+athlete_id+"/product/"+product_id);

                    if (count.ivalid == 0) {

                        if (count.itotal >= 0 && count.itotal <=1) {
                            if (($("#price_normal").text() == "GRATIS") && (($("#price_discount").text() == "GRATIS"))) {
                                data += '&type=1';
                                data += '&discount=0';
                                data += '&paid_total=0.00';
                                data += '&observations=Gratis';

                                saveInscription(data);

                            } else if ($("#type_discount").val() == 0) {
                                data += '&type=2';
                                data += '&discount='+$("#type_discount").val();
                                data += '&paid_total='+$("#type_discount option[value='0']").data("price");

                                saveInscription(data);
                            } else if ($("#type_discount").val() == 1) {
                                if ($('#txtReference').val() != "") {
                                    var isValid = getAjaxRequest('/athlete/find/'+$('#txtReference').val());

                                    if (isValid.find == 1) {
                                        data += '&type=2';
                                        data += '&discount='+$("#type_discount").val();
                                        data += '&paid_total='+$("#type_discount option[value='1']").data("price");
                                        data += '&observations='+$('#txtReference').val();

                                        saveInscription(data);
                                    } else {
                                        $.smallBox({
                                            title : 'Referencia no válida',
                                            content : "<i class='fa fa-warning'></i> <i>El número de cédula ingresado como referencia no está registrado en el sistema, por favor verifique si está utilizando el número de referencia correcto.</i>",
                                            color : "#A65858",
                                            iconSmall : "fa fa-times",
                                            timeout : 8000
                                        });
                                        $('#txtReference').focus();
                                        $('#btnAddInscription').attr('disabled', false);
                                    }

                                } else {
                                    $.smallBox({
                                        title : 'Atención',
                                        content : "<i class='fa fa-warning'></i> <i>Complete el campo de referencia.</i>",
                                        color : "#A65858",
                                        iconSmall : "fa fa-times",
                                        timeout : 5000
                                    });
                                    $('#txtReference').focus();
                                    $('#btnAddInscription').attr('disabled', false);
                                }
                            }  else if ($("#type_discount").val() == 2) {
                                if ($('#txtObservation').val() != "") {
                                    data += '&type=2';
                                    data += '&discount='+$("#type_discount").val();
                                    data += '&paid_total='+$("#type_discount option[value='2']").data("price");
                                    data += '&observations='+$('#txtObservation').val();

                                    saveInscription(data);
                                } else {
                                    $('#txtObservation').focus();
                                    $.smallBox({
                                        title : 'Atención',
                                        content : "<i class='fa fa-warning'></i> <i>Complete el campo de observación</i>",
                                        color : "#A65858",
                                        iconSmall : "fa fa-times",
                                        timeout : 5000
                                    });
                                }
                            } else if ($("#type_discount").val() == 3) {
                                if (($('#txtObservation').val() != "") && ($('#code_exo').val() != "")) {
                                    var isValidCode = getAjaxRequest("/codes/"+$('#code_exo').val());

                                    if (isValidCode.code.length > 0)
                                            if (isValidCode.code[0].status == 0) {
                                                data += '&type=4';
                                                data += '&discount='+$("#type_discount").val();
                                                data += '&paid_total='+$("#type_discount option[value='3']").data("price");
                                                data += '&observations='+$('#txtObservation').val();
                                                data += '&code_exo='+$('#code_exo').val();

                                                saveInscription(data);

                                            } else {
                                                $('#code_exo').focus();
                                                $.smallBox({
                                                    title : 'Atención',
                                                    content : "<i class='fa fa-warning'></i> <i>El código ya a sido utilizado, verifique el código o pongase en contacto con el Administrador del Sistema.</i>",
                                                    color : "#A65858",
                                                    iconSmall : "fa fa-times",
                                                    timeout : 5000
                                                });
                                            }
                                    else {
                                        $('#code_exo').focus();
                                        $.smallBox({
                                            title : 'Atención',
                                            content : "<i class='fa fa-warning'></i> <i>El código ingresado no es válido, verifique el código o pongase en contacto con el Administrador del Sistema.</i>",
                                            color : "#A65858",
                                            iconSmall : "fa fa-times",
                                            timeout : 5000
                                        });
                                    }


                                } else {
                                    $('#txtObservation').focus();
                                    $.smallBox({
                                        title : 'Atención',
                                        content : "<i class='fa fa-warning'></i> <i>Complete los campo de observación y código unico</i>",
                                        color : "#A65858",
                                        iconSmall : "fa fa-times",
                                        timeout : 5000
                                    });
                                }
                                $('#btnAddInscription').attr('disabled', false);
                            }
                        } else {
                            $.smallBox({
                                title : 'Inscripción Negada',
                                content : "<i class='fa fa-warning'></i> <i>Solo estan permitidas <strong>DOS</strong> inscripciones por deportista, verifique en el listado de inscripciones de la ficha.</i>",
                                color : "#A65858",
                                iconSmall : "fa fa-times",
                                timeout : 8000
                            });
                        }

                    } else {
                        $.smallBox({
                            title : 'Atención',
                            content : "<i class='fa fa-warning'></i> <i>El deportista ya esta inscrito en la disciplina seleccionada, verifique en el listado de inscripciones de la ficha.</i>",
                            color : "#A65858",
                            iconSmall : "fa fa-times",
                            timeout : 8000
                        });
                    }
                });

                // Eliminar Inscripcion, es actualizar
                $(".btnActionDelete").click(function () {
                    var row = $(this).parents('tr');
                    var id = row.data('id');

                    $.smallBox({
                        title : "Eliminar?",
                        content : "Esta seguro que desea eliminar el registro de incripción? <p class='text-align-right'><a href='javascript:void(0);' class='btn btn-primary btn-sm'>No</a> <a href='javascript:void(0);'  onclick='deleteInscription("+id+");' class='btn btn-danger btn-sm'>Si</a></p>",
                        color : "#A65858",
                        //timeout: 8000,
                        icon : "fa fa-bell swing animated"
                    });
                });

                // CONVERT DIALOG TITLE TO HTML REF: http://stackoverflow.com/questions/14488774/using-html-in-a-dialogs-title-in-jquery-ui-1-10
                $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
                    _title : function(title) {
                        if (!this.options.title) {
                            title.html("&#160;");
                        } else {
                            title.html(this.options.title);
                        }
                    }
                }));

                // Form Dialog click Paid
                $('#btnActionPaid').click(function() {
                    var row = $(this).parents('tr');
                    var id = row.data('id');

                    $.ajax( {
                        url: "/ventas/paidform/"+id,
                        cache: false,
                        async: false,
                        type: "GET",
                        contentType: "application/json; charset=utf-8",
                        success:function(result){
                            $('#concepto').val(result[0].product.detail);
                            if (result[0].discount == 0) {
                                $('#aditional_info').css('display', 'none');
                            } else {
                                $('#cost').val('U$D '+result[0].product.price);
                                if(result[0].discount == 1) {
                                    $('#discount').val('Descuento 30%');
                                }
                                if(result[0].discount == 2) {
                                    $('#discount').val('Descuento 50%');
                                }
                                $('#observation').val(result[0].observations);
                                $('#aditional_info').css('display', 'block');
                            }
                            $('#total').val('U$D '+result[0].paid_total);
                            $('#paidtotal').val(result[0].paid_total);
                            $('#inscription_id').val(id);
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

                    $('#paid_dialog').dialog('open');
                    return false;
                });

                // Config dialog
                $('#paid_dialog').dialog({
                    autoOpen : false,
                    width : 500,
                    resizable : false,
                    modal : true,
                    title : "<div class='widget-header'><h4><i class='icon-ok'></i> Formulario de Pago de Inscripción</h4></div>",
                    buttons : [{
                        html : "Cancelar",
                        "class" : "btn btn-default",
                        click : function() {
                            $(this).dialog("close");
                        }
                    }, {
                        html : "<i class='fa fa-check'></i>&nbsp; Registrar Pago",
                        "class" : "btn btn-primary",
                        "id" : "btnActionDialogPaid",
                        click : function() {
                            JS_savePaid();
                            $(this).dialog("close");
                            JS_cerrarModal("#remoteModal");
                        }
                    }]
                });
            </script>
        </div>
    </div>
</div>
