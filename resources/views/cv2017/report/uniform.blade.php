<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">

@include('layouts.bread-crumb-header', ['title' => 'Vacacionales', 'subtitle' => 'Uniformes'])

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

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-teal" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false">
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
                    <h2>LISTADO DE ENTREGA DE UNIFORMES</h2>
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
                                    <input type="text" class="form-control" placeholder="" />
                                </th>
                                <th class="hasinput" style="width:5%">
                                    <input type="text" class="form-control" placeholder="" />
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
                                    {{--<input type="text" class="form-control" placeholder="Filtrar por" />--}}
                                </th>
                            </tr>

                            <tr>
                                <th data-class="expand">Ins</th>
                                <th >RCaja</th>
                                <th >Deportista</th>
                                <th >Representante</th>
                                <th >Recibe</th>
                                <th >Talla</th>
                                <th data-hide="phone, tablet, desktop">Edad</th>
                                <th data-hide="phone, tablet, desktop">Inscripciones</th>
                                <th >Retiro?</th>
                                <th >Acciones</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($athletes as $athlete)
                                @if(count($athlete->inscriptions) > 0)
                                <tr data-id="{{ $athlete->id }}">
                                    <td>{{ $athlete->id }}</td>
                                    <td>
                                    @foreach($athlete->inscriptions as $inscription)
                                        {{ $inscription->venta['id'] }}
                                    @endforeach
                                    </td>
                                    <td>{{ $athlete->identification }} - {{ $athlete->full_name }}</td>
                                    <td>{{ $athlete->agent->identification }} - {{ $athlete->agent->full_name }}</td>
                                    <td>
                                        @php
                                            $g = $p = $e = 0;
                                            foreach ($athlete->inscriptions as $inscription) {
                                                if ($inscription->status == 1) {
                                                    $g++;
                                                } else if ($inscription->status == 3) {
                                                    $p++;
                                                } else if ($inscription->status == 4) {
                                                    $e++;
                                                }
                                            }
                                            if ($p > 0) {
                                                echo $p;
                                            } else if ($g > 0) {
                                                echo '1';
                                            } else if ($e > 0) {
                                                echo '1';
                                            }
                                            $g = $p = $e = 0;
                                        @endphp
                                    </td>
                                    <td>{{ $athlete->size }}</td>
                                    <td>{{ $athlete->age }}</td>
                                    <td>
                                        @foreach($athlete->inscriptions as $inscription)
                                            {{ $inscription->product->sport->name }}: {{ ($inscription->status == 1) ? 'Gratis' : (($inscription->status == 3) ? 'Pagada' : 'Exonerada') }},
                                        @endforeach
                                    </td>
                                    <td><span class="center-block padding-5 label label-{{ ($athlete->status_uniform == 'No') ? 'info' : 'success font-md' }}"><i class="fa fa-{{ ($athlete->status_uniform == 'No') ? 'times-circle-o' : 'check-circle-o' }}"> {{ $athlete->status_uniform }}</span></td>
                                    <td>
                                        @if($athlete->status_uniform == 'No')
                                        <a href="javascript:void(0);" class="btn btn-primary btn-labeled btn-xs" onclick='deliveryUniform({{ $athlete->id }})'>
                                            <i class="fa fa-print"></i>
                                            Entregar?
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endif
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

    function deliveryUniform(id, resp) {
        resp = (resp) ? resp : 0;
        if( resp == 1){
            var status = getAjaxRequest('/athlete/delivery-uniform/'+id);

            if(status.success) {
                $.smallBox({
                    title : 'Exito',
                    content : "Uniforme marcado como entregado",
                    color : "#659265",
                    iconSmall : "fa fa-times",
                    timeout : 3000
                });
            } else {
                $.smallBox({
                    title : 'Error',
                    content : "Verifique la informacion",
                    color : "#659265",
                    iconSmall : "fa fa-times",
                    timeout : 3000
                });
            }
        } else {
            resp = 1;
            $.smallBox({
                title : "Entregar Uniforme(s)?",
                content : "Por favor confirme la entrega del uniforme... <p class='text-align-right'><a href='javascript:void(0);' class='btn btn-primary btn-sm'>No</a> <a href='javascript:void(0);'  onclick='deliveryUniform("+id+","+resp+");' class='btn btn-danger btn-sm'>Confirmar</a></p>",
                color : "#356E35",
                //timeout: 8000,
                icon : "fa fa-bell swing animated"
            });
        }

    }

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
