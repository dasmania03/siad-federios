<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">

    @include('layouts.bread-crumb-header', ['title' => 'Vacacionales', 'subtitle' => 'Codes Exoneración'])

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
                    <h2>LISTADO DE CODIGOS DE EXONERACION DE LOS CURSOS VACACIONALES 2017 </h2>
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
                                <th data-class="expand">Cod</th>
                                <th >Codigo EAN8</th>
                                <th >Estado</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($data as $code)
                                <tr data-id="{{ $code->id }}">
                                    <td>{{ $code->id }}</td>
                                    <td>{{ $code->codes }}</td>
                                    @if ($code->status == 0)
                                        <td><span class="center-block padding-5 label label-default">Sin Usar</span>
                                    @endif
                                    @if ($code->status == 1)
                                        <td><span class="center-block padding-5 label label-danger">Usado</span>
                                    @endif
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
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12'<'toolbar'>>r>"+
            "t"+
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth" : true,
            "oLanguage": {
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
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

        // Custom toolbar
        $("div.toolbar").html('' +
                '<div class="text-right">' +
                '<a href="/code/print" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i><span class="hidden-mobile">&nbsp;Imprimir Codigos</span></a></div>');

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
