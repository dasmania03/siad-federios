<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">

    @include('layouts.bread-crumb-header', ['title' => 'Vacacionales', 'subtitle' => 'Ventas'])

    <!-- right side of the page with the sparkline graphs -->
    <!-- col -->
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
        <!-- sparks -->
        <ul id="sparks">
            @include('cv2017.sparks.Flfsh-collected-today')
            @include('cv2017.sparks.flash-collected-total')
        </ul>
        <!-- end sparks -->
    </div>
    <!-- end col -->

</div>
<!-- end row -->

<!-- MODAL PLACE HOLDER -->
<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true"></div>
<!-- END MODAL -->

<!--
	The ID "widget-grid" will start to initialize all widgets below
	You do not need to use widgets if you dont want to. Simply remove
	the <section></section> and you can use wells or panels instead
	-->

<!-- widget grid -->
<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="alert alert-info">
                <h3 class="no-margin">Generar Reporte / Exportar</h3>
                <h5>Seleccione el deporte y el rango de fechas</h5>
                {!! Form::open(['class' => 'smart-form', 'id' => 'formReport']) !!}
                <div class="row">
                    <section class="col col-3">
                        <label class="select">
                            {!! Form::select('sport', $sports, null, ['placeholder' => 'Todas', 'id' => 'sport']) !!} <i></i> </label>
                    </section>
                    <section class="col col-3">
                        <label class="input"> <i class="icon-append fa fa-calendar"></i>
                            <input type="text" name="startdate" id="startdate" placeholder="Fecha de inicio">
                        </label>
                    </section>
                    <section class="col col-3">
                        <label class="input"> <i class="icon-append fa fa-calendar"></i>
                            <input type="text" name="finishdate" id="finishdate" placeholder="Fecha de fin">
                        </label>
                    </section>
                    <section class="col col-3">
                        <a href="javascript:void(0)" id="btnActionGenerateReport" class="btn btn-primary btn-sm">Generar / Exportar</a>
                    </section>
                </div>
                {!! Form::close() !!}
            </div>

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false">
                <!-- widget options:
                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                data-widget-colorbutton="false"
                data-widget-editbutton="false"
                data-widget-togglebutton="false"
                data-widget-deletebutton="false"
                data-widget-fullscreenbutton="false"
                data-widget-custombutton="false"
                data-widget-collapsed="true"
                data-widget-sortable="false"

                -->
                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>LISTADO DE VENTAS DE LOS CURSOS VACACIONALES 2017 </h2>
                </header>

                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th class="hasinput">
                                    {{--<input type="text" class="form-control" placeholder="Filtrar por" />--}}
                                </th>
                                <th class="hasinput">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                            </tr>
                            <tr>
                                <th data-class="expand">Cod</th>
                                <th >Fecha</th>
                                <th >Concepto</th>
                                <th >Costo</th>
                                <th >Descuento</th>
                                <th >Total Pagado</th>
                                <th data-hide="phone, tablet, desktop">Deportista</th>
                                <th data-hide="phone, tablet, desktop">Representante</th>
                                <th data-hide="phone, tablet, desktop">Edad</th>
                                <th data-hide="phone, tablet, desktop">Referencia(si existe descuenti)</th>
                                <th data-hide="phone, tablet, desktop">Responsable de inscripcion</th>
                                <th >Acciones</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th colspan="7" style="text-align:right">Total:</th>
                                <th></th>
                            </tr>
                            </tfoot>

                            <tbody>

                                @foreach($data as $venta)
                                    <tr data-id="{{ $venta->id }}">
                                        <td>{{ $venta->id }}</td>
                                        <td>{{ $venta->created_at }}</td>
                                        <td>{{ $venta->inscription->product->detail }}</td>
                                        <td>{{ $venta->inscription->product->price }}</td>
                                        @if ($venta->inscription->discount == 0)
                                            <td>-</td>
                                        @endif
                                        @if ($venta->inscription->discount == 1)
                                            <td>30%</td>
                                        @endif
                                        @if ($venta->inscription->discount == 2)
                                            <td>50%</td>
                                        @endif
                                        <td>{{ $venta->price }}</td>
                                        <td>{{ $venta->inscription->athlete->identification }} - {{ $venta->inscription->athlete->full_name }}</td>
                                        <td>{{ $venta->inscription->athlete->agent->identification }} - {{ $venta->inscription->athlete->agent->full_name }}</td>
                                        <td>{{ $venta->inscription->athlete->age }}</td>
                                        <td>{{ $venta->inscription->observations }}</td>
                                        <td>{{ $venta->inscription->user->username }}</td>

                                        <td>
                                            <a href="/ventas/print/{{ $venta->id }}" target="_blank" class="btn btn-primary btn-labeled btn-xs">
                                                <i class="fa fa-print"></i>
                                                Imprimir
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->

        </article>
        <!-- WIDGET END -->

    </div>

    <!-- end row -->

    <!-- row -->

    <div class="row">

        <!-- a blank row to get started -->
        <div class="col-sm-12">
            <!-- your contents here -->
        </div>

    </div>

    <!-- end row -->

</section>
<!-- end widget grid -->

<script type="text/javascript">

    pageSetUp();

    // pagefunction
    var pagefunction = function() {

        // Basic DataTable
        var responsiveHelper_datatable_fixed_column = undefined;
        var breakpointDefinition = {
            desktop : 1360,
            tablet : 1024,
            phone : 480
        };

        // Column Filter
        var otable = $('#datatable_fixed_column').DataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-3'f><'col-sm-3 col-xs-3 hidden-xs'C><'col-sm-3 col-xs-3 hidden-xs'T><'col-sm-3 col-xs-3 hidden-xs'l>r>"+
            "t"+
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
            "autoWidth" : true,
            "oLanguage": {
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
            },
            "oTableTools": {
                "aButtons": [
                    "copy",
                    "xls",
                    {
                        "sExtends": "pdf",
                        "sTitle": "SmartAdmin_PDF",
                        "sPdfMessage": "SIAD Federios Exportar PDF",
                        "sPdfSize": "letter"
                    },
                    {
                        "sExtends": "print",
                        "autoPrint" : true,
                        "sMessage": "Generado por SIAD Federios <i>(presione Esc para cerrar)</i>"
                    }
                ],
                select: true,
                "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
            },
            "preDrawCallback" : function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_datatable_fixed_column) {
                    responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
                }
            },
            "rowCallback" : function(nRow) {
                responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
            },
            "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api();

                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                    i : 0;
                };

                // Total over all pages
                total = api
                        .column( 5 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                // Total over this page
                pageTotal = api
                        .column( 5, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                // Update footer
                $( api.column( 4 ).footer() ).html(
                        '$'+pageTotal +' ( $'+ total +' total)'
                );
            },
            "drawCallback" : function(oSettings) {
                responsiveHelper_datatable_fixed_column.respond();
            }
        });

        // Apply the filter
        $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
            otable
                    .column( $(this).parent().index()+':visible' )
                    .search( this.value )
                    .draw();
        } );
        /* END COLUMN FILTER */

        $('#datatable_fixed_column tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                otable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        var errorClass = 'invalid';
        var errorElement = 'em';
        jQuery.validator.addMethod("validDate", function(value, element) {
            return this.optional(element) || moment(value,"DD/MM/YYYY").isValid();
        }, "Please enter a valid date in the format DD/MM/YYYY");

        var $ormReport = $("#formReport").validate({
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
                startdate : {
                    required : true,
                    validDate : true
                },
                finishdate : {
                    required : true,
                    validDate : true
                }
            },

            // Messages for form validation
            messages : {
                startdate : {
                    required : 'Requerido',
                    validDate : 'No valida'
                },
                finishdate : {
                    required : 'Requerido',
                    validDate : 'No valida'
                }
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });

        // Load form validation dependency
        loadScript("js/plugin/jquery-form/jquery-form.min.js", $ormReport);

        // START AND FINISH DATE
        $('#startdate').datepicker({
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            prevText : '<i class="fa fa-chevron-left"></i>',
            nextText : '<i class="fa fa-chevron-right"></i>'
        });

        $('#finishdate').datepicker({
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            prevText : '<i class="fa fa-chevron-left"></i>',
            nextText : '<i class="fa fa-chevron-right"></i>'
        });

        $('#btnActionGenerateReport').click(function () {
            event.preventDefault();
            var form = '#formReport';
            if ($(form).valid()){
                $.ajax({
                    url:"/ventas/print-report",
                    type: 'GET',
                    data: $(form).serialize(),
                    dataType: "json",
                    success:function(result){
                        $.smallBox({
                            title : 'Descargando Reporte',
                            content : "",
                            color : "#659265",
                            iconSmall : "fa fa-times",
                            timeout : 3000
                        });
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
    };

    // load related plugins

    loadScript("js/plugin/datatables/jquery.dataTables.min.js", function(){
        loadScript("js/plugin/datatables/dataTables.colVis.min.js", function(){
            loadScript("js/plugin/datatables/dataTables.tableTools.min.js", function(){
                loadScript("js/plugin/datatables/dataTables.bootstrap.min.js", function(){
                    loadScript("js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
                });
            });
        });
    });

</script>
