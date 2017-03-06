<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">

    @include('layouts.bread-crumb-header', ['title' => 'SIAD', 'subtitle' => 'Administración de Usuarios'])

    <!-- right side of the page with the sparkline graphs -->
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
        <ul id="sparks">

            <li class="sparks-info">
                <h5> Total CV 2017 <span class="txt-color-blue">$11,340.00</span></h5>
            </li>
            <li class="sparks-info">
                <div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
                    110,150,300,130,400,240,220,310,220,300, 270, 210
                </div>
            </li>
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
                    <h2>ADMINISTRACIÓN DE USUARIOS </h2>
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
                                <th>Username</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Avatar</th>
                                <th>Email</th>
                                <th>Permisos</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($data as $user)
                                <tr data-id="{{ $user->id }}">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->avatar }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
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

        /* BASIC ;*/
        var responsiveHelper_datatable_fixed_column = undefined;
        var breakpointDefinition = {
            tablet : 1024,
            phone : 480
        };

        // COLUMN FILTER
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
                '<button id="btnActionNewUser" type="button" class="btn btn-primary"><i class="fa fa-plus"></i><span class="hidden-mobile">&nbsp;Nuevo Usuario</span></button>' +
                '&nbsp;<button id="btnActionEditUser" type="button" class="btn btn-warning"><i class="fa fa-file-text"></i><span class="hidden-mobile">&nbsp;Editar Usuario</span></button></div>');

        // Apply the filter
        $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
            otable
                    .column( $(this).parent().index()+':visible' )
                    .search( this.value )
                    .draw();

        } );

        $('#datatable_fixed_column tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                otable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $('#btnActionNewUser').click(function () {
            $.get('/user/create', function(data){
                $('#remoteModal').html($(data));
                $('#remoteModal').modal({backdrop: 'static', keyboard: false});
            });
        });

        $('#btnActionEditUser').click(function () {
            var id = otable.$('tr.selected').data('id');
            if(id != undefined) {
                window.location.href = 'home#/athlete/'+id+'/edit';
            } else {
                $.smallBox({
                    title : "Atención",
                    content : "<i class='fa fa-warning'></i> <i>Seleccione un Registro del Listado</i>",
                    color : "#296191",
                    iconSmall : "fa fa-close bounce animated",
                    timeout : 4000
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
