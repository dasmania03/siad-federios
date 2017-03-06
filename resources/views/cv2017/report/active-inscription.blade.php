<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">

    @include('layouts.bread-crumb-header', ['title' => 'Vacacionales', 'subtitle' => 'Inscripciones Activas'])

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
                    <h2>LISTADO DE INSCRIPCIONES ACTIVAS PARA LOS CURSOS VACACIONALES 2017</h2>
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
                                <th class="hasinput" style="width:5%">
                                    {{--<input type="text" class="form-control" placeholder="" />--}}
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
                                <th class="hasinput" style="width:7%">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput" style="width:7%">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput" style="width:7%">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput" style="width:7%">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput" style="width:7%">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput" style="width:7%">
                                    <input type="text" class="form-control" placeholder="Filtrar por" />
                                </th>
                                <th class="hasinput" style="width:17%">
                                    {{--<input type="text" class="form-control" placeholder="" />--}}
                                </th>
                            </tr>

                            <tr>
                                <th data-class="expand">Cod</th>
                                <th >Deporte</th>
                                <th >Deportista</th>
                                <th data-hide="phone, tablet, desktop">Representante</th>
                                <th data-hide="phone, tablet, desktop">Direccion</th>
                                <th data-hide="phone, tablet, desktop">Telefono</th>
                                <th data-hide="phone, tablet, desktop">Email</th>
                                <th >Edad</th>
                                <th >Sexo</th>
                                <th >Talla</th>
                                <th >Tipo</th>
                                <th data-hide="phone, tablet, desktop">Horario</th>
                                <th data-hide="phone, tablet, desktop">Dias</th>
                                @if (Auth::user()->role == 'admin')
                                    <th data-hide="phone, tablet, desktop">Code/Obs.</th>
                                    <th data-hide="phone, tablet, desktop">User</th>
                                @endif
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($data as $inscription)
                                <tr data-id="{{ $inscription->id }}">
                                    <td>{{ $inscription->id }}</td>
                                    <td>{{ $inscription->product->sport->name }}</td>
                                    <td>{{ $inscription->athlete->identification }} - {{ $inscription->athlete->full_name }}</td>
                                    <td>{{ $inscription->athlete->agent->identification }} - {{ $inscription->athlete->agent->full_name }}</td>
                                    <td>{{ $inscription->athlete->address }}</td>
                                    <td>{{ $inscription->athlete->agent->telephone }}</td>
                                    <td>{{ $inscription->athlete->agent->email }}</td>
                                    <td>{{ $inscription->athlete->age }}</td>
                                    <td>{{ $inscription->athlete->gender }}</td>
                                    <td>{{ $inscription->athlete->size }}</td>
                                    @if ($inscription->status == 1)
                                        <td>Gratis</td>
                                    @endif
                                    @if ($inscription->status == 3)
                                        <td>Pagada</td>
                                    @endif
                                    @if ($inscription->status == 4)
                                        <td>Exonerada</td>
                                    @endif
                                    <td>{{ $inscription->dias }}</td>
                                    <td>{{ $inscription->horario }}</td>
                                    <td>{{ $inscription->code_exo }} - {{ $inscription->observations }}</td>
                                    <td>{{ $inscription->user->username }}</td>
                                </tr>
                            @endforeach

                            <!-- table content -->
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
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-3 col-xs-3 hidden-xs'C><'col-sm-3 col-xs-3 hidden-xs'T>r>"+
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
                        "sMessage": "Generado por SIAD Federios <i>(presione Esc para cerrar</i>"
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
